<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'category_id',
        'publisher',
        'year',
        'quantity',
        'available',
        'description',
        'cover_image'
    ];

    protected $casts = [
        'year' => 'integer',
        'quantity' => 'integer',
        'available' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function isAvailable(): bool
    {
        return $this->available > 0;
    }

    public function decrementAvailable(): void
    {
        if ($this->available > 0) {
            $this->decrement('available');
        }
    }

    public function incrementAvailable(): void
    {
        if ($this->available < $this->quantity) {
            $this->increment('available');
        }
    }

    public function scopeAvailable($query)
    {
        return $query->where('available', '>', 0);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', "%{$term}%")
                     ->orWhere('author', 'like', "%{$term}%")
                     ->orWhere('isbn', 'like', "%{$term}%");
    }
}
