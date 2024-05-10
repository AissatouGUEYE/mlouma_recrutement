$(document).ready(function(){
    $('#state').on("change",function(){

        var vlue = $(this).val();
        var existe = $('#exist')
        if(vlue == 3 && existe.attr('id') !== 'exist'){
            $(this).after("<div id='comment' class='col-md-12 mt-3'><input name='comment' placeholder='Commentaires' type='text'  class='form-control'></div>")
        }
        else{
            $('#comment').attr('hidden',true);


        }
    })

    $("a.candidatsCampagn").on("click", function(){
        var $row = $(this).closest('tr');

        // var id = $(this).data('id');
        var idCampagne = $row.find('.campagneid').text();
        // var dob = $row.find('.dob').val();
        // var address = $row.find('.address').val();
        //var idCampagne = $("#campagneid").attr("id");

//alert(reg);

        $.ajax({
            type: "GET",
            url: "admin/campagne/candidats/"+idCampagne,
            dataType: "json",
            success: function(resultat){
                $("#candidats").empty();
                // $("#departement").append("<option value=''>Choisissez un département </option>");

                if(resultat.length != 0){
                    $.each(resultat, function(i, val){
                        $("#candidats").append("<tr><td class='id' hidden >"+val.id+"</td><td>"+val.nom+
                        "</td><td>"+val.prenom+
                        "</td><td>"+val.dt_naiss+
                        "</td><td>"+val.mail+
                        "</td><td>"+val.tel+
                        "</td><td>"+val.langue+
                        "</td><td>"+val.profil_social+
                        "</td><td>"+val.niveau+
                        "</td><td>"+val.filiere+
                        "</td><td>"+val.eno+
                        "</td><td><a target='_blank'  href='/assets/cv/"+val.cv+"'>"+val.cv+
                        "</a></td><td><a target='_blank'  href='/assets/lm/"+val.lm+"'>"+val.lm+
                        "</a></td><td><a target='_blank'  href='/assets/pp/"+val.pp+"'>"+val.pp+
                        "</a></td><td>"+val.rnom+
                        "</td><td>"+val.d+
                        "</td><td>"+val.c+
                        "</td><td>"+val.l+
                        "</td><td>"+val.etat+
                        "</td><td>"+val.commentaire+
                        "</td><td><a onclick='return confirm('voulez-vous supprimer cet élément ?');' href='admin/candidature/edit/"+val.id+"' target='_blank'  >Traiter</a></td><td><a href='admin/candidature/"+val.id+"'  class='del'  >Supprimer</a></td></tr>"

                        );
                    });
                    $('#candidatsList').show() ;
                } else{
                    $("#candidats").empty();
                    $("#candidats").append("<span value=''> Pas de candidats pour cette campagne </span>");
                }
            },
            error: function(){
                alert("Erreur, merci de contacter l'administrateur .");
            }
        });
        //  alert(idCampagne) ;
         $('#candidatsList').attr("hidden",false);
    });
    
    //update

    //suppression
    $("a.delete").on("click", function(){

        //  alert(idCampagne) ;
        return confirm('Voulez-vous supprimer ce profil ?');

    });


    $("#departement").on("change", function(){
        var dept = $(this).val();
//        alert(dept);

        $.ajax({
            type: "GET",
            url: "/candidature/choixdept/"+dept,
            dataType: "json",
            success: function(resultat){
                $("#commune").empty();
                $("#commune").append("<option value=''> Choisissez une commune </option>");

                if(resultat.length != 0){
                    $.each(resultat, function(i, val){
                        $("#commune").append("<option value='"+val.id+"'> "+val.nom+" </option>");
                    });
                } else{
                    $("#commune").empty();
                    $("#commune").append("<option value=''> Pas de commune pour ce département </option>");
                }
            },
            error: function(){
                alert("Erreur, merci de contacter l'administrateur .");
            }
        });
    });

    //input aavec enter







    $("#commune").on("change", function(){
        var comm = $(this).val();
//        alert(comm);
        $.ajax({
            type: "GET",
            url: "/candidature/choixcomm/"+comm,
            dataType: "json",
            success: function(resultat){
                $("#localite").empty();
                $("#localite").append("<option value=''> Choisissez une localité </option>");

                if(resultat.length != 0){
                    $.each(resultat, function(i, val){
                        $("#localite").append("<option value='"+val.id+"'> "+val.nom+" </option>");

                    });
                } else{
                    $("#localite").empty();
                    $("#localite").append("<option value=''> Pas de localité pour cette commune </option>");

                }
            },
            error: function(){
                alert("Erreur, merci de contacter l'administrateur d.");
            }
        });
    });
    return false;
});
