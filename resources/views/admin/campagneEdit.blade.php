@extends('master')
@section('title_header')
   <h2> CAMPAGNES </h2>
@endsection
@section('content')
<div class="row">
    @foreach ($campagne as $selectedCampagne)

            <div class=" col-md-12">
                    
                <form class="d-flex justify-content-center" method="post" action={{url('admin/campagne/update/'.$selectedCampagne->id)}}>
                    <!-- Default input -->
                    @csrf

                    <div class="row p-3">
                        <div class="col-md-12 text-center">
                                <h2 >Mettre à jour la  Campagne {{$selectedCampagne->nom}}</h2>
                        </div>
                        <div class="col-md-12">
                            <input name="nomC" type="text" value="{{$selectedCampagne->nom}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="objC" type="text" value="{{$selectedCampagne->objet}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="lienC" type="text" value="{{$selectedCampagne->lien}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="debutC" type="date" value="{{$selectedCampagne->date_debut}}" aria-label="Search" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <input name="finC" type="date" value="{{$selectedCampagne->date_fin}}" aria-label="Search" class="form-control">
                        </div>
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
