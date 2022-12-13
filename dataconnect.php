
<?php
//Author: Kamal Patel, 000863596 
//Date : 20-November 2022
//database connectivity
include "connect.php";

session_start();

//session variable named count is created to store the values in session_id column.
if(!isset($_SESSION['count'])){
    $_SESSION['count']=0;
}
//if add to cart button is clicked then this condition will be executed.
if(isset($_POST['productid'])){
    
    $_SESSION['count']++;
    //count variable value is stored in sessioncount.
    $sessioncount= $_SESSION['count'];
    //value of parameter productid passed is stored in id.
    $id= $_POST['productid'];

    //product of product_id is stored in product variable.
$query= "SELECT * FROM catalogue where product_id='$id'";
$cursor = $dbh->query($query);
$product= $cursor->fetch();
$productquan = $product['product_quantity']-1;  //product quantity is decreased.
//echo $product['product_id'];    
$productid= $product['product_id'];
            //catalogue table updated with new quantity
            $command1= "UPDATE catalogue SET product_quantity= '$productquan' WHERE product_id= '$productid' ";
            $result1 = $dbh-> exec($command1);
            //Inserting data in session table
             $command = "INSERT INTO session (session_id,session_data)
                  VALUES ( '$sessioncount','$product[product_id]')";
             $result = $dbh->exec($command);
             //Join query to send json data using jsondata array.
             $query = "SELECT catalogue.product_price, catalogue.product_name, session.session_id, session.session_data, catalogue.product_quantity FROM session INNER JOIN catalogue ON catalogue.product_id = session.session_data ";
             $cursor1=$dbh->query($query);
             $item=$cursor1->fetchAll();
             $jsondata=[];
             //values got from the query are pushed in the array
             foreach($item as $i){
                  array_push($jsondata, ["id"=>$i['session_id'], "product_id"=>$i['session_data'], "product_price"=>$i['product_price'], "product_name"=>$i['product_name'], "product_quantity"=>$i['product_quantity']]);
             }
             
            }
             
//if remove button is clicked then this condition will be executed.            
if(isset($_POST['removeproductid'])){
    //value of parameter removeproductid passed is stored in removeid.
    $removeid= $_POST['removeproductid'];
    $query = "SELECT * FROM session";
    $cursor1=$dbh->query($query);
    $item=$cursor1->fetchAll();
    $query= "SELECT session_data, session_id FROM session WHERE session_id='$removeid'";
            $cursor= $dbh->query($query);
            $product= $cursor->fetch();
            $productid= $product['session_data'];
            $query= "SELECT * FROM catalogue where product_id='$productid'";
            $cursor = $dbh->query($query);
            $product= $cursor->fetch();
            $productquan = $product['product_quantity']+1;     //product quantity updated.
            //updating the catalogue table.
            $command1= "UPDATE catalogue SET product_quantity= '$productquan' WHERE product_id= '$productid' ";
            $result1 = $dbh-> exec($command1);

            
    foreach($item as $value){
        if($value['session_id']==$removeid){
            //deleting the product from session table
            $query= "DELETE FROM session WHERE session_id= '$removeid'";
            $result = $dbh->exec($query);
        }
        //Join query to send json data using jsondata array.
        $query= "SELECT catalogue.product_price, catalogue.product_name, session.session_id, session.session_data, catalogue.product_quantity FROM session INNER JOIN catalogue ON catalogue.product_id = session.session_data ";
             $cursor1=$dbh->query($query);
             $item=$cursor1->fetchAll();
             $jsondata=[];
             //values got from the query are pushed in the array
             foreach($item as $i){
                  array_push($jsondata, ["id"=>$i['session_id'], "product_id"=>$i['session_data'], "product_price"=>$i['product_price'], "product_name"=>$i['product_name'], "product_quantity"=>$i['product_quantity']]);
             }
        
    }
    }   //json encoded data is returned.
        echo json_encode($jsondata);

   ?>

