<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_original_name',
        'file_name',
        'file_size',
        'extenstion',
    ];
}
