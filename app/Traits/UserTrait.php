<?php

namespace App\Traits;

trait UserTrait{


    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
    public function havePermission($permiso)
    {

        foreach ($this->roles as $role) {

            if ($role['full-access'] == 'yes') {
                return true;
            }

            foreach ($role->permission as $perm) {

                if ($perm->slug == $permiso) {
                    return true;
                }
            }
        }

        return false;

        //return $this->roles;
    }


}