<?php

namespace Codecourse\User;

use Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent{

    protected $table = 'users';

    protected $fillable = [

        'email',
        'username',
        'password',
        'active',
        'active_hash',
        'remember_identifier',
        'remember_token',

    ];

    public function getFullName(){

        if (!$this->first_name || !$this->last_name ){ //if no first name or last name
            return null;
        }

        return "{$this->first_name} {$this->last_name}";

    }


    public function getFullNameOrUsername(){

        return $this->getFullName() ?: $this->username;//If full name doesnt exist, output username

    }

    public function activateAccount(){
        $this->update([

            'active' => true,
            'active_hash' => null

        ]);
    }


}