<!DOCTYPE html>
<html>
<head>
    <title>Weather Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg,rgb(124, 116, 235),rgb(240, 241, 247));
            text-align: center;
            padding: 40px;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 10px;
            width: 250px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            margin-left: 10px;
            border: none;
            background-color: #4a90e2;
            color: white;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        .weather-box {
            background: white;
            padding: 25px;
            border-radius: 20px;
            width: 300px;
            margin: 0 auto;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .weather-box img {
            width: 80px;
            height: 80px;
        }

        .weather-box p {
            margin: 10px 0;
            font-size: 18px;
        }

        .not-found {
            color: white;
            font-size: 20px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <h1>Cuaca di {{ $kota }}</h1>

    <form method="GET" action="/weather">
        <input type="text" name="city" placeholder="Masukkan nama kota..." value="{{ $kota }}">
        <button type="submit">Cari</button>
    </form>

    @if($weather)
<div class="weather-box">
    @php
    $iconCode = $weather['weather'][0]['icon'] ?? '01d';

    $iconMap = [
        '01d' => 'wi-day-sunny',
        '01n' => 'wi-night-clear',
        '02d' => 'wi-day-cloudy',
        '02n' => 'wi-night-alt-cloudy',
        '03d' => 'wi-cloud',
        '03n' => 'wi-cloud',
        '04d' => 'wi-cloudy',
        '04n' => 'wi-cloudy',
        '09d' => 'wi-showers',
        '09n' => 'wi-showers',
        '10d' => 'wi-day-rain',
        '10n' => 'wi-night-alt-rain',
        '11d' => 'wi-thunderstorm',
        '11n' => 'wi-thunderstorm',
        '13d' => 'wi-snow',
        '13n' => 'wi-snow',
        '50d' => 'wi-fog',
        '50n' => 'wi-fog',
    ];

    $iconClass = $iconMap[$iconCode] ?? 'wi-day-sunny';
@endphp

    
    <i class="wi {{ $iconClass }}" style="font-size: 64px; color: #f39c12;"></i>

    <p><strong>Suhu:</strong> {{ $weather['main']['temp'] }}°C</p>
    <p><strong>Kondisi:</strong> {{ ucfirst($weather['weather'][0]['description']) }}</p>
    <p><strong>Kelembapan:</strong> {{ $weather['main']['humidity'] }}%</p>
    <p><strong>Kecepatan Angin:</strong> {{ $weather['wind']['speed'] }} m/s</p>
</div>
    @else
        <p class="not-found">Data cuaca tidak ditemukan.</p>
    @endif
</body>
</html>
