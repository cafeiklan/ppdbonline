<?php
if(!function_exists('filter_submittedform')){
function filter_submittedform($submitted_forms){
	$array = array();
	foreach(array_keys($submitted_forms) as $forms){
		$array[$forms] = strfilter($submitted_forms[$forms]);
	}
	return $array;
}
}

if(!function_exists('strfilter')){
function strfilter($input)
	{
	$input=trim($input);
	$input=strip_tags($input);
	$input=nl2br($input);
	$input=addslashes($input);
	$input=stripslashes($input);
	$input=str_ireplace("'", "%", $input);
	$input=str_ireplace( "''", '%', $input );
	$input=str_ireplace( '""', '%', $input );
	$query = preg_replace( '|(?<!%)%s|', "'%s'", $input );
	$input=htmlentities($input, ENT_QUOTES);
	$input=ltrim($input);
	$input=rtrim($input);
	return $input;
	}
}
?>
