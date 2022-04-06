<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Hotel;

class PriceController extends Controller
{
    public function create($hotelId){
    	$hotel = Hotel::where('id', $hotelId)->first();

    	return view('price.create', compact('hotel'));
    }

    public function input(Request $request, $hotelId){
    	$rules = [
    		'num_of_nights' => ['required', 'integer', 'min:1'],
    		'date' => ['required', 'date'],
    		'fibula_price' => ['numeric', 'min:0', 'nullable'],
    		'vas_price' => ['numeric', 'min:0', 'nullable'],
    		'm97_price' => ['numeric', 'min:0', 'nullable'],
    		'centrotours_price' => ['numeric', 'min:0', 'nullable'],
    		'fibula_currency' => ['required', 'string'],
    		'vas_currency' => ['required', 'string'],
    		'm97_currency' => ['required', 'string'],
    		'centrotours_currency' => ['required', 'string'],
            'room_type' => ['required', 'string', 'max:255'],
    	];
    	$request->validate($rules);

    	$hotel = Hotel::where('id', $hotelId)->first();
    	$price = Price::where('num_of_nights', $request->num_of_nights)->where('date', $request->date)->where('room_type', $request->room_type)->where('hotel_id', $hotel->id)->get();

    	if($price->count() > 0){
    		return back()->with('error', 'Given price already exists');
    	} else{
    		if(is_null($request->fibula_price)){
    			$fibulaPrice = null;
    		} else if($request->fibula_currency === 'EUR'){
    			$fibulaPrice = $request->fibula_price * 1.96;
    		} else{
    			$fibulaPrice = $request->fibula_price;
    		} 
    		
    		if(is_null($request->vas_price)){
    			$vasPrice = null;
    		} else if($request->vas_currency === 'EUR'){
    			$vasPrice = $request->vas_price * 1.96;
    		} else{
    			$vasPrice = $request->vas_price;
    		}
    		
    		if(is_null($request->m97_price)){
    			$m97Price = null;
    		} else if($request->m97_currency === 'EUR'){
    			$m97Price = $request->m97_price * 1.96;
    		} else{
    			$m97Price = $request->m97_price;
    		}
			
    		if(is_null($request->centrotours_price)){
    			$centrotoursPrice = null;
    		} else if($request->centrotours_currency === 'EUR'){
    			$centrotoursPrice = $request->centrotours_price * 1.96;
    		} else{
    			$centrotoursPrice = $request->centrotours_price;
    		}

    		Price::create([
    			'num_of_nights' => $request->num_of_nights,
    			'date' => $request->date,
    			'fibula_price' => $fibulaPrice,
    			'vas_price' => $vasPrice,
    			'm97_price' => $m97Price,
    			'centrotours_price' => $centrotoursPrice,
                'room_type' => $request->room_type,
    			'hotel_id' => $hotelId,
    		]); 

    		return back()->with('status', 'Price created');		
    	}
    }

    public function index($hotelId){
    	$hotel = Hotel::where('id', $hotelId)->first();
    	$prices = $hotel->prices()->get();
    	
    	return view('price.index')->with([
    		'hotel' => $hotel,
    		'prices' => $prices,
    	]);
    }

    public function edit($id){
    	$price = Price::where('id', $id)->first();

    	return view('price.edit', compact('price'));
    }

    public function update(Request $request, $id){
    	$rules = [
    		'fibula_price' => ['numeric', 'min:0', 'nullable'],
    		'vas_price' => ['numeric', 'min:0', 'nullable'],
    		'm97_price' => ['numeric', 'min:0', 'nullable'],
    		'centrotours_price' => ['numeric', 'min:0', 'nullable'],
    		'fibula_currency' => ['required', 'string'],
    		'vas_currency' => ['required', 'string'],
    		'm97_currency' => ['required', 'string'],
    		'centrotours_currency' => ['required', 'string'],
    	];
    	$request->validate($rules);

    	$price = Price::where('id', $id)->first();

    	if(is_null($request->fibula_price)){
    		$fibulaPrice = null;
    	} else if($request->fibula_currency === 'EUR'){
    		$fibulaPrice = $request->fibula_price * 1.96;
    	} else{
    		$fibulaPrice = $request->fibula_price;
    	} 
    		
    	if(is_null($request->vas_price)){
    		$vasPrice = null;
    	} else if($request->vas_currency === 'EUR'){
    		$vasPrice = $request->vas_price * 1.96;
    	} else{
    		$vasPrice = $request->vas_price;
    	}
    		
    	if(is_null($request->m97_price)){
    		$m97Price = null;
    	} else if($request->m97_currency === 'EUR'){
    		$m97Price = $request->m97_price * 1.96;
    	} else{
    		$m97Price = $request->m97_price;
    	}
			
    	if(is_null($request->centrotours_price)){
    		$centrotoursPrice = null;
    	} else if($request->centrotours_currency === 'EUR'){
    		$centrotoursPrice = $request->centrotours_price * 1.96;
    	} else{
    		$centrotoursPrice = $request->centrotours_price;
    	}

    	$price->update([
    		'fibula_price' => $fibulaPrice,
    		'vas_price' => $vasPrice,
    		'm97_price' => $m97Price,
    		'centrotours_price' => $centrotoursPrice,
    	]);

    	return back()->with('status', 'Price updated');
    }

    public function delete($id){
        $price = Price::where('id', $id)->first();

        $price->delete();

        return back()->with('status', 'Price deleted');
    }
}
