<!DOCTYPE html>
<html lang="en">
<head>


<title>Data</title>
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
  background-color: #E4E4E4;
}


header {
    background-color: #000000;
    padding: 15px;
    text-align: center;
    font-size: 20px;
    color: white;

}

nav {
    float: left;
    width: 15%;
    background: #E4E4E4;
    padding: 10px;

}


nav ul {
    list-style-type: none;
    padding: 0;
}

article {
    float: left;
    padding: 20px;
    width: 85%;
    background-color: #E4E4E4;
}


section:after {
    content: "";
    display: table;
    clear: both;

}

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
p{
  font-size: 20px;
}
table{
width: 100%;

left: 200px;

}


</style>
</head>

<body>

  <header>
    <h2><b>Data</b></h2>
  </header>

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
  <head>

</head>




<section>
  <nav>
    <ul>
  	<a href="http://193.167.101.114/Home.html"class="button">Home</a><br>
    <a href="http://193.167.101.114/proj/linegraph.html"class="button">Linegraphs</a><br>

    </ul>
  </nav>

  <article>
    <table class="w3-table w3-striped w3-border">
  <tr>

    <td><p>Temperature &#8451;<p></td>
    <td><p>Luminosity LUX<p></td>
    <td><p>Humidity %<p></td>
    <td><p>Date and time</p></td>
  </tr>
  <?php

  $query = mysqli_query($dbconnect, "SELECT * FROM temperature ORDER BY id DESC")
     or die (mysqli_error($dbconnect));

  while ($row = mysqli_fetch_array($query)) {
    echo
     "<tr>

      <td>{$row['temp']}</td>
      <td>{$row['luminosity']}</td>
      <td>{$row['humidity']}</td>
      <td>{$row['date']}</td>
     </tr>\n";

  }

  ?>

  </table>
</article>
</section>


</div>

</body>
</html>
