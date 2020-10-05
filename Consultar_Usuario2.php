<? PHP
$ hostname_localhost = "mysql.jeanpantoja1.alwaysdata.net" ;
$ database_localhost = "jeanpantoja1_smartcitybd" ;
$ username_localhost = "215238_root" ;
$ password_localhost = "smartcity123" ;

$ json = matriz ();

    if ( isset ( $ _GET [ "ID_Usuario" ])) {

            $ id_user = $ _GET [ 'ID_Usuario' ];

            $ conexion = mysqli_connect ( $ hostname_localhost , $ username_localhost , $ password_localhost , $ database_localhost );

            $ consulta = "seleccione ID_Usuario, US_Nombres, US_A enlaces, US_Direcccion, US_Fecha_Nacimiento, US_Nacionalidad, US_Telefono, US_Email, US_Contraseña, US_Tipo de Tbl_Usuario donde ID_Usuario = '{$ id_user}'" ;

            $ resultado = mysqli_query ( $ conexión , $ consulta );

            if ( $ registro = mysqli_fetch_array ( $ resultado )) {
                $ json [ 'Tbl_Usuario' ] [] = $ registro ;
            }

            else {
                $ resultar [ "US_ID_Usuario" ] = 0 ;
                $ resultar [ "US_Nombres" ] = 'Sin registro' ;
                $ resultar [ "US_Apellidos" ] = 'Sin registro' ;
                 $ resultar [ "US_Direcccion" ] = 'Sin registro' ;
                $ resultar [ "US_Fecha_Nacimiento" ] = 'Sin registro' ;
                 $ resultar [ "US_Nacionalidad" ] = 'Sin registro' ;
                $ resultar [ "US_Telefono" ] = 'Sin registro' ;
                 $ resultar [ "US_Email" ] = 'No registrarse' ;
                $ resultar [ "US_Contraseña" ] = 'No registrarse' ;
                $ resultar [ "US_Tipo" ] = 'Sin registro' ;
                $ json [ 'Tbl_Usuario' ] [] = $ resultar ;
            }

            mysqli_close ( $ conexión );
            echo  json_encode ( $ json );
    }

    else {
        $ resultar [ "exito" ] = 0 ;
        $ resultar [ "mensaje" ] = 'WS no retorna' ;
        $ json [ 'Tbl_Usuario' ] [] = $ resultar ;
        echo  json_encode ( $ json );
    }


?>