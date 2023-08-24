@extends('layouts.application')

@section('title-page')
    Edit Article
@endsection

@section('content')
    <div class="max-w-screen-xl mx-auto py-14 p-5">
        <div>
            <h1 class="sans text-xl text-extrabold animate__animated animate__fadeInDown">Edit Article</h1>
        </div>
        <div class="mt-4 animate__animated animate__fadeIn">
            <div class="bg-white shadow-lg p-5">
                <form action="{{ route('articles.update', Crypt::encrypt($data->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid md:grid-cols-2 mt-4 gap-x-4 gap-y-6">
                        <div class="md:col-span-2 mt-4">
                            <label for="title"
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Title article" autocomplete="off" value="{{ $data->title }}">
                            @error('title')
                                <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2 mt-4">
                            <label for="content"
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Content</label>
                            <textarea rows="15" type="text" name="content" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Content" autocomplete="off">{{ $data->content }}</textarea>
                            @error('content')
                                <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2 mt-4">
                            <label for="image" class="block mb-2 text-xs md:text-sm  text-gray-700 font-bold">
                                Picture (optional)</label>
                            <input type="file" accept="image/png, image/jpg, image/jpeg" name="image" value=""
                                class="shadow  appearance-none border leading-tight  text-gray-700 text-xs md:text-sm rounded focus:outline-none focus:shadow-outline block w-4/5 md:w-10/12"
                                placeholder="Upload gambar disini" autocomplete="off">
                            @error('image')
                                <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2 mt-4">
                            <label for="image" class="block mb-2 text-xs md:text-sm  text-gray-700 font-bold">
                                Category</label>
                            <select name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="" autocomplete="off">
                                <option value="" hidden>Select Category</option>
                                @forelse ($categories as $item_category)
                                    <option value="{{ $item_category->id }}"
                                        {{ $data->category_id == $item_category->id ? 'selected' : '' }}>
                                        {{ $item_category->category_name }}
                                    </option>
                                @empty
                                    <option value="" disabled>Category not found, please create category first
                                    </option>
                                @endforelse
                            </select>
                            @error('category_id')
                                <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2 mt-4">
                            <label for="tags"
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tag</label>
                            <input rows="15" type="text" name="tags" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Multi tags (,)" autocomplete="off" value="{{ $tags }}">
                            @error('tags')
                                <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-10 grid md:grid-cols-2 gap-4">
                        <button type="submit"
                            class="border hover:opacity-75 text-xs md:text-sm  text-white text-center rounded py-2 px-4 bg-teal-900  col-span-1">Update</button>
                        <a href="{{ route('articles.index') }}"
                            class="border border-gray-300 text-xs md:text-sm hover:bg-gray-100 text-black text-center rounded py-2 px-4 col-span-1">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
@endsection
