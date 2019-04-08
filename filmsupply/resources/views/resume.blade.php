<?php
$string = file_get_contents(asset('resume.json'));
$json_file = json_decode($string);

print_r($json_file);
