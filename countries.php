<?php 


//The Access-Control-Allow-Origin is responsible for saying who is allowed to send post and get request to this file, if you want to 
// block it to only you, include your url.
// eg:
// header("Access-Control-Allow-Origin: www.example.com");
header("Access-Control-Allow-Origin: *");
//The Access-Control-Allow-Methods says what methods are allowed to be send (GET/POST/PUT/DELETE). If you want to only send one type of method
// change the * to your desired method.
header("Access-Control-Allow-Methods: *");

//checks for a URL (Optional)
if(isset($_SERVER['HTTP_REFERER']))
{
//this function will get the content of the country.json file.
//if you're using this function in a dinamic way, don't forget to sanitize the data. Some hackers can find ways to get system files
// through this function if not correctly sanitized.
    echo file_get_contents("country.json");
//the http_response_code(200) will send a success message to the client browser with the json.
        http_response_code (200);
        return; 
}
else{
    http_response_code (404); 
        return;
}
http_response_code (404); 
        return;

    
   



?>