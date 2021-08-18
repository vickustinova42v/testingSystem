<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsOfUser extends Model
{
    use HasFactory;
    protected $table = 'questions_of_users';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'user_test_id',
        'type_id'
    ];
}
