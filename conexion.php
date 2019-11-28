<?php



try {
   
    $base = new PDO ("mysql:host=localhost;dbname=login","root", "Admin09");
     
   

}catch(Exception $e){
     
     die('errror'+ $e->getMesssage());
}
