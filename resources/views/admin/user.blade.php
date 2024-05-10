@extends('master')
@section('title_header')
   <h2> Utilisateurs </h2>
@endsection
@section('content')
<div class="row">
            <div class=" col-md-12">
                <form class="d-flex justify-content-center" method="POST" action="{{url('/admin/users/create')}}">
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
                                <h2 >Nouvel Utilisateur</h2>
                        </div>
                        <div class="col-md-12">
                            <select id="user" class="selectpicker username form-control" data-live-search="true" name="user" id="" required>
                                <option value="">Utilisateur</option>
                                @foreach ($users as $user)
                                   <option value="{{$user->id}}">{{$user->prenom." ".$user->nom}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <select id="role" class="selectpicker form-control" data-live-search="true" id="exampleInput1" name="role" id="" required>
                                <option value="">Role</option>
                                @foreach ($roles as $role)
                                    @if ($role->id != 1 )
                                        <option value="{{$role->id}}">{{$role->designation}}</option>
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
                            <button id="" class="create btn-success col-md-12 btn  btn-sm my-0 p" type="submit" style="color:#ffffff;">
                                Ajouter le profil
                            </button>
                        </div>

                    </div>

                  </form>

            </div>

        </div>

        <div id="" class=" row wow fadeIn" >

            <!--Grid column-->
            <div class="col-md-10 mb-4 mx-auto">

              <!--Card-->
              <div class="card">

                <!--Card content-->
                <div class="card-body">

                  {{-- <canvas id="myChart"></canvas> --}}
                  <div class="col-md-12">
                    <h2 class="text-center">Utilisateurs</h2>
                  </div>
                  <div class="col-md-12 ">
                    <table  class="table table-responsive">
                        <thead>
                            <th>Nom  </th>
                            <th>Prenom </th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Role</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody >
                            @foreach ($profils as $profil)


                                    <tr>
                                        <td class="userId" hidden>{{$profil->pid}}</td>
                                        <td>{{$profil->nom}}</td>
                                        <td>{{$profil->prenom}}</td>
                                        <td>{{$profil->mail}}</td>
                                        <td>{{$profil->login}}</td>
                                        <td>{{$profil->designation}}</td>

                                        {{-- <td>{{date_format(new Datetime($campagne->date_debut),'d-m-Y')}}</td>
                                        <td>{{date_format( new Datetime($campagne->date_fin),'d-m-Y')}}</td> --}}
                                        <td><a onclick="return confirm('voulez-vous modifier ce profil ?');" class=" text-warning " href="{{url('/admin/users/edit/'.$profil->pid)}}" target="_blank"><span class="">Modifier</span></a></td>
                                        <td><a onclick="return confirm('voulez-vous supprimer ce profil ?');" class="suppress text-danger" href="{{url('/admin/users/del/'.$profil->pid)}}" >Supprimer</a></td>


                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>

              </div>

              <!--/.Card-->

            </div>
        </div>

       
@endsection
