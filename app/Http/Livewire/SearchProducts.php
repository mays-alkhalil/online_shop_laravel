<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class SearchProducts extends Component
{
    public $search = ''; // المتغير الذي سيتم ربطه مع حقل البحث في الواجهة

    // دالة لجلب المنتجات بناءً على البحث
    public function render()
    {
        $products = Product::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.search-products', compact('products'));
    }
}
