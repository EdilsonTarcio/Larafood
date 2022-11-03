<?php

namespace App\Http\Controllers;

use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan) //utilizado duas tabelas, precisa declarar o construtor do plan 
    {
        $this->repository = $detailPlan;
        $this-> plan = $plan;
    }
    public function index($urlPlan)
    {
        
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){  //Busca os detalhes dentro do plano com a url informada
            return redirect()->back();                              // Se o retorno for null redireciona
        }

        $details =  $this->repository->where('plan_id', $plan->id)->first();                             // Recebe todos os detalhes do plano
       return view('admin.pages.plans.details.index', [            // Passa para a view o plano e os detalhes do plano
            'plan' => $plan,
            'details' => $details,
        ]);
    }
    public function create($urlPlan)
    {   
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){  //Busca os detalhes dentro do plano com a url informada
            return redirect()->back();                              // Se o retorno for null redireciona
        }
        return view('admin.pages.plans.details.create',[
            'plan' => $plan,
        ]);
    }
    public function store(Request $request, $urlPlan)
    {
        //dd($request->all());
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){  //Busca os detalhes dentro do plano com a url informada
            return redirect()->back();                              // Se o retorno for null redireciona
        }
        //$data = $request->all();
        //$data['plan_id'] = $plan->id; // o id e obrigatório para referenciar o detalhe ao plano, passa o id na posição onde ele pertence
        //$this->repository->create($data);

        $plan->details()->create($request->all()); // salva o registro utilizando os relacionamento que existem entre as tabelas
        return redirect()->route('details.index', $plan->url);
    }
}
