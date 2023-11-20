<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tache',
        'description',
        'fini',
        'dateDeFin'
    ];

    protected $casts = [
        'dateDeFin' => 'datetime'
    ];

}
