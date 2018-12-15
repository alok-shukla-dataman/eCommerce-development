<?php

/*
 Developer Name  : Alok Shukla
 Company Name    : Dataman computer systems pvt. ltd.
 Code writted at : 24 November 2017
 Description     : SEO friendly url routings
*/ 

defined('BASEPATH') OR exit('No direct script access allowed');
 
$route['default_controller'] 		= 'ControllerWebsite';
$route['gallery/(:any)'] 						= 'ControllerWebsite/gallery/$1';
$route['404_override'] 					   = '';
$route['translate_uri_dashes'] = FALSE;

$route['ceo'] 									        = 'ControllerAdmin/ceo';
$route['ajaxLoginform'] 				   = 'ControllerAdmin/ajaxLoginform';
$route['home'] 									       = 'ControllerAdmin/home';
$route['logout'] 								      = 'ControllerAdmin/logout';

$route['load_websiteForm'] 			 = 'ControllerAdmin/load_websiteForm';
$route['load_socialForm'] 			  = 'ControllerAdmin/load_socialForm';
$route['load_seoForm'] 					   = 'ControllerAdmin/load_seoForm';
$route['load_googleForm'] 			  = 'ControllerAdmin/load_googleForm';
$route['load_gatewayForm'] 			 = 'ControllerAdmin/load_gatewayForm';
$route['load_emailForm'] 				  = 'ControllerAdmin/load_emailForm';

$route['ajaxSubmitwf'] 					   = 'ControllerAdmin/ajaxSubmitwf';
$route['ajaxSubmitgf'] 					   = 'ControllerAdmin/ajaxSubmitgf';
$route['ajaxSubmitseof'] 				  = 'ControllerAdmin/ajaxSubmitseof';
$route['ajaxSubmitgooglef'] 		 = 'ControllerAdmin/ajaxSubmitgooglef';
$route['ajaxSubmitsocialf'] 		 = 'ControllerAdmin/ajaxSubmitsocialf';
$route['ajaxSubmitemailf'] 			 = 'ControllerAdmin/ajaxSubmitemailf';
$route['logoupload'] 						    = 'ControllerAdmin/logoupload';
$route['ajaxaddImg'] 						    = 'ControllerAdmin/ajaxaddImg';

$route['sizeList']							     = 'ControllerEventt/sizeList';
$route['sizeAdd']								     = 'ControllerEventt/sizeAdd';
$route['XAddsize']							     = 'ControllerEventt/XAddsize';
$route['XUpdatesize']						   = 'ControllerEventt/XUpdatesize';
$route['XDelsize']							     = 'ControllerEventt/XDelsize';


//..Website Pages
$route['WPagesList']							   = 'ControllerSitepages/WPagesList';
$route['WPagesAdd']								   = 'ControllerSitepages/WPagesAdd';
$route['XAddWPages']							   = 'ControllerSitepages/XAddWPages';
$route['XDelWP']									     = 'ControllerSitepages/XDelWP';
$route['XUpdateWP']								   = 'ControllerSitepages/XUpdateWP';
$route['WPupdate/(:any)'] 				= 'ControllerSitepages/WPupdate/$1';

//..Email template
$route['ET']											       = 'ControllerET/ET';
$route['ETadd']										     = 'ControllerET/ETadd';
$route['XAddET']									     = 'ControllerET/XAddET';
$route['XDelET']									     = 'ControllerET/XDelET';
$route['ETupdate/(:any)']					= 'ControllerET/ETupdate/$1';
$route['XETupdate']								   = 'ControllerET/XETupdate';

//..Category
$route['CT']											       = 'ControllerCategory/CT';
$route['CTadd']										     = 'ControllerCategory/CTadd';
$route['XAddCT']									     = 'ControllerCategory/XAddCT';
$route['XDelCT']									     = 'ControllerCategory/XDelCT';
$route['CTupdate/(:any)']					= 'ControllerCategory/CTupdate/$1';
$route['XCTupdate']								   = 'ControllerCategory/XCTupdate';

//..Category
$route['SCT']											      = 'ControllersubCategory/SCT';
$route['SCTadd']									     = 'ControllersubCategory/SCTadd';
$route['XAddSCT']									    = 'ControllersubCategory/XAddSCT';
$route['XDelSCT']									    = 'ControllersubCategory/XDelSCT';
$route['SCTupdate/(:any)']				= 'ControllersubCategory/SCTupdate/$1';
$route['XSCTupdate']							   = 'ControllersubCategory/XSCTupdate';

//..Products
$route['PT']											       = 'ControllerProducts/PT';
$route['PTadd']										     = 'ControllerProducts/PTadd';
$route['XAddPT']									     = 'ControllerProducts/XAddPT';
$route['XDelPT']									     = 'ControllerProducts/XDelPT';
$route['PTupdate/(:any)']					= 'ControllerProducts/PTupdate/$1';
$route['XPTupdate']								   = 'ControllerProducts/XPTupdate';
$route['loadsubCat']							   = 'ControllerProducts/loadsubCat';
$route['customers']								   = 'ControllerCustomer/customerList';

//--------- End admin routing --------------------------------------//

$route['Xadd2cart']								   = 'ControllerWebsite/Xadd2cart';
$route['lp']											       = 'ControllerWebsite/lp';
$route['XUPD']										      = 'ControllerWebsite/XUPD';
$route['XDPD']										      = 'ControllerWebsite/XDPD';
$route['cart']										      = 'ControllerWebsite/cart';
$route['clearcart']								   = 'ControllerWebsite/clearCart';
$route['checkout']								    = 'ControllerWebsite/checkout';
$route['countTotal']							   = 'ControllerWebsite/countTotal';
$route['totalProducts']						 = 'ControllerWebsite/totalProducts';
$route['XUPKart']									    = 'ControllerWebsite/XUPKart';
$route['XDKart']									     = 'ControllerWebsite/XDKart';

$route['placeOrder'] 							  = "ControllerCheckout/placeOrder";

$route['payment'] 								    = "ControllerGateway/paypal";
$route['success'] 								    = "ControllerGateway/paypalSuccess";
$route['notify'] 									    = "ControllerGateway/paypalIPN";

$route['thankyou'] 								   = "ControllerFrontwebpage/successPage";
$route['transaction-failed'] 	= "ControllerFrontwebpage/FailedPage";

$route['failed'] 									    = "ControllerGateway/paypalFailed";
$route['cancel'] 									    = "ControllerGateway/paypalCancel";

$route['company-profile'] 				= "ControllerFrontwebpage/companyProfilePage";
$route['privacy-policy'] 					= "ControllerFrontwebpage/privacyPage";
$route['return-policy'] 					 = "ControllerFrontwebpage/returnPage";
$route['shipping-policy'] 				= "ControllerFrontwebpage/shippingPage";

$route['XcreateAccount'] 					= "ControllerRLC/XcreateAccount";
$route['XUpdateAccount'] 					= "ControllerRLC/XUpdateAccount";
$route['Xchecking'] 							   = "ControllerRLC/Xchecking";
$route['qc'] 											      = "ControllerRLC/QueryContact";

$route['contact-us'] 							  = "ControllerRLC/contactPage";
$route['customer-dashboard'] 	= "ControllerRLC/customerDashboard";
$route['customerLogout'] 					= "ControllerRLC/customerLogout";

$route['shop/(:any)']			      = 'ControllerProductview/SUBCATEGORYproductBySlug/$1';
$route['products/(:any)']					= 'ControllerProductview/productBySlug/$1';
$route['(:any)'] 									    = "ControllerProductview/productDetail/$1";