<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Paragraph;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductParagraph;
use App\Models\ProductColor;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', 0)->get();
        $paragraphs = Paragraph::where('status', 0)->get();
        return view('admin.products.create', compact('categories', 'brands', 'colors', 'paragraphs'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'headline' => $validatedData['headline'],
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'summary' => $validatedData['summary'],
            //'content' => $validatedData['content'],

            //'original_price' => $validatedData['original_price'],
            //'selling_price' => $validatedData['selling_price'],
            //'quantity' => $validatedData['quantity'],

            'trending' => $request->trending == true ? '1':'0',
            'featured' => $request->featured == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description']
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/articles/';
            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                    'image_caption' => 'Add Caption',
                    'image_credit' => 'Add Credit',
                ]);
            }
        }

        if($request->colors){
            foreach($request->colors as $key => $color){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }

        if($request->paragraphs){
            foreach($request->paragraphs as $key => $paragraph){
                $product->productParagraphs()->create([
                    'product_id' => $product->id,
                    'subheader' => $request->paragrpahsub[$key] ?? 0,
                    'content' => $request->paragrpahcon[$key] ?? 0,
                ]);
            }
        }

        return redirect('/admin/articles')->with('message', 'Article added');
    }

    public function edit(int $article_id)
    {
        $product = Product::findOrFail($article_id);
        $categories = Category::all();
        $brands = Brand::all();
        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();
        $paragraphs = Paragraph::whereNotIn('id', $product_color)->get();

        return view('admin.products.edit', compact('categories', 'brands', 'product', 'colors', 'paragraphs'));
    }

    public function update(ProductFormRequest $request, int $article_id)
    {
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                    ->products()->where('id', $article_id)->first();

        if($product)
        {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'headline' => $validatedData['headline'],
                'title' => $validatedData['title'],
                'author' => $validatedData['author'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'summary' => $validatedData['summary'],
                //'content' => $validatedData['content'],
                /*
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                */
                'trending' => $request->trending == true ? '1':'0',
                'featured' => $request->featured == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description']
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if($request->colors){
                foreach($request->colors as $key => $color){
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }

            if($request->paragraphs){
                foreach($request->paragraphs as $key => $paragraph){
                    $product->productParagraphs()->create([
                        'product_id' => $product->id,
                        'subheader' => $request->paragrpahsub[$key] ?? 0,
                        'content' => $request->paragrpahcon[$key] ?? 0,
                    ]);
                }
            }

            return redirect('/admin/articles')->with('message', 'Article updated');
        }
        else
        {
            return redirect('admin/articles')->with('message', 'No such article found');
        }
    }

    public function destroyImage(int $article_image_id)
    {
        $productImage = ProductImage::findOrFail($article_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Image Deleted');
    }

    public function destroy(int $article_id)
    {
        $product = Product::findOrFail($article_id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Article Deleted');
    }

    public function updateArtColorQty(Request $request, $art_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
            ->productColors()->where('id', $art_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Colour Qty updated']);
    }

    public function deleteArtColor($art_color_id)
    {
        $prodColor = ProductColor::findOrFail($art_color_id);
        $prodColor->delete();

        return response()->json(['message' => 'Colour Qty deleted']);
    }

    public function updateArtPara(Request $request, $art_para_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
            ->productParagraphs()->where('id', $art_para_id)->first();
        $productColorData->update([
            'subheader' => $request->subheader,
            'content' => $request->content
        ]);
        return response()->json(['message' => 'Article paragraph updated']);
    }

    public function deleteArtPara($art_para_id)
    {
        $prodColor = ProductParagraph::findOrFail($art_para_id);
        $prodColor->delete();

        return response()->json(['message' => 'Article paragraph deleted']);
    }
}
