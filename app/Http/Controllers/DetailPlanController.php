<?php

namespace App\Http\Controllers;

use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;
    public function __construct(DetailPlan $detailPlan, Plan $plan) //utilizado duas tabelas
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){  //Busca os detalhes dentro do plano com a url informada
            return redirect()->back();                              
        }

        $details = $plan->details();                                // Recebe todos os detalhes do plano
        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }
}
