<?php

namespace Tests;

use App\Models\User;

trait Auth {
    public $user;

    public function loginUser(){
        $this->user = User::factory()->create();

        // $this->actingAs($this->user);

        $response = $this->post('api/login',[
            'email' => $this->user->email,
            'password' => 'password'
        ]);
        
        $this->assertAuthenticated();

        $response->assertStatus(200);
    }
}
