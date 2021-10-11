<html>
    <header>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</header>
<body>
<script>
   window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
</script>
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

$sql = "SELECT * FROM orders WHERE completedOrNot='not' ";
$result = mysqli_query($conn, $sql) ;
$rows = [];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        $rows[] = $row;  
        
    //  echo "Customer name: " . $row[0]. " - Order name: " . $row[1].  " Ammount of orders: " . $row[2]. " - Address: " . $row[3]."Phone no: " . $row[4]. " - Add ons: " . $row[5].  " Due date and time: " . $row[6]. " - Message: " . $row[7].   "<br> "; 
       }
  } else {
    echo "No Orders available";
  }
  

mysqli_close($conn);


?>

<?php foreach($rows as $rows) : ?>
<div class="w3-card-4 w3-dark-blue">
<div class="w3-container w3-center">
    
<table>

    <tr>
        <td>
            Customer Name
        </td>
        <td>
        <h6><?php echo  $rows[0] ; ?> </h6>
        </td> 
    </tr>
    <tr>
        <td>
            Order Name
        </td>
        <td>
        <h6><?php echo  $rows[1] ; ?> </h6>
        </td> 
    </tr>
    <tr>
        <td>
            Ammount of orders
        </td>
        <td>
        <h6><?php echo  $rows[2] ; ?> </h6>
        </td> 
    </tr>
    <tr>
        <td>
            Address
        </td>
        <td>
        <h6><?php echo  $rows[3] ; ?> </h6>
        </td> 
    </tr>
    <tr>
        <td>
            Phone number
        </td>
        <td>
        <h6><?php echo  $rows[4] ; ?> </h6>
        </td> 
    </tr>
    <tr>
        <td>
            Add ons
        </td>
        <td>
        <h6><?php echo  $rows[5] ; ?> </h6>
        </td> 
    </tr>
    <tr>
        <td>
            Due date and time
        </td>
        <td>
        <h6><?php echo  $rows[6] ; ?> </h6>
        </td> 
    </tr>
    <tr>
        <td>
            Message
        </td>
        <td>
        <h6><?php echo  $rows[7] ; ?> </h6>
        </td> 
    </tr>
  
  
  

  
</table>
<form action="accept.php" method="post">
 <textarea type="hidden" class = "hidden" name="id"  ><?php echo  $rows[9] ; ?></textarea>
  <button type="submit"   class="w3-button w3-green" >Accept</button>
  </form>
  <form action="reject.php" method="post">
 <textarea type="hidden" class = "hidden" name="id" ><?php echo  $rows[9] ; ?></textarea>
  <button type="submit"   class="w3-button w3-red">Decline</button>
  </form>
</div>
</div>
<hr>
<?php endforeach; ?>

 

<!-- <?php
    echo $rows[0][0];
?> -->
<style>


.hidden {
    display: none;
}
</style>

</body>
</html>