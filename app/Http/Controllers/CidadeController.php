<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    private $repository;
    public function __construct(Cidade $Cidade)
    {
        $this->repository = $Cidade;
        //objeto do model, é utilizado para salvar e buscar registro no banco de dados
    }
    public function index ()
    {
        $cidades = $this->repository->all();          //acessa os planos dentro do banco de dados
        return view('admin.index', [    // leva os planos para a view
            'cidades' => $cidades,
        ]);
    }
}
