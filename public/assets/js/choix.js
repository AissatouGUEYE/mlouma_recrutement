$(document).ready(function () {
    $("#form").click(function () {
        checked = $("input[type=checkbox]:checked").length;

        if (!checked) {
            alert("Veuillez choisir une langue au moins.");
            return false;
            // return confirm('ok');
        } else {
            return confirm("Voulez-vous confirmer votre inscription ?");
        }
    });

    $("#form_resop").click(function () {
        return confirm("Voulez-vous confirmer votre inscription ?");
    });

    $("#ps").on("change", function () {
        var chx = $(this).val();
        if (chx == 3) {
            $("#ps").append(
                "<option><form> <input type='text'></form></option>"
            );
            // alert('AUTRE') ;
        }
    });

    $("#region").on("change", function () {
        var reg = $(this).val();
        //alert(reg);

        $.ajax({
            type: "GET",
            url: "/candidature/choixreg/" + reg,
            dataType: "json",
            success: function (resultat) {
                $("#departement").empty();
                $("#departement").append(
                    "<option value=''>Choisissez un département </option>"
                );

                if (resultat.length != 0) {
                    $.each(resultat, function (i, val) {
                        $("#departement").append(
                            "<option value='" +
                                val.id +
                                "'> " +
                                val.nom +
                                " </option>"
                        );
                    });
                } else {
                    $("#departement").empty();
                    $("#departement").append(
                        "<option value=''> Pas de département pour ce département </option>"
                    );
                }
            },
            error: function () {
                alert("Erreur, merci de contacter l'administrateur .");
            },
        });
    });

    $("#departement").on("change", function () {
        var dept = $(this).val();
        //        alert(dept);

        $.ajax({
            type: "GET",
            url: "/candidature/choixdept/" + dept,
            dataType: "json",
            success: function (resultat) {
                $("#commune").empty();
                $("#commune").append(
                    "<option value=''> Choisissez une commune </option>"
                );

                if (resultat.length != 0) {
                    $.each(resultat, function (i, val) {
                        $("#commune").append(
                            "<option value='" +
                                val.id +
                                "'> " +
                                val.nom +
                                " </option>"
                        );
                    });
                } else {
                    $("#commune").empty();
                    $("#commune").append(
                        "<option value=''> Pas de commune pour ce département </option>"
                    );
                }
            },
            error: function () {
                alert("Erreur, merci de contacter l'administrateur .");
            },
        });
    });

    //input aavec enter

    $("#commune").on("change", function () {
        var comm = $(this).val();
        //        alert(comm);
        $.ajax({
            type: "GET",
            url: "/candidature/choixcomm/" + comm,
            dataType: "json",
            success: function (resultat) {
                $("#localite").empty();
                $("#localite").append(
                    "<option value=''> Choisissez une localité </option>"
                );

                if (resultat.length != 0) {
                    $.each(resultat, function (i, val) {
                        $("#localite").append(
                            "<option value='" +
                                val.id +
                                "'> " +
                                val.nom +
                                " </option>"
                        );
                    });
                } else {
                    $("#localite").empty();
                    $("#localite").append(
                        "<option value=''> Pas de localité pour cette commune </option>"
                    );
                }
            },
            error: function () {
                alert("Erreur, merci de contacter l'administrateur d.");
            },
        });
    });
    return false;
});
