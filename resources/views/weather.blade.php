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
    <br><br><br>
    <h2>A nice little weather forcast widget for TALLINN city</h2>
    <div id="openweathermap-widget-11"></div>
    <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script>
    <script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = []; window.myWidgetParam.push(
        {
            id: 11,
            cityid: '588409',
            appid: '207c45c8b072945f9f900fd5ac8f0123',
            units: 'metric',
            containerid: 'openweathermap-widget-11',
        });  
        (function() {
            var script = document.createElement('script');
            script.async = true;
            script.charset = "utf-8";
            script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(script, s);
        })();
    </script>
</body>
</html>