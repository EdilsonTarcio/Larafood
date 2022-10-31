<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //os códigos em SQL mais pesados será feito aqui para deixar o controller mais limpo
    //use HasFactory;
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    } //Adicionando relacionamento "hasMany" um para muitos, onde um plano pode conter varios detalhes

    public function search($filter = null)
    { // esse metodo busca por planos que tenha as informações de busca informado pelo filter
        $results = $this->where('name','like', "%{$filter}%")
                        ->orWhere('description','like', "%{$filter}%")
                        ->get();
        return $results;
    }
}
