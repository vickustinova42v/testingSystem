<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantsOfAnswer extends Model
{
    use HasFactory;
    protected $table = 'variants_of_answers';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'right_answer',
        'question_id'
    ];
}
