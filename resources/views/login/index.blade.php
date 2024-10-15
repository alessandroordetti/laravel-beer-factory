<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Log in</title>
</head>

<body style="background-color: orange">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="container mx-auto">
            <a href="/" class="rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black	 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="{{asset('images/blue-beer.png')}}" style="height: 200px;"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-indigo-600">Log in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{route("login-user")}}" method="POST">
                @CSRF

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-indigo-600">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" placeholder="example@gmail.com"
                            required
                            class="block w-full rounded-md border-b py-1.5 text-indigo-600 shadow-sm ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            style="line-height: normal;">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-indigo-600">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            placeholder="password" required
                            class="block w-full rounded-md border-0 py-1.5 text-indigo-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>


                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
                </div>

                @if(session('expiredToken'))
                    <h2 class="text-2xl text-white underline-offset-2"><u>{{session('expiredToken')}}</u></h2>
                    <!-- <img src="{{asset('images/register-beer.png')}}" alt=""> -->
                @elseif(session('logout'))
                    <h2 class="text-2xl text-white underline-offset-2"><u>{{session('logout')}}</u></h2>
                @endif
            </form>
        </div>
    </div>

    
</body>

</html>