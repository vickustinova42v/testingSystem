<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerOfUser extends Model
{
    use HasFactory;
    protected $table = 'answers_of_users';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'right_answer',
        'answer_of_user',
        'question_of_user_id'
    ];
}
