<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_book()
    {
        $category = Category::factory()->create();
        
        $book = Book::create([
            'title' => 'Test Book',
            'author' => 'Test Author',
            'isbn' => '1234567890123',
            'publication_year' => 2023,
            'category_id' => $category->id,
        ]);

        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals('Test Book', $book->title);
        $this->assertEquals('Test Author', $book->author);
    }

    public function test_book_belongs_to_category()
    {
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Category::class, $book->category);
        $this->assertEquals($category->id, $book->category->id);
    }
}