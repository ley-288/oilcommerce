<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $newArrivalProducts = Product::latest()->take(14)->get();
        $featuredHead = Product::where('featured', '1')->latest()->take(3)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(14)->get();
        $archiveProducts = Product::inRandomOrder()->take(6)->get();
        $categoryList = Category::where('status', 0)->get();
        return view('frontend.index', compact('newArrivalProducts', 'featuredHead', 'featuredProducts', 'archiveProducts', 'categoryList'));
    }

    public function searchProducts(Request $request)
    {
        if($request->search){
            $categoryList = Category::where('status', 0)->get();
            $searchProducts = Product::where('title', 'LIKE', '%'.$request->search.'%')
                ->orWhere('headline', 'LIKE', '%'.$request->search.'%')
                ->orWhere('brand', 'LIKE', '%'.$request->search.'%')
                ->orWhere('summary', 'LIKE', '%'.$request->search.'%')
                ->orWhere('author', 'LIKE', '%'.$request->search.'%')
                ->orWhere('slug', 'LIKE', '%'.$request->search.'%')
                ->orWhere('meta_title', 'LIKE', '%'.$request->search.'%')
                ->orWhere('meta_description', 'LIKE', '%'.$request->search.'%')
                ->orWhere('meta_keyword', 'LIKE', '%'.$request->search.'%')
                ->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts', 'categoryList'));
        }else{
            return redirect()->back()->with('message', 'No items found');
        }
    }

    public function newArrival()
    {
        $newArrivalProducts = Product::latest()->paginate(5);
        $categoryList = Category::where('status', 0)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalProducts', 'categoryList'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured', '1')->latest()->paginate(5);
        $categoryList = Category::where('status', 0)->get();
        return view('frontend.pages.featured-products', compact('featuredProducts', 'categoryList'));
    }

    public function categories()
    {
        $categories = Category::where('status', 0)->get();
        $categoryList = Category::where('status', 0)->get();
        return view('frontend.collections.category.index', compact('categories', 'categoryList'));
    }

    public function products($category_slug)
    {
        $categoryList = Category::where('status', 0)->get();
        $category = Category::where('slug', $category_slug)->first();
        if($category){
            return view('frontend.collections.products.index', compact('category', 'categoryList'));
        }else{
            return redirect()->back();
        }
    }

    public function articleView(string $category_slug, string $article_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $categoryList = Category::where('status', 0)->get();
        if($category){
            $product = $category->products()->where('slug', $article_slug)->where('status', '0')->first();
            if($product){
                return view('frontend.collections.products.view', compact('product', 'category', 'categoryList'));
            }else{
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function aboutUs()
    {
        $categoryList = Category::where('status', 0)->get();
        return view('frontend.contact.about-us', compact('categoryList'));
    }

    public function brandDirectory()
    {
        $categoryList = Category::where('status', 0)->get();
        return view('frontend.contact.directory', compact('categoryList'));
    }

    public function cookiePolicy()
    {
        return view('frontend.cookies');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy');
    }

    public function thankyou()
    {
        return view('frontend.thankyou');
    }

}
