<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupToSubject extends Model
{
    use HasFactory;
    protected $table = 'group_to_subjects';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'status',
        'group_id',
        'subject_id'
    ];

    public function getSubject()
    {
        return $this->belongsTo('App\Models\Subjects', 'user_id');
    }
}
