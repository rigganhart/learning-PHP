<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Learning to use MAMP</title>
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>
    <header>
      <h1>This is my family</h1>
    </header>
    <main>
      <h2>Family Members</h2>
      <?php

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

        $sql = "SELECT  *  FROM People";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<h3>Name: <a class='person' href='#'>". $row["First"]. " " . $row["Last"] . "</a></h3>";
          }
        } else {
          echo "0 results";
        }


        $conn->close();

       ?>
       <a id="test" href="#"> This is a test</a>
    </main>
    <aside id="partnerInfo">
      <h2>A family members' Partner will show up here</h2>

    </aside>
    <footer>



    </footer>
    <script type="text/javascript">
      function showPartner(name){
        console.log("find and show the partner for" , name);
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log("response", this.response);
                document.getElementById("partnerInfo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open('GET',"getPartner.php?q="+name,true);
        xmlhttp.send();
      }
      function showInfo(){
        var clickName = document.getElementsByClassName('person')
        console.log(clickName);
        for (var i = 0; i < clickName.length; i++) {
          clickName[i].addEventListener('click', function(event){
            event.preventDefault();
            console.log("this", this.innerHTML );
            var fullName = this.innerHTML;
            var splitName = fullName.split(" ");
            var firstName = splitName[0];
            console.log("firstName", firstName);
            showPartner(firstName);
          })
          }
        }



      showInfo();
    </script>
  </body>
</html>
