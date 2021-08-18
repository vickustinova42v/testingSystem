<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantOfTest extends Model
{
    use HasFactory;
    protected $table = 'variant_of_tests';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'number_of_test',
        'test_id'
    ];
}
