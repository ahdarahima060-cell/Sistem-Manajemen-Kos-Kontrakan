<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentalRoom extends Model
{

    use HasFactory;


    protected $table = 'rental_rooms';


    protected $fillable = [
        'room_code',
        'type',
        'floor',
        'monthly_price',
        'facilities',
        'max_occupants',
        'area_m2',
        'photo',
        'status'
    ];


    // relasi ke rating
    public function ratings()
    {
        return $this->hasMany(RoomRating::class, 'room_id');
    }

}