<?php

    if(!empty($_POST['btn-registrar'])){
        if(!empty($_POST['txtnombre'])){
            $nombre = $_POST['txtnombre'];

            $verificar_nombre = $conexion -> query("SELECT count(*) AS 'total' FROM cargo WHERE nombre='$nombre'");

            if ($verificar_nombre -> fetch_object() -> total > 0) { ?>
            
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "El cargo <?= $nombre; ?> ya esta registrado.",
                            styling: "bootstrap3"
                        });
                    });
                </script>

            <?php }else{

                    $sql = $conexion -> query("INSERT INTO cargo(nombre) VALUES ('$nombre')");

                    if ($sql == true) { ?>
                        
                        <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "CORRECTO",
                                    type: "success",
                                    text: "Cargo registrado correctamente",
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
                                    text: "Error al Registrar cargo",
                                    styling: "bootstrap3"
                                });
                            });
                        </script>

                    <?php }

            }
        }else { ?>

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
