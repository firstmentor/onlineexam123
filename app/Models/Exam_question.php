<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_question extends Model
{
    use HasFactory;
    protected $fillable = ['question','answer','options','exam_id','status'];
}
