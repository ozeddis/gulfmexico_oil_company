<?php 
$url = 'http://localhost/mecobank/public_html/app/includes/test.php?p=?sjhdhuw';

// Parse the URL and get the path and query
$parsed_url = parse_url($url);

// Concatenate the path and query parts
$path_and_query = $parsed_url['path'] . (isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '');

echo $path_and_query; // Output: app/includes/test.php?p=?sjhdhuw


// Define the base path you want to remove
$base_path = "/mecobank/public_html";

// Remove the base path from the beginning of the extracted path
$relative_path = str_replace($base_path, "", $path_and_query);
echo "<br>" . $relative_path; // Output: app/includes/test.php