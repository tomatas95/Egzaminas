<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    protected $fillable = [
        'name',
        'surname',
    ];

    use HasFactory;

public function books()
{
    return $this->hasMany(Book::class);
}

}
