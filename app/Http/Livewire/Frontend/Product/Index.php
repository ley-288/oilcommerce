<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $category, $brandInputs = [], $priceInput; //$products

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($category)
    {
        $this->category = $category;
    }


    public function render()
    {
        $category = $this->category;
        //$this->products
        $products = Product::where('category_id', $category->id)
            ->when($this->brandInputs, function($q){
                $q->whereIn('brand', $this->brandInputs);
            })
            ->when($this->priceInput, function($q){
                $q->when($this->priceInput == 'high-to-low', function($q2){
                    $q2->orderBy('selling_price', 'DESC');
                })
                ->when($this->priceInput == 'low-to-high', function($q3){
                    $q3->orderBy('selling_price', 'ASC');
                });
            })
            ->where('status', '0')
            ->orderBy('id', 'DESC')
            //->get();
            ->paginate(10);
        return view('livewire.frontend.product.index', [
            'products' => $products, //$this->products
            'category' => $category
        ]);
    }
}
