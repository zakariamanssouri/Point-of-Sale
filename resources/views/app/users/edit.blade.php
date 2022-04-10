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
                            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Employés</a>
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
                                    <h4 class="card-title">Modifier
                                        L'employé(e) {{$user->first_name .' '. $user->last_name}}</h4>
                                    <form action="{{route('users.update',$user->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <div class="row">
                                            {{--first name field--}}
                                            <div class="input-field col m6 s12">
                                                <input id="first_name" type="text"
                                                       class="@error('name') is-invalid @enderror" name="first_name"
                                                       value="{{$user->first_name}}">
                                                <label for="first_name">Prénom</label>
                                                @error('first_name')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{--last name field--}}

                                            <div class="input-field col m6 s12">
                                                <input id="last_name" type="text"
                                                       class="@error('name') is-invalid @enderror" name="last_name"
                                                       value="{{$user->last_name}}">
                                                <label for="last_name">Nom</label>
                                                @error('last_name')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input id="cin" type="text" class="@error('name') is-invalid @enderror"
                                                       name="cin" value="{{$user->cin}}">
                                                <label for="cin">CIN</label>
                                                @error('cin')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <input id="phone" type="number"
                                                       class="@error('name') is-invalid @enderror" name="phone"
                                                       value="{{$user->phone}}">
                                                <label for="phone">Numéro de Tél</label>
                                                @error('phone')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input id="email" type="email"
                                                       class="@error('name') is-invalid @enderror" name="email"
                                                       value="{{$user->email}}">
                                                <label for="email">Email</label>
                                                @error('email')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <select class="select2 browser-default" multiple="multiple"
                                                            name="role[]" class="@error('name') is-invalid @enderror">
                                                        <optgroup label="rôles">
                                                            @foreach($roles as $role)
                                                                <option value="{{ $role->name }}"> {{ $role->name }} </option>
                                                            @endforeach</optgroup>
                                                    </select>
                                                    <label>Rôle</label>
                                                    @error('role')
                                                    <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <input id="password" type="password"
                                                       class="@error('name') is-invalid @enderror" name="password">
                                                <label for="password">Mot de pass</label>
                                                @error('password')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <input id="password_confirmation" type="password"
                                                       class="@error('name') is-invalid @enderror"
                                                       name="password_confirmation">
                                                <label for="password_confirmation">Confirmation mot de pass</label>
                                                @error('password_confirmation')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--Image--}}
                                        <div class="row">
                                            <div class="col s12 m6 l6">
                                                <div class="file-field input-field">
                                                    <div class="btn btn-sm waves-effect waves-light">
                                                        <span>Image</span>
                                                        <input type="file" name="image"
                                                               class="@error('name') is-invalid @enderror image">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" readonly
                                                               placeholder="Séléctionner une image">
                                                    </div>
                                                    @error('image')
                                                    <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        {{--Image preview--}}
                                        <div class="row">
                                            <div class="input-field col s12 m12 l12">
                                                <img src="{{$user->image_path}}" class="img-thumbnail image-preview"
                                                     style="width: 100px" alt="">
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


@section('js')
    <script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/form-select2.js')}}"></script>
@endsection