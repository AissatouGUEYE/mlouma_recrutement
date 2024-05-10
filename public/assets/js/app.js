$(document).ready(function() {
    $('table').dataTable( {
        responsive: true,
        paging: false,
        searching: false

    } );
    table.buttons().container()
          .appendTo( '#t_wrapper .col-md-6:eq(0)' );

  } );

$('#ifuvs').on('change',function(){
    var uvs = $(this).val();
    if(uvs == 1){
        $('#filiere').attr('hidden',false);
        $('#eno').attr('hidden',false);

    }
    else if( uvs == 2 ){
        $('#filiere').attr('hidden',true);
        $('#eno').attr('hidden',true);

    }
});
 $('.create').click(function(){

     return confirm('voulez-vous enregistrer ?');


  });
 $('.del').click(function(){

    return confirm('voulez-vous supprimer cet élément ?');


 });
 $('#edit').click(function(){

     return confirm('voulez-vous modifier cet élément ?');


  });
  $('#update').click(function(){

     return confirm('voulez-vous enregistrer les modifications ?');


  });
  $('#disconnect').click(function(){
     event.preventDefault();
      var choix =confirm('voulez-vous vous déconnecter ?');
      if(choix == true){
         $('#logout-form').submit();
      }
      else{

      }
     }

 );


