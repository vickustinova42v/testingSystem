<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'fio',
        'email',
        'password',
        'year_of_admission',
        'number_of_student',
        'group_id',
        'faculty_id',
        'role_id',
        'status_id'
    ];

    //получить роль
    public function getRole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    //получить факультет
    public function getFaculty()
    {
        return $this->belongsTo('App\Models\Faculty', 'faculty_id');
    }

    //получить статус
    public function getStatus()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    //получить группу
    public function getGroup()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }
}
