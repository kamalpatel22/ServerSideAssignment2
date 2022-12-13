
<?php
//Author: Kamal Patel, 000863596 
//Date : 20-November 2022
//database connectivity
include "connect.php";
//Join query to send json data using jsondata array.
$command = "SELECT catalogue.product_price, catalogue.product_name, session.session_id, session.session_data, catalogue.product_quantity FROM session INNER JOIN catalogue ON catalogue.product_id = session.session_data ";
     $cursor=$dbh->query($command);
     $item=$cursor->fetchAll();
     $jsondata=[]; //array created
     //values got from the query are pushed in the array
     foreach($item as $i){
          array_push($jsondata, ["id"=>$i['session_id'], "product_id"=>$i['session_data'], "product_price"=>$i['product_price'], "product_name"=>$i['product_name'], "product_quantity"=>$i['product_quantity']]);
     }
     //json encoded data is returned.
     echo json_encode($jsondata);
     ?> 