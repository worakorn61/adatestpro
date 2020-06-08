<?php defined('BASEPATH') or exit('No direct script access allowed');

$route['masUSRShowUser']  = 'user/User/cUser/FSxCUSRShowUser';
$route['masUSRShowRegis']  = 'user/User/cUser/FSxCUSRShowRegis';
$route['masUSREditUser']  = 'user/User/cUser/FSxCUSREditUser';
$route['masUSRDeleteUser']  = 'user/User/cUser/FSxCUSRDeleteUser';
$route['masUSRSearch']  = 'user/User/cUser/FSxCUSRSearch';


$route['masUSRSaveRegister']  = 'user/User/cUser/FSxCUSRSaveRegiser';
$route['masUSRSaveEditUser']  = 'user/User/cUser/FSxCUSRSaveEditUser';
$route['masUSRSaveDeleteUser/(:any)']  = 'user/User/cUser/FSxCUSRSaveDeleteUser/$1';

$route['masUSRPrint']  = 'user/User/cUser/print';


