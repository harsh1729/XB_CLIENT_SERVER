<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once("tcpdf/tcpdf.php");
require_once("fpdi/fpdi.php");

class Pdf_merger extends FPDI
{
	var $files = array();
	public function setFiles($files){
		$this->files = $files;
    }
    public function concat()
    {
		foreach($this->files AS $file)
		{
			$pagecount = $this->setSourceFile($file);
			for($i = 1; $i <= $pagecount; $i++)
			{
				$tplidx = $this->ImportPage($i);
				$s = $this->getTemplatesize($tplidx);
				//$this->AddPage('P', array($s['w'], $s['h']));
				if ($s['w'] > $s['h']) 
			        {
			            $this->AddPage('L', array($s['w'], $s['h']));
			        } 
			        else 
			        {
			            $this->AddPage('P', array($s['w'], $s['h']));
			        }
				$this->useTemplate($tplidx);
			}
		}
	}
}