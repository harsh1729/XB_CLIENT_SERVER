<?php

class Epaper_model extends CI_Model
{

	function upload_pdf($upload_path)
	{
		if (!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$replaceChars = array(" ",".");
			$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			
			

			$CI =& get_instance();
			$CI->load->library('xerces_globals');
			
			$filecountvar = 1;
			while(file_exists($upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName))) {
				$timedImgName = ($filecountvar++).$timedImgName;
			}
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName);

			move_uploaded_file($tempFile,$targetFile);

			//return $this->str_lreplace("_",".",$timedImgName);
			return $timedImgName;
		}
	}
	function get_total_pages($upload_path,$uploadedfilename)
	{
		
		$CI =& get_instance();
		$CI->load->library('xerces_globals');
		$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$uploadedfilename);
		
	       // $img = new Imagick($targetFile);
               // return $img->getNumberImages();
               $pdftext = file_get_contents($targetFile);
               $num_pag = (int)preg_match_all("/\/Page\W/", $pdftext,$dummy);
               return $num_pag ;
               
                
	}

	function delete_files($pdffile=false)
	{
		if($pdffile)
			unlink($pdffile);
	}
	function save_epaper($date,$areacodeid,$clientid,$filename,$totalpages)
	{
		$data = array(
			"publishdate" => $date,
			"areacodeid" => $areacodeid,
			"clientid" => $clientid,
			"filename" => $filename,
			"totalpages" => $totalpages
		);
		$this->db->insert('epaper',$data);
		return $this->db->insert_id();
	}
	/*function update_preview_name($epaperid,$previewname)
	{
		$data = array(
			"previewimage" => $previewname
		);
		$this->db->where('id',$epaperid);
		$this->db->update('epaper',$data);
	}*/
	/*function create_pdf_preview_image($filepath,$filename,$fileindex,$preview_file_name)
	{
		$pdf_file   = realpath($filepath.$filename);
		
		$save_to    = realpath($filepath).DIRECTORY_SEPARATOR.$preview_file_name;
		 
		$img = new imagick();
		 
		//this must be called before reading the image, otherwise has no effect - "-density {$x_resolution}x{$y_resolution}"
		//this is important to give good quality output, otherwise text might be unclear
		$img->setResolution(200,200);
		 
		//read the pdf
		$img->readImage("{$pdf_file}[".$fileindex."]");
		 
		//reduce the dimensions - scaling will lead to black color in transparent regions
		$img->scaleImage(200,0);
		 
		//set new format
		$img->setImageFormat('jpg');
		 
		// -flatten option, this is necessary for images with transparency, it will produce white background for transparent regions
		$img = $img->flattenImages();
		 
		//save image file
		$preview_status = $img->writeImages($save_to, false);
		if($preview_status)
			//return array($pdf_file,$save_to,realpath($filepath),$filepath,$preview_file_name,realpath($filepath.$preview_file_name));
			return $preview_file_name;
		else
			return "";
	
	}*/
	function pdf2image($filepath,$epaperfilename,$pagenumberstart)
	{
				 
		     
		         $pdftext = file_get_contents($filepath);
                         $num_pag = (int)preg_match_all("/\/Page\W/", $pdftext,$dummy);
                         if($num_pag!= NULL && $num_pag<100){
                        $command = "";
	                         for($i=0;$i<$num_pag;$i++)
			         {
			           $path_parts = pathinfo($filepath);
	                           $save = $path_parts['dirname'].DIRECTORY_SEPARATOR.$epaperfilename."_".($i+$pagenumberstart).".jpg";
			           $commandsort = 'convert -density 150x150 -resize 1870x2948 -quality 50%  "'.$filepath.'['.$i.']" "'.$save.'"';
		                   //echo $commandsort;
		                        if($i!=0)
		                              $command .= ";".$commandsort; 
		                        else
		                              $command = $commandsort; 
		                   $save = $path_parts['dirname'].DIRECTORY_SEPARATOR.$epaperfilename."_thumb_".($i+$pagenumberstart).".jpg";
			           $commandsort_Thumb = 'convert "'.$filepath.'['.$i.']" -colorspace RGB -resize 222x350 "'.$save.'"'; 
			           $command .= ";".$commandsort_Thumb;          
	                         }
	           if($command!="")              
		     exec($command, $o, $r);
		     }
		    /* $path_parts = pathinfo($filepath);
	                           $save = $path_parts['dirname'].DIRECTORY_SEPARATOR.$epaperfilename."_".($i+$pagenumberstart).".jpg";
	                           exec('convert "'.$filepath.'['.$i.']" -colorspace RGB -resize 1700x1000 "'.$save.'"', null, $r);
	                           //exec('convert "'.$filepath.'['.$i.']" -colorspace RGB -resize 1700 -quality 90% "'.$save.'"', $o, $r);
	                          //exec('convert "'.$filepath.'['.$i.']" -colorspace RGB -resize 1700 "'.$save.'"', $o, $r);
	                         //echo $i;
	                        // if($i==0){
	                         //create thumbnail
	                           
	                             $save = $path_parts['dirname'].DIRECTORY_SEPARATOR.$epaperfilename."_thumb_".($i+$pagenumberstart).".jpg";
	                           // exec('convert "'.$pdf.'['.$i.']" -colorspace RGB -resize 800 -quality 70% "'.$save.'"', $o, $r);
	                            exec('convert "'.$filepath.'['.$i.']" -colorspace RGB -resize 222x350 "'.$save.'"', null, $r);
	                          //}*/
		     
		     
		       // $path_parts = pathinfo($filepath);
                       // $save = $path_parts['dirname'].DIRECTORY_SEPARATOR.$epaperfilename.".jpg";
                       // exec('convert "'.$filepath.'" -colorspace RGB -resize 800 "'.$save.'"', $o, $r);
		/*$img = new imagick();
		 
		//this must be called before reading the image, otherwise has no effect - "-density {$x_resolution}x{$y_resolution}"
		//this is important to give good quality output, otherwise text might be unclear
		$img->setResolution(150,150);
		
		$img->readImage($filepath);
		
		$num_pages = $img->getNumberImages();
		//$pdftext = file_get_contents($filepath);
               // $num_pages = (int)preg_match_all("/\/Page\W/", $pdftext,$dummy);
		for($i=0;$i<$num_pages;$i++)
		{
			$img->setIteratorIndex($i);
			
			//read the pdf
			//$img->readImage("{$filepath}[$i]"); // 0- 13
			 
			//reduce the dimensions - scaling will lead to black color in transparent regions
			$img->scaleImage(1700,0);
			 
			//set new format
			$img->setImageFormat('jpg');
			 
			$img->setCompressionQuality(95);
			 
			//save image file
			$path_parts = pathinfo($filepath);

			$preview_status = $img->writeImages( $path_parts['dirname'].DIRECTORY_SEPARATOR.$epaperfilename."_".($i+$pagenumberstart).".jpg" ,false);
			if($i == 0)
			{
				$maxsize=350;
				if($img->getImageHeight() <= $img->getImageWidth())
				{
					// Resize image using the lanczos resampling algorithm based on width
					$img->resizeImage($maxsize,0,Imagick::FILTER_LANCZOS,1);
				}
				else
				{
					// Resize image using the lanczos resampling algorithm based on height
					$img->resizeImage(0,$maxsize,Imagick::FILTER_LANCZOS,1);
				}

				// Set to use jpeg compression
				$img->setImageCompression(Imagick::COMPRESSION_JPEG);
				// Set compression level (1 lowest quality, 100 highest quality)
				$img->setImageCompressionQuality(75);
				// Strip out unneeded meta data
				$img->stripImage();
				// Writes resultant image to output directory
				$img->writeImage($path_parts['dirname'].DIRECTORY_SEPARATOR.$epaperfilename."_thumb_".($i+$pagenumberstart).".jpg");
			}
		}*/
		return $command;
	}
	function get_epaper_short($folders,$clientid,$date,$areacodeid=false)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('publishdate',$date);
		if($areacodeid)
		{
			$this->db->where('areacodeid',$areacodeid);
		}
		$this->db->join('area','area.id = epaper.areacodeid');
		$this->db->select('epaper.id,epaper.publishdate,epaper.clientid,epaper.filename,area.areacode,area.name');

		$query = $this->db->get('epaper');

		$allepaper = array();
		foreach ($query->result() as $row)
		{
			$singleepaper = array();

			$singleepaper['id'] = $row->id;
			

			if($row->filename !== "")
			{
				$singleepaper['filename'] = base_url($folders['epaperfilespath'].$row->filename);
				$path_parts = pathinfo($singleepaper['filename']);
				$singleepaper['preview'] = $path_parts['dirname'].DIRECTORY_SEPARATOR.$path_parts['filename']."_thumb_1.jpg";
			}
			else
			{
				$singleepaper['filename'] = "";
				$singleepaper['preview'] = "";
			}

			$dt = new DateTime($row->publishdate,new DateTimeZone('GMT'));
			$dt->setTimeZone( new DateTimeZone("Asia/Kolkata") );
			$singleepaper['date'] = $dt->format("d-m-Y");

			$singleepaper['area'] = $row->name;

			array_push($allepaper, $singleepaper);
		}
		return $allepaper;
		//return $this->db->last_query();
	}
	function get_pdf_by_id($epaperid)
	{
		$this->db->where('id',$epaperid);
		$this->db->select('filename,totalpages');
		$query = $this->db->get('epaper');
		if($query->result())
		{
			$outputArray = $query->result()[0];
			return $outputArray;
		}
		else
			return false;
	}
	function delete_epaper($epaperid)
	{
		$this->db->where('id',$epaperid);
		$this->db->delete('epaper');
	}
	function epaper_exists($date,$areacodeid,$clientid)
	{
		$this->db->where('publishdate',$date);
		$this->db->where('areacodeid',$areacodeid);
		$this->db->where('clientid',$clientid);
		$query = $this->db->get('epaper');
		$cnt = $query->num_rows();
		if($cnt > 0)
			return true;
		else
			return false;
	}
	function get_last_epaper_date($clientid,$areacodeid = false)
	{
		$this->db->where('clientid',$clientid);
		if($areacodeid)
			$this->db->where('areacodeid',$areacodeid);
		$this->db->select_max('publishdate');
		$query = $this->db->get('epaper');
		if($query->result())
			return $query->result()[0]->publishdate;
		else
			return false;
	}
}