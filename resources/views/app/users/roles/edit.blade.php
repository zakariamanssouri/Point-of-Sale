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
                            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Employés</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('users.roles.index')}}">Rôles</a>
                            </li>
                            <li class="breadcrumb-item active">mofidier
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
                                    <h4 class="card-title">Modifier le Rôle {{$role->name}}</h4>
                                    <form action="{{route('users.roles.update',$role->id)}}" id="create-role-form" method="post">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="row">
                                            {{--first name field--}}
                                            <div class="input-field col m6 s12">
                                                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{$role->name}}">
                                                <label for="name" >Name</label>
                                                @error('name')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <input id="description" name="description" type="text"
                                                       class="@error('description') is-invalid @enderror"
                                                       description="description" value="{{$role->description}}">
                                                <label for="description">Déscription</label>
                                                @error('description')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        @php
                                            $models = ['users','categories','products','clients','orders'];
                                            $maps = ['create','read','update','delete']
                                        @endphp
                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                <table class="mt-1">
                                                    <thead>
                                                    <tr>
                                                        <th>Permissions</th>
                                                       @foreach($maps as $map)
                                                           <th> @if($map=='create')
                                                                   Créer
                                                               @elseif($map=='read')
                                                                   Afficher
                                                               @elseif($map=='update')
                                                                   Modifier
                                                               @elseif($map=='delete')
                                                                   Supprimer
                                                               @else $map
                                                               @endif</th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($models as $model)
                                                        <tr>
                                                            <td>{{$model}}</td>
                                                            @foreach($maps as $map)
                                                            <td>
                                                                <label>
                                                                    <input type="checkbox"  name="permissions[]" {{$role->hasPermission($map.'_'.$model)? 'checked' : '' }} value=" {{$map.'_'.$model}}">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                                @endforeach
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- </div> -->

                                        <div class="row  animated bounceInLeft ">
                                            <span class="ml-2 red-text " id="erros-checkinput"></span>
                                        </div>
                                        <div class="row">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button onclick="validateMyForm()" class="btn cyan waves-effect waves-light right"
                                                            type="submit">Submit
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
