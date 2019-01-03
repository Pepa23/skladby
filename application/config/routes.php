<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'Neprihlaseny/zobrazUvod';
$route['seznam-autoru'] = 'Neprihlaseny/zobrazAutory';
$route['seznam-alb'] = 'Neprihlaseny/zobrazAlba';
$route['seznam-skladeb'] = 'Neprihlaseny/zobrazSkladby';
$route['autor/(:num)'] = 'Neprihlaseny/zobrazAutora/$1';
$route['album/(:num)'] = 'Neprihlaseny/zobrazAlbum/$1';

$route['prihlaseni'] = 'Administrace/prihlaseni';
$route['zpracovani-prihlaseni'] = 'Administrace/zpracovaniPrihlaseni';
$route['odhlaseni'] = 'Administrace/odhlasit';

$route['administrace'] = 'Prihlaseny/zobrazUvodAdministrace';
$route['administrace/seznam-autoru'] = 'Prihlaseny/zobrazAutory';

$route['administrace/pridani-autora'] = 'Prihlaseny/pridaniAutora';
$route['administrace/zpracovani-pridani-autora'] = 'Prihlaseny/zpracovaniPridavaniAutora';
$route['administrace/editace-autora/(:num)'] = 'Prihlaseny/editaceAutora/$1';
$route['administrace/zpracovani-editace-autora/(:num)'] = 'Prihlaseny/zpracovaniEditaceAutora/$1';
$route['administrace/smazani-autora/(:num)'] = 'Prihlaseny/smazaniAutora/$1';

$route['administrace/pridani-alba/(:num)'] = 'Prihlaseny/pridaniAlba/$1';
$route['administrace/zpracovani-pridani-alba'] = 'Prihlaseny/zpracovaniPridavaniAlba';
$route['administrace/editace-alba/(:num)'] = 'Prihlaseny/editaceAlba/$1';
$route['administrace/zpracovani-editace-alba/(:num)'] = 'Prihlaseny/zpracovaniEditaceAlba/$1';
$route['administrace/deaktivace-alba/(:num)'] = 'Prihlaseny/deaktivaceAlba/$1';
$route['administrace/aktivace-alba/(:num)'] = 'Prihlaseny/aktivaceAlba/$1';

$route['administrace/pridani-skladby/(:num)'] = 'Prihlaseny/pridaniSkladby/$1';
$route['administrace/zpracovani-pridani-skladby'] = 'Prihlaseny/zpracovaniPridavaniSkladby';
$route['administrace/editace-skladby/(:num)'] = 'Prihlaseny/editaceSkladby/$1';
$route['administrace/zpracovani-editace-skladby/(:num)'] = 'Prihlaseny/zpracovaniEditaceSkladby/$1';
$route['administrace/deaktivace-skladby/(:num)'] = 'Prihlaseny/deaktivaceSkladby/$1';
$route['administrace/aktivace-skladby/(:num)'] = 'Prihlaseny/aktivaceSkladby/$1';