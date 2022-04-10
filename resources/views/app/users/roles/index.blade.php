@extends('layouts.baselayout')

@section('content')


    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Rôles</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('app.index')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Employés</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('users.roles.index')}}">Rôles</a>
                            </li>
                            <li class="breadcrumb-item active">Liste Des Rôles
                            </li>
                        </ol>
                    </div>
                    <div class="col m6 l6 ">
                        <a class="display-flex  btn btn-small waves-effect waves-light gradient-45deg-light-blue-cyan mt-8 right animated fadeInLeftBig border-round"
                           href="{{route('users.roles.create')}}">
                            Ajouter<i class="material-icons">add</i>
                        </a>
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
                                    <form action="{{route('users.roles.index')}}" method="get">
                                        @csrf
                                        <div class="col s12 m6 l6">
                                            <div class="input-field display-flex align-items-baseline">
                                                <input id="search" type="text" name="search" class="search-area" placeholder="Rechercher et Entrer">
                                                <div class="mt-2">
                                                    <button type="submit"
                                                            class="btn-floating waves-effect waves-light gradient-45deg-light-blue-cyan">
                                                        <i class="material-icons">search</i>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="responsive-table">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Rôle</th>
                                            <th>Déscription</th>
                                            <th>Permissions</th>
                                            <th>Employés</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $index=>$role)
                                                    @if(auth()->user()->hasRole('super_admin'))
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $role->name}}</td>
                                                            <td>{{ $role->description}}</td>
                                                            <td>
                                                                @if($role->Permissions)
                                                                    @foreach($role->Permissions as $permission)

                                                                        <span class="badge gradient-45deg-purple-deep-orange gradient-shadow"
                                                                              style="border-radius: 10px;font-size: 0.7rem">{{$permission->display_name}}</span>

                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <strong class="font-weight-bold">{{ $role->users()->count() }}</strong>
                                                            </td>
                                                            <td class="display-flex">
                                                                <a href="{{route('users.roles.edit',$role->id)}}"
                                                                   class="pr-5 mt-2"
                                                                   data-toggle="tooltip" title="modifier"><i
                                                                            class="material-icons">edit</i></a>


                                                                <form action="{{route('users.roles.destroy',$role->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    <button type="submit"
                                                                            class="btn-small btn-floating waves-effect waves-light red accent-2"
                                                                            data-toggle="tooltip"
                                                                            title="supprimer"><i class="material-icons">delete_forever</i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                    @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                {{$roles->links()}}
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
