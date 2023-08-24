<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\RegisterRequest;
use Session;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function loginIndex()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        }
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function registerProcess(RegisterRequest $request)
    {

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'image_path' => '',
        ]);

        if ($data) {
            $imageName = 'user-image'.$data->id.'.'.$request->image->extension();
            $path = $request->file('image')->storeAs('public/images',$imageName);
    
            $data->image_path = $imageName;
            $data->update();

            Auth::login($data);

            return redirect()
                ->intended('/')
                ->with([
                    'success' => 'Succesfully Create Account',
                    'user' => Auth::user(),
                ]);
        }
        return redirect()
            ->intended('/')
            ->with([
                'success' => 'Failed Create Account',
                'user' => null,
            ]);
    }

    public function loginProcess(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $credential = $request->only('email','password');

        if(Auth::attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user) {
                return redirect()->intended('/')->with(['success' => 'Succesfully Log In']);
            }
        }
        return redirect()->intended('login')->with('error','Invalid Credential');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Successfully logged out');
    }

    public function forgotpass_index(){
        return view('auth.forgot_password')->with([
        ]);
    }

    public function linkforgot(Request $request){
        $this->validate($request,[
            'email' => ['required','email:rfc,dns'],
        ]);
        
        $check_email = User::where('email',$request->email)->exists();
        
        $status = Password::sendResetLink(
            $request->only('email')
        );

        Session::put('email',$request->email);

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['success' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassIndex(string $token){
        return view('auth.reset_password', [
            'token' => $token,
        ]);
    }

    public function updatePass(Request $request){
        $request->validate([
            'email' => 'required',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        Session::forget('email');
    
        return $status === Password::PASSWORD_RESET
        ? redirect()->intended('login')->with('success', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }
}
