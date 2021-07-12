<?php 
//this is the format for every request or something like that idk5


//The Access-Control-Allow-Origin is responsible for saying who is allowed to send post and get request to this file, if you want to 
// block it to only you, include your url.
// eg:
// header("Access-Control-Allow-Origin: www.example.com");
header("Access-Control-Allow-Origin: * ");
//The Access-Control-Allow-Methods says what methods are allowed to be send (GET/POST/PUT/DELETE). If you want to only send one type of method
// change the * to your desired method.
header("Access-Control-Allow-Methods: *");
//checks for a URL (Optional)

if(isset($_SERVER['HTTP_REFERER']))
{
//sanitizes the data by using a character filter and checking for its length.  
    if(preg_match('/^[a-zA-Z\s]*$/',$_GET['state']) && strlen($_GET['state']) < 35)
    {
     $fileName = "subdiv/".$_GET['state'] .".json.txt";
//checks the selected file content type to once again, make sure it is the correct file.
        if(mime_content_type($fileName) == "application/json")
        {
//this function will get the content of the state file.
            echo file_get_contents($fileName);
            http_response_code (200);
            return; 
        }
        else{
            http_response_code (404);
            return; 
        }
   
    }
    else {
        http_response_code (404);
        return; 
    }
}
else{
    http_response_code (404); 
        return;
}
http_response_code (404); 
        return;

    
   



?>