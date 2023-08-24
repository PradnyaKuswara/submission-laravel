@extends('layouts.auth')

@section('content-section')
    <div class="w-full">
        <div class="grid md:grid-cols-12">
            <div class="bg-white shadow-lg rounded-lg px-10 pt-8 pb-10 md:col-span-6">
                <h1 class="text-2xl md:text-5xl font-sans font-extrabold">Reset Password</h1>
                <h3 class="text-md md:text-xl font-sans mt-2">Please input your new password</h3>
                <form action="{{ url('password/update') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Email
                        </label>
                        <input
                            class="shadow text-xs md:text-sm appearance-none border rounded w-4/5 lg:w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="text" name="email" placeholder="Email" autocomplete="off"
                            value="{{ Session::get('email') }}">
                        @error('email')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input type="password"
                            class="text-xs md:text-sm shadow appearance-none border  rounded w-3/5  lg:w-10/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" name="password" type="password" placeholder="******************">
                        <span class="border rounded py-2 px-3" id="basic-addon1" onclick=""><i class="fa fa-eye-slash"
                                onclick="change(this);myFunction(); "></i></span>
                        @error('password')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Re Password
                        </label>
                        <input type="password"
                            class="text-xs md:text-sm shadow appearance-none border rounded w-3/5  lg:w-10/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password_confirmation" name="password_confirmation" type="password_confirmation"
                            placeholder="******************">
                        <span class="border rounded py-2 px-3" id="basic-addon1" onclick=""><i class="fa fa-eye-slash"
                                onclick="change(this);myFunction2(); "></i></span>
                        @error('password_confirmation')
                            <p class="text-xs mt-2 text-red-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="text"
                            class="shadow appearance-none border border-red-500 rounded w-3/5  lg:w-10/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="token" name="token" type="token" placeholder="token" value="{{ $token }}"
                            hidden>
                    </div>
                    <div class="mb-6">
                        <button
                            class="bg-teal-900 text-xs md:text-sm hover:opacity-75 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                            type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <div class=" md:col-span-6 md:flex animate__animated animate__fadeIn">
                <img class="rounded-lg drop-shadow-lg"
                    src="{{ asset('storage/images/image1.jpg') }}" alt="mockup">
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

        function myFunction2() {
            var x = document.getElementById("password_confirmation");
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

        function change2(x) {
            x.classList.toggle("fa-eye");
        }
    </script>
@endsection
