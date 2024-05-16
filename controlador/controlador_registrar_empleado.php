<?php 

    if(!empty($_POST['btn-registrar'])){
        if(!empty($_POST['txtnombre']) and !empty($_POST['txtapellido']) and !empty($_POST['txtdni'])
        and !empty($_POST['txtcargo'])){

            $nombre = $_POST['txtnombre'];
            $apellido = $_POST['txtapellido'];
            $dni = $_POST['txtdni'];
            $cargo = $_POST['txtcargo'];

            $sql = $conexion -> query(" SELECT count(*) as 'total' FROM  empleado WHERE dni='$dni' ");

            if ($sql -> fetch_object() -> total > 0) { ?>
                
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "El DNI <?= $dni; ?> ya esta registrado",
                            styling: "bootstrap3"
                        });
                    });
                </script>

            <?php } else {

                $registro = $conexion -> query("INSERT INTO empleado(nombre, apellido, dni, cargo) VALUES ('$nombre', '$apellido', '$dni', $cargo)");

                if(is_numeric($dni)){
                    if(strlen($dni) == 8){
                        if($registro == true){ ?>

                        <script>
                            $(function notificacion() {
                                new PNotify({
                                    title: "CORRECTO",
                                    type: "success",
                                    text: "Empleado registrado Correctamente",
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
                                        text: "Error al Registrar Empleado",
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
                                    text: "El DNI <?= $dni; ?> es incorrecto",
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
                                text: "El DNI <?= $dni; ?> es incorrecto",
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