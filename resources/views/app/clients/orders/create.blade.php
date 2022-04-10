@extends('layouts.baselayout')

{{--css files--}}
@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('app-assets/css/pages/app-todo.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/eCommerce-products-page.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/custom/custom.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/form-select2.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/custom/order.css')}}">
@endsection

{{--content--}}
@section('content')
    <div class="row">
        <div class="col s12 m9 l8">

            {{--Search--}}
            <div class="row coloredbackground">
                <div class="display-flex ">

                    <div class="col s12 m6 l6 ml-1">
                        <div class="input-field display-flex align-items-baseline  border-round ">
                            <input id="product-search" type="text" name="search" class="search-area"
                                   placeholder="taper le nom d'un produit">
                        </div>
                    </div>

                    <div class="input-field col  m6 s12 l6">
                        <select class="select2 browser-default" data-placeholder="Séléctionner un client" id="client" required>
                            <option selected disabled hidden value="-1">choisissez un client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id}}"> {{ $client->name }} </option>
                            @endforeach
                        </select>
                        <span class="red-text client-error-span"></span>
                    </div>
                </div>
            </div>
            <a
                    href="#"
                    data-target="theme-cutomizer-out"
                    class="btn btn-customizer pink accent-2 white-text sidenav-trigger theme-cutomizer-trigger"
            ><i class="material-icons">settings</i></a
            >


            {{--products--}}
            <div class="products row coloredbackground">
                @foreach($products as $product)
                    <div class="col s4 m3 l3">
                        <div class="card animate fadeLeft product-card">
                            <div>
                                <div>
                                    <img src="{{$product->image_path}}" class="responsive-img" alt="">
                                </div>
                                <div class="display-flex justify-content-center product-title">
                                    {{$product->product_name}}
                                </div>
                                <div class="display-flex flex-wrap justify-content-center">
                                    <h5 class="mt-3">{{$product->sale_price}}$</h5>
                                </div>
                                <div class="display-flex justify-content-center">
                                    <a href="#" class="btn-floating waves-effect waves-light cyan add-product-btn"
                                       id="product-{{$product->id}}"
                                       data-name="{{$product->product_name}}"
                                       data-id="{{$product->id}}"
                                       data-price="{{$product->sale_price}}"
                                       data-image="{{$product->image_path}}"
                                    >
                                        <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{--Cart--}}
        <form action="{{route('clients.orders.store')}}" method="post" id="create_order_form" >
            @csrf
            <div class="panel col s10 m3 l4  shadow-lg hide-on-small-and-down">
                {{--hidden client input--}}
                <input type="hidden" name="client" id="client-hidden-input">

                {{--titlle--}}
                <span class="cardtitle_">Cart</span>
                {{--titlle--}}

                {{--added products--}}
                <div class="cart-products">
                </div>
                {{--added products--}}

                <div>
                    <h5>Total: <span class="total-price">0</span>$</h5>
                </div>

                <div>
                    <button type="submit" id="create-order-form-btn" class="btn btn-dark width-100 disabled">Create Order</button>
                </div>

            </div>
            {{--Cart--}}

        </form>
    </div>

@endsection


{{--js files--}}
@section('js')
    <script src="{{asset('app-assets/js/scripts/advance-ui-modals.js')}}"></script>
    <script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/js/custom/jquery.number.min.js')}}"></script>
    <script src="{{asset('app-assets/js/custom/accounting.min.js')}}" type="text/javascript"></script>

@endsection