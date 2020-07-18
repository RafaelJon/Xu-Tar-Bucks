<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Xu Tar Bucks</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="/">Xu Tar Bucks</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigate" aria-controls="navigate" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigate">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="{{route('user')}}">Customer <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="{{route('topping')}}">Toppings</a>
                    <a class="nav-item nav-link" href="{{route('drink')}}">Drinks</a>
                    <a class="nav-item nav-link" href="{{route('transaction')}}">Transactions</a>
                </div>
            </div>
        </nav>
        @yield('content')

        <script src={{asset("/js/app.js")}}></script>
    </body>
</html>
