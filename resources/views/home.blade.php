@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header " style="background-color: #5F9930">
                        <h6 class="text-light">Candidatures</h6>

                        {{-- <h6 class="text-light">{{ strtoupper(Auth::user()->nom . ' ' . Auth::user()->prenom) }}</h6> --}}
                    </div>

                    <div class="card-body">

                        {{-- <canvas id="myChart"></canvas> --}}
                        <div class="col-md-12">
                            {{-- <h2 class="text-center">candidatures</h2> --}}
                        </div>
                        <div class="col-md-12 ">
                            <table class="table table-responsive">
                                <thead>
                                    <th>Nom Prenom </th>
                                    <th>Date de naissance </th>
                                    <th>Telephone</th>
                                    <th>Genre </th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Formation</th>
                                    <th>Niveau d'etude</th>
                                    <th>Organisation</th>
                                    <th>Actif</th>
                                    <th>Pratique</th>
                                </thead>
                                <tbody>
                                    @foreach ($candidatures as $profil)
                                        <tr>
                                            <td> {{ $profil->prenom }} {{ $profil->nom }}</td>
                                            <td>{{ $profil->dt_naiss }}</td>
                                            <td>{{ $profil->tel }}</td>
                                            <td>{{ $profil->genre }}</td>
                                            <td>{{ $profil->email }}</td>
                                            <td>{{ $profil->localite }}</td>
                                            <td>{{ $profil->formation }}</td>
                                            <td>{{ $profil->niveau_etu }}</td>
                                            <td>{{ $profil->organisation }}</td>


                                            @if ($profil->formation == 1)
                                                <td>OUI</td>
                                            @else
                                                <td>NON</td>
                                            @endif

                                            @if ($profil->niveau_etu == 1)
                                                <td>OUI</td>
                                            @else
                                                <td>NON</td>
                                            @endif
                                         
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-body">
                    <ul class="list-group">
                        @foreach ($candidatures as $candidature)
                            <li class="list-group-item"><button type="button" class="btn btn-link" data-toggle="modal" data-target="#{{$candidature->cnom}}">
                              {{$candidature->cnom}}</button></li>
                            <div class="modal fade" id="{{$candidature->cnom}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{$candidature->nom}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            <li class="list-group-item"><p>NOM :</p>
                                                <p class='text-secondary'>{{$candidature->nom}}</p>
                                            </li>
                                            <li class="list-group-item"><p>PRENOM :</p>
                                                <p class='text-secondary'>{{$candidature->prenom}}</p>
                                            </li>
                                            <li class="list-group-item"><p>DATE DE NAISSANCE :</p>
                                                <p class='text-secondary'>{{$candidature->dt_naiss}}</p>
                                            </li>
                                            <li class="list-group-item"><p>CATEGORIE SOCIOPROFESSIONNELLE :</p>
                                                <p class='text-secondary'>{{$candidature->profil_social}}</p>
                                            </li>
                                            <li class="list-group-item"><p>NIVEAU D'ETUDE :</p>
                                                <p class='text-secondary'>{{$candidature->niveau_etu}}</p>
                                            </li>
                                            <li class="list-group-item"><p>TÉLÉPHONE :</p>
                                                <p class='text-secondary'>{{$candidature->tel}}</p>
                                            </li>
                                            <li class="list-group-item"><p>EMAIL :</p>
                                                <p class='text-secondary'>{{$candidature->email}}</p>
                                            </li>
                                            <li class="list-group-item"><p>REGION :</p>
                                                <p class='text-secondary'>{{$candidature->reg}}</p>
                                            </li>
                                            <li class="list-group-item"><p>DEPARTEMENT :</p>
                                                <p class='text-secondary'>{{$candidature->dept}}</p>
                                            </li>
                                            <li class="list-group-item"><p>COMMUNE :</p>
                                                <p class='text-secondary'>{{$candidature->com}}</p>
                                            </li>
                                            <li class="list-group-item"><p>LOCALITE :</p>
                                                <p class='text-secondary'>{{$candidature->loc}}</p>
                                            </li>
                                            <li class="list-group-item"><p>ETAT :</p>
                                                <p class='text-secondary'>{{$candidature->state}}</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </ul>


                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
