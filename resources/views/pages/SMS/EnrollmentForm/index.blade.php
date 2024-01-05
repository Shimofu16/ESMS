<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIT San Pablo Registration Form</title>
    <link rel="shortcut icon" href="{{ asset('media/logos/capellan_logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="bg-gray-100">




    <main class="h-[100vh]">
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-wrap -mx-4 justify-center">
                {{-- center this --}}
                <div class="w-full md:w-1/2 px-4 mb-12 md:mb-0">
                    <div class="shadow-md rounded p-6 mb-4 flex flex-col my-2 mx-2 bg-[#3699FF] flex flex-col sm:flex-row items-center justify-center">
                        <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="CITSPC-LOGO" class="h-[70px] w-[70px] me-3">
                        <h1 class="text-2xl text-center text-gray-100 font-bold ">CIT San Pablo Registration Form</h1>
                    </div>

                    @livewire('enrollment-form')
                </div>
            </div>
        </div>
    </main>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @livewireScripts
    @stack('scripts')
    @include('sweetalert::alert')
</body>

</html>
