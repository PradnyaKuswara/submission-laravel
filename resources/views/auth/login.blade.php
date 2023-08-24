@extends('layouts.auth')

@section('title-page')
    Login Page
@endsection

@section('content-section')
    <div class="w-full animate__animated animate__fadeInLeft">
        <div class="grid md:grid-cols-12">
            <div class="bg-white shadow-lg rounded-lg px-10 pt-8 pb-10  md:col-span-6">
                <h1 class="text-3xl  md:text-5xl font-sans  font-extrabold mb-4">Welcome Back !</h1>
                <h3 class="text-md md:text-xl ">Please insert your detail!</h3>
                <form action="{{ url('login-process') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs md:text-sm font-bold mb-2" for="username">
                            Email
                        </label>
                        <input
                            class="shadow text-xs md:text-sm appearance-none border rounded w-4/5 md:w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="text" name="email" placeholder="Email" autocomplete="off">
                        @error('email')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-xs  md:text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input type="password"
                            class="shadow text-xs md:text-sm appearance-none border  rounded w-3/5  md:w-10/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" name="password" type="password" placeholder="password">
                        <span class="border rounded py-2 px-3 " id="basic-addon1" onclick=""><i class="fa fa-eye-slash"
                                onclick="change(this);myFunction(); "></i></span>
                        @error('password')
                            <p class="text-xs mt-2 mb-2 text-red-700">{{ $message }}</p>
                        @enderror
                        <div class="mb-6 ">
                            <a class="text-right font-bold text-xs md:text-xs text-blue-500 hover:text-blue-800"
                                href="{{ url('password/reset') }}">
                                Forgot password?
                            </a>
                        </div>
                    </div>
                    <div class="mb-6">
                        <button
                            class="bg-teal-900 w-full text-xs md:text-sm md:w-10/12 hover:opacity-75 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                            type="submit">
                            Sign In
                        </button>
                    </div>
                    <div class="mb-6 ">
                        <a class="text-right font-bold text-xs md:text-sm text-blue-500 hover:underline hover:text-blue-800"
                            href="{{ url('/register') }}">
                            Don't Have an Account?
                        </a>
                    </div>
                </form>
            </div>
            <div class="md:col-span-6 md:flex animate__animated animate__fadeIn">
                <img  class="rounded-lg drop-shadow-lg" src="{{ asset('storage/images/image1.jpg') }}" alt="mockup">
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function change(x) {
            x.classList.toggle("fa-eye");
        }
    </script>
@endsection
