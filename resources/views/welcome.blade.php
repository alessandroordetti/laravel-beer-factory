<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Beer Api Project</title>
</head>

<body style="background-color: orange" class="h-screen">
    <div class="container flex justify-center items-center mx-auto w-1/2 h-full">
        <div class="flex flex-col items-center justify-center w-1/3 h-1/2 bg-white rounded border-sky-950 shadow-lg p-6 mr-4" style="background-color: orange">
            <h1 class="text-lg font-bold mb-4">Hello to You, Beer Addicted</h1>
            <img src="{{ asset('images/beer.png') }}" alt="Beer" style="height:200px;">
        </div>
        <div class="flex flex-col items-center justify-center w-1/3 h-1/2 bg-white rounded border-sky-950 shadow-lg p-6" style="background-color: orange">
            <a href="{{route('register-page')}}" class="p-2 mb-8 bg-sky-950 rounded border-white text-amber-50">Register</a>
            <p>Already registered?</p>
            <a href="{{route('login-page')}}" ><u>Log in</u></a>
        </div>
    </div>
</body>

</html>