<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount;

    protected $listeners = ['cartAddedUpdated' => 'checkCartCount'];

    public function checkCartCount()
    {
        if(Auth::check()){
            $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
            if($this->cartCount > 0){
                return $this->cartCount;
            }else{
                $this->cartCount = '';
                return $this->cartCount;
            }
        } else {
            return $this->cartCount = '';
        }
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.cart.cart-count', [
            'cartCount' => $this->cartCount
        ]);
    }
}
