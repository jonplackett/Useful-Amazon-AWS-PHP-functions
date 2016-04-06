# Useful-Amazon-AWS-PHP-functions



Copyright (c) 2016 Jonathan Plackett

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.




# This is a collection (so far just one) of functions to do basic but useful AWS stuff.

1) Upload things to an S3 bucket.

HOW TO USE

include('amazon.inc.php'); // include the functions

$files_to_upload = array(); //create an array to hold the files you want to upload

$files_to_upload[] = array('monkey.jpg','monkey.jpg'); // add files to your array (local filename , remote filename on s3)
$files_to_upload[] = array('monkey2.jpg','monkey.jpg');

uploadToS3( $s3Client, $bucket, $files_to_upload ); //call upload.

// currently it echo's out success and errors, change this to whatever behaviour you would like.
