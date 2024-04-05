@extends('layouts.base')
@section('content')
<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    @if ($cart_items->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_items as $item)
                            <tr>
                                <td class="cart__product__item">
                                    <img src="{{asset('img/shop/shop-')}}{{$item->model->image}}" alt="" style="max-width: 15%!important;">
                                    <div class="cart__product__item__title">
                                        <h6>{{ $item->model->name }}</h6>
                                    </div>
                                </td>
                                <td class="cart__price">$ {{ $item->model->regular_price }}</td>
                                <td class="cart__quantity">
                                    <div class="col-sm-6">
                                        <input type="number" 
                                        name="quantity" 
                                        data-rowid="{{$item->rowId}}"
                                        onchange="updateQuantity(this)"
                                        class="form-control" 
                                        value="{{$item->qty}}">
                                    </div>
                                </td>
                                <td class="cart__total">$ {{ $item->subtotal() }}</td>
                                <td class="cart__close"><span class="icon_close"  onclick="removeItemFromCart('{{$item->rowId}}')"></span></td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>                        
                    @else
                        <table>
                            <tbody><td><h2>No items to display in cart..!</h2></td></tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{ route('shop.index') }}">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="javascript:void(0)" onclick="clearCart()"><span class="icon_loading"></span> Clear all cart</a>
                </div>
            </div>
        </div>
        @if ($cart_items->count() > 0)
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>${{Cart::instance('cart')->subtotal()}}</span></li>
                        <li>Tax <span>{{Cart::instance('cart')->tax()}}</span></li>
                        <li>Total <span>$ {{Cart::instance('cart')->total()}}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Shop Cart Section End -->

{{-- Update cart item qty --}}
<form id="updateCartQty" action="{{route('cart.update')}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" id="rowId" name="rowId" />
    <input type="hidden" id="quantity" name="quantity" />
</form>

{{-- remove item from cart --}}
<form id="deleteFromCart" action="{{route('cart.remove')}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" id="rowId_D" name="rowId" />
</form>

<form id="clearCart" action="{{route('cart.clear')}}" method="post">
    @csrf
    @method('delete') 
</form>

@endsection
@push('scripts')
    <script>
        function updateQuantity(qty)
        {
            $('#rowId').val($(qty).data('rowid'));
            $('#quantity').val($(qty).val());
            $('#updateCartQty').submit();
        } 
        
        function removeItemFromCart(rowId)
        {
            $('#rowId_D').val(rowId);
            $('#deleteFromCart').submit();
        }       

        function clearCart()
        {
            $('#clearCart').submit();
        }
    </script>
@endpush