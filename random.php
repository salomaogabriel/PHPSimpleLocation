<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");

if(isset($_SERVER['HTTP_REFERER']))
{
    echo file_get_contents("country.json");
    
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