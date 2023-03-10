<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class WishlistController extends Controller
{
    public function index()
    {
        $categoryList = Category::where('status', 0)->get();
        return view('frontend.wishlist.index', compact('categoryList'));
    }
}
