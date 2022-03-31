@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search by location') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('hotel.search.location.query') }}">
                    	<div class="form-group">
                    		<select name="location" class="form-control" required>
                    			@foreach($locations as $location)
                    				@if(!is_null($location->location))
                    					<option value="{{ $location->location }}">{{ $location->location }}</option>
                    				@endif
                    			@endforeach
                    		</select>
                    	</div>

                    	<button type="submit" class="btn btn-primary mt-3">Search</button>
                    	@csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection