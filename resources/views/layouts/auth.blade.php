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
        body {
            font-family: 'Poppins';
        }
    </style>

</head>

<body>
    <div class="min-h-screen min-w-full bg-gray-100 dark:bg-gray-900">
        <main>
            <div class="max-w-screen-xl p-5 md:mx-auto pt-15 sm:px-7 md:py-24">
                <div class="flex absolute left-5 md:left-20 z-[100]">
                    @include('components/message')
                </div>
                <div class="mt-3">
                    @yield('content-section')
                </div>
            </div>
        </main>
    </div>
</body>
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
