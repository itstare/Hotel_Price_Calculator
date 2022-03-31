@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session()->has('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8"><h3>{{ $hotel->name }}</h3></div>
                        <div class="col-md-4 d-flex flex-row-reverse"><a href="{{ route('price.create', $hotel->id) }}" class="btn btn-primary">Create</a></div>
                    </div>
                </div>

                <div class="card-body">
                    @if($prices->count() > 0)
                        @foreach($prices as $price)
                            <div class="row my-3">
                                <div class="col-md-8">
                                    <h2>{{ date('d-m-Y', strtotime($price->date)) }} | {{ $price->num_of_nights }} nights</h2>
                                </div>

                                <div class="col-md-4">
                                    <a href="{{ route('price.edit', $price->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('price.delete', $price->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h4>FIBULA / VAS</h4>
                                    
                                    <h5 class="@if($price->checkPriceFibulaVas() === 'N/A') text-dark @elseif($price->checkPriceFibulaVas() < 0) text-success @elseif($price->checkPriceFibulaVas() > 0) text-danger @else text-primary @endif">{{ $price->checkPriceFibulaVas() }}</h5>

                                    <strong>@if(is_null($price->fibula_price)) N/A @else{{ $price->fibula_price }}@endif / @if(is_null($price->vas_price)) N/A @else{{ $price->vas_price }}@endif</strong>
                                </div>

                                <div class="col-md-4">
                                    <h4>FIBULA / M97</h4>
                                    
                                    <h5 class="@if($price->checkPriceFibulaM97() === 'N/A') text-dark @elseif($price->checkPriceFibulaM97() < 0) text-success @elseif($price->checkPriceFibulaM97() > 0) text-danger @else text-primary @endif">{{ $price->checkPriceFibulaM97() }}</h5>

                                    <strong>@if(is_null($price->fibula_price)) N/A @else{{ $price->fibula_price }}@endif / @if(is_null($price->m97_price)) N/A @else{{ $price->m97_price }}@endif</strong>
                                </div>

                                <div class="col-md-4">
                                    <h4>FIBULA / CENTROTOURS</h4>
                                    
                                    <h5 class="@if($price->checkPriceFibulaCentrotours() === 'N/A') text-dark @elseif($price->checkPriceFibulaCentrotours() < 0) text-success @elseif($price->checkPriceFibulaCentrotours() > 0) text-danger @else text-primary @endif">{{ $price->checkPriceFibulaCentrotours() }}</h5>

                                    <strong>@if(is_null($price->fibula_price)) N/A @else{{ $price->fibula_price }}@endif / @if(is_null($price->centrotours_price)) N/A @else{{ $price->centrotours_price }}@endif</strong>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <p>There are no prices added for this hotel.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection