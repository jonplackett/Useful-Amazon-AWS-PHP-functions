<?php

include('amazon.inc.php');


$files_to_upload = array();

$files_to_upload[] = array('monkey.jpg','monkey.jpg');
$files_to_upload[] = array('monkey2.jpg','monkey2.jpg');

uploadToS3( $s3Client, $bucket, $files_to_upload );


?>