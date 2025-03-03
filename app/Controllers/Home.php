<?php

namespace App\Controllers;

use App\Libraries\ec_bulma_template;

class Home extends BaseController
{
    public function index(): void
    {
        $template = new ec_bulma_template();
        $template->head('Home');
        $template->header();
        $template->main_section('template/_main_side_menu', 'template/_main_content');
        $template->footer();
    }

    public function admin(): void
    {
        $template = new ec_bulma_template();
        $template->head('Home');
        $template->header();
        $template->main_section('template/_main_side_menu', 'template/_main_content');
        $template->footer();
    }

    public function template(): void
    {
        $template = new ec_bulma_template();
        $template->head('Home');
        $template->header();
        $template->main_section('template/_main_side_menu', 'template/_main_content');
        $template->footer();
    }
}
