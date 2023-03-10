<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductParagraph extends Model
{
    use HasFactory;

    protected $table = 'product_paragraphs';

    protected $fillable = [
        'product_id',
        'subheader',
        'content',
    ];
}
