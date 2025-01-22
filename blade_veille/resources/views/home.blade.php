<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>hellow @{{$name}}</h1>
    @php
        $var =5;
        @endphp
        
        @unless($var == 3)
        <p>You are not subscribed. Please subscribe to access more features.</p>
        @endunless  
        @verbatim
        <div class="container">
            hello, {{$name}}

        </div>
        @endverbatim
    
    <h1>Hello, this is {!! $name !!}.</h1>
    <p>the currunt UNIX timestamp is  {{now()}}</p>
    {{-- example of once --}}
    @for ($i = 0; $i < 10; $i++)
    @once
        <p>{{ $i + 1 }}</p>
        @endonce
    @endfor
    
{{-- Inject example --}}
@inject('metrics', 'App\Services\MetricsService')
Monthly Revenue: {{ $metrics->monthlyRevenue() }}

</body>
</html>