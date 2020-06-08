<?php 
Class Multi_Language {
    function ChangeLanguage()
    {
        $ci = &get_instance();
        $ci->load->helper('language');
        $larr = array(
            'th' => 'thailand',
            'en' => 'english'
        );

        $tLang = $ci->session->userdata('lang');
        if ($tLang) {
            $lang = $tLang;
        } else {
            $lang = 'th';
        }
        $arr = ['contents','register'];
        foreach ($arr as $key => $value) {
            $ci->lang->load($value, $larr[$lang]);
        }

        $ci->config->set_item('language', $larr[$lang]); 
    }

}
