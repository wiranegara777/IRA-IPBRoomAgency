<!-- Including jQuery is required. -->
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 
 <!-- Including our scripting file. -->

 <script type="text/javascript" src="script.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #008B8B;">
  <a class="navbar-brand" href="index.php">IRA(IPB Room Agency)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- Search -->
      <form class="form-inline my-2 my-lg-0" action="search.php" method="post" enctype="multipart/form-data">
        <input name="name" id="search" style="width:300px;" class="form-control mr-sm-2" type="search" placeholder="Search Room" aria-label="Search">
        <button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0" style="color: whitesmoke; border-color: whitesmoke " type="submit">Search</button>
      </form>
    </ul>

    <!-- navbar right -->
    <ul class="navbar-nav navbar-right">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Notifikasi <i class="fa fa-bell" aria-hidden="true"></i> 
         <!-- <span class="badge badge-danger">1</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="list-order.php" class="dropdown-item">Order</a>
          <a class="dropdown-item" href="notifMessage.php">Pesan</a>
         <!-- <div class="dropdown-divider"></div>          
          <a class="dropdown-item" href="Login.html">Logout</a> -->
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $Mahasiswa->getName(); ?> <i class="fas fa-user"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="profil.html" class="dropdown-item">Profil</a>
          <a class="dropdown-item" href="proses/logout.php">Logout</a>
         <!-- <div class="dropdown-divider"></div>          
          <a class="dropdown-item" href="Login.html">Logout</a> -->
        </div>
      </li>
    </ul>
    

  </div>
</nav>