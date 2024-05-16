<?php

    if(!empty($_POST['btn-modificar'])){
        if (!empty($_POST['txtid']) and !empty($_POST['txtnombre']) and !empty($_POST['txttelefono']) and
        !empty($_POST['txtubicacion']) and !empty($_POST['txtruc'])) {
            
            $id = $_POST['txtid'];
            $nombre = $_POST['txtnombre'];
            $telefono = $_POST['txttelefono'];
            $ubicacion = $_POST['txtubicacion'];
            $ruc = $_POST['txtruc'];

            $sql = $conexion -> query("UPDATE empresa SET nombre='$nombre', telefono='$telefono', ubicacion='$ubicacion',
            ruc='$ruc' WHERE id_empresa=$id");

            if ($sql == true) { ?>
                
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "CORRECTO",
                            type: "success",
                            text: "Empresa modificado Correctamente",
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
                            text: "Ups! Ocurrio un error al modificar los datos de la Empresa",
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
                        text: "No puedes modificar registros vacios",
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