<html>
<header>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</header>
<body>

<?php
$servername = "localhost";
$database = "restaurantwebsite";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
$name = $_POST["name"] ;
$foodname = $_POST["foodname"] ;
$howmanyorders = $_POST["howmanyorders"] ;
$address = $_POST["address"];
$phoneno = $_POST["phoneno"];
$extrawithfood = $_POST["extrawithfood"];
$datetimeoforder = $_POST["datetimeoforder"];
$message =  $_POST["message"];

$sql = "INSERT INTO orders (CustomerName, OrderName, ammountOfOrders , Address, PhoneNumber, addons ,  dueDateAndTime ,  message, completedOrNot ) VALUES ('$name' , '$foodname', $howmanyorders ,'$address', $phoneno , '$extrawithfood', '$datetimeoforder','$message','not' )";
$response ;
if (mysqli_query($conn, $sql)) {
    $response  = "Your order created successfully!! wait for 3 seconds";
      //echo "Your order created successfully";
} else {
    $response =   "Error: " . $sql . "<br>" . mysqli_error($conn);
    //  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>

  <div class="vertical-center">

<div class="w3-container w3-center">
<?php
 echo $response ;
?>
</div>

</div>


    <script>
        setTimeout(() => {  window.history.go(-1) }, 6000);
        
    </script>

<style>


.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  float:centre ;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
</style>



</body>
</html>