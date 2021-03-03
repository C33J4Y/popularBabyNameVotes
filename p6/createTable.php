<?php
require_once './php/db_connect.php';
?>

     

<?php
  ini_set('display_errors', '0'); // function stops errors from displaying on browser. 1 = on and 0 = off
  //error_reporting(E_ALL);
        
//SQL statement to check if BABYNAMES is populated        
$dbTableCheck = "SELECT 1 FROM `BABYNAMES`;"; 

//SQL Statement to create DB Table        
$createStmt = 'CREATE TABLE `BABYNAMES` (' . PHP_EOL
            . '  `id` int(11) NOT NULL AUTO_INCREMENT,' . PHP_EOL
            . '  `name` varchar(50) DEFAULT NULL,' . PHP_EOL
            . '   `gender` varchar(50) DEFAULT NULL,' . PHP_EOL
            . '  `votes` int(11)     DEFAULT NULL,'. PHP_EOL
            . '  PRIMARY KEY (`id`)' . PHP_EOL
            . ') ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
        
if ($db->query($dbTableCheck) !== FALSE){ //if true table already exists and prints out contents onto webpage
    
     // Show database contents on website
        
 $selectStm = "SELECT * FROM `BABYNAMES`;";
       $result = mysqli_query($db, $selectStm);
       $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck > 0){
            
            while($row = mysqli_fetch_assoc($result)){
              //echo $row['name'] ."," .$row['gender']  ."," .$row['votes'] ."<br>";
                }
            }
    
        } else{ //Table does not exist. Run scripts for table creation and population of data from .txt file
    
   if($db->query($createStmt)) {
    //echo '        <div class="alert alert-success">Table creation successful.</div>' . PHP_EOL;
} else {
    //echo '        <div class="alert alert-danger">Table creation failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit(); // Prevents the rest of the file from running
        }
    
    
    // Opens text file in read mode and populates table with the data
    
$file = fopen("./yob2017.txt","r");
          
while (!feof($file)){
    
    $content = fgets($file);
    $contentArray = explode(",",$content); //Used to split string into an array of strings. Parameters are a delimiter and string
    list($name, $gender, $votes) = $contentArray;
    
    //SQL Statement to insert data from contentArray into table
   $sql = "INSERT INTO `BABYNAMES` (`name`, `gender`, `votes`) VALUES ('$name', '$gender', '$votes'); ";
    
    $db->query($sql);
    
} 
        
fclose($file);    
    
    

    } 
        
        //echo "Database has been created!";
        
?>

    

