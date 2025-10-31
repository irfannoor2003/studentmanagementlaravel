<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;
    protected $fillable =['name','email','age','classroom_id','profile'];

  public function classroom()
{
    return $this->belongsTo(Classroom::class);
}

}
