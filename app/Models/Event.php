<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'available_seats',
        'category_id',
        'user_id',
        'acceptation'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function reservations()
{
    return $this->hasMany(Reservation::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
