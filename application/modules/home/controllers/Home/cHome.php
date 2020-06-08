<?php defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Home/mHome');
    }


    public function index()
    {

        $this->FSxCHOMShowHome();
    }

    function FSxCHOMChangeLanguage($tlang = 'en')
    {

        $this->session->set_userdata('lang', $tlang);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function FSxCHOMShowHome()
    {

        $aData = array(
            'body' => $this->parser->parse('home/Home/wHome',  array(), TRUE),
        );

        $this->template->home_template($aData);
    }


    public function FSxCHOMGetAPI()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:3000/staff",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjVlYmUyZjIwM2FlMTk4NGJmMGYwZWU2YSIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTU5MDk4MTI2MywiZXhwIjoxNTkxNDEzMjYzfQ.Khvbr7e1PmAbZqvt1Uj0wyNlF_1ixQY2u3cvzNarKag"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);;


        $aList_data = array(
            'aAPIData' => json_decode($response, true)
        );

        $this->load->view('home/Home/wShowAPIData', $aList_data);
    }


    public function FSxCHOMShowObject()
    {

        $aData = array(
            'body' => $this->parser->parse('home/Home/wObject',  array(), TRUE),
        );

        $this->template->home_template($aData);
    }

    public function FSxCHOMShowVariable()
    {
        $aData = array(
            'body' => $this->parser->parse('home/Home/wVariable',  array(), TRUE),
        );

        $this->template->home_template($aData);
    }

    public function rabbit()
    {
        $this->mHome->rabbit();
    }

    public function wrabbit()
    {
        $aData = array(
            'body' => $this->parser->parse('home/Home/wRabbit',  array(), TRUE),
        );

        $this->template->home_template($aData);
        //$this->load->view('home/Home/wRabbit');
    }
}
