@extends('layouts.baselayout')


@section('content')
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row display-flex align-items-baseline">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Catégories</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('app.index')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Catégories</a>
                            </li>
                            <li class="breadcrumb-item active">Liste Des Catégories
                            </li>
                        </ol>
                    </div>
                    <div class="col s12 m6 l6">
                        @if(auth()->user()->hasPermission('create_categories'))
                            <a class="display-flex  btn-small gradient-45deg-light-blue-cyan gradient-shadow  mt-6 right animated fadeInLeftBig  border-round float-sm-left"
                               href="{{route('categories.create')}}">
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
                <!-- categories list start -->
                <section class="categories-list-wrapper section">
                    <div class="categories-list-table animated bounceInUp">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form action="{{route('categories.index')}}" method="get">
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
                                                <th >Déscription</th>
                                                <th >Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $index=>$category)
                                                <tr class="table-row" data-href="{{route('categories.edit',$category->id)}}">
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $category->categoryname }}</td>
                                                    <td>{{ $category->description ? $category->description : '-'}}</td>
                                                    <td style="display: flex;justify-content: center">
                                                        @if(auth()->user()->hasPermission('delete_categories'))
                                                            <form action="{{route('categories.destroy',$category->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                {{ method_field('delete') }}


                                                                <button type="submit"
                                                                        class="btn-small btn-floating waves-effect waves-light red accent-2"
                                                                        data-toggle="tooltip"
                                                                        title="supprimer"><i class="material-icons">delete_forever</i>
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
                                {{$categories->appends(request()->query())->links()}}
                            </div>
                        </div>
                    </div>
                </section>
                <!-- categories list ends --><!-- START RIGHT SIDEBAR NAV -->
                <!-- END RIGHT SIDEBAR NAV -->
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
    @endsection