<?php

/* 
Plugin Name: Yoda Post Titles 
Plugin URI: http://www.pixeldevels.com
Description: Plugin for transforming your post titles into Yoda's well-known elocution style
Author: Remy Martin, Jenny Sharps
Version: 1.0 
Author URI: http://www.pixeldevels.com
*/ 

/*

$string = 'Product pages for e-commerce websites are often rife with ambitious intentions: Recreate the brick-and-mortar shopping experience. Provide users with every last drop of product information. Build a brand persona. Establish a seamless checkout process???';

//$string = 'Can\'t you establish a seamless checkout process???';

//$string = 'New High-Quality Free Fonts!';

$string = 'Custom Post Types for WordPress';

echo yodafy($string);

*/

function pdv_Yodafy($string)
{
	$sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
	$words = explode(' ', $sentences[0]);

	count($sentences) > 1 ? $punctuation = $sentences[1] : $punctuation = '... yes...';

	if(count($words) > 2) 
	{
		$subject = array_slice($words, 0, 2);
		$predicate = array_slice($words, 2);

		$yTitle = ucfirst(implode(" ", $predicate)) . ', ' . implode(" ", $subject) . $punctuation . ' ';

		stristr($punctuation, '?') ? $yTitle .= ' Hmmm...' : 0;
	}

	return $yTitle;
}


/*
 * Add WP Post title filter to apply Yoda titles
 *
 */
 add_filter('single_post_title', 'pdv_Yodafy', 10, 1);