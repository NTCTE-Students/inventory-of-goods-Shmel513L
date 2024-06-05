<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Supply extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillabel = [
        'name',
        'description',
        'price',
        'amount',
    ];
}
