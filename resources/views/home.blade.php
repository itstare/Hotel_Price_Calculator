@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        @if($hotels->count() > 0)
            @foreach($hotels as $hotel)
                <div class="row">
                    <div class="col-md-8">
                        @if($hotel->priceRegulation() === 'empty')
                            <h2>{{ $hotel->name }}</h2>
                        @elseif($hotel->priceRegulation() === true)
                            <h2 class="text-success">{{ $hotel->name }}</h2>
                        @else
                            <h2 class="text-danger">{{ $hotel->name }}</h2>
                        @endif
                        <h5>{{ $hotel->location }}</h5>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('hotel.delete', $hotel->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('price.view', $hotel->id) }}" class="btn btn-primary">Prices</a>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <p>There are 0 hotels added.</p>
        @endif

        {{ $hotels->links() }}
    </div>
</div>
@endsection
