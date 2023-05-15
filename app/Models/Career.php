<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    //protected $fillable = ['title', 'description', 'category', 'sub-category'];
    protected $fillable = [
        'title',
        'description',
        'categories_id',
        'document',
        'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function applicants()
    {
        return $this->hasMany('App\Models\Job_applicant');
    }
}
