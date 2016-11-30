<?php
	if(isset($_POST['generateStatus']))
	{
		$status=array('0' => 'Successful','1'=>'Error','2'=>'Bad Request','3'=>'Request Not Found' );
    	$key = array_rand($status);
    	$value = $status[$key];
		echo $value;
	}
	else
	{
	  switch($_FILES['file']['error'])
	  {	
	 	case 0:
			$uploaddir = realpath('./') . '/';
			$uploadfile = $uploaddir . basename($_FILES['file_contents']['name']);
  			echo $_FILES['file']['name']." is uploaded.";
			move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile);
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
?> 
