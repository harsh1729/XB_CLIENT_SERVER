<?php
$singlenewsdata['size'] = 12 / $news_in_rows;
//echo count($categorynews);
foreach ($categorynews as $index => $row)
{
	if($index % $news_in_rows == 0)
	{
		if($index == 0)
		{
			echo "<div class='row'>";
				
				
		}
		else
		{
			echo "</div>";
			echo "<div class='row'>";
		}
	}
	$singlenewsdata['id'] = $row['id'];
	$singlenewsdata['image'] = $row['image'];
	$singlenewsdata['heading'] = $row['heading'];
	$singlenewsdata['datetime'] = $row['datetime'];
	$this->load->view($datafoldername.'view-parts/detail-view-category-single-news',$singlenewsdata);
	
	if($index == count($categorynews)-1)
		echo "</div>";
}
?>