<?php

    if(!empty($_POST['btn-modificar'])){
        if (!empty($_POST['txtid']) and !empty($_POST['txtnombre']) and !empty($_POST['txtapellido']) 
        and !empty($_POST['txtdni']) and !empty($_POST['txtcargo'])) {
            
            $id = $_POST['txtid'];
            $nombre = $_POST['txtnombre'];
            $apellido = $_POST['txtapellido'];
            $dni = $_POST['txtdni'];
            $cargo = $_POST['txtcargo'];

            $sql = $conexion -> query("SELECT count(*) AS 'total' FROM empleado WHERE dni='$dni' ");

            if ($sql -> fetch_object() -> total > 0) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "INCORRECTO",
                            type: "error",
                            text: "El DNI <?= $dni ?> ya esta registrado en la Base de Datos",
                            styling: "bootstrap3"
                        });
                    });
                </script>
            <?php } else {

                if(is_numeric($dni)){
                    if(strlen($dni) == 8){
                        
                        $registro = $conexion -> query("UPDATE empleado SET nombre='$nombre', apellido='$apellido', dni='$dni', cargo=$cargo WHERE id_empleado=$id");

                        if($registro == true){ ?>

                            <script>
                                $(function notificacion() {
                                    new PNotify({
                                        title: "CORRECTO",
                                        type: "success",
                                        text: "Empleado Modificado Correctamente",
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
                                        text: "Error al Modificar Empleado",
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