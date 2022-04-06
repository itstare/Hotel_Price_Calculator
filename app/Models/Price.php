<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_of_nights',
        'date',
        'fibula_price',
        'vas_price',
        'm97_price',
        'centrotours_price',
        'room_type',
        'hotel_id',
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function checkPriceFibulaVas(){
        if($this->fibula_price === null || $this->vas_price === null){
            return 'N/A';
        } else{
            $result = round($this->fibula_price, 2) - round($this->vas_price, 2); 
            return round($result, 2);
        }
    }

    public function checkPriceFibulaM97(){
        if($this->fibula_price === null || $this->m97_price === null){
            return 'N/A';
        } else{
            $result = round($this->fibula_price, 2) - round($this->m97_price, 2); 
            return round($result, 2);
        }
    }

    public function checkPriceFibulaCentrotours(){
        if($this->fibula_price === null || $this->centrotours_price === null){
            return 'N/A';
        } else{
            $result = round($this->fibula_price, 2) - round($this->centrotours_price, 2); 
            return round($result, 2);
        }
    }
}
