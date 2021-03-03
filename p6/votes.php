<?php
include "./php/db_connect.php";

//SQL statement to check if BABY_VOTES is populated        
$dbTableCheck = "SELECT 1 FROM `BABY_VOTES`;";


//SQL Statement to create DB Table        
$createStmt = 'CREATE TABLE `BABY_VOTES` (' . PHP_EOL
            . '  `id` int(11) NOT NULL AUTO_INCREMENT,' . PHP_EOL
            . '  `name` varchar(50) DEFAULT NULL,' . PHP_EOL
            . '   `gender` varchar(50) DEFAULT NULL,' . PHP_EOL
            . '  `votes` int(11)     DEFAULT NULL,'. PHP_EOL
            . '  PRIMARY KEY (`id`)' . PHP_EOL
            . ') ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';


    

if ($db->query($dbTableCheck) == FALSE){ //if False create table
    
 $db->query($createStmt);
  echo "Table BABY_VOTES has been created!" ."<br>";
    
        }


if(isset($_POST['submit'])){
    
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $votes = 1;    
    
    
//SQL Statement to insert data from contentArray into table
   $insertStmt = "INSERT INTO `BABY_VOTES` (`name`, `gender`, `votes`) VALUES ('$name', '$gender', '$votes'); ";
    
//SQL Statement to check if name already exist in DB Table
    $nameCheckStmt = "SELECT * FROM `BABY_VOTES` WHERE (name = '$name') ;";
    $resNameCheck = mysqli_query($db, $nameCheckStmt);
    

    
    if(mysqli_num_rows($resNameCheck) > 0 ){
        
        $row = mysqli_fetch_assoc($resNameCheck);
        //echo $row['name'];
        if($name == $row['name']){
            //echo "Name Already Exists!";
            $votes = $row['votes'];
            $votes = $votes + 1; 
    //SQL Statement to UPDATE votes in DB Table
    $updateVoteStmt = "UPDATE `BABY_VOTES` SET `votes`='$votes' WHERE (name = '$name');";
            $db->query($updateVoteStmt);
            
            //Refreshes and redirects back to homepage after successful query
            header("location:index.php");
            echo "<script>location.href = 'index.php';</script>";
        }
        

      
    }else {
        
        $db->query($insertStmt);
        //Refreshes and redirects back to homepage after successful query
        header("location:index.php");
        echo "<script>location.href = 'index.php';</script>";
    }

    
        
    
    //echo $name ."<br>" .$gender;
    
    
}