<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dash'] = 'page/dash';
$route['newuser'] = 'page/newuser';
$route['userlist'] = 'page/userlist';
$route['logout'] = 'page/logout';
$route['update_sys_user'] = 'page/update_sys_user';
$route['syspassre'] = 'page/syspassre';
$route['my_pro'] = 'page/my_pro';
$route['sys_user_passre'] = 'page/sys_user_passre';
$route['addBranch'] = 'page/addBranch';
$route['branchlist'] = 'page/branchlist';
$route['newPacage'] = 'page/newPacage';
$route['barcord'] = 'page/barcord';
$route['print_package'] = 'page/print_package';
$route['sysdetails'] = 'page/sysdetails';
$route['branch_mark'] = 'page/branch_mark';
$route['deliver_finishing'] = 'page/deliver_finishing';
$route['live'] = 'page/live';
$route['note_package'] = 'page/note_package';
$route['package/(:any)'] = 'page/package';
$route['pendingJob'] = 'page/pendingJob';
$route['branchReport'] = 'page/branchReport';
$route['branch_status'] = 'page/branch_status';
$route['image_up'] = 'page/image_up';



















