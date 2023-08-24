<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Tags;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $data = Articles::orderBy('id', 'desc')->paginate(5);

        return view('articles.index')->with([
            'user' => Auth::user(),
            'data' => $data,
        ]);
    }

    public function create()
    {
        $categories = Categories::all();
        return view('articles.create')->with([
            'user' => Auth::user(),
            'categories' => $categories,
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $data = Articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => null,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
        ]);

        if ($request->has('image')) {
            $imageName = 'article-image' . $data->id . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('public/images', $imageName);
            $data->image_path = $imageName;
            $data->update();
        }

        $tags = explode(',', $request->tags);

        foreach ($tags as $item) {
            $tag = Tags::firstOrCreate([
                'tag_name' => $item,
            ]);
            $data->tags()->attach($tag);
        }

        return redirect()
            ->route('articles.index')
            ->with(['success' => 'Succesfully Create Article']);
    }

    public function edit($id)
    {
        $data = Articles::where('id', decrypt($id))->first();
        $categories = Categories::all();
        $tags = $data->tags()->implode('tag_name', ',');

        return view('articles.edit')->with([
            'user' => Auth::user(),
            'data' => $data,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function update(ArticleRequest $request, $id)
    {
        $data = Articles::where('id', decrypt($id))->first();

        if ($request->has('image')) {
            Storage::delete('public/images/' . $data->image_path);

            $imageName = 'article-image' . $data->id . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('public/images', $imageName);
        }else{
            $imageName = $data->image_path;
        }

        $data->update([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $imageName,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
        ]);

        $tags = explode(',', $request->tags);

        $requestTags = [];

        foreach ($tags as $item) {
            $tag = Tags::firstOrCreate([
                'tag_name' => $item,
            ]);
            array_push($requestTags, $tag->id);
        }
        $data->tags()->sync($requestTags);

        return redirect()
            ->route('articles.index')
            ->with(['success' => 'Succesfully update article']);
    }

    public function destroy($id)
    {
        $data = Articles::where('id', decrypt($id))->first();

        try {
            if ($data) {
                $data->image_path ? Storage::delete('public/images/' . $data->image_path) : '';
                $data->tags()->detach();
                $data->delete();
                return redirect()
                    ->route('articles.index')
                    ->with(['success' => 'Succesfully delete article']);
            }
            return redirect()
                ->route('articles.index')
                ->with(['error' => 'Failed delete article']);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
