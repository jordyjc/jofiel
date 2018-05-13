<?php
return array(


    // Poner las credenciales

    'client_id' => 'AZtEDSDRGnZZKH7YYdZFIOsH1zCSPwSikZd23tRPolhoBrh_Yi5OteHxh_W8QTHSwdWKhV5PTSGqk59P',
    'secret' => 'EFdhsV5nztCVeYeXaMnB7D3igX-ohAynvShcMHADmhviRARdr69AB5mSeP0BGPIQlBy-6ppc4gbVhoeM',

    // Configuración del SDK

    'settings' => array
    (
        // Opciones 'Sandbox' o  'Live'

        'mode' => 'sandbox',

        'http.ConnectionTimeOut' => 30,

        'log.LogEnabled' => true,

        'log.FileName' => storage_path() .  '/logs/paypal.log',


        'log.LogLevel' => 'FINE'
    ),
);