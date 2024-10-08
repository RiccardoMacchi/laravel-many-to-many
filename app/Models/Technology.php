<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug'
    ];

    public function items(){
        return $this->belongsToMany(Item::class);
    }
}
