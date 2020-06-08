<?php defined('BASEPATH') or exit('No direct script access allowed');

class cProduct extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Product/mProduct');
    }

    public function index()
    {

        $this->FSxCPRDShowProduct();
    }

    public function FSxCPRDShowProduct()
    {

        $aListData = array(
            'aProduct' => $this->mProduct->FSaMPRDGetProduct(),

        );
        $data = array(
            'body' => $this->parser->parse('product/Product/wProduct',  $aListData, TRUE),
        );

        $this->template->home_template($data);
    }

    public function FSxCPRDShowListImage()
    {
        $aList_data = array(
            'aListImage' => $this->mProduct->FSxMPRDShowListImage()
        );

        $this->load->view('product/Product/wListImage', $aList_data);
    }
    public function FSxCPRDSaveAddProduct()
    {
        $this->mProduct->FSxMPRDSaveAddProduct();
    }

    public function tttt($id)
    {
        $this->mProduct->FSxMPRDShowListImageNumrow($id);
    }
}
