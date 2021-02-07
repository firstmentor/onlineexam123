<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    use HasFactory;
    protected $table= "results";
    protected $fillable = ['user_id','exam_id','correct','wrong','result_json'];

    public function user()
    {
       return $this->belongsTo(student::class);
    }

    public function exam()
    {
       return $this->belongsTo(Examination::class);
    }
}
