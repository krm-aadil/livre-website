<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <meta name="author" content="AADIL">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body class="bg-primary font-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="/" class="text-primary btn btn-ghost normal-case text-xl bg-teal-50">LIVRE</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl text-white">Welcome.</p>

                <x-validation-errors class="mb-4" />

                <form class="flex flex-col pt-3 md:pt-8" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg text-white">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg text-white">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <input type="submit" value="Log In" class="bg-black text-white font-bold text-lg hover:bg-neutral p-2 mt-8">
                </form>

                <div class="text-center pt-12 pb-12 text-white">
                    @if (Route::has('password.request'))
                        <p>Don't have an account? <a href="{{ route('register') }}" class="underline font-semibold">Register here.</a></p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="https://media-s3-us-east-1.ceros.com/healthline/images/2022/04/26/017e16dbfc682d0bec86575ee4aceb00/dad-daughter-reading-demi-circle.gif">
        </div>
    </div>

</body>
</html>
