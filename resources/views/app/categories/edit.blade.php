@extends('layouts.baselayout')

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
                            <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Catégories</a>
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
                                    <h4 class="card-title">Modifier Une Catégorie</h4>
                                    <form action="{{route('categories.update',$category->id)}}" method="post">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="row">

                                            {{--Name--}}
                                            <div class="input-field col m6 s12">
                                                <input id="categoryname" type="text"
                                                       class="@error('name') is-invalid @enderror" name="categoryname"
                                                       value="{{$category->categoryname}}" required>
                                                <label for="categoryname">Nom <span class="red-text">*</span></label>
                                                @error('categoryname')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{--Description--}}
                                            <div class="input-field col m6 s12">
                                                <input id="description" type="text"
                                                       class="@error('name') is-invalid @enderror" name="description"
                                                       value="{{$category->description}}">
                                                <label for="description">Déscription</label>
                                                @error('description')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn cyan waves-effect waves-light right"
                                                            type="submit">Modifier
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