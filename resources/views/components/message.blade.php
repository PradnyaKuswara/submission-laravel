@if (Session::get('success'))
    <div class="z-[100] notif mt-2 max-w-screen-xl text-white text-center rounded-lg bg-green-600 bg-opacity-70 p-2 text-sm animate__animated animate__fadeInRight"
        role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close-notif"><i class=" ms-2 fas fa-xmark fa-1x"></i></button>
    </div>
@endif
@if (Session::get('error'))
    <div
        class="z-[100] notif2 mt-2 text-sm  text-white  text-center rounded-lg bg-red-600 p-2 bg-opacity-70 animate__animated animate__fadeInDown">
        <button type="button" class="btn-close-notif2"><i class="mr-2 fas fa-xmark fa-1x"></i></button>
        {{ Session::get('error') }}
    </div>
@endif


