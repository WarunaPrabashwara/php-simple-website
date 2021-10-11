<html>

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
 
$id = $_POST["id"] ;
echo $id ;
$sql = "UPDATE  orders SEt  completedOrNot = 'rejected' WHERE id = '$id' ";
$response ;
if (mysqli_query($conn, $sql)) {
    $response  = "Order accepted successfully";
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
          window.history.go(-1) 
        
    </script>


<style>





</body>
</html>