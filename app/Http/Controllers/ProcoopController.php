<?php

namespace App\Http\Controllers;


class ProcoopController extends Controller
{
    public function makeRequest($endpoint)
    {
        $responses = file_get_contents('http://200.63.120.50:9387/api/api.php?clientid=coopmorteros!23&metodo=socio_cuentas&tipoConsulta=COD_SOC&value=' . $endpoint);
        $json_datos = json_decode($responses, TRUE);
        return $json_datos;
    }
}
