@extends('layouts.application')

@section('title-page')
    About Me
@endsection

@section('content')
    <div class="max-w-screen-xl mx-auto p-5 pt-20 md:pt-20 ">
        <div
            class="uppercase  text-center text-xl md:text-3xl font-sans tracking-wide font-bold animate__animated animate__fadeInDown">
            About me</div>
        <div
            class="mx-auto mt-10 md:mt-16 grid md:grid-cols-2 gap-10 md:place-items-center animate__animated animate__fadeIn">
            <div class="md:col-span1">
                <p class="text-sm md:text-lg text-justify text-gray-400">Motivated and enthusiastic Informatics student with
                    a passion for
                    technology. Dedicated to expanding knowledge and skills in various programming languages and software
                    development methodologies. Have basic knowledge of the PHP programming language, Laravel framework, and
                    building application android with Android Studio Kotlin. A quick learner with excellent problem-solving
                    abilities and a collaborative mindset.</p>
            </div>
            <div class="md:col-span-1">
                <p class="uppercase text-xl md:text-4xl fon-sans font-extrabold text-center text-teal-900">I Gusti Ngurah A
                    Pradnya Kuswara</p>
            </div>
        </div>
        <div class="mt-10 md:mt-16">
            <img class="rounded w-full " src="{{ asset('storage/images/me.jpg') }}" alt="">
        </div>
        <div class="mt-10 md:mt-16">
            <div class="uppercase text-xl md:text-3xl font-sans tracking-wide font-bold">
                Contact</div>
            <a href="https://www.instagram.com/pkuswara/" target="__blank">
                <div class="mt-6 flex items-center gap-2 hover:text-gray-500">
                    <i class="fa-brands fa-instagram fa-2x"></i>
                    <p class="text-sm md:text-lg">pkuswara</p>
                </div>
            </a>
            <a href="https://github.com/PradnyaKuswara" target="__blank">
                <div class="mt-6 flex items-center gap-2 hover:text-gray-500">
                    <i class="fa-brands fa-github fa-2x"></i>
                    <p class="text-sm md:text-lg">https://github.com/PradnyaKuswara</p>
                </div>
            </a>
            <a href="https://www.linkedin.com/in/pradnya-kuswara/" target="__blank">
                <div class="mt-6 flex items-center gap-2 hover:text-gray-500">
                    <i class="fa-brands fa-linkedin fa-2x"></i>
                    <p class="text-sm md:text-lg">https://www.linkedin.com/in/pradnya-kuswara/</p>
                </div>
            </a>
        </div>
    </div>
@endsection
