<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    protected $fillable = [
        'title',
        'pages',
        'isbn',
        'short_desc',
        'author_id',
    ];
    
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    
    public function scopeFilter($query, $filterBook)
    {
        if (isset($filterBook->name)) {
            $query->where('name', 'like', "%$filterBook->name%");
        }
    
        if (isset($filterBook->author_id)) {
            if ($filterBook->author_id == 'all') {
                return $query;
            } else {
                $query->where('author_id', $filterBook->author_id);
            }
        }
        return $query;
    }
}
