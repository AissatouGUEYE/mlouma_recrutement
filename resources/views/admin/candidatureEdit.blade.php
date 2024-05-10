@extends('master')
@section('title_header')
   <h2> candidatureS </h2>
@endsection
@section('content')
<div class="row">
    @foreach ($candidature as $selectedCandidature)

            <div class=" col-md-12">
                    
                <form class="d-flex justify-content-center" method="post" action={{url('admin/candidature/maj/'.$selectedCandidature->id)}}>
                    <!-- Default input -->
                    @csrf

                    <div class="row p-3">
                        <div class="col-md-12 text-center">
                                <h2 >Mettre à jour la  candidature {{$selectedCandidature->nom}}</h2>
                        </div>
                        <div class="col-md-6">
                            <input name="nomC" type="text" value="Nom :{{$selectedCandidature->nom}}" disabled aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input name="nomC" type="text" value="Prénom :{{$selectedCandidature->prenom}}" disabled aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="objC" type="text" value="Date de naissance :{{$selectedCandidature->dt_naiss}}" disabled aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="objC" type="text" value="Genre :{{$selectedCandidature->genre}}" aria-label="Search"  disabled class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="lienC" disabled type="text" value="Categorie socioprofessionnelle :{{$selectedCandidature->profil_social}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="lienC" disabled type="text" value="Langues :{{$selectedCandidature->langue}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="debutC" disabled type="text" value="Téléphone :{{$selectedCandidature->tel}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="finC" disabled type="text" value="Email :{{$selectedCandidature->mail}}" aria-label="Search" class="form-control">
                        </div>
                        
                        <div class="col-md-6">
                            <input name="nomC" disabled type="text" value="Région :{{$selectedCandidature->rnom}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="objC" disabled type="text" value="Département :{{$selectedCandidature->d}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="lienC" disabled type="text" value="Commune :{{$selectedCandidature->c}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <input name="debutC" disabled type="text" value="Localité :{{$selectedCandidature->l}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <select class="col-md-6 form-control" name="etat" id="state">
                                <option value="{{$selectedCandidature->etat}}">{{$selectedCandidature->res}}</option>
                                @foreach ($states as $state )
                                    @if ($selectedCandidature->etat != $state->id)
                                        <option value="{{ $state->id }}">{{$state->state}}</option>
                                    @endif
                                    
                                @endforeach 
                            </select>
                        </div>
                            @if ($selectedCandidature->commentaire != null || empty($selectedCandidature->commentaire) != true)
                            <div id="exist" class="col-md-12 mt-3">
                                <input  name="comments"  type="text" value="{{$selectedCandidature->commentaire}}" aria-label="Search" class="form-control">
                            </div>
                            @endif
                        {{-- <div class="col-md-12">
                            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                        </div> --}}
                        <div class="col-md-6 p-3 mx-auto">
                            <button id="update" class=" col-md-12 btn btn-success btn-sm my- p " type="submit" style="color:#ffffff;">
                                Actualiser
                            </button>
                        </div>

                    </div>

                  </form>


            </div>
            @endforeach

              <!--/.Card-->


@endsection
