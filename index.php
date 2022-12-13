<!DOCTYPE html>
<html lang="en">
<!-- Author: Kamal Patel, 000863596 
Date : 20-November 2022
Here I have created a website for my business where I am trying to sell some gaming products.
I have used Best Buy to get the product name, description and price.
I have also used the cart logo and the background image from google.
For css I have used bootstrap for some parts.
Reference: 
https://www.bestbuy.ca/en-ca
https://www.google.com/
-->
<?php
session_start();
if (!isset($_SESSION['cart'])) {            //Session array named cart. Used to store ID's of the product that we add to cart.
    $_SESSION['cart'] = array();
}

if (!isset($_SESSION['count'])) {            //Session variable named count. Temporary variable used for calling create_datafile. If count is 1 then create_datafile will be not called.
    $_SESSION['count'] = 0;
}
include "connect.php";
?>

<head>
    
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Hellrocker Gaming Company</title>
    <style>
        body {
            background-image: url('images/ads/background.jpg');
        }

        ul {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        a.buttonlinks {
            text-decoration: none;
            color: #808080;
        }

        #logomain {
            margin: auto;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        #graphic_card,
        #processor,
        #accessory,
        #all {
            background-color: white;
            border: solid 2px #808080;
            border-radius: 5px;
            color: #808080;
            text-align: center;
            padding-left: 18px;
            padding-right: 18px;
            padding-bottom: 8px;
            padding-top: 8px;
            margin: 20px;
        }

        :hover#graphic_card,
        :hover#processor,
        :hover#accessory,
        :hover#all {
            color: #003557;
        }

        #buttons {
            text-align: center;
            grid-column: 1 / 4;
            grid-row: 2;
            background-color: #D3D3D3;
            padding: 15px;
            border-color: #808080;
            border-style: solid;
            border-left: none;
            border-right: none;
        }

        nav li {
            display: inline;
            list-style-type: none;
            padding: -30px;
            margin: auto;

        }

        img#logo {
            position: relative;
            width: 35%;
            height: 50%;
            margin: auto;
            left: 30px;
        }

        .sm {
            height: 30%;
            width: 17%;
        }

        .tablediv {
            top: 0;
        }

        #total {
            margin-left: 640px;
        }

        #nextbutton {
            position: relative;
            left: 10px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-color: black;
            border-style: solid;
        }

        

        #prevbutton {
            position: relative;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-color: black;
            border-style: solid;
            left: 20px;
        }

        

        #addcart {
            background-color: #C6F99B;
            border-radius: 10px;
        }

        .removecart {
            background-color: #F42727;
            border-radius: 10px;
            text-decoration: none;

            color: white;
        } 

        #thcatalog {
            background-color: #D3D3D3;
        }

        #catalog {
            text-align: center;
        }

        .idlink {
            color: black;
        }

        .tablediv {
            margin: 10px;
        }

        #tablecart {
            margin: 10px;
        }

        #logocart {
            height: 20%;
            width: 40%;
            text-align: center;
            position: relative;

        }

        #removereload{
            color : red;
            text-decoration: burlywood;
            font-weight: bold;
        }
        #logocart {
            text-align: center;
        }
    </style>

