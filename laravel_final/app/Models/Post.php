<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =['title', 'description', 'user_id', 'post_id'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'email_verified_at'
    ];
    /**
     * Get many comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id');
    }

}
