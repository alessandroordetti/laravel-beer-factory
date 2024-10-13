<!DOCTYPE html>
<html>
<head>
    <title>Elenco delle Birrerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: orange" class="h-screen">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <h1>Elenco delle Birrerie</h1>

        @if($breweriesCollection->count() > 0)
            <ul>
                @foreach($breweriesCollection as $brewery)
                    <li>
                        <strong>Name:</strong> {{ $brewery['name'] }}<br>
                        <strong>Città:</strong> {{ $brewery['city'] }}<br>
                        <strong>Stato:</strong> {{ $brewery['state'] }}
                    </li>
                @endforeach
            </ul>
    
            <!-- Link di paginazione -->
            <div>
                {{ $breweriesCollection->links('pagination::custom-pagination') }}
            </div>
        @else
            <p>Nessuna birreria disponibile.</p>
        @endif
    </div>

</body>
</html>
