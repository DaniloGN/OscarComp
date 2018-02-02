$(document).ready(function() {
  $('.modal').modal();

  $("#login").click(function() {
    $('#errolog').hide();
    $('#modal_login').modal('open');
  });


  $('#errolog').hide();
  $("#modal_login_send").click(function()
  {
    var campoEmail = $("#email").val();
    var campoSenha = $("#senha").val();

   $.ajax({
        url: "../Controller/LoginInscrito.php",
        type: 'post',
        data: { 'email' : campoEmail, 'senha' : campoSenha},
        success: function(result) {
          window.location.href = "./indexLogado.html"; 
          console.log(result);
        },
        error: function(error){
          $('#errolog').show();
        }
      }
    );
    return false;
  });
});

