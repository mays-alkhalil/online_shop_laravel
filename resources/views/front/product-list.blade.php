<div class="row px-xl-5">
    @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="product-item">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <h6>{{ $product->name }}</h6>
                <p>{{ $product->description }}</p>
                <p>Price: {{ $product->price }}</p>
            </div>
        </div>
    @endforeach
</div>
