@extends('layouts.baselayout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('app-assets/css/pages/morris.css')}}">
@endsection


@section('content')
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <!--card stats start-->
                    <div id="gradient-Analytics">
                        <div class="col s12 m6 l3 card-width">
                            <div class="card row gradient-45deg-deep-orange-orange gradient-shadow white-text padding-4 mt-5">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5 mb-5">add_shopping_cart</i>
                                    <p>Commandes</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-5 white-text count_and_show_arrow">{{$orders_count}}</h5>
                                    <a href="{{route('clients.orders.index')}}" class="white-text mt-5">show <i class="material-icons" style="font-size: 12px">arrow_forward</i></a>
                                </div>
                            </div>

                        </div>

                        <div class="col s12 m6 l3 card-width">
                            <div class="card row gradient-45deg-blue-indigo gradient-shadow white-text padding-4 mt-5">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5 mb-5">perm_identity</i>
                                    <p>Clients</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-5 white-text count_and_show_arrow">{{$clients_count}}</h5>
                                    <a href="{{route('clients.index')}}" class="white-text mt-5">show <i class="material-icons" style="font-size: 12px">arrow_forward</i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m6 l3 card-width">
                            <div class="card row gradient-45deg-purple-deep-orange gradient-shadow white-text padding-4 mt-5">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5 mb-5">apps</i>
                                    <p>Catégories</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-5 white-text count_and_show_arrow">{{$categories_count}}</h5>
                                    <a href="{{route('categories.index')}}" class="white-text mt-5">show <i class="material-icons" style="font-size: 12px">arrow_forward</i></a>

                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3 card-width">
                            <div class="card row gradient-45deg-purple-deep-purple gradient-shadow white-text padding-4 mt-5">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5 mb-5">attach_money</i>
                                    <p>Products</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-5 white-text count_and_show_arrow">{{$products_count}}</h5>
                                    <a href="{{route('products.index')}}" class="white-text mt-5">show <i class="material-icons" style="font-size: 12px">arrow_forward</i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sales-chart">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div id="revenue-chart" class="card animate fadeUp">
                                    <div class="card-content">
                                        <h4 class="header mt-0">
                                            Commandes
                                        </h4>
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="yearly-revenue-chart" id="yearly-revenue">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="{{asset('app-assets/js/scripts/raphael.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/morris.min.js')}}"></script>
    <script>
        var line = new Morris.Line({
            element: 'yearly-revenue',
            resize: 'true',
            data: [
                    @foreach($sales_data as $data)
                {
                    ym: "{{$data->year}}-{{$data->month}}", sum: "{{$data->sum}}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['total'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>
@endsection
