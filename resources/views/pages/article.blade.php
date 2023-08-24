@extends('layouts.application')

@section('title-page')
    Article Page
@endsection

@section('content')
    <div class="max-w-screen-xl mx-auto p-5 pt-20 md:pt-20 md:pb-80">
        <div class="text-lg md:text-3xl font-sans font-bold animate__animated animate__fadeInDown">All Article</div>
        <div class="mx-auto mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-10 animate__animated animate__fadeIn">
            @forelse ($data as $item)
                <a href="{{ url('article-page/' . Crypt::encrypt($item->id)) }}">
                    <div class="md:col-span-1 mx-auto">
                        <div class=" rounded-lg p-5 bg-white w-full h-full  hover:opacity-70 ">
                            <img class="rounded-lg mx-auto w-80 h-64"
                                src=" {{ $item->image_path ? asset('storage/images/' . $item->image_path) : asset('storage/images/KOJIDEV.png') }}"
                                alt="">
                            <p class="text-md md:text-lg my-2 text-center font-bold font-sans">{{ $item->title }}</p>
                            <p class="text-xs text-center text-gray-400"><span
                                    class="text-sm mr-2 items-center font-bold text-teal-900">.</span>{{ Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}<span
                                    class="text-sm ml-2 items-center font-bold text-teal-900">.</span></p>
                            <p class="text-xs mt-2 text-gray-400">Tags: @foreach ($item->tags as $item_tag)
                                    #{{ $item_tag->tag_name }}
                                @endforeach
                            </p>
                            <p class="text-xs mt-4 line-clamp-4 text-justify  ">{{ $item->content }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="mt-4 md:col-span-3 text-xl  md:text-3xl mx-auto font-semibold text-gray-400 font-sans">
                    Article is Not Found
                </div>
            @endforelse
        </div>
        <div class="m-6 ">
            {{ $data->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
