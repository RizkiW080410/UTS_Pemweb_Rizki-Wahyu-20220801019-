<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Beasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .beasiswa-detail {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .beasiswa-detail h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .beasiswa-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .beasiswa-detail p {
            font-size: 1.1em;
            color: #555;
            margin: 10px 0;
        }

        .beasiswa-detail strong {
            color: #333;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-register, .btn-cancel {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin: 0 5px;
        }

        .btn-register {
            background-color: #007bff;
            color: #fff;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="beasiswa-detail">
        <h2>{{ $beasiswa->name_beasiswa }}</h2>
        <div class="beasiswa-image">
            @if ($beasiswa->image)
                <img src="{{ $beasiswa->image->getUrl('preview') }}" alt="{{ $beasiswa->name_beasiswa }}">
            @endif
        </div>
        <p>{!! $beasiswa->description !!}</p>
        <p><strong>Start:</strong> {{ $beasiswa->start_beasiswa }}</p>
        <p><strong>Finish:</strong> {{ $beasiswa->finish_beasiswa }}</p>
        <div class="btn-container">
            <a href="{{ route('pendaftaran.create', $beasiswa->id) }}" class="btn-register">Daftar</a>
            <button type="button" class="btn-cancel" onclick="history.back();">Cancel</button>
        </div>
    </div>
</body>
</html>
