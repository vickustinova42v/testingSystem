<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfQuestion extends Model
{
    use HasFactory;
    protected $table = 'type_of_questions';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name'
    ];
}
