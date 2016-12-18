<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <?php
    $q= $_GET['q'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "demoDB";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql="SELECT * FROM People WHERE Partner = '$q' ";
    $result = $conn->query($sql);

while($row = mysqli_fetch_array($result)) {
    echo "<h2>" . $row['First'] ." " . $row['Last'] . " <br> Job: " . $row['Job'] . "</h2>";
}


    // while($row = $result->fetch_assoc()){
    //   echo "<h4>" . $row['First'] . " Job: " . $row['Job'] . "</h4>";
    // }



    $conn->close();
     ?>
  </body>
</html>
