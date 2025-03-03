<?php

namespace App\Libraries;

use stdClass;

class ec_bulma_template
{

    function head ($titulo)
    {
        echo view('template/head', ['titulo' => $titulo]);
    }

    function header () {
        echo view('template/header');
    }
    
    function main_section ($main_side_menu, $main_content)
    {
        echo view('template/main_section', ['main_side_menu' => $main_side_menu,'main_content' => $main_content]);
    }


    function sideMenu ()
    {
        echo view('template/sideMenu');
    }


    function main ($titulo)
    {
        echo view('template/main', ['titulo' => $titulo]);
    }
    
    function footer ()
    {
        echo view('template/footer');
    }
   
}
