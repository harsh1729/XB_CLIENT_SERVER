<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Xerces_globals
{
    public function str_last_replace($search,$replace, $subject)
	{
	    $pos = strrpos($subject, $search);
		if($pos !== false)
		{
			$subject = substr_replace($subject, $replace, $pos, strlen($search));
		}
		return $subject;
	}

	public function extract_paragraph($subject,$count)
	{
		// SUBJECT : input string
		// COUNT   : number of paragraphs to be returned
		$str_array = preg_split("/\n|\r\n/",$subject);
		$output_array = array();
		if(count($str_array) >= $count)
		{
			for($i=0;$i<$count;$i++)
			{
				array_push($output_array, $str_array[$i]);
			}
		}
		else
		{
			$output_array = $str_array;
		}
		return implode("\n",$output_array);
	}
}

/* End of file xerces.php */