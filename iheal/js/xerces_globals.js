// This is javascript Globals File. It includes all the global variables and methods !
var xb_global_namespace = {};
xb_global_namespace.rootdirectory = "/"
xb_global_namespace.baseurl = window.location.origin+"/"+xb_global_namespace.rootdirectory;
xb_global_namespace.domainname = window.location.origin;
xb_global_namespace.ajax_loader_img_1 = xb_global_namespace.baseurl+"admin_docs/images/ajax-loader.gif";

var convert_flag = false;
	var txt;
	
$(document).ready(function()
{
    $('#loading_bar').css({"display":"none"});
});