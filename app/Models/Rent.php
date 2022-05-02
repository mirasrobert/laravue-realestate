<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'features', 'location', 'price', 'discount', 'is_sold'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
