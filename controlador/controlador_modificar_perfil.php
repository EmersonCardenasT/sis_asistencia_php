<?php

    if(!empty($_POST['btn-modificar'])){
        if(!empty($_POST['txtid']) and !empty($_POST['txtnombre']) and
        !empty($_POST['txtapellido']) and !empty($_POST['txtusuario'])){

            $id = $_POST['txtid'];
            $nombre = $_POST['txtnombre'];
            $apellido = $_POST['txtapellido'];
            $usuario = $_POST['txtusuario'];

            $sql = $conexion -> query("UPDATE usuario SET nombre='$nombre', apellido='$apellido', usuario='$usuario' WHERE id_usuario=$id");

            if($sql == true){ ?>

                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "CORRECTO",
                                type: "success",
                                text: "Datos modificados Correctamente",
                                styling: "bootstrap3"
                            });
                        });
                    </script>

            <?php }else{ ?>

                    <script>
                        $(function notificacion() {
                            new PNotify({
                                title: "INCORRECTO",
                                type: "error",
                                text: "Error al Modificar los Datos",
                                styling: "bootstrap3"
                            });
                        });
                    </script>

            <?php }

        }else{ ?>

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