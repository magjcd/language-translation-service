<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_add_language_with_logged_in_user(): void
    {
        $this->loginUser();
        
        $add_language = $this->post('api/add-language',[
            'code' => fake()->locale(),
            'name' => fake()->locale()
        ]);

        $this->assertEquals(1,Language::count());
        $add_language->assertStatus(201);

    }

    public function test_update_language_with_logged_in_user(): void
    {
        $this->loginUser();
        
        $add_language = $this->post(route('language.add'),[
            'code' => 'code 1',
            'name' => 'name 1'
        ]);

        $this->assertEquals(1,Language::count());
        $add_language->assertStatus(201);

        $lang = Language::first();

        $update_lang = $this->put(route('language.update', $lang->id),[
            'code' => 'code updated',
            'name' => 'name updated'
        ]);

        $updated_lang = Language::first();
        $this->assertEquals('code updated', $updated_lang->code);
        $this->assertEquals('name updated', $updated_lang->name);

    }

    public function test_delete_language_with_logged_in_user(): void
    {
        $this->loginUser();
        
        $add_language = $this->post(route('language.add'),[
            'code' => 'code 1',
            'name' => 'name 1'
        ]);

        $this->assertEquals(1,Language::count());
        $add_language->assertStatus(201);

        $lang = Language::first();

        $delete_lang = $this->delete(route('language.delete', $lang->id));

        $this->assertEquals(0, Language::count());

    }

}
