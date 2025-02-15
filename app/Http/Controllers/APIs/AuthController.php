<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\APIs\AuthRequest;

use App\Repositories\Interfaces\AuthInterface;

class AuthController extends Controller
{
    protected $auth_interface;

    public function __construct(AuthInterface $auth_interface){
        $this->auth_interface = $auth_interface;
    }

    public function login(AuthRequest $req){
        return $this->auth_interface->login($req);
    }

    public function logout(){
        return $this->auth_interface->logout();
    }
}
