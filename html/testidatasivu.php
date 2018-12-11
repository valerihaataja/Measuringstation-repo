<!DOCTYPE html>
<html lang="en">
<head>


<title>Weather station</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
	margin: 0;
	padding: 0;
}

/* Style the header */
header {
    background-color: #000000;
    padding: 5px;
    text-align: center;
    font-size: 20px;
    color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 15%;
    height: 500px;
    background: #E4E4E4;
    padding: 20px;
    bottom-padding: 35px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}

article {
    float: left;
    padding: 20px;
    width: 85%;
    background-color: #E4E4E4;
    height: 500px;
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;

}

/* Style the footer */
footer {
    background-color: #ccc;
    padding: 10px;
    text-align: center;
    color: white;

}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
	padding: 10px 10px;
    width: 150px;
	height: 40px;
	border-radius: 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button:hover{
	background-color: #4FEC88;

}
div {
	width: 100%;
	height: 100%;
}
img{
  position: absolute;
  left: 340px;
  top: 150px;
}


</style>
</head>

<body>
  <?php

  $hostname = "localhost";
  $username = "uusi";
  $password = "asd123";
  $db = "beissi";

  $dbconnect=mysqli_connect($hostname,$username,$password,$db);

  if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
  }

  ?>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <div class="w3-container">


<div>


<header>
  <h2>Welcome to weather station!</h2>
</header>

<section>
  <nav>
    <ul>

  <a href="http://193.167.101.114/proj/linegraph.html"class="button">Linegraphs</a><br>
	<a href="http://193.167.101.114/data.php"class="button">Data</a><br>
    </ul>
  </nav>

  <article>
    <table class="w3-table w3-striped w3-border">
  <tr>
    <td><p>ID<p></td>
    <td><p>Temperature &#8451;<p></td>
    <td><p>Luminosity LUX<p></td>
    <td><p>Date and time</p></td>
  </tr>

  <?php

  $query = mysqli_query($dbconnect, "SELECT * FROM temperature ORDER BY id DESC")
     or die (mysqli_error($dbconnect));

  while ($row = mysqli_fetch_array($query)) {
    echo
     "<tr>
      <td>{$row['id']}</td>
      <td>{$row['temp']}</td>
      <td>{$row['luminosity']}</td>
      <td>{$row['date']}</td>
     </tr>\n";

  }

  ?>
  </table>

  </article>
</section>

<footer>
  <p>&copy; Ryhmä15</p>
</footer>
</div>
</body>
</html>
