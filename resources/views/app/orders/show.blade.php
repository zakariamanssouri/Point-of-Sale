@extends('layouts.baselayout')


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')
        <div class="row">
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="col s12">
                <div class="container">
                    <!-- app invoice View Page -->
                    <section class="invoice-view-wrapper section">
                        <div class="row">
                            <!-- invoice view page -->
                            <div class="col xl9 m8 s12">
                                <div class="card">
                                    <div class="card-content invoice-print-area">
                                        <!-- header section -->
                                        <div class="row invoice-date-number">
                                            <div class="col xl4 s12">
                                                <span class="invoice-number mr-1">Invoice#</span>
                                                <span>{{$order->id}}</span>
                                            </div>
                                            <div class="col xl8 s12">
                                                <div class="invoice-date display-flex align-items-center flex-wrap">
                                                    <div class="mr-3">
                                                        <small>Date Issue:</small>
                                                        <span>{{$order->created_at->format('d/m/y')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- logo and title -->
                                        <div class="row mt-3 invoice-logo-title">
                                            <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                                                <img src="{{asset('app-assets/images/gallery/pixinvent-logo.png')}}" alt="logo" height="46" width="164">
                                            </div>
                                            <div class="col m6 s12 pull-m6">
                                                <h4 class="indigo-text">Invoice</h4>
                                            </div>
                                        </div>
                                        <div class="divider mb-3 mt-3"></div>
                                        <!-- invoice address and contact -->
                                        <div class="row invoice-info">
                                            <div class="col m6 s12">
                                                <h6 class="invoice-from">Client</h6>
                                                <div class="invoice-address">
                                                    <span>{{$order->client->name}}</span>
                                                </div>
                                                <div class="invoice-address">
                                                    <span>{{$order->client->address?$order->client->address:''}}</span>
                                                </div>
                                                <div class="invoice-address">
                                                    <span>{{$order->client->phone?$order->client->phone:''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider mb-3 mt-3"></div>
                                        <!-- product details table-->
                                        <div class="invoice-product-details">
                                            <table class="striped responsive-table">
                                                <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Description</th>
                                                    <th>Cost</th>
                                                    <th>Qty</th>
                                                    <th class="right-align">Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->products as $product)
                                                    <tr>
                                                        <td>{{$product->product_name}}</td>
                                                        <td>{{$product->description ? $product->description :'-'}}</td>
                                                        <td>{{$product->sale_price}}</td>
                                                        <td>{{$product->pivot->quantity}}</td>
                                                        <td class="indigo-text right-align">${{$product->sale_price*$product->pivot->quantity}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- invoice subtotal -->
                                        <div class="divider mt-3 mb-3"></div>
                                        <div class="invoice-subtotal">
                                            <div class="row">
                                                <div class="col m5 s12">
                                                    <p>Thanks for your purchase.</p>
                                                </div>
                                                <div class="col xl4 m7 s12 offset-xl3">
                                                    <ul>
                                                        <li class="divider mt-2 mb-2"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Invoice Total</span>
                                                            <h6 class="invoice-subtotal-value">$ {{$order->total_price}}</h6>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- invoice action  -->
                            <div class="col xl3 m4 s12">
                                <div class="card invoice-action-wrapper">
                                    <div class="card-content">
                                        <div class="invoice-action-btn">
                                            <a href="#" class="btn-block btn btn-light-indigo waves-effect waves-light invoice-print">
                                                <span>Print</span>
                                            </a>
                                        </div>
                                        <div class="invoice-action-btn">
                                            <a href="{{route('clients.orders.edit',$order->id)}}" class="btn-block btn btn-light-indigo waves-effect waves-light">
                                                <span>Edit Invoice</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
@endsection




@section('js')
    <script src="{{asset('app-assets/js/scripts/app-invoice.js')}}"></script>
@endsection