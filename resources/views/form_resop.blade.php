<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PROJET « Contribuer à l’autonomisation économique des jeunes ruraux par
        l'insertion socio-professionnelle dans les filières agro-sylvo-pastorales »| FORMULAIRE</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('assets/css/FAVICO1.ico') }}" type="image/gif" sizes="16x16">

    <!-- Font-->
    <link href="{{ asset('assets/css/montserrat-font.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}"
        rel="stylesheet">
    <!-- Main Style Css -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body class="form-v10 d-flex-justify-content-center">



    <div class="page-content">

        <div class="form-v10-content ">
            <div class="">
                <div class=" ">

                    <div class="text-center">
                        <div class="d-flex-inline p-2">
                            <a href="{{ url('/') }}"><img class="img-responsive img-fluid"
                                    src="{{ asset('assets/css/mlouma.png') }}" alt=""></a>
                        </div>
                        <h4 class="">PLATEFORME DE CANDIDATURE DES JEUNES</h4>
                        <h6>PROJET « Contribuer à l’autonomisation économique des jeunes ruraux par
                            l'insertion socio-professionnelle dans les filières agro-sylvo-pastorales »</h6>
                    </div>
                </div>
            </div>
            <form class="form-detail" action="{{ url('/candidature_resop/store') }}" method="post"
                enctype="multipart/form-data" id="myform_resop">
                @csrf
                <div class="form-left">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert" data-dismiss="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert" data-dismiss="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                    <h2>Informations Personnelles</h2>


                    <div class="form-group">
                        <div class="form-row">
                            <input type="text" name="prenom" id="first_name" class="input-text" placeholder="Prénom"
                                required>
                        </div>
                        <div class="form-row ">
                            <input type="text" name="nom" id="last_name" class="input-text" placeholder="Nom"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <input type="text" name="dt_naiss" id="first_name" class="input-text"
                                placeholder="Date de naissance" onfocus="(this.type='date')" required>
                        </div>


                        {{-- <span class="d-flex justify-content-end">langue</span> --}}
                        <div class="form-checkbox">

                            <label class="container ">
                                <p class="text-dark">M</p>
                                <input type="radio" name="genre" value="M">
                                <span class="checkmark"></span>

                            </label>

                        </div>
                        <div class="form-checkbox">
                            <label class="container ">
                                <p class="text-dark">F</p>
                                <input type="radio" name="genre" value="F">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                    </div>
                    <div class="form-row" id="">
                        <select name="niv">

                            <option value="">Sélectionner votre niveau d'études</option>
                            @foreach ($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->niveau }}</option>
                            @endforeach
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>

                    <div class="form-row" id="">
                        <select name="formation">

                            <option value="">Sélectionner votre secteur</option>
                            @foreach ($formations as $formation)
                                <option value="{{ $formation->id }}">{{ $formation->formation }}</option>
                            @endforeach
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>

                    <div class="form-row">
                        <select name="organisation">
                            <option value="">Sélectionner votre organisation</option>
                            @foreach ($organisations as $organisation)
                                <option value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                            @endforeach
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>
                    <div>
                        <p style="padding: 0px 0px 0px 40px " class="text-dark ">
                            Etes-vous actuellement en activité dans le domaine choisi ?</p>

                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-checkbox">
                                <label class="container ">
                                    <p class="text-dark">Oui</p>
                                    <input type="radio" name="activite" value="1">
                                    <span class="checkmark"></span>

                                </label>

                            </div>
                            <div class="form-checkbox">

                                <label class="container ">
                                    <p class="text-dark">Non</p>
                                    <input type="radio" name="activite" value="0">
                                    <span class="checkmark"></span>

                                </label>

                            </div>

                        </div>
                    </div>

                    <div>
                        <p style="padding: 0px 0px 0px 40px " class="text-dark ">
                            Avez-vous déjà pratiqué cette activité ?</p>

                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-checkbox">
                                <label class="container ">
                                    <p class="text-dark">Oui</p>
                                    <input type="radio" name="pratique" value="1">
                                    <span class="checkmark"></span>

                                </label>

                            </div>
                            <div class="form-checkbox">

                                <label class="container ">
                                    <p class="text-dark">Non</p>
                                    <input type="radio" name="pratique" value="0">
                                    <span class="checkmark"></span>

                                </label>

                            </div>

                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <div class="form-row form-row-1">
                            <input id="cv" type="text" name="cv" class="" placeholder="Cv"
                                onfocus="(this.type='file')" accept=".doc,.docx,.jpeg,.pdf">
                        </div>

                    </div> --}}
                </div>
                <div class="form-right">
                    <h2>Contacts </h2>
                    <div class="form-row">
                        <input type="number" name="tel" class="" id="phone"
                            placeholder="Téléphone (WhatsApp)" required>
                        {{-- </div> --}}
                    </div>
                    <div class="form-row">

                        <input type="text" name="email" id="your_email" class="input-text" required
                            pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email">

                    </div>
                    <div class="form-row">
                        <select name="region" id="region" required>
                            <option value="">--Sélectionner la Région--</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->nom }}</option>
                            @endforeach
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>
                    {{-- </div> --}}
                    <div class="form-row">
                        <select name="dept" id="departement">
                            <option value="">--Sélectionner le Département--</option>
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>
                    <div class="form-row">
                        <select name="commune" id="commune">
                            <option value="">--Sélectionner le commune--</option>
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>
                    <div class="form-row">
                        <select name="localite" id="localite">
                            <option value="">--Sélectionner la localité--</option>
                        </select>
                        <span class="select-btn">
                            <i class="zmdi zmdi-chevron-down"></i>
                        </span>
                    </div>
                    <div class="form-checkbox">
                        <label class="container">
                            <p>Je déclare avoir lu et accepté les <a href="#" class="text">conditions
                                    générales d’utilisation</a> et les <a href="#" class="text">règles de
                                    confidentialités</a> du site.</p>
                            <input type="radio" name="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="form-row-last">
                        <input id="form_resop" type="submit" name="register" class="register" value="Soumettre">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script src="{{ asset('assets/js/choix.js') }}"></script>

</html>
