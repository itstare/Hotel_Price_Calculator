<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Price;


class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];

    public function prices(){
    	return $this->hasMany(Price::class);
    }

    public function priceRegulation(){
    	$prices = Price::where('hotel_id', $this->id)->get();

    	$lowerPrices = [];

    	if($prices->count() > 0){
			foreach ($prices as $price) {
	    		if((round($price->fibula_price, 2) < round($price->vas_price, 2) || $price->vas_price === null) && (round($price->fibula_price, 2) < round($price->m97_price, 2) || $price->m97_price === null) && (round($price->fibula_price, 2) < round($price->centrotours_price, 2) || $price->centrotours_price === null) && ($price->fibula_price != null)){
	    			$lowerPrices[] = $price;
	    		}
	    	}

	    	if(sizeof($lowerPrices) < 1){
	    		return false;
	    	} else{
	    		return true;
	    	}
		} else{
			return 'empty';
		}
    }
}
