<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOfTest extends Model
{
    use HasFactory;
    protected $table = 'status_of_tests';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name'
    ];
}
