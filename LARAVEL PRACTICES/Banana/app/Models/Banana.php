<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
class Banana extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'status',
        'image'
    ];
    protected $casts = ['status' => 'boolean',
    // 'created_at' =>'datetime:D,j F Y'
    ];
    protected $hidden = ['updated_at'];


    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d, l F Y h:i:s A');
    }
}
