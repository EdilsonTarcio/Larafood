<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreatePermission;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;
    public function __construct(Permission $permissions)
    {
        $this->repository = $permissions;
    }
    public function index()
    {
        $permission = $this->repository->paginate();

        return view('admin.pages.permissions.index', compact('permission'));
    }
    public function create()
    {
        return view('admin.pages.permissions.create');
    }
    public function store(StoreCreatePermission $request)
    {
        //dd($request->all());
        $this->repository->create($request->all());
        return redirect()->route('permission.index');

    }
    public function show($id)
    {
        if (!$permission = $this->repository->find($id)){
            return redirect()->back();
        }
        return view('admin.pages.permissions.show', [
            'permission' => $permission                                    
        ]);
    }
    public function edit($id)
    {
        if (!$permission = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.permissions.edit', compact('permission'));
    }
    public function update(StoreUpdatePermission $request, $id)
    {
        if (!$permission = $this->repository->find($id)){
            return redirect()->back();
        }

        $permission->update($request->all());

        return redirect()->route('permission.index');
    }
    public function destroy($id)
    {
        if (!$permission = $this->repository->find($id)){
            return redirect()->back();
        }

        $permission->delete();

        return redirect()->route('permission.index');
    }
    public function search(Request $request)
    {
        $filters = $request->only('filter');
        //dd($request->all());
        $permission = $this->repository
                                    ->where(function ($query) use ($request){
                                        if($request->filter){
                                            $query->where('name', 'LIKE', "%{$request->filter}%"); //por defalt já reconhece que é uma igualdade
                                            $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                                        }
                                    })
                                    ->paginate(5);

        return view('admin.pages.permissions.index', compact('permission', 'filters'));
    }
}
