<div>
    <!-- حقل البحث -->
    <input type="text" wire:model="search" placeholder="ابحث عن منتج...">

    <!-- عرض النتائج -->
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - {{ $product->price }} </li>
        @endforeach
    </ul>
</div>
