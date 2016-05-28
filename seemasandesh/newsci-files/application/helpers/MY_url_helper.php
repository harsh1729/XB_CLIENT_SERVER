<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*
* Here base_url function is overridded to remove the directory name from url at server
*
*/
/*function base_url($uri = '')
{
	$CI =& get_instance();
	//$dir_name = "newsci/";
	//return substr_replace($CI->config->base_url(),'',strrpos($CI->config->base_url(),$dir_name,strlen($dir_name)*-1),strlen($dir_name)).$uri;
	return $CI->config->base_url($uri);
}
*/

function domain_name($uri = '')
{
	$CI =& get_instance();
	$dir_name = "newsci/";
	return substr_replace($CI->config->base_url(),'',strrpos($CI->config->base_url(),$dir_name,strlen($dir_name)*-1),strlen($dir_name)).$uri;
	//return $CI->config->base_url($uri);
}


/*
*
* Here is customized version of redirect function to remove the directory name from url at server
*
*/
function redirect($uri = '', $method = 'location', $http_response_code = 302)
{
	//$dir_out = '../';
	$dir_out = '';
	if($uri !== '')
	{
		$uri = $dir_out.$uri;
	}
	if ( ! preg_match('#^https?://#i', $uri))
	{
		$uri = site_url($uri);
	}
	switch($method)
	{
		case 'refresh'	: header("Refresh:0;url=".$uri);
			break;
		default			: header("Location: ".$uri, TRUE, $http_response_code);
			break;
	}
	exit;
}