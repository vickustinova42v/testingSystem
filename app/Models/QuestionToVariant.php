<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionToVariant extends Model
{
    use HasFactory;
    protected $table = 'question_to_variants';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'number_of_question',
        'question_id',
        'variant_id'
    ];
}
