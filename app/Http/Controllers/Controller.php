<?php

namespace App\Http\Controllers;

use App\Models\User;

abstract class Controller
{
    //
    public $currentUser;

    public function __construct(){
        $this->currentUser = User::getCurrentUser();
    }

}
