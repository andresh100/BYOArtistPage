<?php

namespace Codecourse\Validation;


use Codecourse\User\User;
use Violin\Violin;

class Validator extends Violin {

    public function __construct(User $user){

        $this->user = $user;

        $this->addFieldMessages([
            'email' => [
                'uniqueEmail' => 'That email is already in use.'
            ],
            'username' => [
                'uniqueUsername' => 'That username is already in use.'
            ]

        ]);
    }

    public function validate_uniqueEmail($value, $input, $args){

        $user = $this->user->where('email', $value);

        return ! (bool) $user->count(); //If this is not true then there are users with this email

    }

    public function validate_uniqueUsername($value, $input, $args){

        return ! (bool) $this->user->where('username', $value)->count(); //counting users in database with same username,
                                                                                // checking if its not true.

    }

}