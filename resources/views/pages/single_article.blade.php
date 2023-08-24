@extends('layouts.application')

@section('title-page')
@endsection

@section('content')
    <div class="max-w-screen-md mx-auto p-5 pt-20 md:pt-20 md:pb-80">
        <div class="grid  grid-cols-2 md:grid-cols-3 gap-2 md:gap-0 place-content-center place-items-center ">
            <div class="col-span-1 flex items-center gap-x-2">
                <i class="fa-regular fa-calendar"></i><span class="text-xs text-gray-400">{{ Carbon\Carbon::parse($data->created_at)->format('F d, Y') }}</span>
            </div>
          
            <div class="col-span-1 flex items-center gap-x-2">
                <img class="w-4 h-4 mx-auto rounded-full "
                    src="{{ $data->user->image_path ? asset('storage/images/' . $data->user->image_path) : asset('storage/images/KOJIDEV.png') }}"
                    alt="image-article">
                <p class="text-xs">{{ $data->user->name }}</p>
            </div>
            <div class="col-span-1">
                <p class="text-xs text-gray-400">Tags: @foreach ($data->tags as $item_tag)
                    #{{$item_tag->tag_name}}
                @endforeach</p>
            </div>
        </div>
        <div class=" text-xl md:text-3xl mt-12  text-center font-sans font-bold">{{ $data->title }}</div>
        <div class="mt-10">
            <img width="500px" class="mx-auto rounded-lg" src="{{ $data->image_path ? asset('storage/images/'.$data->image_path) : asset('storage/images/KOJIDEV.png')}}" alt="">
        </div>
        <div class="mt-10 text-xs md:text-sm text-justify leading-loose md:leading-8 text-gray-800">
            {{ $data->content }}
        </div>
    </div>
@endsection
