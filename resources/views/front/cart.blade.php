@extends('front.master')

@section('cart-active','active')

@section('title','Cart')

@section('content')

@include('front.partials.breadcrumb',['pageName' => 'Cart'])

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if($cartItems->isEmpty())
                        <tr>
                            <td colspan="5">Your cart is empty.</td>
                        </tr>
                    @else
                        @foreach($cartItems as $item)
                            <tr id="cart-item-{{ $item->id }}">
                                <td class="align-middle">
                                    <img src="{{ asset('img/products/'.$item->product->image) }}" alt="" style="width: 50px;">
                                    {{ $item->product->name }}
                                </td>
                                <td class="align-middle">${{ $item->product->price }}</td>
                                <td class="align-middle">
                                  
                                    <!-- نموذج لتقليل الكمية -->
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </form>
                                    
                                    <!-- عرض الكمية الحالية -->
                                    <span class="mx-2">{{ $item->quantity }}</span>
                                      <!-- نموذج لزيادة الكمية -->
                                      <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </form>
                                    
                                </td>
                                <td class="align-middle total" id="total-{{ $item->id }}">
                                    ${{ $item->product->price * $item->quantity }}
                                </td>
                                <td class="align-middle">
                                    <!-- حذف العنصر من الـ Cart باستخدام نموذج POST و DELETE -->
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE') <!-- تأكد من أن هذا السطر موجود -->
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-times"></i> Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        
        <!-- Cart Summary -->
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6 id="subtotal">${{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="total">${{ $cartItems->sum(function($item) { return $item->product->price * $item->quantity; }) + 10 }}</h5>
                    </div>
                    <a href="{{ route('front.checkout') }}">
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </a>
                                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection
