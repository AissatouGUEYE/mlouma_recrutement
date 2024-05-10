@extends('master')
@section('title_header')
   <h2> CAMPAGNES </h2>
@endsection
@section('content')
<div class="row">
            <div class=" col-md-12">
                <form class="d-flex justify-content-center" method="post" action={{url('admin/campagne/new')}}>
                    <!-- Default input -->
                    @csrf

                    <div class="row p-3">
                        <div class="col-md-12 text-center">
                                <h2 >Nouvelle Campagne</h2>
                        </div>
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert" data-dismiss="alert">
                            <strong>{{session('success')}}</strong>
                        </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert" data-dismiss="alert">
                                <strong>{{session('error')}}</strong>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <input name="nomC" type="text" placeholder="Nom de la campagne" aria-label="Search" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="objC" type="text" placeholder="Objet de campagne" aria-label="Search" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="lienC" type="text" placeholder="Lien" aria-label="Search" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="debutC" type="date" placeholder="Debut de la campagne" aria-label="Search" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="finC" type="date" placeholder="Fin de la campagne" aria-label="Search" class="form-control" required>
                        </div>
                        {{-- <div class="col-md-12">
                            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        </div> --}}
                        <div class="col-md-6 p-3 mx-auto">
                            <button class="create col-md-12 btn btn-success btn-sm my-0 p " type="submit" style="color:#ffffff;">
                                Ajouter
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
                    <h2 class="text-center">Campagnes</h2>
                  </div>
                  <div class="col-md-12 ">
                    <table  class="table table-responsive">
                        <thead>
                            <th>Campagnes en cours </th>
                            <th>Debut </th>
                            <th>Fin</th>
                            <th>En savoir plus</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>



                        </thead>
                        <tbody >
                            @foreach ($campagnes as $campagne)


                          <tr>
                              {{-- <td id="campagneid"> {{$campagne->id}}</td> --}}
                              <td><a class="candidatsCampagn" href="#candidatsList" > {{$campagne->nom}}</a></td>
                              <td class="campagneid" hidden > {{$campagne->id}}</td>
                              <td>{{date_format(new Datetime($campagne->date_debut),'d-m-Y')}}</td>
                              <td>{{date_format( new Datetime($campagne->date_fin),'d-m-Y')}}</td>
                              <td><a class="" href="{{$campagne->lien}}" target="_blank">{{$campagne->lien}}</a></td>
                              <td><a id="edit" class="text-warning" href="{{url('admin/campagne/edit/'.$campagne->id)}}" target="_blank">Modifier</a></td>
                              <td><a onclick="return confirm('voulez-vous supprimer cet élément ?');" class=" text-danger" href="{{url('admin/campagne/delete/'.$campagne->id)}}">Supprimer</a></td>


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

        <div id="candidatsList" class=" row wow fadeIn" hidden>

            <!--Grid column-->
            <div class="col-md-12 mb-4">

              <!--Card-->
              <div class="card">

                <!--Card content-->
                <div class="card-body">

                  {{-- <canvas id="myChart"></canvas> --}}
                  <div class="col-md-12">
                    <h2 class="text-center">Candidats</h2>
                  </div>
                  <div class="col-md-12">
                    <table id="tab" class="table table-responsive">
                        <thead>
                            <th>Nom </th>
                            <th>Prenom </th>
                            <th>Date de naissance</th>
                            <th>email</th>
                            <th>téléphone </th>
                            <th>Langues </th>
                            <th>Profil social</th>
                            <th>Niveau d'étude</th>
                            <th>Filiéres</th>
                            <th>ENOS</th>
                            <th>CV </th>
                            <th>Lettre de motivation </th>
                            <th>photo </th>
                            <th>Régions </th>
                            <th>Départements </th>
                            <th>Communes </th>
                            <th>Localités </th>
                            <th>Etat </th>
                            <th>Commentaire </th>
                            <th>Traiter </th>
                            <th>Supprimer </th>


                        </thead>
                        <tbody id='candidats'>
                            {{-- @foreach ($campagnes as $campagne)


                            <tr>
                                <td>{{$campagne->nom}}</td>
                                <td>{{date_format(new Datetime($campagne->date_debut),'d-m-Y')}}</td>
                                <td>{{date_format( new Datetime($campagne->date_fin),'d-m-Y')}}</td>
                                <td><a class="btn btn-link"href="{{$campagne->lien}}" target="_blank">{{$campagne->lien}}</a></td>
                                <td><a class="btn btn-link"href="{{$campagne->lien}}" target="_blank"><i class="fa fa-edit"></i></a></td>


                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                </div>

              </div>

              <!--/.Card-->

            </div>

@endsection
