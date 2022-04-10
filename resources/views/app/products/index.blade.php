@extends('layouts.baselayout')


@section('content')
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row display-flex align-items-baseline">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Produits</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('app.index')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Produits</a>
                            </li>
                            <li class="breadcrumb-item active">Liste Des Produits
                            </li>
                        </ol>
                    </div>
                    <div class="col s12 m6 l6">
                        @if(auth()->user()->hasPermission('create_products'))
                            <a class="display-flex  btn-small gradient-45deg-light-blue-cyan gradient-shadow  mt-6 right animated fadeInLeftBig  border-round float-sm-left"
                               href="{{route('products.create')}}">
                                Ajouter<i class="material-icons">add</i>
                            </a>
                        @else
                            <span></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <!-- products list start -->
                <section class="products-list-wrapper section">
                    <div class="products-list-table animated bounceInUp">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form action="{{route('products.index')}}" method="get">
                                        <div class="col s12 m6 l6">
                                            <div class="input-field display-flex align-items-baseline  border-round">
                                                <input id="search" type="text" name="search" class="search-area"
                                                       placeholder="Rechercher et entrer">
                                                <div class="">
                                                    <button type="submit"
                                                            class="btn btn-floating  waves-effect waves-light gradient-45deg-light-blue-cyan gradient-shadow">
                                                        <i class="material-icons">search</i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <!-- datatable start -->
                                <div class="responsive-table">
                                    <div style="overflow-x:auto;">
                                        <table class="table centered ">
                                            <thead>
                                            <tr>
                                                <th >#</th>
                                                <th >Nom</th>
                                                <th >Référence</th>
                                                <th >Déscription</th>
                                                <th >Image</th>
                                                <th >Prix de vente</th>
                                                <th >Prix d'achat</th>
                                                <th >Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $index=>$product)
                                                <tr class="table-row" data-href="{{route('products.edit',$product->id)}}">
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->reference ? $product->reference : '-' }}</td>
                                                    <td>{{ $product->description ? $product->description : '-'}}</td>
                                                    <td><img src="{{$product->image_path}}"  width="60px" alt=""></td>
                                                    <td>{{ $product->sale_price}}</td>
                                                    <td>{{ $product->purchase_price ? $product->purchase_price :'-'}}</td>
                                                    <td style="display: flex;justify-content: center">
                                                        @if(auth()->user()->hasPermission('delete_products'))
                                                            <form action="{{route('products.destroy',$product->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                {{ method_field('delete') }}


                                                                <button type="submit"
                                                                        class="btn-small btn-floating waves-effect waves-light red accent-2"
                                                                        data-toggle="tooltip"
                                                                        title="supprimer" style="margin-top: 17px"><i class="material-icons">delete_forever</i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- datatable ends -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                {{$products->appends(request()->query())->links()}}
                            </div>
                        </div>
                    </div>
                </section>
                <!-- products list ends --><!-- START RIGHT SIDEBAR NAV -->
                <!-- END RIGHT SIDEBAR NAV -->
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
    @endsection