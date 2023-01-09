<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantiy, $quantityCount = 1, $productColorId;

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
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantiy = $productColor->quantity;

        if($this->prodColorSelectedQuantiy == 0){
            $this->prodColorSelectedQuantiy = "outOfStock";
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }

    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            if($this->product->where('id', $productId)->where('status', '0')->exists())
            {
                // Check for product color quantity and add to cart
                if($this->product->productColors()->count() > 1)
                {
                    if($this->prodColorSelectedQuantiy != NULL)
                    {
                        if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->where('product_color_id', $this->productColorId)->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already added',
                                'type' => 'info',
                                'status' => 200
                            ]);
                        }
                        else
                        {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if($productColor->quantity > 0)
                            {
                                if($productColor->quantity > $this->quantityCount)
                                {
                                    // Insert Product to Cart
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount,
                                    ]);
                                    $this->emit('cartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Added to Cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only '.$this->product->quantity.' items left',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                    return false;
                                }
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                                return false;
                            }
                        }
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Please select product color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                        return false;
                    }
                }
                else
                {
                    if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already added',
                            'type' => 'info',
                            'status' => 200
                        ]);
                    }
                    else
                    {
                        if($this->product->quantity > 0)
                        {
                            if($this->product->quantity > $this->quantityCount)
                            {
                                // Insert Product to Cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Added to Cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$this->product->quantity.' items left',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                                return false;
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                            return false;
                        }
                    }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exist',
                    'type' => 'warning',
                    'status' => 404
                ]);
                return false;
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
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
