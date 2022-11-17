<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;
    public function __construct(Profile $profile, Permission $permission) 
    //injetando os dois Models
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }
    
    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile){
            return redirect()->back();
        }
        $permissions = $profile->permissions()->paginate();
        
        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));

    }
    public function available($idProfile)
    {
        
        if (!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }

        $permissions = $this->permission->paginate();
        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));

    }
    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                            ->back()
                            ->with('message', 'Precisa escolher pelo menos uma permissão');
        }

        //dd($request->permissions);
        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permission', $profile->id);
    }
}
