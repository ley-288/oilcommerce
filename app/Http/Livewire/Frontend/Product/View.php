<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantiy;

    public function addToWishList($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message', 'Already Added to Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already Added to Wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Added to Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else
        {
            session()->flash('message', 'Please Login to add to wishlist');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
       // dd($productColorId);
       $productColor = $this->product->productColors()->where('id', $productColorId)->first();
       $this->prodColorSelectedQuantiy = $productColor->quantity;

       if($this->prodColorSelectedQuantiy == 0){
        $this->prodColorSelectedQuantiy = "outOfStock";
       }
    }

    public function render()
    {
        $category = $this->category;
        $product = $this->product;
        return view('livewire.frontend.product.view', [
            'category' => $category,
            'product' => $product,
        ]);
    }
}
