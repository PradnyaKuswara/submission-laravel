<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Categories::orderBy('id', 'desc')->paginate(5);

        return view('categories.index')->with([
            'user' => Auth::user(),
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('categories.create')->with([
            'user' => Auth::user(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $data = Categories::create([
            'category_name' => $request->category_name,
        ]);

        return $data
            ? redirect()
                ->route('categories.index')
                ->with(['success' => 'Succesfully create category'])
            : redirect()
                ->route('categories.index')
                ->with(['error' => 'Failed create category']);
    }

    public function edit($id){
        $data = Categories::where('id',decrypt($id))->first();

        return view('categories.edit')->with([
            'user' => Auth::user(),
            'data' => $data,
        ]);
    }

    public function update(CategoryRequest $request, $id){
        $data = Categories::where('id',decrypt($id))->first();

        $data->update($request->validated());

        return redirect()->route('categories.index')->with(['success' => 'Succesfully update category']);
    }

    public function destroy($id){
        $data = Categories::where('id',decrypt($id))->first();

        try {
            if($data){
                $data->delete();
                return redirect()->route('categories.index')->with(['success' => 'Succesfully delete category']);
            }
            return redirect()->route('categories.index')->with(['error' => 'Failed delete category']);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
