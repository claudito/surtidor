<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class SurtidorController extends Controller
{
    //

 function index(){



 }



 function get_data(){

   try {
   	
$conexion = new PDO(
"sqlsrv:Server=".env('DB_HOST').";database=".env('DB_DATABASE')."",
"".env('DB_USERNAME')."",
"".env('DB_PASSWORD')."",
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")

);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$query       = "SELECT  

id,
idVenta,
fecha,
RTRIM(LTRIM(surtidor))surtidor,
RTRIM(LTRIM(manguera))manguera,
producto,
cantidad,
precio,
total


 FROM [escienza].dbo.Surtidor";
$statement   = $conexion->prepare($query);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

return $result;

   } catch (Exception $e) {


   	return $e->getMessage();
   	
   }





 }


}
