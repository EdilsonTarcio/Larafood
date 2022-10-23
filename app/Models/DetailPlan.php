<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    //use HasFactory;
    public function plan()
    {
        $this->belongsTo(Plan::class);
    } //Relacionamento um para um 
}
