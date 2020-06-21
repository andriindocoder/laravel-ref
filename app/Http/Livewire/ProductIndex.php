<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use Livewire\WithPagination;

class ProductIndex extends Component
{
	use WithPagination;

	public $search;

	protected $updatesQueryString = ['search'];

    public function render()
    {
    	$products = Product::paginate(12);

    	if($this->search !== null) {
    		$products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(12);
    	}

        return view('livewire.product-index', [
        	'products' => $products 
        ]);
    }
}
