<?php 
 /*
  Developer Name  : Alok Shukla
  Company Name    : Dataman computer systems pvt. ltd.
  Code writted at : 18 December 2017
  Description     : PDF library
 */ 
 
if ( ! defined('BASEPATH') ) exit('No direct script access allowed');
	class Pdf {
	function pdf()
	{
		$CI = & get_instance();
		log_message('Debug', 'mPDF class is loaded.');
	}
	function load($param=NULL)
	{
		include_once APPPATH.'/third_party/pdf/mpdf.php';
		if ($params == NULL)
		{
			$param = '"en-GB-x","A4","","",10,10,10,10,6,3';         
		}
		return new mPDF($param);
	}
}