<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Plan;
use Illuminate\Http\Request;


class PlanController extends Controller
{
    private $repository;
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
        //objeto do model, é utilizado para salvar e buscar registro no banco de dados
    }
    public function new ()
    {
        return view('admin.pages.plans.new');
    }
    public function index ()
    {
        $plans = $this->repository->all(); 
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
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
    public function destroy ($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();
        $plan->delete();

        return redirect()->route('plans.index');
    }
    public function search(Request $request)
    {
        //dd($request->all());
        $filters = $request->all();

        $plans  = $this->repository->search($request->filter);
        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filter' => $filters,
        ]);
    }
    public function testev ()
    {
        return view('admin.pages.plans.teste');
    }

}   
