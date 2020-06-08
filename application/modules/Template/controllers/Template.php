<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function home_template($data)
    {   
        $this->parser->parse('Template/body', $data);
    }
}
