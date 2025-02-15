<?php

namespace App\Repositories\Classes;
use App\Repositories\Interfaces\AuthInterface;

class AuthClass implements AuthInterface
{
    public function login($data){
        try {

            $payload = [
                'email' => $data['email'],
                'password' => $data['password']
            ];
            $auth_user = auth()->attempt($payload);
            
            if(!$auth_user){
                return response()->error(false,'invalid credentials !!!',401);
            }
                        
            $user = auth()->user();
            $token = $user->createToken('LanguageServices')->plainTextToken;
            return response()->success(true,['token' => $token, 'user_details' => $user],'logged in',200);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function logout(){
        try {
            $logout = auth()->user()->tokens()->delete();
            if(!$logout){
                return response()->error(false,'something went wrong, could not be log out',400);
            }
            return response()->success(false,null,'logged out',200);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }
}
