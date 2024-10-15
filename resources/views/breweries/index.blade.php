<!DOCTYPE html>
<html>

<head>
    <title>Elenco delle Birrerie</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body style="background-color: orange" class="h-screen">
    <div class="p-6 w-2/3 mx-auto">
        <div class="flex justify-end">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black	 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logout</button>
            </form>
        </div>
        <h1 class="text-8xl	mb-8">List of beers</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="height: 500px; overflow-y: auto;">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-16 py-3">
                            <span class="sr-only">Image</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Country
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($breweries as $b)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <img src="{{asset('images/rand-beers/rand-beer' . rand(1, 3) . '.png')}}"
                                    class="w-16 md:w-32 max-w-full max-h-full" style="height: 120px;" alt="Apple Watch">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{$b['name']}}
                            </td>
                            <td class="px-6 py-4">
                                {{ucfirst($b['brewery_type'])}}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{$b['country']}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="/brewery-details/{{$b['id']}}"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- @foreach ($breweries as $b)
            <div class="rounded overflow-hidden shadow-lg w-1/2 mx-auto">
                <div>
                    <img src="{{asset('images/rand-beers/rand-beer' . rand(1, 3) . '.png')}}" alt="Sunset in the mountains"
                        class="w-auto text-center mx-auto" style="height: 200px;">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$b['name']}}</div>
                    <p class="text-gray-700 text-base">
                        From: {{$b['city']}} - {{$b['state']}}
                    </p>
                    <p>Contact: {{$b['phone'] ? $b['phone'] : "Check website below"}}</p>
                    <a href="{{$b['website_url']}}" class="text-sky-800	"><u>More</u></a>
                </div>

            </div>
        @endforeach -->

</html>