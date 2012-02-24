<?php

/* 
Plugin Name: Yoda Post Titles 
Plugin URI: http://www.pixeldevels.com
Description: Plugin for transforming your post titles into Yoda's well-known elocution style
Author: Remy Martin, Jenny Sharps
Version: 1.0 
Author URI: http://www.pixeldevels.com
*/ 

function pdv_Yodafy($content)
{
      $sentences = preg_split('/([.?!]+)/', $content, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
	
      for($i = 0; $i < count($sentences); $i++){
      if($i % 2 == 0)
      {
        $words = explode(' ', ltrim($sentences[$i]));

	if(strlen($sentences[$i]) % 3 == 0) { 
		$chosen = true; 
	}

	if(count($sentences) > 1)
	{
		$punctuation = $sentences[$i+1];
	} else if($chosen)
        {
			$punctuation = '... yes... ';
	}
	

	if(count($words) > 2) 
	{
		$subject = array_slice($words, 0, 2);
		$predicate = array_slice($words, 2);

		$content = ucfirst(implode(" ", $predicate)) . ', ' . implode(" ", $subject) . $punctuation . ' ';

		if(stristr($punctuation, '?'))
		{
			$content .= ' Hmmm... ';
		}
	}
        $final .=$content;

	
        }
      }
        return $final;
}


/*
 * Add WP Post title filter to apply Yoda titles
 */
add_filter('the_title', 'pdv_Yodafy', 50);