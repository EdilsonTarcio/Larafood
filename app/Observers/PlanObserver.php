<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Plan;

class PlanObserver
{
    /**
     * Realiza ação ANTES que criar o plano
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
        //Adiciona o conteudo do campo url com o nome removendo os espaços e adicionando - com a função kebab
    }
    /**
     * Realiza ação DEPOIS que criar o plano
     */
    public function created(Plan $plan)
    {
        //
    }
    

    /**
     * Realiza ação ANTES que atualizar o plano
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
        //Adiciona o conteudo do campo url com o nome removendo os espaços e adicionando - com a função kebab
    }
    /**
     * Realiza ação DEPOIS que atualizar o plano
     */
    public function updated(Plan $plan)
    {
        //
    }
    

}
