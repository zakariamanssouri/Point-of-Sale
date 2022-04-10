@extends('layouts.baselayout')


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-users.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row display-flex align-items-baseline">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Employés</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('app.index')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Employés</a>
                            </li>
                            <li class="breadcrumb-item active">Liste Des Employés
                            </li>
                        </ol>
                    </div>
                    <div class="col s12 m6 l6">
                        @if(auth()->user()->hasPermission('create_users'))
                            <a class="display-flex  btn-small gradient-45deg-light-blue-cyan gradient-shadow  mt-6 right animated fadeInLeftBig  border-round float-sm-left"
                               href="{{route('users.create')}}">
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
                <!-- users list start -->
                <section class="users-list-wrapper section">
                    <div class="users-list-table animated bounceInUp">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <form action="{{route('users.index')}}" method="get">
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
                                        <table class="table centered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Prénom</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>rôles</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $index=>$user)
                                                <tr data-href="{{route('users.edit',$user->id)}}" class="table-row">
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach($user->getRoles() as $role)
                                                            <span class="badge gradient-45deg-purple-deep-orange gradient-shadow"
                                                                  style="border-radius: 10px;font-size: 0.8rem">{{$role}}</span>
                                                        @endforeach
                                                    </td>
                                                    <td style="display: flex;justify-content: center">

                                                        @if(auth()->user()->hasPermission('update_users'))
                                                            <a href="{{route('users.edit',$user->id)}}"
                                                               class="pr-5 mt-2"
                                                               data-toggle="tooltip" title="modifier"><i
                                                                        class="material-icons">edit</i></a>

                                                        @else
                                                            <span></span>
                                                        @endif

                                                        @if(auth()->user()->hasPermission('delete_users'))
                                                            <form action="{{route('users.destroy',$user->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                {{ method_field('delete') }}


                                                                <button type="submit"
                                                                        class="btn-small btn-floating waves-effect waves-light red accent-2"
                                                                        data-toggle="tooltip"
                                                                        title="supprimer"><i class="material-icons">delete_forever</i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <span></span>

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
                                {{$users->appends(request()->query())->links()}}
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users list ends --><!-- START RIGHT SIDEBAR NAV -->
                <!-- END RIGHT SIDEBAR NAV -->
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('app-assets/js/scripts/page-users.js') }}"></script>
@endsection