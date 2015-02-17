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
 
//takes a MySQL result identifier and returns a numerically indexed array of rows, where each row is an associative array
function db_result_to_array($result) { 
    $res_array = array();
    for ($count=0; $row = $result->fetch_assoc(); $count++) { 
        $res_array[$count] = $row;
    }
    return $res_array; 
}



function get_categories() {
    // query database for a list of categories
    $conn = db_connect();
    $query = "select id, name from categories";     
    $result = @$conn->query($query);
    if (!$result) {return false; }
    $num_cats = @$result->num_rows; 
    if ($num_cats == 0) {return false; }
    $result = db_result_to_array($result);
    return $result; 
}
function display_categories($cat_array) { if (!is_array($cat_array)) {
echo "<p>No categories currently available</p>";
return; }
echo "<ul>";
foreach ($cat_array as $row) {
$url = "show_cat.php?catid=".($row['catid']); $title = $row['catname'];
echo "<li>";
do_html_url($url, $title);
echo "</li>"; }
echo "</ul>";
echo "<hr />"; }

?>