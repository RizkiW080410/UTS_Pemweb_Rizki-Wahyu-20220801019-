@extends('layouts.index')

@section('carditem')
<!-- card item section -->
<h2 class="section-heading">BEASISWA UNGGULAN</h2>
<div class="card--list">
    @foreach ($beasiswas as $beasiswa)
    <div class="card">
        @if ($beasiswa->image)
            <img src="{{ $beasiswa->image->getUrl('thumb') }}">
        @endif
        <h4 class="card--title">{{ $beasiswa->name_beasiswa }}</h4>
        <div class="card--price">
            <div class="price">{{ $beasiswa->start_beasiswa }}</div>
            <a href="{{ route('beasiswa.show', $beasiswa->id) }}">detail beasiswa</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
