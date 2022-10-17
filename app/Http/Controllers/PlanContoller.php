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
}
