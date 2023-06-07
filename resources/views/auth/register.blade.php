<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Register Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    @vite('resources/css/app.css')
    <!-- Tailwind -->

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }


        .custom-button {
        background-color: rgb(0, 0, 0);
        color: white;
        text-align: center;


    }


    </style>
</head>
<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Register Section -->
        <div class="w-full md:w-1/2 flex flex-col bg-primary text-white">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <a href="/" class="bg-black text-white font-bold text-xl p-4" alt="Logo">LIVRE</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Join Us.</p>

                <x-validation-errors class="mb-4" />




                        <form class="flex flex-col pt-3 md:pt-8 " method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="flex flex-col pt-4">
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="flex flex-col pt-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            </div>

                            <div class="flex flex-col pt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="flex flex-col pt-4">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                                <x-input id="phone_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="text" name="phone_number" :value="old('phone_number')" required autocomplete="tel" />
                            </div>

                            <div class="mt-4">
                                <x-label for="location" value="{{ __('Location') }}" />
                                <x-input id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="text" name="location" :value="old('location')" required autocomplete="address" />
                            </div>

                            <div class="mt-4">
                                <x-label for="birthdate" value="{{ __('Birthdate') }}" />
                                <x-input id="birthdate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" type="date" name="birthdate" :value="old('birthdate')" required />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-button class="ml-4 custom-button text-lg hover:bg-gray-700 p-2">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </form>


                <div class="text-center pt-12 pb-12">
                    <p>Already have an account? <a href="/login" class="underline font-semibold">Log in here.</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl bg-primary" >
            <img class="object-cover w-full h-screen hidden md:block" src="https://media-s3-us-east-1.ceros.com/healthline/images/2022/04/27/2a5e566a2a5b6b85dc3e2f4243dd0a1e/mom-baby-reading-demi-circle.gif" alt="Background" />
        </div>
    </div>

</body>
</html>
