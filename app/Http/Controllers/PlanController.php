<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlan;
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
        return view('admin.pages.plans.new');   //redireciona para o formulário de criação
    }
    public function index ()
    {
        $plans = $this->repository->all();          //acessa os planos dentro do banco de dados
        return view('admin.pages.plans.index', [    // leva os planos para a view
            'plans' => $plans,
        ]);
    }
    public function store (StoreUpdatePlan $request)
    {
        //dd($request->all());                      
        $this->repository->create($request->all());           
        /* realiza o cadasatro de um novo plano, chamando o metodo create e passando as informações, será salvo no banco as colunas da tabela
        informadas no $fillable dentro do Model Plan, o atributo nome dos inputs devem ter os mesmos nomes das colunas no banco 
        a coluna 'url' será preenchida pelo Observer pois tratase de uma composição*/

        return redirect()->route('plans.index');
    }
    public function show ($url)
    {
        $plan = $this->repository->where('url', $url)->first(); //utilizar o where para localizar igualdade entre os dados
        if(!$plan)                                              //se não localizar
            return redirect()->back();                          //manda para a origem da requisição 
        
        return view('admin.pages.plans.show', [
             'plan' => $plan                                    //envia os planos encontrados no banco para a view
         ]);
        
    }
    public function destroy ($url)
    {
        $plan = $this->repository->where('url', $url)->first(); //faz a consulta a url passada dentro do banco
        if(!$plan)                                              //se não localizado
            return redirect()->back();                          //volta para a origem da requisição
        $plan->delete();                                        //se localizar deleta o plano

        return redirect()->route('plans.index');                //volta para o index
    }
    public function search(Request $request)
    {
        //dd($request->all());
        $filters = $request->all();                            //Variavel recebe o dado da request                          

        $plans  = $this->repository->search($request->filter); //utiliza o metodo de busca que está dentro do Model passando o dado da request
        return view('admin.pages.plans.index', [               
            'plans' => $plans,                                 //passa os planos com o resultado da consulta para a view 
            'filter' => $filters,                              //passa o dado da request para a view 
        ]);
    }
    public function teste ()
    {
        return view('admin.pages.plans.teste');
    }
    public function edit ($url)
    {
        $plan = $this->repository->where('url', $url)->first(); //faz a consulta a url passada dentro do banco
        if(!$plan)                                              //se não localizado
            return redirect()->back();                          //volta para a origem da requisição
        return view('admin.pages.plans.edit',[                  //direciona para a paguina de edição com o vetor contendo as informações do plano
            'plan' =>$plan
        ]);
    }
    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first(); //faz a consulta a url passada dentro do banco
        if(!$plan)                                              //se não localizado
            return redirect()->back();                          //volta para a origem da requisição
        //dd($request->all(), $url);
        $plan->update($request->all());                         //Chama o metodo update e passa os dados para atualizar as informações do plano selecionado
        return redirect()->route('plans.index');
    }

}   
