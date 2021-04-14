<?php
define('AWS_S3_KEY', 'XXX');
define('AWS_S3_SECRET', 'XXX');
define('AWS_S3_REGION', 'ap-southeast-1');
define('AWS_S3_BUCKET', 'buckettestbp');
define('AWS_S3_URL', 'http://s3.'.AWS_S3_REGION.'.amazonaws.com/'.AWS_S3_BUCKET.'/');
$fileURL = 'file/test.txt';
if (!file_exists('/tmp/tmpfile')) {
  mkdir('/tmp/tmpfile');
}
    
$tempFilePath = '/tmp/tmpfile/' . basename($fileURL);
$tempFile = fopen($tempFilePath, "w") or die("Error: Unable to open file.");
#$tmpfile = './file/test.txt';
#$file = './file/test.txt';
if (defined('AWS_S3_URL')) {
  // Persist to AWS S3 and delete uploaded file
  require_once('S3.php');
  S3::setAuth(AWS_S3_KEY, AWS_S3_SECRET);
  S3::setRegion(AWS_S3_REGION);
  S3::setSignatureVersion('v4');
  S3::deleteObject(AWS_S3_BUCKET, $fileURL);
  unlink($tempFilePath);
} else {
    echo"error";
}