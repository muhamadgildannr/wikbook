<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wikbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'no_telp',
        'email',
        'address',
        'password',
        'category',
        'done_time',
    ];
}
