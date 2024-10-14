<!DOCTYPE html>
<html>

<head>
    <title>Elenco delle Birrerie</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body style="background-color: orange" class="h-screen">

    <div class="flex min-h-full flex flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('images/rand-beers/rand-beer' . rand(1, 3) . '.png')}}"
                style="height: 350px;">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$brewery['name']}}</div>
                <ul class="text-gray-700 text-base">
                    <li>Type: {{ucfirst($brewery['brewery_type'])}}</li>
                    <li>Country: {{$brewery['country']}}</li>
                    <li>City: {{$brewery['city']}}</li>
                    <li>Address: {{$brewery['address_1']}}</li>
                    <li>Phone contact: <u>{{$brewery['phone']}}</u></li>
                </ul>
            </div>
        </div>
        <div class="container mx-auto">
            <a href="{{route('breweries-index')}}"
                class="rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black	 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
        </div>
    </div>



</body>