<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_add_tag_with_logged_in_user(): void
    {
        $this->loginUser();
        
        $add_tag = $this->post('api/add-tag',[
            'tag_name' => fake()->name()
        ]);

        $this->assertEquals(1,Tag::count());
        $add_tag->assertStatus(201);

    }

    public function test_update_tag_with_logged_in_user(): void
    {
        $this->loginUser();
        
        $add_tag = $this->post('api/add-tag',[
            'tag_name' => fake()->name()
        ]);

        $this->assertEquals(1,Tag::count());
        $add_tag->assertStatus(201);

        $tag = Tag::first();

        $this->put(route('tag.update', $tag->id),[
            'tag_name' => 'tag updated'
        ]);

        $updated_tag = Tag::first();
        $this->assertEquals('tag updated', $updated_tag->tag_name);

    }

    public function test_delete_tag_with_logged_in_user(): void
    {
        $this->loginUser();
        
        $add_tag = $this->post('api/add-tag',[
            'tag_name' => fake()->name()
        ]);

        $this->assertEquals(1,Tag::count());
        $add_tag->assertStatus(201);

        $tag = Tag::first();

        $this->delete(route('tag.delete', $tag->id));

        $this->assertEquals(0, Tag::count());

    }
}
