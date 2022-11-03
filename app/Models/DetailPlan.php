<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    //protected $table = 'detail_plans'; // Informando o nome da tabela que o model vai olhar

    protected $fillable = ['name']; // informar o nome das colunas que pode registrar itens
    
    public function plan() //Como vai trazer só um registro o nome da model fica no singular
    {
        $this->belongsTo(Plan::class);
    } //Relacionamento um para um 
}
