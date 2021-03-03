<?php 
include "./php/db_connect.php";
require_once "createTable.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstarap CSS --> 
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!-- Google Fonts API -->
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Delius+Unicase:700" rel="stylesheet">
         
        <!------ Custom CSS ---------->
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Most Popular Baby Names 2019</title>
    </head>
    <body>
          <header>
        <div class="jumbotron">
            <div class="text-center mb-4" id="jumboText">
                <h1 class="mb-3 font-weight-normal">Most Popular Baby Names 2019</h1>
            </div>

        </div>
    </header>


<section class="search-sec" style=" background: rgba(170, 221, 221, .70);">
    <div class="container">
        <form action="votes.php" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter Name" name="name">
                        </div>
                      
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" name="gender">
                                <option>Select Gender</option>
                                <option value="M">Boy</option>
                                <option value="F">Girl</option>
                                
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0 ">
                            <button type="submit" class="btn btn-danger wrn-btn" name="submit">Vote</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="container col-md-6 mx-auto" id="maleTable">
        <h3 class="col-md-4 mx-auto text-center">Boys</h3>
        <br>
        <table class="table" id="mtable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Votes</th>
                </tr>
            </thead>
            
                        <?php
            //Script that Queries DB to populate Boys table

            $sql = "SELECT name, votes FROM BABY_VOTES where (gender = 'M') ORDER BY votes DESC;";
            $result = $db->query($sql);

            if($result -> num_rows > 0){
                while($row = $result->fetch_assoc()){

                    echo "<tr><td>" .$row['name'] ."</td><td>" .$row['votes'] ."</td><tr>";

                }
                echo "</table>";
            }

            ?>

            </table>
    </div>
        <br>
        <br>
    <div class="container col-md-6 mx-auto" id="maleTable">
        <h3 class="col-md-4 mx-auto text-center">Girls</h3>
        <br>
        <table class="table" id="mtable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Votes</th>
                </tr>
            </thead>
            
                        <?php
            //Script that Queries DB to populate girls table

            $sql = "SELECT name, votes FROM BABY_VOTES where (gender = 'F') ORDER BY votes DESC;";
            $result = $db->query($sql);

            if($result -> num_rows > 0){
                while($row = $result->fetch_assoc()){

                    echo "<tr><td>" .$row['name'] ."</td><td>" .$row['votes'] ."</td><tr>";

                }
                echo "</table>";
            }

            ?>

            </table>
    </div>
    
        <div class="topTenBanner">
            <div class="text-center mb-4" id="topTenText">
                <h1 class="mb-3 font-weight-normal">Most Popular Baby Names 2019</h1>
            </div>
        
        </div>
        <br>
        <br>
    <div class="container col-md-6 mx-auto" id="maleTable">
        <h3 class="col-md-4 mx-auto text-center">Boys</h3>
        <br>
        <table class="table" id="mtable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Votes</th>
                </tr>
            </thead>
            
                        <?php
            //Script that Queries DB to populate Boys table

            $sql = "SELECT name, votes FROM BABYNAMES where (gender = 'M') LIMIT 10;";
            $result = $db->query($sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                while($row = $result->fetch_assoc()){
                    
                    echo "<tr><td>" .$row['name'] ."</td><td>" .$row['votes'] ."</td><tr>";
                    
                }
                echo "</table>";
            }

            ?>

            </table>
    </div>
    <br>
    <br>   
<div class="container col-md-6 mx-auto" id="maleTable">
        <h3 class="col-md-4 mx-auto text-center">Girls</h3>
        <br>
        <table class="table" id="mtable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Votes</th>
                </tr>
            </thead>
            
                        <?php
            //Script that Queries DB to populate girls table

            $sql = "SELECT name, votes FROM BABYNAMES where (gender = 'F') LIMIT 10;";
            $result = $db->query($sql);
            $resultCheck = mysqli_num_rows($result);
            

            if($resultCheck > 0){
                while($row = $result->fetch_assoc()){
                  

                    echo "<tr><td>" .$row['name'] ."</td><td>" .$row['votes'] ."</td><tr>";
                  
                }
                echo "</table>";
            }
            
                
            ?>


            </table>
    </div>        
</body>        
</html>