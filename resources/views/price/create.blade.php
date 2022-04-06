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

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Create Price for {{ $hotel->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('price.input', $hotel->id) }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="num_of_nights">Number of nights</label>
                                    <input type="number" name="num_of_nights" class="form-control @error('num_of_nights') is-invalid @enderror" required>

                                    @error('num_of_nights')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" required>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="fibula_price">FIBULA Price</label>
                                    <input type="number" step="0.01" min="0" name="fibula_price" class="form-control @error('fibula_price') is-invalid @enderror">

                                    @error('fibula_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select name="fibula_currency" class="form-control @error('fibula_currency') is-invalid @enderror">
                                        <option value="BAM">BAM</option>
                                        <option value="EUR">EUR</option>
                                    </select>

                                    @error('fibula_currency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="vas_price">VAS Price</label>
                                    <input type="number" step="0.01" min="0" name="vas_price" class="form-control @error('vas_price') is-invalid @enderror">

                                    @error('vas_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select name="vas_currency" class="form-control @error('vas_currency') is-invalid @enderror">
                                        <option value="BAM">BAM</option>
                                        <option value="EUR" selected>EUR</option>
                                    </select>

                                    @error('vas_currency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="m97_price">M97 Price</label>
                                    <input type="number" step="0.01" min="0" name="m97_price" class="form-control @error('m97_price') is-invalid @enderror">

                                    @error('m97_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select name="m97_currency" class="form-control @error('m97_currency') is-invalid @enderror">
                                        <option value="BAM">BAM</option>
                                        <option value="EUR">EUR</option>
                                    </select>

                                    @error('m97_currency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="centrotours_price">CENTROTOURS Price</label>
                                    <input type="number" step="0.01" min="0" name="centrotours_price" class="form-control @error('centrotours_price') is-invalid @enderror">

                                    @error('centrotours_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select name="centrotours_currency" class="form-control @error('centrotours_currency') is-invalid @enderror">
                                        <option value="BAM">BAM</option>
                                        <option value="EUR">EUR</option>
                                    </select>

                                    @error('centrotours_currency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="form-group">
                                <label for="room_type">Room Type</label>
                                <input type="text" name="room_type" class="form-control @error('room_type') is-invalid @enderror">

                                @error('room_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    	@csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection