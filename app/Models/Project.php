<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status',
        'category',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function todo(){
        return $this->hasMany(Todo::class);
    }
}
