<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function index()
    {
        $data = Tags::orderBy('id', 'desc')->paginate(5);

        return view('tags.index')->with([
            'user' => Auth::user(),
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('tags.create')->with([
            'user' => Auth::user(),
        ]);
    }

    public function store(TagRequest $request)
    {
        $data = Tags::create([
            'tag_name' => $request->tag_name,
        ]);

        return $data
            ? redirect()
                ->route('tags.index')
                ->with(['success' => 'Succesfully create tag'])
            : redirect()
                ->route('tags.index')
                ->with(['error' => 'Failed create tag']);
    }

    public function edit($id)
    {
        $data = Tags::where('id', decrypt($id))->first();

        return view('tags.edit')->with([
            'user' => Auth::user(),
            'data' => $data,
        ]);
    }

    public function update(TagRequest $request, $id)
    {
        $data = Tags::where('id', decrypt($id))->first();

        $data->update($request->validated());

        return redirect()
            ->route('tags.index')
            ->with(['success' => 'Succesfully update tag']);
    }

    public function destroy($id)
    {
        $data = Tags::where('id', decrypt($id))->first();

        try {
            if ($data) {
                $data->delete();
                return redirect()
                    ->route('tags.index')
                    ->with(['success' => 'Succesfully delete tag']);
            }
            return redirect()
                ->route('tags.index')
                ->with(['error' => 'Failed delete tag']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
