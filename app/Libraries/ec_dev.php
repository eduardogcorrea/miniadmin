<?php

## Biblioteca para auxiliar no desenvolvimento de aplicativos com o framework CodeIgniter 4
## Autor: Eduardo Corrêa
## Data: 2025-02-28

namespace App\Libraries;

use stdClass;



class ec_dev
{
    function dump($var)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

    
    function pegaDbVazio($tabela)
    {
        $db = db_connect();
        $array =  $db->getFieldNames($tabela);

        $fornecedorDb = new stdClass();

        foreach ($array as $value) {
            $fornecedorDb->$value = '';
        }
        return $fornecedorDb;
    }

    function pegaDbVazioObj($tabela)
    {
        $db = db_connect();
        $array =  $db->getFieldNames($tabela);

        $fornecedorDb[0] = new stdClass();

        foreach ($array as $value) {
            $fornecedorDb[0]->$value = '';
        }
        return $fornecedorDb;
    }

    function removerMascara($string, $indice)
    {
        if ($indice == 'telefone' or $indice == 'cnpj' or $indice == 'rg' or $indice == 'cpf' or $indice == 'valorVt') {
            $mascara = array(".", "-", "/", "(", ")", " ", "R$");
            $limpos   = array("", "", "", "", "", "", "");
            $retorno = str_replace($mascara, $limpos, $string);
        } else {
            $retorno = $string;
        }
        return $retorno;
    }

    function removerCharEspecial($string)
    {
        $mascara = array(".", "-", "/", "(", ")", " ", "R$");
        $limpos   = array("", "", "", "", "", "", "");
        $retorno = str_replace($mascara, $limpos, $string);
        return $retorno;
    }

    function focoSelect($arrayForeach, $arrayObj)
    {
        if ($arrayForeach == $arrayObj) {
            echo "selected";
        }
    }

    function enviaEmail($endereco, $message, $assunto)
    {

        $email = \Config\Services::email();

        $configEmail = [
            'protocol' => 'smtp',
            'SMTPHost' => 'mail.eduardocorrea.com.br',
            'SMTPUser' => 'sistema@eduardocorrea.com.br',
            'SMTPPass' => 'ukRp0gqN7dHi',
            'SMTPPort' => 465,
            'SMTPCrypto' => '',
            'wordWrap' => 'true',

        ];
        
        $email->initialize($configEmail);

        $email->setFrom('sistema@eduardocorrea.com.br', 'Sistema Eduardo Corrêa');
        $email->setTo($endereco);
        $email->setSubject($assunto);
        $email->setMessage($message);
        $sent = $email->send();

        if (!$sent) {
            echo "Mensagem de Erro";
            var_dump($email->printDebugger());
        }
    }
   
}
