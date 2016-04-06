<?php
include("credentials.inc.php"); // put your credentials here - eg. $AccessKeyID = 'XXXXX'; $SecretAccessKey = 'XXX'; $bucket = 'XXX';
require("aws.phar"); //download from amazon - http://docs.aws.amazon.com/aws-sdk-php/v2/guide/installation.html#installing-using-the-php-archive-phar

use Aws\S3\S3Client;
use Aws\Common\Credentials\Credentials;

$credentials = new Credentials($AccessKeyID, $SecretAccessKey); // create in the iam in the AWS console, put the variables here or in a credentials.inc.php


$s3Client = S3Client::factory(array(
    "credentials" => $credentials
));




function uploadToS3($s3Client, $bucket, $files, $access = "public-read") // <- an array of files to upload. each item is an array with local filename and s3 filename
{

	try 
		{
	   
		// $files is an array
		// each object is another array containing local_file_url at index 0 and s3 filename at index 1
		
		$commands = array(); // create a list of commands to execute all in one go - faster for multi file uploads

		for($i= 0; $i < count($files); $i ++)
			{

			if(file_exists( $files[$i][0] ) ) // check the local file exists
				{

				$attempting = $files[$i][0];
				
				$commands[] = $s3Client->getCommand("PutObject", array(
						"ACL"        => $access,
						"Bucket" => $bucket,
						"Key"    => $files[$i][1],
						"Body"   => file_get_contents( $files[$i][0] ),
					));	
				}
			else
				{
					print "'".$files[$i][0]."' not found. ";
				}
			}

		if(count($commands))
			{
			$result = $s3Client->execute($commands);
			}
		else
			{
			print "No files to upload. ";
			return false;
			}

		

		}

	catch (Exception $e) 
		{
		if (strpos($e->getMessage(), "NoSuchBucketException") !== false) 
			{
		    echo "bucket '$bucket' does not exist";
			}
		else
			{
			echo "Caught exception: ",  $e->getMessage(), "\n";
			}
    	
    	return false;
		}

	print "DONE. ";
	
	return true;


}





?>