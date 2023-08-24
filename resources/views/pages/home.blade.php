@extends('layouts.application')

@section('title-page')
    Home Page
@endsection

@section('content')
    <div class="grid md:grid-cols-12 place-items-center gap-2 bg-teal-900 p-10 md:p-32 border-b-2 border-black border">
        <div class="lg:mt-10 md:col-span-9 animate__animated animate__fadeInLeft">
            <h1
                class="mb-4  w-full md:w-full font-sans font-bold tracking-tight text-justify md:text-left leading-none text-2xl md:text-7xl text-white">
                "Unveiling Perspectives: A Glimpse into My Personal Blog"</h1>
            <p class="mb-6 pe-0 lg:pe-6 text-justify   text-gray-200 md:mb-8 text-xs md:text-lg">
                Exploring the World Through My Eyes: Journey Notes and Life Inspirations from My Perspective
            </p>
            <div class="flex gap-1 md:gap-2">
                <div class="">
                    <a href="{{ url('/article-page') }}"
                        class="inline-flex open-sans items-center justify-center px-5 py-2 text-xs md:text-sm text-center text-white rounded-lg bg-black hover:text-white hover:bg-opacity-75 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 ">
                        <i class="fas fa-reguler fa-book mr-3"></i> Start Reading
                    </a>
                </div>
                <div class="">
                    <a href="{{ url('/#article') }}"
                        class="inline-flex open-sans items-center justify-center px-5 py-2 text-xs md:text-sm text-center border border-teal-900 text-black rounded-lg bg-gray-200 hover:bg-opacity-75 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 ">
                        <i class="fas fa-reguler fa-book mr-3"></i> Latest Article
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="article" class="pt-5 pl-5 pr-5 pb-20 mt-10 max-w-screen-xl mx-auto">
        <div class="text-xl  md:text-3xl font-bold leading-3">
            <i class="fas fa-newspaper mr-2"></i> Latest Article
        </div>
        <div class="mx-auto mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-20">
            @php
                $count = 0;
            @endphp
            @forelse ($data as $item)
                <div class="md:col-span-1">
                    <div class="flex items-center {{ $count == 0 ? 'gap-y-4 gap-x-6' : 'gap-4' }}">
                        <div class="text-4xl text-gray-200 font-bold">
                            @php
                                $count++;
                                echo str_pad($count, 2, '0 ', STR_PAD_LEFT);
                            @endphp
                        </div>
                        <div class="">
                            <div class="mb-2 flex items-center gap-x-2">
                                <img class="w-4 h-4 "
                                    src="{{ $item->image_path ? asset('storage/images/' . $item->image_path) : asset('storage/images/KOJIDEV.png') }}"
                                    alt="user photo">
                                <p class="text-xs">{{ $item->user->name }}</p>
                            </div>
                            <div class="mb-2 text-xl font-bold  font-sans">
                                {{ $item->title }}
                            </div>
                            <div class="mb-2 text-xs text-gray-500">
                                {{ Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                            </div>
                            <div class="mb-2 text-xs text-gray-400">
                                Tags:
                                @foreach ($item->tags as $item_tag)
                                    #{{ $item_tag->tag_name }}
                                @endforeach
                            </div>
                            <div class="hover:font-bold">
                                <a href="{{ url('article-page/' . Crypt::encrypt($item->id)) }}" class="text-sm mt-4">Read more<i
                                        class="fas fa-chevron-down text-black fa-1x ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="mt-4 md:col-span-3 text-xl  md:text-3xl mx-auto font-semibold text-gray-400 font-sans">
                    Article is Not Found
                </div>
            @endforelse
        </div>
    </div>
    </div>
@endsection
