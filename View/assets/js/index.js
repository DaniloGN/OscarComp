$(document).ready(function() {
  $('.modal').modal();

  $("#login").click(function() {
    console.log("ffgg");
    $('#modal_login').modal('open');
  });
});


$("#modal_login_send").click(function()
{
  var campoEmail = $("#email").val();
  var campoSenha = $("#senha").val();

  $.ajax({
      url: "../Controller/LoginInscrito.php",
      type: 'POST',
      data: { 'email' : campoEmail, 'senha' : campoSenha},
      success: function(data) {
        if ( data == "ok")
        {
          window.location.href = "../View/index.html";
        }else
        {
      }
    }

  });
});
