@extends('master')
@section('title_header')
   <h2> Utilisateurs </h2>
@endsection
@section('content')
<div class="row">
            <div class=" col-md-12">
                @foreach ($profils as $profil)

                    <form class="d-flex justify-content-center" method="get" action="{{url('/admin/users/update/'.$profil->pid)}}">
                        <!-- Default input -->
                        @csrf
                        <div class="row p-3">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert" data-dismiss="alert">
                                <strong>{{session('success')}}</strong>
                            </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert" data-dismiss="alert">
                                    <strong>{{session('error')}}</strong>
                                </div>
                            @endif
                            <div class="col-md-12 text-center">
                                    <h2 >Actualiser le profil de {{$profil->nom." ".$profil->prenom }}</h2>
                            </div>
                            <div class="col-md-12">

                                    <select id="user" class="selectpicker username form-control" data-live-search="true" name="user" id="" required>
                                        <option value="{{$profil->id_user}}">{{$profil->prenom." ".$profil->nom}}</option>
                                            
                                            @foreach ($users as $user)
                                                @if ($profil->id_user != $user->id)
                                                    <option value="{{ $user->id }}">{{ $user->nom.' '.$user->prenom }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <select id="role" class="selectpicker form-control" data-live-search="true" id="exampleInput1" name="role" id="" required>
                                    <option value="{{$profil->id_role}}">{{$profil->designation}}</option>
                                        @foreach ($roles as $role)
                                            
                                            @if ($profil->id_role != $role->id)
                                                @if ($role->id != 1)
                                                    <option value="{{ $role->id }}">{{ $role->designation }}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                </select>

                            </div>
                            {{-- <div class="col-md-12 mt-3">
                                <input type="text" placeholder="Lien" aria-label="Search" class="form-control">
                            </div>
                            <div class="col-md-12 mt-3">
                                <input type="date" placeholder="Debut de la campagne" aria-label="Search" class="form-control">
                            </div>
                            <div class="col-md-12 mt-3">
                                <input type="date" placeholder="Fin de la campagne" aria-label="Search" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                            </div> --}}
                            <div class="col-md-6 p-3 mx-auto">
                                <button id="update" class=" btn-success col-md-12 btn  btn-sm my-0 p" type="submit" style="color:#ffffff;">
                                    Actualiser le profil
                                </button>
                            </div>

                        </div>

                    </form>

                    @endforeach
      
            </div>
           
        </div>
        


@endsection
