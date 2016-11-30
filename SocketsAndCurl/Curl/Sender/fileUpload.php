<?php
  	function generateStatus()
  	{
      $sendRequest = curl_init('http://localhost/SocketsAndCurl/Curl/Receiver/fileReceive.php');
      curl_setopt($sendRequest, CURLOPT_POST, true);
      curl_setopt($sendRequest,CURLOPT_POSTFIELDS,"generateStatus=".$_POST['generateStatus']);
      curl_setopt($sendRequest, CURLOPT_RETURNTRANSFER, true);
      echo curl_exec($sendRequest);
      curl_close($sendRequest);
    }
    
    function uploadFile()
     {
        switch($_FILES['file']['error'])
       {
          case 0:
                 $fileName=$_FILES['file']['name'];
                 $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
                 $fileTypeAllowed=['png','jpg','jpeg','gif','pdf','xls','csv','txt','php'];
                 if(!in_array($fileType, $fileTypeAllowed))
                 {
                   echo "Entered file type is not supported"."<br />"."Please enter the file with only 
                   (png,jpg,jpeg,gif,pdf,xls,csv,txt,php) extensions";
                 }
                 else
                 {
                    $sendRequest = curl_init('http://localhost/SocketsAndCurl/Curl/Receiver/fileReceive.php');
                    curl_setopt($sendRequest, CURLOPT_POST, true);
                    curl_setopt($sendRequest,CURLOPT_POSTFIELDS,
                    array(
                        'file' =>
                        '@' .$_FILES["file"]['tmp_name']. ';fileName=' .$_FILES["file"]['name']
                    ));
                    curl_setopt($sendRequest, CURLOPT_RETURNTRANSFER, true);
                    echo curl_exec($sendRequest);
                    curl_close($sendRequest);
                    echo "File uploaded successfully";
                 }
                 break;
          
          case UPLOAD_ERR_INI_SIZE: 
                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
                 break; 
          
          case UPLOAD_ERR_FORM_SIZE: 
                echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                 break; 
          case UPLOAD_ERR_PARTIAL: 
                echo "The uploaded file was only partially uploaded"; 
                 break; 
          case UPLOAD_ERR_NO_FILE: 
                echo "No file was uploaded"; 
                 break; 
          case UPLOAD_ERR_NO_TMP_DIR: 
                echo "Missing a temporary folder"; 
                 break; 
          case UPLOAD_ERR_CANT_WRITE: 
                echo "Failed to write file to disk"; 
                 break; 
          case UPLOAD_ERR_EXTENSION: 
                echo "File upload stopped by extension"; 
                 break; 
           default: 
                echo "Unknown upload error"; 
                 break; 
        } 
    }

    if(isset($_POST['generateStatus']))
	{
		generateStatus();
	}
	elseif(isset($_POST['uploadFile']))
	{
		uploadFile();
	}
?>