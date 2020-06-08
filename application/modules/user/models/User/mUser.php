<?php defined('BASEPATH') or exit('No direct script access allowed');

class mUser extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->dbT = $this->load->database('dbT', TRUE);
    }
    public function FSxMUSRSaveRegiser($ptData = '')
    {

        $tName = $this->input->post('oetName');
        $tLastName = $this->input->post('oetLastName');
        $tGender = $this->input->post('ocmGender');
        $tEmail = $this->input->post('oemEmail');
        $tPassword = $this->input->post('oetPassword');


        $aData = array(
            'FTUrsName' => $tName,
            'FTUrsLastName' => $tLastName,
            'FTUrsImages' => $ptData,
            'FDUrsCreateDate' => date('Y-m-d H:i:s'),
            'FTUrsGender' => $tGender,
            'FTUrsEmail' => $tEmail,
            'FTUrsPassword' => md5($tPassword),
            'FNUrsStatus' => 1,
        );

        $this->db->insert('TCNMUser', $aData);
    }
    public function FSaMUSRGetUser()
    {


        // $this->db->select('*');
        // $this->db->from('TCNMUser');
        // $this->db->where('FNUrsStatus', 1);
        // $oQuery = $this->db->get();
        // $aData = $oQuery->result_array();
        // return $aData;

        $tSql = 'SELECT * FROM TCNMUser WHERE FNUrsStatus = 1';
        $oQuery = $this->db->query($tSql);
        $aData = $oQuery->result_array();
        return $aData;
    }


    public function FSxMUSRSaveDeleteUser($pnId)
    {
        //$nID = $this->input->post('ohdIdUser');

        $aData = array(
            'FNUrsStatus' => 2,
        );

        $this->db->limit(1);
        $this->db->where('FNUrsId', $pnId);
        $this->db->update('TCNMUser', $aData);

        // $this->db->where('FNUrsId', $nID);
        // $this->db->delete('TCNMUser', $aData);
    }


    public function FSaMUSRGetUserById()
    {
        $nId = $this->input->post('nId');

        // $this->db->select('*');
        // $this->db->from('TCNMUser');
        // $this->db->where('TCNMUser.FNUrsId', $nId);
        // $oQuery = $this->db->get();
        // $aData = $oQuery->result_array();
        // return $aData;


        $tSql = 'SELECT * FROM TCNMUser WHERE FNUrsId = ' . $nId . '';
        $oQuery = $this->db->query($tSql);
        $aData = $oQuery->result_array();
        return $aData;
    }

    public function FSxMUSRSaveEditUser()
    {
        $tName = $this->input->post('oetName');
        $tLastName = $this->input->post('oetLastName');
        $tGender = $this->input->post('ocmGender');
        $nID = $this->input->post('ohdIdUser');

        $aData = array(
            'FTUrsName' => $tName,
            'FTUrsLastName' => $tLastName,
            // 'FTUrsImages' => $tData,
            'FTUrsGender' => $tGender,
            'FDUrsUpdateDate' => date('Y-m-d H:i:s'),

        );

        $this->db->limit(1);
        $this->db->where('FNUrsId', $nID);
        $this->db->update('TCNMUser', $aData);
    }

    public function FSaMUSRSearch()
    {

        $tSearch = $this->input->post('otpSearch');
        $dStartDate = $this->input->post('odpStartDate');
        $dEndDate = $this->input->post('odpEndDate');

        $this->db->select('*');
        $this->db->from('TCNMUser');
        $this->db->where('FNUrsStatus', 1);

        if ($dStartDate != '' && $dEndDate != '') {
            // $this->db->like('FDUrsCreateDate', $dCreateDate, 'after');
            $this->db->where('FDUrsCreateDate >=', $dStartDate . ' 00:00:00.000');
            $this->db->where('FDUrsCreateDate <=', $dEndDate . ' 23:59:59.000');
        }

        if ($tSearch != '') {
            $this->db->like('FTUrsName', $tSearch, 'both');
            $this->db->or_like('FTUrsLastName', $tSearch, 'both');
        }

        $oQuery = $this->db->get();
        $aData = $oQuery->result_array();
        return $aData;
    }
}
