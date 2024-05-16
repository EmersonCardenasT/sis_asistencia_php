<?php

    if(!empty($_POST['btn-modificar'])){
        if(!empty($_POST['txtid']) and !empty($_POST['txtnombre'])){

            $id = $_POST['txtid'];
            $nombre = $_POST['txtnombre'];

            $verificar_cargo = $conexion -> query ("SELECT count(*) as 'total' FROM cargo WHERE nombre='$nombre' and id_cargo!=$id ");

            if($verificar_cargo -> fetch_object() -> total > 0){ ?>

                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "El cargo <?= $nombre; ?> ya se encuentra registrado en la base de Datos",
                            styling: "bootstrap3"
                        });
                    });
                </script>

            <?php }else{

                $sql = $conexion -> query ("UPDATE cargo SET nombre='$nombre' WHERE id_cargo=$id");

                if ($sql == true) { ?>
                    
                        <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "CORRECTO",
                                    type: "success",
                                    text: "El cargo fue modificado correctamente",
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
                                    text: "Error al registrar cargo",
                                    styling: "bootstrap3"
                                });
                            });
                        </script>

                <?php }
                
            }

        }else{ ?>

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