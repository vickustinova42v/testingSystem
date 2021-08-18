<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestToUser extends Model
{
    use HasFactory;
    protected $table = 'test_to_users';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'mark',
        'user_id',
        'variant_id',
        'status_id',
        'testing_id'
    ];
}
