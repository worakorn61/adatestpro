<?php
defined('BASEPATH') or exit('No direct script access allowed');

defined('BASEPATH') or exit('No direct script access allowed');
$hook['post_controller_constructor'] = array(
    'class'    => 'Multi_Language',
    'function' => 'ChangeLanguage',
    'filename' => 'Multi_Language.php',
    'filepath' => 'hooks'
);
