@extends('layouts.baselayout')

@section('content')

    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Créer</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('app.index')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clients</a>
                            </li>
                            <li class="breadcrumb-item active">créer
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
                                    <h4 class="card-title">Créer Un Nouveau Client</h4>
                                    <form action="{{route('clients.store')}}" method="post">
                                        @csrf

                                        {{--row 1--}}
                                        <div class="row">

                                            {{--Name--}}
                                            <div class="input-field col m6 s12">
                                                <input id="name" type="text"
                                                       class="@error('name') is-invalid @enderror" name="name"
                                                       value="{{old('name')}}" required>
                                                <label for="name">Nom <span class="red-text">*</span></label>
                                                @error('name')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{--phone--}}
                                            <div class="input-field col m6 s12">
                                                <input id="phone" type="number"
                                                       class="@error('phone') is-invalid @enderror" name="phone"
                                                       value="{{old('phone')}}">
                                                <label for="phone">Tél </label>
                                                @error('phone')
                                                <span class="red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                        </div>

                                        {{--row 2--}}
                                        <div class="row">

                                            {{--address--}}
                                            <div class="input-field col m12 s12">
                                                <input id="address" type="text"
                                                       class="@error('name') is-invalid @enderror" name="address"
                                                       value="{{old('address')}}">
                                                <label for="address">Adresse</label>
                                                @error('address')
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
                                                            type="submit">Créer
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