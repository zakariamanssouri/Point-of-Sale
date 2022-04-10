@extends('layouts.baselayout')

@section('css')
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/form-select2.css')}}">
@endsection



@section('content')

    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Modifier</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('app.index')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produits</a>
                            </li>
                            <li class="breadcrumb-item active">modifier
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="Form-advance" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <h4 class="card-title">Modifier Un Produit</h4>
                                    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        {{method_field('PUT')}}

                                        {{--row 1--}}
                                        <div class="row">
                                            {{--Product Name--}}
                                            <div class="input-field col m6 s12">
                                                <input id="product_name" type="text"
                                                       class="@error('name') is-invalid @enderror" name="product_name"
                                                       value="{{$product->product_name}}" >
                                                <label for="product_name">Nom du produit <span class="red-text">*</span></label>
                                                @error('product_name')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{--Description--}}
                                            <div class="input-field col m6 s12">
                                                <input id="description" type="text"
                                                       class="@error('name') is-invalid @enderror" name="description"
                                                       value="{{$product->description}}">
                                                <label for="description">Déscription</label>
                                                @error('description')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--row 2--}}
                                        <div class="row">
                                            {{--Product Reference--}}
                                            <div class="input-field col m6 s12">
                                                <input id="reference" type="text"
                                                       class="@error('name') is-invalid @enderror" name="reference"
                                                       value="{{$product->reference}}" >
                                                <label for="reference">Référence du produit</label>
                                                @error('reference')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{--purchase_price--}}
                                            <div class="input-field col m6 s12">
                                                <input id="purchase_price" type="number"
                                                       class="@error('name') is-invalid @enderror" name="purchase_price"
                                                       value="{{$product->purchase_price}}">
                                                <label for="purchase_price">Prix d'achat</label>
                                                @error('purchase_price')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--row 3--}}
                                        <div class="row">
                                            {{--sale_price--}}
                                            <div class="input-field col m6 s12">
                                                <input id="sale_price" type="number" step="0.01"
                                                       class="@error('name') is-invalid @enderror" name="sale_price"
                                                       value="{{$product->sale_price}}" >
                                                <label for="sale_price">Prix du vente <span class="red-text">*</span></label>
                                                @error('sale_price')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{--category--}}

                                            <div class="input-field col m6 s12">
                                                <select class="select2 browser-default" multiple="multiple" name="category_id[]">
                                                    <optgroup label="Catégories">
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}"> {{$category->categoryname}} </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <label>Catégories</label>
                                                @error('category_id')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>

                                        {{--row 4--}}
                                        <div class="row">
                                            {{--image--}}
                                            <div class="col s12 m6 l6">
                                                <div class="file-field input-field">
                                                    <div class="btn btn-sm waves-effect waves-light">
                                                        <span>Image</span>
                                                        <input type="file" name="image"
                                                               class="@error('name') is-invalid @enderror image">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text"
                                                               placeholder="Séléctionner une image">
                                                    </div>
                                                    @error('image')
                                                    <span class="red-text">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{--stock--}}
                                            <div class="input-field col m6 s12">
                                                <input id="stock" type="number"
                                                       class="@error('name') is-invalid @enderror" name="stock"
                                                       value="{{$product->stock}}">
                                                <label for="stock">Stock</label>
                                                @error('stock')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--Image preview--}}
                                        <div class="row">
                                            <div class="input-field col s12 m12 l12">
                                                <img src="{{asset('images/products_images/'.$product->image)}}"  class="img-thumbnail image-preview" style="width: 150px" alt="">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn cyan waves-effect waves-light right"
                                                            type="submit">modifier
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>

@endsection

@section('js')
    <script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/form-select2.js')}}"></script>

@endsection

