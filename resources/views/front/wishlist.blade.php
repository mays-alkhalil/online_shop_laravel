@extends('front.master')

@section('wishlist-active','active') <!-- يمكن تعديل هذه الكلاس لتحديد الصفحة النشطة في الـ Navigation -->

@section('title','Wish List')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Wish List'])

<!-- Wish List Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($wishlists as $wishlist)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ asset('storage/'.$wishlist->product->image) }}" alt="" style="width: 50px;">
                                {{ $wishlist->product->name }}
                            </td>
                            <td class="align-middle">${{ $wishlist->product->price }}</td>
                            <td class="align-middle">
                                <form action="{{ route('wishlist.remove', $wishlist->product_id) }}" method="POST" class="d-inline-block mr-2">
                                    @csrf
                                    @method('DELETE') <!-- تأكد من أن هذه السطر موجود -->
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-times"></i> Remove
                                    </button>
                                </form>
                                <a href="{{ route('cart.add', $wishlist->product->id) }}" 
                                    class="btn btn-sm btn-primary d-inline-block" 
                                    onclick="showSweetAlert(event, {{ $wishlist->product->id }}); return false;">
                                    <i class="fa fa-cart-plus"></i> Add to Cart
                                 </a>
                                 
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Wish List End -->

@endsection
