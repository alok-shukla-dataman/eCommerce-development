<?php 

/*
 Developer Name  : Alok Shukla
 Company Name    : Dataman computer systems pvt. ltd.
 Code writted at : 01 December 2017
 Description     : Library of including web page header, footer, side nav in one go.
*/ 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Includefiles{
  function __construct(){
    $this->CI =& get_instance();
  }
	
	function load($page,$data=array()){

		$data['logo'] 						         = $this->CI->model->getLogo();
		$data['facebook']					       = $this->CI->model->getOptionsValue( $optionName = 'facebook' );
		$data['twitter'] 					       = $this->CI->model->getOptionsValue( $optionName = 'twitter' );
		$data['instagram']				       = $this->CI->model->getOptionsValue( $optionName = 'instagram' );
		$data['googleplus'] 			      = $this->CI->model->getOptionsValue( $optionName = 'googleplus' );
		$data['linkedin']					       = $this->CI->model->getOptionsValue( $optionName = 'linkedin' );
		$data['pinterest'] 				      = $this->CI->model->getOptionsValue( $optionName = 'pinterest' );
		
		$data['sharingFacebook']	    = $this->CI->model->getOptionsValue( $optionName = 'sharingFacebook' );
		$data['sharingInstagram']    = $this->CI->model->getOptionsValue( $optionName = 'sharingInstagram' );
		$data['sharingPinterest']	   = $this->CI->model->getOptionsValue( $optionName = 'sharingPinterest' );
		$data['sharingTwitter'] 	    = $this->CI->model->getOptionsValue( $optionName = 'sharingTwitter' );		
		$data['sharingGplus']			     = $this->CI->model->getOptionsValue( $optionName = 'sharingGplus' );
		$data['googleAnalytics'] 	   = $this->CI->model->getOptionsValue( $optionName = 'googleAnalytics' );

		$data['copyright'] 				      = $this->CI->model->getOptionsValue( $optionName = 'copyright' );
		$data['companyAddress'] 	    = $this->CI->model->getOptionsValue( $optionName = 'companyAddress' );
		$data['primaryContactno']    = $this->CI->model->getOptionsValue( $optionName = 'primaryContactno' );
		$data['secondryContactno']   = $this->CI->model->getOptionsValue( $optionName = 'secondryContactno' );		
		$data['primaryEmailid'] 	    = $this->CI->model->getOptionsValue( $optionName = 'primaryEmailid' );
		$data['secondryEmailid'] 	   = $this->CI->model->getOptionsValue( $optionName = 'secondryEmailid' );
		$data['companyName'] 			     = $this->CI->model->getOptionsValue( $optionName = 'companyName' );
		$data['whatsAppnumber'] 	    = $this->CI->model->getOptionsValue( $optionName = 'whatsAppnumber' );
		$data['shipping'] 				       = $this->CI->model->getOptionsValue( $optionName = 'shipping' );
		$data['return'] 					        = $this->CI->model->getOptionsValue( $optionName = 'return' );	
		$data['support'] 					       = $this->CI->model->getOptionsValue( $optionName = 'support' );
		$data['trusted'] 					       = $this->CI->model->getOptionsValue( $optionName = 'trusted' );			
		
		$data['metaTitle'] 				      = $this->CI->model->getOptionsValue( $optionName = 'metaTitle' );
		$data['metaKeywords'] 		     = $this->CI->model->getOptionsValue( $optionName = 'metaKeywords' );
		$data['metaDescription'] 	   = $this->CI->model->getOptionsValue( $optionName = 'metaDescription' );
		$data['contactPage'] 			     = $this->CI->model->getPageByID("27");
		
   $this->CI->load->view('websiteView/commonFiles/page-website-header',$data);
     $this->CI->load->view('websiteView/commonFiles/page-website-navigation');
     $this->CI->load->view($page);
   $this->CI->load->view('websiteView/commonFiles/page-website-footer');
  }    
}