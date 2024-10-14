<!DOCTYPE html>
<html>

<head>
    <title>Elenco delle Birrerie</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body style="background-color: orange" class="h-screen">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach ($breweries as $b)
            <div class="rounded overflow-hidden shadow-lg w-1/2">
                <div>
                    <img src="{{asset('images/rand-beers/rand-beer' . rand(1,3) . '.png')}}" 
                    alt="Sunset in the mountains" 
                    class="w-auto text-center mx-auto" 
                    style="height: 200px;"
                    >
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$b['name']}}</div>
                    <p class="text-gray-700 text-base">
                        From: {{$b['city']}} - {{$b['state']}}
                    </p>
                    <a href="{{$b['website_url']}}" class="text-sky-800	"><u>More</u></a>
                </div>

            </div>
        @endforeach
</html>