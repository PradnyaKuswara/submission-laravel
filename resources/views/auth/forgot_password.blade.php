@extends('layouts.auth')

@section('content-section')
    <div class="w-full">
        <div class="grid md:grid-cols-12">
            <div class="bg-white shadow-lg rounded-lg px-10 pt-8 pb-10 md:col-span-6">
                <h1 class="text-2xl md:text-5xl font-sans font-extrabold">Forgot password</h1>
                <h3 class="text-md md:text-xl font-sans mt-2">Please input your email first</h3>
                <form action="{{ url('password/email') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Email
                        </label>
                        <input
                            class="text-xs md:text-sm shadow appearance-none border rounded w-4/5 lg:w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="text" name="email" placeholder="Email" autocomplete="off">
                        @error('email')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <button
                            class="bg-teal-900 text-xs md:text-sm hover:opacity-75 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                            type="submit">
                            Submit
                        </button>
                        <a href="{{ url('/login') }}"
                            class="inline-flex items-center text-xs md:text-sm justify-center py-2 px-4 mt-3 lg:mt-0  font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Back to Login
                        </a>
                    </div>
                </form>
            </div>
            <div class=" md:col-span-6  animate__animated animate__fadeIn">
                <img class="rounded-lg drop-shadow-lg"
                    src="{{ asset('storage/images/image1.jpg') }}" alt="mockup">
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
@endsection
