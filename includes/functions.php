<?php

function is_administrator($name ='Samuel', $value = 'Clemens') {

	if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
return true; } else {
return false; }
}

/**
 * Modifies a string to remove all non ASCII characters and spaces.
 */
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
 
    // trim
    $text = trim($text, '-');
 
    // transliterate
    if (function_exists('iconv'))
    {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }
 
    // lowercase
    $text = strtolower($text);
 
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
 
    if (empty($text))
    {
        return 'n-a';
    }
 
    return $text;
}
 

function get_categories() {
// query database for a list of categories
$conn = db_connect();
$query = "select catid, catname from categories"; 
$result = @$conn->query($query);
if (!$result) {return false; }
$num_cats = @$result->num_rows; if ($num_cats == 0) {
return false; }
$result = db_result_to_array($result);
return $result; }


?>