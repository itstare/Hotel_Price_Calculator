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
                <div class="card-header">{{ __('Create Hotel') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('hotel.input') }}">
                    	<div class="form-group">
                    		<label for="name">Hotel Name</label>
                    		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus required>

                    		@error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    	</div>

                    	<div class="form-group mt-2">
                    		<label for="location">Hotel Location</label>
                    		<input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" autocomplete="location" autofocus>

                    		@error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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