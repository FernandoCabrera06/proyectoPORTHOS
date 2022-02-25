$(document).ready(function(){
                         
    var consulta;
           
    //hacemos focus
    $("#usuario").focus();
                                               
    //comprobamos si se pulsa una tecla
    $("#usuario").keyup(function(e){
           //obtenemos el texto introducido en el campo
           consulta = $("#usuario").val();
           $("#resultado").html('<img id="gif" src="../icons/gifs/5.gif" />');                   
           //hace la búsqueda
           $("#resultado").delay(1000).queue(function(n) {      
                                         
                
                                         
                      $.ajax({
                            type: "POST",
                            url: "comprobar.php",
                            data: "b="+consulta,
                            dataType: "html",
                            error: function(){
                                  alert("error petición ajax");
                            },
                            success: function(data){                                                      
                                  $("#resultado").html(data);
                                  n();
                            }
                });
                                         
           });
                              
    });
                        
});