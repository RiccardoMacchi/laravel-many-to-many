<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'git_link',
        'lenguages',
        'date',
        'description',
        'slug',
        'type_id'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
