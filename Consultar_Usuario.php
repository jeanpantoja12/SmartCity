<?PHP
$ hostname_localhost = "mysql-jeanpantoja1.alwaysdata.net" ;
$ database_localhost = "jeanpantoja1_smartcitybd" ;
$ username_localhost = "215238_root" ;
$ password_localhost = "smartcity123" ;

$ json=array();

    if(isset($ _GET["ID_Usuario"])){

            $ ID_Usuario=$ _GET['ID_Usuario'];


            $ conexion=mysqli_connect($ hostname_localhost,$ username_localhost,$ password_localhost,$ database_localhost);

            $ consulta="select ID_Usuario, US_Nombres, US_A funciones,US_Direcccion,US_Fecha_Nacimiento,US_Nacionalidad,US_Telefono,US_Email,US_Contraseña,US_Tipo from Tbl_Usuario where ID_Usuario= '{$ID_Usuario}'";

            $ resultado=mysqli_query($ conexion,$ consulta);

            if($ registro=mysqli_fetch_array($ resultado)){
                $ json['usuario'][]=$ registro;
            }

            else{
                $ resultar [ "ID_Usuario" ] = "Sin usuario" ;
            $ resultar [ 'US_Nombres' ] = "Sin usuario" ;
            $ resultar [ 'US_A funciones' ] = "Sin usuario" ;
            $ resultar [ 'US_Direccion' ] = "Sin usuario" ;
            $ resultar [ 'US_Fecha_Nacimiento' ] = "Sin usuario" ;
            $ resultar [ 'US_Nacionalidad' ] = "Sin usuario" ;
            $ resultar [ 'US_Telefono' ] = "Sin usuario" ;
            $ resultar [ 'US_Email' ] = "Sin usuario" ;
            $ resultar [ 'US_Contraseña' ] = "Sin usuario" ;
            $ resultar [ 'US_Tipo' ] = "Sin usuario" ;
            $ json [ 'usuario' ] [] = $ resultar ;




            }

            mysqli_close($ conexion);
            echo json_encode($ json);
    }

    else{
        $ resultar["success"]=0;
        $ resultar["message"]='WS no retorna';
        $ json['usuario'][]=$ resultar;
        echo json_encode($ json);
    }


?>