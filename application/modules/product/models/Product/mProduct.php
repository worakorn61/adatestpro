<?php defined('BASEPATH') or exit('No direct script access allowed');

class mProduct extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function FSaMPRDGetProduct()


    {

        $tSql = 'SELECT * FROM TCNMProduct';
        $oQuery = $this->db->query($tSql);
        $aData = $oQuery->result_array();
        return $aData;

        // echo $this->db->last_query($query);
        // $this->db->select('*');
        // $this->db->from('TCNMProduct');
        // $query = $this->db->get();
        // $data = $query->result_array();
        // return $data;
    }

    public function FSaMPRDShowListImage()
    {
        $nPrdId = $this->input->post('nPrdId');

        $this->db->select('*');
        $this->db->from('TCNMImageProduct');
        $this->db->where('FNImpPrdId', $nPrdId);
        $oQuery = $this->db->get();;
        $aData = $oQuery->result_array();

        return $aData;
    }


    public function FSnMPRDShowListImageNumrow($nPrdId)
    {
        // $nPrdId = $this->input->post('nPrdId');

        $this->db->select('*');
        $this->db->from('TCNMImageProduct');
        $this->db->where('FNImpPrdId', $nPrdId);
        $oQuery = $this->db->get();;
        $nNumrow = $oQuery->num_rows();
        return $nNumrow;
    }

    public function FSxMPRDSaveAddProduct()
    {
        $oetProductName = $this->input->post('oetProductName');
        $oetPrice = $this->input->post('oetPrice');

        $aListData = array(
            'FTPrdName' =>  $oetProductName,
            'FNPrdPrice' =>  $oetPrice,
        );

        $this->db->insert('TCNMProduct', $aListData);
    }
}
