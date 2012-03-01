<?
/*
* Lets set up our dynamic css document
*/ 

// this will trick the browser into thinking that this is a css file
header("Content-type: text/css"); 

/* 
*
* now lets make sure we can access all of our WordPress functions from inside this file
* we have to jump up 4 directories to get to the root of our WordPress install
* this will not work if you have moved your wp-content directory. For more information on that see http://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content
*
*/

require( '../../../../wp-load.php');

/*
* now lets create all of our variables that we will include in the stylesheet
*/


?>
