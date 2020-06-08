<?php defined('BASEPATH') or exit('No direct script access allowed');

class cOrder extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        //session set lang

        // $this->session->set_userdata("lang", 'th');
        $this->load->model('Order/mOrder');
    }


    public function index()
    {

        $this->FSxCORDShowOrder();
    }

    public function FSxCORDShowOrder()
    {

        $aListData = array(
            'aOrder' => $this->mOrder->FSxMORDGetOrder(),

        );

        $data = array(
            'body' => $this->parser->parse('order/Order/wOrder',  $aListData, TRUE),
        );

        $this->template->home_template($data);
    }

    public function FSxCORDShowListProduct()
    {

        $aList_data = array(
            'aListProduct' => $this->mOrder->FSxMORDShowListProduct()
        );

        $this->load->view('order/Order/wListProduct', $aList_data);
    }
}
