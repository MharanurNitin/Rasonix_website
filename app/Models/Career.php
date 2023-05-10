<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'category', 'sub-category'];

    public function applicants()
    {
        return $this->hasMany('App\Models\Job_applicant');
    }
}
