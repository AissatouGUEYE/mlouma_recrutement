<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v10 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
    <link href="{{asset('assets/css/montserrat-font.css') }}" rel="stylesheet">
	<link href="{{asset('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <!-- Main Style Css -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background-color:#EFF1F2" >

        <div class="col-md-12  container ">
            <div class="col-md-12 row  d-flex justify-content-center">
                                <div class="card col-md-3 ml-5 " style="background-color: #5F9930">
                                        <div class="card-header">
                                            <h4 class="card-title text-light">Nombre d'inscrits</h4>

                                        </div>
                                        <div>
                                            <h1 class="text-light">{{$candidates}}</h1>
                                        </div>

                                </div>
                                {{-- <div class="card col-md-3 ml-5 bg-warning" >
                                        <div class="card-header">
                                            <h4 class="card-title text-light">Infos 1</h4>

                                        </div>
                                        <div>
                                            <h1 class="text-light">300</h1>
                                        </div>
                                </div>
                                <div class="card col-md-3 ml-5" >

                                        <div class="card-header">
                                            <p class="card-title">Infos 1</p>

                                        </div>
                                        <div>
                                            <h1>300</h1>
                                        </div>
                                 </div> --}}
            </div>
        </div>
        <div class="container  mt-5 align-items-center">
               <div class="card col-md-12  align-items-center">

                        <div class="col-md-12 mt-5 align-items-center">


                                <table   class="t table mt-5">
                                <thead class="bg-light">
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Date de naissance </th>
                                            <th>Adresse</th>
                                            <th>Langues</th>
                                            <th>ENO</th>
                                            <th>Filières</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>

                                        </tr>
                                </thead>
                                <tbody class="bg-light">

                                    @foreach ($candidatures as $candidature)
                                        <tr>



                                                    <td>{{$candidature->nom}}</td>
                                                    <td>{{$candidature->prenom}}</td>
                                                    <td>{{$candidature->dt_naiss}}</td>
                                                    <td>{{$candidature->reg ." ".$candidature->dp}}</td>
                                                    <td>


                                                    @foreach (json_decode($candidature->langue) as $langues )

                                                        {{ $langues }}

                                                    @endforeach


                                                    </td>
                                                    <td>{{$candidature->nom_eno}}</td>
                                                    <td>{{$candidature->designation}}</td>
                                                    <td>{{$candidature->tel}}</td>
                                                    <td>{{$candidature->mail}}</td>





                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Date de naissance </th>
                                            <th>Adresse</th>
                                            <th>Langues</th>
                                            <th>ENO</th>
                                            <th>Filières</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>


                                    </tr>
                                </tfoot>
                        </table>
               </div>
     </div>



        </div>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.js">



</script>
<script>
    $(document).ready(function() {
   $('.t').dataTable( {
       responsive: true,


   } );
   table.buttons().container()
         .appendTo( '#t_wrapper .col-md-6:eq(0)' );
 } );
 
</script>
</html>
