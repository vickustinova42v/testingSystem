<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'result_test_show',
        'test_to_user_id',
        'time_to_test',
        'date_of_begin',
        'date_of_end',
    ];
}
