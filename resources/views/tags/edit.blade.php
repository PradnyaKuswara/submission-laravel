@extends('layouts.application')

@section('title-page')
    Edit Tag
@endsection

@section('content')
    <div class="max-w-screen-xl mx-auto pt-28 pb-32 md:pb-40 p-5">
        <div>
            <h1 class="sans text-xl text-extrabold animate__animated animate__fadeInDown">Edit Tag</h1>
        </div>
        <div class="mt-4 animate__animated animate__fadeIn">
            <div class="bg-white shadow-lg p-5">
                <form action="{{ route('tags.update', Crypt::encrypt($data->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid md:grid-cols-2 mt-4 gap-x-4 gap-y-6">
                        <div class="md:col-span-2 mt-4">
                            <label for="tag_name" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tag
                                Name</label>
                            <input type="text" name="tag_name" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Category name" autocomplete="off" value="{{ $data->tag_name }}">
                            @error('tag_name')
                                <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-10 grid md:grid-cols-2 gap-4">
                        <button type="submit"
                            class="border hover:opacity-75 text-xs md:text-sm  text-white text-center rounded py-2 px-4 bg-teal-900  col-span-1">Update</button>
                        <a href="{{ route('tags.index') }}"
                            class="border border-gray-300 text-xs md:text-sm hover:bg-gray-100 text-black text-center rounded py-2 px-4 col-span-1">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
@endsection