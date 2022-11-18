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

     public function permissionAvailable()
     { 
        $permissions = Permission::whereNotIn('id', function($query){  
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        //})->toSql();
        //dd($permissions);
           })->paginate();
        return $permissions;
     }
}
