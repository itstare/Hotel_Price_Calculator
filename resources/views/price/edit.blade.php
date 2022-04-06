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
                <div class="card-header">Update Price | {{ $price->hotel->name }} | {{ date('d-m-Y', strtotime($price->date)) }} | {{ $price->num_of_nights }} nights | {{ $price->room_type }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('price.update', $price->id) }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="fibula_price">FIBULA Price</label>
                                    <input type="number" step="0.01" min="0" name="fibula_price" class="form-control @error('fibula_price') is-invalid @enderror" value="{{ $price->fibula_price }}">

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
                                    <input type="number" step="0.01" min="0" name="vas_price" class="form-control @error('vas_price') is-invalid @enderror" value="{{ $price->vas_price }}">

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
                                        <option value="EUR">EUR</option>
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
                                    <input type="number" step="0.01" min="0" name="m97_price" class="form-control @error('m97_price') is-invalid @enderror" value="{{ $price->m97_price }}">

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
                                    <input type="number" step="0.01" min="0" name="centrotours_price" class="form-control @error('centrotours_price') is-invalid @enderror" value="{{ $price->centrotours_price }}">

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

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    	@csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection