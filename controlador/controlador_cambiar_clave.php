<?php

    if (!empty($_POST['btn-modificar'])) {
        
        if (!empty($_POST['txtclaveactual']) and !empty($_POST['txtclavenueva']) and !empty($_POST['txtid'])) {
            
            $claveactual = md5($_POST['txtclaveactual']);   
            $clavenueva = md5($_POST['txtclavenueva']);  
            $id = $_POST['txtid'];

            $verificar_clave_actual = $conexion -> query("SELECT password  FROM usuario WHERE id_usuario=$id ");

            if ($verificar_clave_actual -> fetch_object() -> password == $claveactual) {

                if(strlen($clavenueva) > 8){

                    $sql = $conexion -> query("UPDATE usuario SET password = '$clavenueva' WHERE id_usuario=$id ");

                    if ($sql == true) { ?>
                        
                        <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "CORRECTO",
                                    type: "success",
                                    text: "Contraseña actualizado correctamente",
                                    styling: "bootstrap3"
                                });
                            });
                        </script>

                    <?php } else { ?>
                        
                        <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "INCORRECTO",
                                    type: "error",
                                    text: "No se pudo modificar la nueva contraseña",
                                    styling: "bootstrap3"
                                });
                            });
                        </script>

                    <?php }
                    

                }else{ ?>
                    
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "INCORRECTO",
                                type: "error",
                                text: "La nueva contraseña debe tener mas de 8 digitos",
                                styling: "bootstrap3"
                            });
                        });
                    </script>

                <?php }
                
            } else { ?>
                
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "La clave actual es incorrecta",
                            styling: "bootstrap3"
                        });
                    });
                </script>

            <?php }
            

        } else { ?>
            
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "Los campos estan vacios",
                        styling: "bootstrap3"
                    });
                });
            </script>

        <?php } ?>
        
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>

    <?php }
    

?>