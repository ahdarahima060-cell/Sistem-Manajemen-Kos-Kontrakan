<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomRating extends Model
{
    use HasFactory;

    protected $table = 'room_ratings';

    protected $fillable = [
        'room_id',
        'rating',
        'review',
        'reviewer_name',
    ];

    public function room()
    {
        return $this->belongsTo(RentalRoom::class, 'room_id');
    }
}
