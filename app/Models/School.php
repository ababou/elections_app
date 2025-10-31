<?php

// app/Models/School.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'commune_id'];

    // العلاقة مع الجماعة
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    // العلاقة مع المكاتب
    public function offices()
    {
        return $this->hasMany(Office::class);
    }


   
}
