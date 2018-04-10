<?php
    require_once(__LIB_PATH . "html.php");
    
    class Message {

        function __construct(){
        }

        public function show_message($text,$type,$reason){

            $ident = rand(1,1000); //identificador unico para cada MSSGBOX
            $message="<div class='msg_box ". $type ."' id='msg_" . $ident . "' ><span>" . Message::messages($reason,$text) . "</span></div>";

            //Message Box Animation with JQUERY
            /*<div id='msg_box_container'></div> es el contenedor principal de los mensajes.
            Este elemento es añadido a las páginas que necesita mostrar mensajes al usuario*/  
            //agregamos el MSSBOX al contenedor 


            echo "<style>" . Message::mssg_design() . "</style>";

        	  echo "<script>
                    $('#msg_box_container').append(" . json_encode($message) . "); 
        	          $('#msg_".$ident."').fadeOut(0).fadeIn(1000).fadeOut(6000); //Remover .fadeOut(6000); en caso de querer visualizar el Mensaje permanentemente.
        	        </script>";
        }

        public function messages($reason,$text){
        	  $message="";
        	  
           switch($reason){
           	 case "success_insert":
           	   $message="La información ha sido ingresada correctamente";
           	 break;
           	 case "success_update":
           	   $message="La información ha sido actualizada correctamente";
           	 break;
           	 case "success_delete":
           	   $message="La información ha sido eliminada correctamente";
           	 break;
           	 case "fail_auth":
           	   $message="El Usuario o Password suministrados son incorrectos";
           	 break;
           	 case "expired_session":
           	   $message="Su sesión ha expirado, por favor vuelva a ingresar sus datos de autentificación.";
           	 break;
           	 case "":
           	   $message=$text;
           	 break;
           } 
           return $message;       
        }

        public function mssg_design(){
          return "#msg_box_container{
                    position: fixed;
                    margin-left: auto;
                    left:0;
                    right:10px;
                    width:350px;
                    top:10px;
                    z-index: 100;
                    font-size: 11px;
                    font-family: 'Arial';
                }

                .msg_box{
                    position: relative;
                    border: 1px solid #CCCCCC;
                    padding: 10px;
                    -moz-border-radius: 5px;
                    -webkit-border-radius: 5px;
                    border-radius: 5px;
                    color: #FFFFFF;
                    /*text-shadow: 2px 2px 2px #000;*/
                    font-weight: bold;
                    text-align: center;
                }

                .msg_box_user{
                    position: absolute;
                    top:200px;
                    border: 5px solid #CCCCCC;
                    background: #EEE;
                    padding: 10px;
                    color: #333;
                    /*text-shadow: 2px 2px 2px #000;*/
                    font-weight: bold;
                    text-align: center;
                    font-size: 15px;
                    z-index: 100;
                    box-shadow: 2px 2px 15px #000;
                }

                .msg_box_user span{
                    padding-bottom:10px;
                }

                .error{
                  background: #C00000;
                }

                .success{
                  background: #29CC70;
                }

                .info{
                  background: #1F8DB1;
                }

                .warning{
                  background: #FF9900;
                }";
        }

    }

?>