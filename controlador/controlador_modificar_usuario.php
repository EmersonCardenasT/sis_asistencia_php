<?php

    if(!empty($_POST['btn-modificar'])){
        if (!empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and 
            !empty($_POST["txtusuario"])) {

            $nombre = $_POST["txtnombre"];
            $apellido = $_POST["txtapellido"];
            $usuario = $_POST["txtusuario"];
            $id = $_POST['txtid'];

            $sql = $conexion -> query("SELECT count(*) AS 'total' FROM usuario WHERE usuario='$usuario' and id_usuario!=$id");
            if($sql -> fetch_object() -> total > 0){ ?> 

                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "ERROR",
                            type: "error",
                            text: "Error al registrar el usuario",
                            styling: "bootstrap3"
                        });
                    });
                </script>
                
            <?php } else{

                $modificar = $conexion -> query("UPDATE usuario SET nombre='$nombre', apellido='$apellido', usuario='$usuario' WHERE id_usuario=$id ");
                if ($modificar == true) { ?>
                
                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "CORRECTO",
                                type: "success",
                                text: "El usuario se ha Actualizado Correctamente",
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
                                text: "Error al Modificar el usuario",
                                styling: "bootstrap3"
                            });
                        });
                    </script>

                <?php }
                

            }

        } else { ?>
            
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "ERROR",
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