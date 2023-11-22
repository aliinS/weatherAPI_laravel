<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather information</title>
</head>
<body> <br>
    <form action="{{ route('weather') }}" method="get">
        <label for="city">Enter City:</label>
        <input type="text" id="city" name="city" required>
        <button type="submit">Search</button>
    </form>
    <h1>Weather information for: 
    <p style="text-transform:uppercase">{{ $city }}</p></h1>
    <img src="http://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}.png" alt="Weather Icon">

    

    @if(isset($weatherData['main']))
        <p><b>Temperature:</b> {{ $weatherData['main']['temp'] }}&deg;C</p>
        <p><b>Humidity:</b> {{ $weatherData['main']['humidity'] }}%</p>
        <p><b>Description:</b> {{ $weatherData['weather'][0]['description'] }}</p> 
        <p><b>Wind:</b> {{ $weatherData['wind']['speed'] }} m/sec</p>
        
    @else
        <p>Error fetching weather information.</p>
    @endif
    
</body>
</html>