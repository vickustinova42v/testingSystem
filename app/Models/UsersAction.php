<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAction extends Model
{
    use HasFactory;
    protected $table = 'users_actions';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'date',
        'description',
        'user_id'
    ];
}
