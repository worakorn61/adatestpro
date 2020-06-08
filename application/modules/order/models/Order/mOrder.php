<?php defined('BASEPATH') or exit('No direct script access allowed');

class mOrder extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function FSxMORDGetOrder()
    {
        $this->db->select('*');
        $this->db->from('TCNTOrder');
        $this->db->join('TCNMUser', 'TCNMUser.FNUrsId = TCNTOrder.FNOrdUrsId');
        $query = $this->db->get();;
        $data = $query->result_array();
        return $data;
    }

    public function FSxMORDShowListProduct()
    {
        $ListPrdId = $this->input->post('ListPrdId');

        $this->db->select('*');
        $this->db->from('TCNTOrderProduct');
        $this->db->where('FNOpdOrdId', $ListPrdId);
        $query = $this->db->get();;
        $data = $query->result_array();
        return $data;
    }

    
}
