<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Register Trips</title>
    <link rel="stylesheet" href="CSS/style.css">
      <script type="text/javascript" src="JavaScript/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body class="bg-white text-black">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
      <div class="container">

          <a class="navbar-brand" href="#">CRS Crew</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="myNavbar">
             <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item"><a class="nav-link active" href="VolunteerPage.html">Home <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="MainPage.html">Log Out</a></li>
          </ul>
          </div>
      </div>
    </nav>
    <br>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crs";
  $con = new mysqli($servername, $username, $password, $dbname);

  $tID=$_POST['tID'];
  $Name=$_POST['Name'];
  $ApplicationDate=$_POST['ApplicationDate'];
  $Remarks=$_POST['Remarks'];

  $sql = "INSERT INTO application (tID, Name, ApplicationDate,  Remarks)
          VALUES ('$tID', '$Name', '$ApplicationDate', '$Remarks')";
      
  mysqli_query($con, $sql); 
  mysqli_close($con);
  ?>
  
  <header id = "header" class = "clear">
    <div class = "container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class = "container-fluid">
          <div class = "navbar-header">
            <a class = "navbar-brand" href = "MainPage.html"> CRS Crew  </a>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class = "container">
    <form action="VolunteerPage.html" method = "post"><br>
      <input type="submit" name="submit" value="Thank You">
    </form>
  </div>
  <section class="copyright py-4 text-center text-white">
      <div class="container">
          <small>"copyright">Copyright &copy; CTIS 2020</small>
      </div>
  </section>
</body>
</html>