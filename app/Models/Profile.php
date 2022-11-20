<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];
    /**
     * Get Permission, relacionamento
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Lista as permissões que não estão associadas ao perfil atual!
     */

     public function permissionAvailable($filter = null)
     { 
        $permissions = Permission::whereNotIn('id', function($query){  
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        //})->toSql();
        //dd($permissions);
           })
           ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%"); //executa a quary se o filter for diferente de null
           })
           ->paginate();
        return $permissions;
     }
}
