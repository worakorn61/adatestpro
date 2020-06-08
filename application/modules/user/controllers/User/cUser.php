<?php defined('BASEPATH') or exit('No direct script access allowed');

class cUser extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->model('User/mUser');
    }

    public function test_do()
    {
        $this->test();
    }

    private function test()
    {
        echo 'fff';
    }

    public function index()
    {
        $this->FSxCUSRShowUser();
    }

    public function FSxCUSRShowUser()
    {
        $aList_data = array(
            'aUser' => $this->mUser->FSaMUSRGetUser(),
        );
        $adata = array(
            'body' => $this->parser->parse('user/User/wShowUser',  $aList_data, TRUE),
        );

        $this->template->home_template($adata);
    }

    public function FSxCUSRShowRegis()
    {

        $this->load->view('User/User/wRegister');
    }

    public function print()
    {
        $aList_data = array(
            'aUser' => $this->mUser->FSxMUSRGetUser(),

        );
        $this->load->view('User/User/wPrint',  $aList_data);
    }


    public function FSxCUSREditUser()
    {

        $aList_data = array(
            'aUserById' => $this->mUser->FSaMUSRGetUserById(),

        );

        $this->load->view('User/User/wEditUser', $aList_data);
    }

    public function FSxCUSRSaveEditUser()
    {
        $this->mUser->FSxMUSRSaveEditUser();
    }



    public function FSxCUSRDeleteUser()
    {
        $aList_data = array(
            'nId' => $this->input->post('nId'),
        );

        $this->load->view('User/User/wDeleteUser', $aList_data);
    }

    public function FSxCUSRSaveDeleteUser($pnId)
    {

        $this->mUser->FSxMUSRSaveDeleteUser($pnId);
    }




    public function FSxCUSRSaveRegiser()
    {

        $files = $_FILES['oflSaveUpload'];


        // print_r($files['error'][0]); die();

        if ($files['error'][0] == 0) {

            $images_path = 'C:\xampp\htdocs\adatestpro\application\images\img_user';


            $config = array(
                'upload_path' => $images_path,
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,

            );

            $datenow = date("YmdHis");

            $this->load->library('upload', $config);
            $images = array();
            $iname = 1;

            foreach ($files['name'] as $key => $image) {

                if ($files['size'][$key] > 0) {
                    $_FILES['images[]']['name'] = $files['name'][$key];
                    $_FILES['images[]']['type'] = $files['type'][$key];
                    $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['images[]']['error'] = $files['error'][$key];
                    $_FILES['images[]']['size'] = $files['size'][$key];

                    $fileName = $datenow  . '_' . $iname;
                    $images[] = $fileName;

                    $config['file_name'] = $fileName;

                    $this->upload->initialize($config);

                    // print_r($_FILES['images[]']);
                    // die();
                    if ($this->upload->do_upload('images[]')) {

                        $tData = $this->upload->data();
                        $this->mUser->FSxMUSRSaveRegiser($tData['file_name']);
                    } else {
                        // $data = array('error' => $this->upload->display_errors('', '<br />'));
                        // print_r($data);
                        return false;
                    }
                }
                $iname++;
            }
        } else {
            $this->mUser->FSxMUSRSaveRegiser();
        }
    }


    public function FSxCUSRSearch()
    {
        $aListData = array(
            'aUser' =>   $this->mUser->FSaMUSRSearch()

        );
        $aData = array(
            'body' => $this->parser->parse('user/User/wShowUser',  $aListData, TRUE),
        );

        $this->template->home_template($aData);
    }
}
