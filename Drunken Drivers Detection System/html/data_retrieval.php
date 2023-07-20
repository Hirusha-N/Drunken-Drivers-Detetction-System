


<!DOCTYPE html>
<html>
<head>
  <title>Old Records</title>
  <link rel="stylesheet" href="../form.css">
  <style>

     /* Basic styles for the link */
     p {
      text-align: center;
    }

    a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #ffffff;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
    }

    /* Optional hover effect to make it look more interactive */
    a:hover {
      background-color: #0056b3;
    }

    h1 {
      text-align: center;
      padding: 20px 0;
      background-color: #007bff;
      color: #ffffff;
      font-size: 36px;
      font-weight: bold;
      text-transform: uppercase;
    }


    

.footer-bottom{
    background: #2b2a2a;
    padding: 30px 0;
    text-align: center;
}



    .footer-bottom {
      position: absolute;
      bottom: 0;
      width: 100%;
      background-color: #2b2a2a;
      color: #ffffff;
      text-align: center;
      padding: 10px 0;
    }

    .footer-bottom span {
      font-weight: bold;
    }
    .footer-bottom p{
    font-size: 14px;
    word-spacing: 2px;
    text-transform: capitalize;
    color: aliceblue;
}
    

body {
    background-color: #333; /* Replace #333 with your desired dark color code */
    color: #fff; /* Set the text color to contrast the dark background */
  }


  table {
      background-color: #555; /* Replace #555 with your desired dark color for the table */
      color: #fff; /* Set the text color to contrast the dark table background */
      border-collapse: collapse; /* Optional: Removes spacing between table cells */
      width: 100%; /* Optional: Adjust the table width as needed */
    }

    /* Optional: Style for table header cells */
    th {
      background-color: #444; /* Replace #444 with your desired dark color for table header cells */
      padding: 10px;
      text-align: left;
    }

    /* Optional: Style for table data cells */
    td {
      padding: 8px;
      text-align: left;
    }
    /* Your existing styles... */

    .search-box {
      text-align: center;
      margin-bottom: 20px;
    }

    .search-box input[type="text"] {
      padding: 5px;
      width: 300px;
    }

    .search-box input[type="submit"] {
      padding: 5px 10px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Old Records</h1>

  <div class="search-box">
    <form method="get" action="">
      <input type="text" name="search" placeholder="Search records...">
      <input type="submit" value="Search">
    </form>
  </div>

  <table>
    <thead>
      <tr>
        <th>NIC</th>
        <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody>
    <?php
 $servername = "sql204.infinityfree.com";
 $username = "if0_34639499";
 $password = "WJPqoQ775uz23B";
 $dbname = "if0_34639499_recodes";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Check if a search term is provided
      if (isset($_GET['search'])) {
        $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
        // Modify the SQL query to include the search term for Name or ID
        $sql = "SELECT * FROM recodes WHERE name LIKE '%$searchTerm%' OR id LIKE '%$searchTerm%'";
      } else {
        // If no search term is provided, fetch all records
        $sql = "SELECT * FROM recodes";
      }

      $result = $conn->query($sql);

      if (!$result) {
          die("Invalid query : " . $conn->error);
      }

      // Display the records
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["date"] . "</td>
                <td>" . $row["time"] . "</td>
                <td>" . $row["location"] . "</td>
                </tr>";
      }

      // Close the connection
      $conn->close();
      ?>
    </tbody>
  </table>

  <p><a href="index.html">Home Page</a></p>

  <div class="footer-bottom">
    <p>copyright &copy; 2023 Drunken Drivers Detetction System. designed by <span>Hirusha Nimsara</span></p>
  </div>
</body>
</html>
