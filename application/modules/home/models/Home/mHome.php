<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'libraries/rabbitmq/vendor/autoload.php');
//require_once(APPPATH . 'config\rabbitmq.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class mHome extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    // public function FSxMHOMLongin()
    // {
    //     $this->db->from('TCNMUser');
    //     $this->db->where('FTUrsName', $this->input->post('oetName'));
    //     $this->db->where('FTUrsPassword', md5($this->input->post('oetPassword')));
    //     $this->db->limit(1);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function rabbit()
    {

        $tQueueName = 'testpro';
        $aParams = array(
            'name' => 'Worakorn',
            'lastname' => 'Banphapapopporn'
        );

        $oConnection = new AMQPStreamConnection('localhost', 5672, 'newadmin', 's0m3p4ssw0rd', 'adatestpro');
        $oChannel = $oConnection->channel();
        $oChannel->queue_declare($tQueueName, false, true, false, false);
        $oMessage = new AMQPMessage(json_encode($aParams));
        $oChannel->basic_publish($oMessage, "", $tQueueName);
        $oChannel->close();
        $oConnection->close();
        return 1; /** Success */

      
        // $tQueueName = 'TEST_PRO';
        
        // $oConnection = new AMQPStreamConnection('localhost', 5672, 'newadmin', 's0m3p4ssw0rd', 'adatestpro');
        // $oChannel = $oConnection->channel();
        // $oChannel->queue_declare($tQueueName, false, true, false, false);
        // $oChannel->close();
        // $oConnection->close();
        // return 1; /** Success */
    }
}
