<?php

// app/Models/Party.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'symbol'];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
