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
        return view('livewire.product-index', [
        	'products' => $this->search === null ? Product::paginate(12) : Product::where('name', 'like', '%' . $this->search . '%')->paginate(12)
        ]);
    }
}