<!-- Javascript using Ajax so that page doesn't load on pressing remove or add button-->
<script>
    //Global delete function for remove button.
    function deleteCart(removeid){
                let params= "removeproductid="+removeid;
                fetch("dataconnect.php",{
                    method: 'POST',
                    credentials: 'include',
                    headers: {"Content-Type": "application/x-www-form-urlencoded"},
                    body: params
                })
                    .then(response => response.json())
                    .then(success2)
            }
            //success2 function called if proper json data is fetched from delete function.
            function success2(data){
                let total=0;
                tbody = "";
                    document.getElementById('removereload').innerHTML= "Please Reload the Page to update your quantity in the catalogue table!";
                    //printing the data 
                    for (let i = 0; i < data.length; i++) {
                    
                    let row = "<tr>";
                    row += "<td>" + data[i].product_name + "</td>";
                    row += "<td> => </td>";
                    row += "<td>" + data[i].product_price + "</td>";
                    row += "<td><button type='button' class='removecart' name='remoption' onclick='deleteCart(\"" + data[i].id+ "\")'>REMOVE</button></td>";                //remove button with onclick function which calls the deleteCart Function.
                    total+= parseFloat(data[i].product_price);     //total value of the cart
                    tbody += row;    
                    
                    //document.getElementById('quan'+data[i].product_id).innerHTML= data[i].product_quantity;    
                }
                
                //printing the total price of the cart.
                let row = "<tr>";
                if(total>0){                //if total is greater than 0 then only its value will be shown. 
                        row += "<td> Total: $"+ total+ "</td>";
                        //document.getElementById("empty").style.display = "none";    
                    }
                row += "</tr>";
                    tbody += row;
                    //table for add to cart 
                document.getElementById("tbody").innerHTML = tbody;
            }

        window.addEventListener("load", function () {
           
            reloaddata();
            let key= 0;

            //add to cart button event listener.
            document.getElementById("addcart").addEventListener("click", function () {
                let id = document.getElementById("hiddenid").value;
                let params= "productid="+ id; 
                //let sessionid = document.getElementById("hiddenid2").value;
                
                    //fetching the json data that we get from dataconnect file.
                    fetch("dataconnect.php",{
                        method: 'POST',
                        credentials: 'include',
                        headers: {"Content-Type": "application/x-www-form-urlencoded"},
                        body: params
                    })
                    .then(response => response.json())
                    .then(success)
            })

            function success(data) {
                let total=0;
                console.log(data[0]);
                
                tbody = "";
                for (let i = 0; i < data.length; i++) {
                    let row = "<tr>";
                    row += "<td>" + data[i].product_name + "</td>";
                    row += "<td> => </td>";
                    row += "<td>" + data[i].product_price + "</td>";
                    row += "<td><button type='button' class='removecart' name='remoption' onclick='deleteCart(\"" + data[i].id+ "\")'>REMOVE</button></td>";
                    row += "</tr>";
                    total+= parseFloat(data[i].product_price);
                    tbody += row;
                    //if quantity goes 0 then add to cart button will disable.
                    if(data[i].product_quantity==0){
                        document.getElementById("addcart").style.display= "none";
                    }
                }
                let row = "<tr>";
                if(total>0){
                        row += "<td> Total: $"+ total+ "</td>";
                    }
                row += "</tr>";
                    tbody += row;
                document.getElementById("tbody").innerHTML = tbody;
            }
            

            //reloading data everytime the page loads.
            function reloaddata(){
                
                url = "sessiondata.php";
                //fetching the json data that we get from sessiondata file.
                fetch(url)
                    .then(response => response.json())
                    .then(success3)
            }

        
            function success3(data) {
                let total=0;
                console.log(data[0]);
                //print_r(data);
                tbody = "";
                for (let i = 0; i < data.length; i++) {
                    let row = "<tr>";
                    row += "<td>" + data[i].product_name + "</td>";
                    row += "<td> => </td>";
                    row += "<td>" + data[i].product_price + "</td>";
                    row += "<td><button type='button' class='removecart' name='remoption' onclick='deleteCart(\"" + data[i].id+ "\")'>REMOVE</button></td>";
                    row += "</tr>";
                    total+= parseFloat(data[i].product_price);
                    tbody += row;
                 }
                let row = "<tr>";
                if(total>0){
                        row += "<td> Total: $"+ total+ "</td>";
                    }
                row += "</tr>";
                    tbody += row;
                document.getElementById("tbody").innerHTML = tbody;
            }
        });
     </script>

</head>

<body>

        <?php
            //categories are added to the array to make the category part as dynamic so that whenever a new item with new category is added to the database then it will be added to website by iteself.
            $category = array();
            $categorycheck = "SELECT product_category FROM catalogue ";
        
            $cursor = $dbh->query($categorycheck);
            $itemsCategory = $cursor->fetchAll();
            foreach($itemsCategory as $loopCategory){
            if(!in_array($loopCategory["product_category"],$category)){
            array_push($category,$loopCategory["product_category"]);
            }
            
            }


        ?>

        
    <div id="logomain">
        <img id="logo" src="images/logo.png" alt="logo" title="logo">
        <!--Logo of my bussiness-->
    </div>

    <nav id="buttons">
        <!--Category links -->
        <ul>
            <?php
            
        foreach($category as $c){?>
                <li id="all"><a class="buttonlinks" href="index.php?category=<?=$c?>"><?=$c?></a></li>
            <?php } ?>
            <li id="all"><a class="buttonlinks" href="index.php">All</a></li>
        </ul>
    </nav>

    <!--Main part of the file -->
    <div id="main">
        <?php
        $limit =7;      //limit is set to 7 as we want only 7 items on one page.
        //paging logic is implemented here. Reference used: https://stackoverflow.com/questions/41777993/php-pagination-next-previous-button
        if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
    {
        $page=1; 
    }  
    $record_index= ($page-1) * $limit;                      //variable used for paging
    
