<!DOCTYPE html> 
<html>

<head>
  <title>SRTS Activity Monitor</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">   

    <header>
    <div id="strapline">
      <div id="welcome_slogan">
        <h3>SRTS Activity Monitor <span>Online Management</span></h3>
      </div><!--close welcome_slogan-->
      </div><!--close strapline-->    
    <nav>
	    <div id="menubar">
          <ul id="nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="viewdatabase.php">View Database</a></li>
            <li><a href="addstudents.php">Add Students</a></li>
            <li><a href="deletestudents.php">Scan Times</a></li>
            <li class="current"><a href="editstudents.php">Edit Students</a></li>
          </ul>
        </div><!--close menubar-->  
      </nav>
    </header>
    
    <div id="slideshow_container">  
    <div class="slideshow">
      <ul class="slideshow">
          <li class="show"><img width="940" height="250" src="images/oaklandlogo.png" /></li>
          <li><img width="940" height="250" src="images/school.png" /></li>
        </ul> 
    </div><!--close slideshow-->    
  </div><!--close slideshow_container-->   
  
  <div id="site_content">   
    
    <div class="sidebar_container">       
    <div class="sidebar">
          <div class="sidebar_item">
          
            <p>Enter the LAST and FIRST name of the currently existing student you would like to edit.  Then chose which field to edit and enter in the modified data.</p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->        
    <div class="sidebar">
          <div class="sidebar_item">
            <form action="edit.php" method="post">
		Last Name: <input type="text" name="lastname"><br><br>
		First Name: <input type="text" name="firstname"><br><br><br><br>
		<select name="option"> 
    		<option value="FirstName">First Name</option>
    		<option value="LastName">Last Name</option>
    		<option value="RFID">RFID Number</option>
    		<option value="Class">Classroom</option>
		<option value="grade">Grade</option>
  		<br><br>
		Modified Data: <input type="text" name="input"><br><br>
		<input type="submit">
		<input type="submit" formaction="editrfidnum.php" value="Read RFID Number">
	    </form>
	</div><!--close sidebar_item--> 
	<div class="content_item">
	
            <p></p>         
      </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
    <div class="sidebar">
          <div class="sidebar_item">
            <img src="images/epics.jpg" alt="HTML5 Icon" style="width:120px;height:25px;">
                    
      </div><!--close sidebar_item--> 
        </div><!--close sidebar-->      
        <div class="sidebar">
          <div class="sidebar_item">
            <img src="images/pu.png" alt="The P" style="width:120px;height:70px;">
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
       </div><!--close sidebar_container--> 
     
    <div id="content">
	<div class="content_item">
        <p>The below table is a complete view of the database. Students are arranged alphabetically.</p>          
            
      </div><!--close content_container-->
	
        <div class="content_item">
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>

      <?php
$servername = "localhost";
$username = "root";
$password = "pi";
$dbname = "srts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM students ORDER BY LastName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Classroom</th><th>Grade</th><th>ID</th><th>Did They Walk Today?</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["LastName"].", ".$row["FirstName"]."</td><td>".$row["Class"]."</td><td>".$row["grade"]."</td><td>".$row["RFID"]."</td><td>" . $row["already"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
     
            
      
    </div><!--close content_item-->
      </div><!--close content-->   
  </div><!--close site_content-->   

    <footer>
	  <a href="index.html">Home</a> | <a href="viewdatabase.php">View Database</a> | <a href="addstudents.php">Add Students</a> | <a href="deletestudents.php">Scan Times</a> | <a href="editstudents.php">Edit Students</a><br/><br/>
	 website template by <a href="http://www.freehtml5templates.co.uk">Free HTML5 Templates</a>
    </footer>
  
  </div><!--close main-->
  
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  
</body>
</html>
