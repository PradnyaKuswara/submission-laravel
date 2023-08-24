@extends('layouts.auth')

@section('title-page')
    Register Page
@endsection

@section('content-section')
    <div class="w-full animate__animated animate__fadeInLeft">
        <div class="grid md:grid-cols-12">
            <div class="bg-white shadow-lg rounded-lg px-10 pt-8 pb-10 md:col-span-12">
                <h1 class="text-2xl md:text-5xl font-sans  font-extrabold mb-4">Create Account</h1>
                <h3 class="text-md md:text-xl ">Please insert your detail!</h3>
                <form action="{{ url('register-process') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs md:text-sm font-bold mb-2" for="name">
                            Name
                        </label>
                        <input
                            class="shadow text-xs md:text-sm appearance-none border rounded w-4/5 md:w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" type="text" name="name" placeholder="Name" autocomplete="off">
                        @error('name')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs md:text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="shadow text-xs md:text-sm appearance-none border rounded w-4/5 md:w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="text" name="email" placeholder="Email" autocomplete="off">
                        @error('email')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs  md:text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input type="password"
                            class="shadow text-xs md:text-sm appearance-none border  rounded w-3/5  md:w-10/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" name="password" type="password" placeholder="password">
                        <span class="border rounded py-2 px-3 " id="basic-addon1" onclick=""><i class="fa fa-eye-slash"
                                onclick="change(this);myFunction(); "></i></span>
                        @error('password')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="image" class="block mb-2 text-xs md:text-sm  text-gray-700 font-bold">Profile
                            Picture</label>
                        <input type="file" accept="image/png, image/jpg, image/jpeg" name="image" value=""
                            class="shadow  appearance-none border leading-tight  text-gray-700 text-xs md:text-sm rounded focus:outline-none focus:shadow-outline block w-4/5 md:w-10/12"
                            placeholder="Upload gambar disini" autocomplete="off">
                        @error('image')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button
                            class="bg-teal-900 w-full text-xs md:text-sm md:w-10/12 hover:opacity-75 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                            type="submit">
                            Register
                        </button>
                    </div>
                    <div class="mb-6 ">
                        <a class="text-right font-bold text-xs md:text-sm hover:underline text-blue-500 hover:text-blue-800"
                            href="{{ url('/login') }}">
                            Already have an account?
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('footer-script')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                // x.classList.toggle("fa-thumbs-down");
            } else {
                x.type = "password";
            }
        }



        function change(x) {
            x.classList.toggle("fa-eye");
        }
    </script>
@endsection
