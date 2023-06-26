<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'address',
        'contact_no',

    ];


    public function user()
    {
        return $this->morphOne(User::class, 'role');
    }
}
