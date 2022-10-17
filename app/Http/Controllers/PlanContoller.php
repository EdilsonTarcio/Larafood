<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Plan;
use Illuminate\Http\Request;


class PlanContoller extends Controller
{
    private $repository;
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
        //objeto do model, é utilizado para salvar e buscar registro no banco de dados
    }
    public function index ()
    {
        $plans = $this->repository->all(); 
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }
    public function create ()
    {
        return view('admin.pages.plans.create');
    }
    public function store (Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }
    public function show ($url)
    {
        $plan = $this->repository->where('url', $url)->first();//utilizar o where para localizar igualdade entre os dados
        if(!$plan)
            return redirect()->back();//manda para a origem da requisição se não localizar
        
        return view('admin.pages.plans.show', [
             'plan' => $plan
         ]);
        
    }
}
