<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profession',
        'company',
        'about_me',
        'mobile_number',
        'language',
    ];

    // Profile is belong to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Profile Has One Image
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
