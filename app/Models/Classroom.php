<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // or whatever your columns are

    public function students()
    {
        return $this->hasMany(Students::class);
    }
}
