<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title-page')</title>
    <link rel="icon" href="{{ asset('storage/images/KOJIDEV.png') }}">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/b1f0352e54.js" crossorigin="anonymous"></script>
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        html,
        body {
            font-family: 'Poppins';
            scroll-behavior: smooth;
            scroll-padding-top: 60px;
            scroll-padding-bottom: 40px;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="min-h-screen min-w-full ">

        <header class="absolute inset-x-0 top-0 z-10">
            <nav class="fixed w-full flex items-center justify-between p-4 md:px-8 {{ request()->is('/') ? 'bg-teal-900 ' : 'bg-white shadow' }}  ">
                <div class="flex md:flex-1 ">
                    <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                        <img class="rounded-lg h-6 w-auto" src="{{ asset('storage/images/KOJIDEV.png') }}" alt="">
                    </a>
                </div>

                <div class="hidden md:flex md:gap-x-12 ">
                    <a href="{{ url('/') }}"
                        class="text-xs leading-6 open-sans font-semibold   {{ request()->is('/') ? 'text-gray-100' : 'text-black' }}">Home</a>
                    <a href="{{ url('article-page') }}"
                        class="text-xs leading-6 open-sans font-semibold   {{ request()->is('/') ? 'text-gray-100' : 'text-black' }}">Articles</a>
                    <a href="{{ url('about-page') }}"
                        class="text-xs leading-6 open-sans font-semibold {{ request()->is('/')  ? 'text-gray-100' : 'text-black' }}">About</a>
                </div>

                <div class="hidden md:items-center md:gap-x-6 md:flex md:flex-1 md:justify-end">
                    <a href="{{ route('articles.create') }}">
                        <i class="fas fa-pen-to-square text-gray-400 fa-1x mr-2"></i><span
                            class="text-xs open-sans leading-6 text-gray-400">Write</span>
                    </a>
                    @guest
                        <a href="{{ url('/login') }}" class="text-xs open-sans {{ request()->is('/') ? 'text-white' : 'text-black font-semibold' }}   leading-6 ">Log in
                            <span aria-hidden="true">&rarr;</span></a>
                    @endguest

                    @auth
                        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" type="button">
                            <div class="flex items-center gap-x-2">
                                <div
                                    class="hidden md:flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{ asset('storage/images/' . $user->image_path) }}" alt="user photo">
                                </div>
                                <div><i class="fas fa-chevron-down fa-1x text-gray-400"></i></div>
                            </div>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatar"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div class="text-sm">{{ $user->name }}</div>
                                <div class=" text-xs text-gray-300 truncate">{{ $user->email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownUserAvatarButton">
                                <li>
                                    <a href="{{ route('articles.index') }}"
                                        class="block px-4 py-2 text-xs hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manage
                                        Article</a>
                                </li>
                                <li>
                                    <a href="{{ route('categories.index') }}"
                                        class="block px-4 py-2 text-xs hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manage
                                        Category</a>
                                </li>
                                <li>
                                    <a href="{{ route('tags.index') }}"
                                        class="block px-4 py-2 text-xs hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manage
                                        Tag</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <a href="{{ url('/logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </div>
                        </div>
                    @endauth
                </div>

                <div class="flex md:hidden me-4">
                    <a href="{{url('login')}}">
                        <i class="fas fa-pen-to-square text-gray-400 fa-1x mr-2"></i><span
                            class="text-xs open-sans leading-6 md:text-sm text-gray-400">Write</span>
                    </a>
                    <button type="button "
                        class="btn-open -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <div class="flex items-center">
                            <div
                                class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                                <span class="sr-only">Open main menu</span>
                                @auth
                                    <img class="w-6 h-6 rounded-full"
                                        src="{{ asset('storage/images/' . $user->image_path) }}" alt="user photo">
                                @endauth
                            </div>
                            <div><i class="fas fa-chevron-down fa-1x text-gray-400"></i></div>
                        </div>
                    </button>
                </div>
            </nav>
            <!-- Mobile menu -->
            <div class="menu hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-20"></div>
                <div
                    class="layout fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-full sm:ring-4 sm:ring-gray-900/10 animate__animated animate__fadeInDown">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-x-4">
                            @auth
                                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/images/' . $user->image_path) }}"
                                    alt="user photo">
                                <div class="text-xs ">
                                    <div class="text-gray-900">
                                        {{ $user->name }}
                                    </div>
                                    <div class="text-gray-500">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            @else
                                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/images/KOJIDEV.png') }}"
                                    alt="user photo">
                                <div class="text-xs ">
                                    <div class="text-gray-900">
                                        Please login first!
                                    </div>
                                </div>
                            @endauth

                        </div>
                        <button type="button" class="btn-close -m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-900/10">
                            @auth
                                <div class="space-y-2 py-6">
                                    <a href="{{ route('articles.index') }}"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">Manage
                                        Article</a>
                                    <a href="{{ route('categories.index') }}"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">Manage
                                        Categories </a>
                                    <a href="{{ route('tags.index') }}"
                                        class="-mx-3 block rounded-lg px-3 py-2 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">Manage
                                        Tags </a>
                                </div>
                            @endauth

                            <div class="py-6">
                                <a href="{{ url('/') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">Home</a>
                                <a href="{{ url('/article-page') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">Article</a>
                                <a href="{{ url('/about-page') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">About</a>
                            </div>
                            <div class="py-6">
                                @auth
                                    <a href="{{ url('/logout') }}"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">Sign
                                        out </a>
                                @else
                                    <a href="{{ url('/login') }}"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-sm open-sans font-semibold leading-7 text-gray-900 hover:bg-teal-900 hover:text-white">Log
                                        in <span aria-hidden="true">&rarr;</span></a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="container static max-w-full py-10  md:py-14">
                <div class="flex absolute right-0 my-8 md:my-4 md:mx-8 z-[100]">
                    @include('components/message')
                </div>
                @yield('content')
            </div>
        </main>

        <footer
            class=" bottom-0 left-0 z-20 w-full p-4 bg-white shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
            <span class=" text-xs md:text-sm text-gray-500 sm:text-center">©
                {{ Carbon\Carbon::now()->format('Y') }} <a href="{{ url('/') }}"
                    class="hover:underline">Personal-Blog-Kuswara</a>.
            </span>
        </footer>
    </div>
</body>
<script>
    const btnClose = document.querySelector(".btn-close");
    const btnOpen = document.querySelector(".btn-open");
    const menu = document.querySelector(".menu");
    const layout = document.querySelector(".layout");

    btnOpen.addEventListener("click", () => {
        menu.classList.toggle("hidden");

    });

    btnClose.addEventListener("click", () => {
        menu.classList.toggle("hidden");

    });
</script>
<script>
    const btnCloseNotif = document.querySelector(".btn-close-notif");
    const notif = document.querySelector(".notif");

    btnCloseNotif.addEventListener("click", () => {
        notif.classList.toggle("hidden");
    });
</script>
<script>
    const btnCloseNotif2 = document.querySelector(".btn-close-notif2");
    const notif2 = document.querySelector(".notif2");
    
    btnCloseNotif2.addEventListener("click", () => {
        notif2.classList.toggle("hidden");
    });
</script>
@yield('footer-script')

</html>
