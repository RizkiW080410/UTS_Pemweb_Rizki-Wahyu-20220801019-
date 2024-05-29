<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>detail beasiswa</title>
    <link rel="stylesheet" href="tampilan_scan/style.css">
    
    <!-- font awesome icons cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        <a href="{{ route('pendaftaran.create', $beasiswa->id) }}" class="btn-register">Daftar</a>
    </div>
</body>
</html>