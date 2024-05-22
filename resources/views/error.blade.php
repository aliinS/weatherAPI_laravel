<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Weather information</title>
    
</head>

<body class="h-screen justify-center content-center">
    <div class="bg-sky bg-cover h-full">
        <div class="flex flex-col items-center pt-24">
            <div class="backdrop-blur-lg py-10 px-32 outline-[#79e0eda5] outline outline-offset-[-20px] rounded-lg">
                <form action="{{ route('weather') }}" method="get" class="flex items-center">
                    <label for="city" class="font-semibold pr-2">Enter City:</label>
                    <input type="text" id="city" name="city" required class="border rounded-sm mr-2">
                    <button type="submit" class="border bg-[#79dfede7] rounded-lg p-1 px-4">Search</button>
                </form>
                <p>Sorry, we don't have this city in out list. Try a different name.</p>
                <div class="pt-3">
                    <h1 class="">Weather information for:</h1>
                    <p style="text-transform:uppercase" class="font-bold text-2xl">{{ $city }}</p>
                    <div class="">
                        <img src="http://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}.png"
                            alt="Weather Icon">
                    </div>
                </div>

                <div class="">
                    @if (isset($weatherData['main']))
                        <p><b>Temperature:</b> {{ $weatherData['main']['temp'] }}&deg;C</p>
                        <p><b>Humidity:</b> {{ $weatherData['main']['humidity'] }}%</p>
                        <p><b>Description:</b> {{ $weatherData['weather'][0]['description'] }}</p>
                        <p><b>Wind:</b> {{ $weatherData['wind']['speed'] }} m/sec</p>
                    @else
                        <p>Sorry, this city is not in our list.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
