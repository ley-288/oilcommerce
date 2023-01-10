<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if(Auth::check()){
            $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
            if($this->wishlistCount > 0){
                return $this->wishlistCount;
            }else{
                $this->wishlistCount = '';
                return $this->wishlistCount;
            }
        } else {
            return $this->wishlistCount = '';
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();

        return view('livewire.frontend.wishlist-count', [
            'wishlistCount' => $this->wishlistCount,
        ]);
    }
}
