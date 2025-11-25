<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_category()
    {
        $category = Category::create([
            'name' => 'Test Category',
            'description' => 'Test Description',
        ]);

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('Test Category', $category->name);
        $this->assertEquals('Test Description', $category->description);
    }

    public function test_category_has_many_books()
    {
        $category = Category::factory()->create();
        $books = $category->books()->createMany([
            ['title' => 'Book 1', 'author' => 'Author 1', 'isbn' => '1234567890123', 'publication_year' => 2023],
            ['title' => 'Book 2', 'author' => 'Author 2', 'isbn' => '1234567890124', 'publication_year' => 2023],
        ]);

        $this->assertEquals(2, $category->books()->count());
    }
}