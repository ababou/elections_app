<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id',
        'user_id',
        'submitted_at',
        'allow_edit',
    ];
protected $dates = ['submitted_at'];
    // 🕒 تحويل submitted_at تلقائياً إلى Carbon
    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    // 🔗 العلاقات (اختياري)
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
