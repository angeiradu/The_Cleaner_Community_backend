<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedCleaner extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'services', 'amount', 'day', 'additional_services'];

}
