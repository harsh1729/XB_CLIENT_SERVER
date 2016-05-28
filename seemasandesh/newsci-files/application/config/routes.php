<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

/*
|
|	This route remove the need of writing method name. It automatically redirects to index method with params.
|	OR USE either this concept of remapping routes.
|	write this method in news controller, and it will do the same.
|	
|	function _remap($param)
|	{
|		$this->index($param);
|	}
|
*/
$route['news/(:num)'] = 'news/index/$1';

/*
|
|	This route remove the need of writing method name. It automatically redirects to index method with params.
|	OR USE either this concept of remapping routes.
|	write this method in news controller, and it will do the same.
|	
|	function _remap($param)
|	{
|		$this->index($param);
|	}
|
*/
$route['detail/(:num)'] = 'detail/index/$1';



/*
|
|	This route remove the need of writing the method name i.e. epaper_detail.
|
*/
$route['epaper/(:num)/(:any)'] = 'epaper/read/$1/$2';
/*
|
|	This route remove the need of writing the method name i.e. index.
|
*/
$route['editorial/(:num)'] = 'editorial/index/$1';

/*
*
*	This route will directs the control to login page when "administrator" is called.
*
*/
$route['administrator'] = 'administrator/home';

/* End of file routes.php */
/* Location: ./application/config/routes.php */