// to store the number of records in catalogue table. 
$sqlCount = "SELECT * FROM catalogue";
$cursor = $dbh->query($sqlCount);
$itemsCount = $cursor->fetchAll();

        //if any category is clicked then this query will be executed
        if(isset($_GET['category'])){
            $cat= $_GET['category'];
        $command = "SELECT product_id, product_name, product_description , product_price ,product_category, product_quantity FROM catalogue  where product_category = '$cat'  LIMIT $record_index, $limit";
        }
        
        //if any id is clicked then this query will be executed.
        else if(isset($_GET['id'])){
            $parid= $_GET['id'];
            $command = "SELECT product_id, product_name, product_description , product_price ,product_category, product_quantity FROM catalogue where product_id = '$parid ' ";
        }
        
        //else all data will be displayed.
        else{
        $command = "SELECT product_id, product_name, product_description , product_price ,product_category, product_quantity FROM catalogue LIMIT $record_index, $limit";
        
        }
        
        $cursor = $dbh->query($command);
        $items = $cursor->fetchAll();

        //next button disables at the first page of category
        if(isset($_GET['category'])){
            if($record_index + 7 >= sizeof($items) ) {
            echo"
            <style>
            #nextbutton
            {
                display:none;
            }
            </style>";
            
            }
        }
        //previous button disable code for first page
        if($record_index + 7 >= sizeof($itemsCount) ) {
            echo"
            <style>
            #nextbutton
            {
            display:none;
            }
            </style>";
            
        }
        //next button disable code for last page
        if($record_index==0){
            echo"
            <style>
            #prevbutton
            {
            display:none;
            }
            </style>";
        }
        
        ?>
        <div class="d-flex">
            <div class="col-8 m-2 tablediv">

            <!--Catalog table print-->
                <table class="table">
                    <tr class="thcenter">
                        <th id="thcatalog" colspan="4">Catalog</th>
                    </tr>
                    <tr class="tr_class">
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>In Stock?</th>
                    </tr>

                    <?php
                    
                        foreach ($items as $pcitems  => $value) {

                            //if any id is clicked this print part will run.
                            if(isset($_GET['id'])){
                                //disabling the header and printing new header if any id is clicked.
                            ?>
                            <style>
                                .tr_class{
                                    display:none;
                                }
                            </style>
                            <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            </tr>
                            <tr>
                            <td><?= $items[$pcitems]['product_id'] ?></td>
                            <td><?= $items[$pcitems]["product_name"] ?> </td>
                            <td><?= $items[$pcitems]["product_description"] ?></td>
                            <td><?= $items[$pcitems]['product_price'] ?></td>
                            </tr>
                            <tr>
                                <?php 
                                //quantity is greater than 0 then only add to cart button will show.
                                if($items[$pcitems]['product_quantity']>0){ ?>
                                <td> <input type="hidden" id="hiddenid" value=<?=$items[$pcitems]['product_id']?>></td>
                                <td><button type="submit" id="addcart" value="addtocart" name="addtocart">Add to cart</button></td>
                                    
                            <?php } ?>
                            </tr>
                            
                            <?php
                            //next and previous button disables when any id is clicked.
                            echo "<style>
                            thead {
                                display: none;
                            }
                            #nextbutton, #prevbutton{
                                display : none;
                            }
                            </style>";
                            }
                            //category query and printing all products query will be used here to print.
                        else{
                            
                            ?>
                            <tr>
                                <td><a href='index.php?id=<?= $items[$pcitems]['product_id'] ?>'><?= $items[$pcitems]['product_id'] ?></a></td>
                                <td><?= $items[$pcitems]["product_name"] ?></td>
                                <td><?= $items[$pcitems]['product_price'] ?></td>
                                <?php
                                //if quantity is zero then out of stock will be printed
                                    if ($items[$pcitems]['product_quantity'] == 0) {
                                    echo "<td id = 'outOfStock" .$items[$pcitems]['product_id']."'>Out Of Stock</td>";
                                    } else {
                                ?>
                                    <td id="quan<?=$items[$pcitems]['product_id']?>"><?= $items[$pcitems]['product_quantity'] ?></td>
                                <?php
                                    }
                                ?>
                                </tr>
                
                            <?php
                        }
                    }
                    ?>
                </table>

                <?php

                //next and previous button.
        echo "<a id='nextbutton' href='index.php?page=".($page+1)."&next=0' class='button'>NEXT</a>";
        
        
        echo "<a id='prevbutton' href='index.php?page=".($page-1)."&pre=0' class='button'>Previous</a>";
        ?>
                
            
                
            </div>
            
            <!--To print the cart-->
            <div id="cartdiv" class='cart col-sm'>
                <div id="cartlogo">
                    <img id="logocart" src="images/cart.png" />
                </div>
                <div>
                    <!-- <?php
                    $total = 0;   
                    $command = "SELECT * FROM session"; 
                    $cursor = $dbh->query($command);
                    $sessiontable = $cursor->fetchAll();
                    ?> -->
                    <p id='removereload'> </p>
                    <!--add to cart table will be printed in id tbody using AJAX.-->
                    <table class="table" id="tablecart">
                    <tbody id='tbody'></tbody>
                        
                        
                    </table>
                </div>
            </div>

        </div>
    </div>
    <?php

    ?>
</body>

</html>