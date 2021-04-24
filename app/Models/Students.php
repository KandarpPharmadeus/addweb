<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentName',
        'grade',
        'photo',
        'dateOfBirth',
        'address',
        'city',
        'country',
    ];

    public function getPhotoAttribute($value)
    {
        return $path = asset('storage/'.$value);
    }
}
