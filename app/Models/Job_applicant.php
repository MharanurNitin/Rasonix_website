<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_applicant extends Model
{
    use HasFactory;
    public function Career()
    {
        return $this->belongsTo(Career::class);
    }
}
