<!doctype html>
<?php 
session_start();
include("functions/functions.php");
include("includes/db.php");
?>
<html>
	<head>
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	 <link rel="stylesheet" href="css/vendors.css">
	</head>
			<body>
		 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">PLATTERLY</a>
        <div class="d-flex">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home"></i>&nbsp;</a>
              </li>
              <li class="nav-item">
                <?php
					        if(isset($_SESSION['user'])){
						        echo" <a class='nav-link active' href='customers/my_acc.php'><h4 style='color:yellow;text-decoration:underline;'>Hi! &nbsp;".$_SESSION['user'].'(My Account)'."</h4></a>";
					        }
					        else {
						        echo"<a class='nav-link' href='customers/login.php'>Login</a>";
					        }
				        ?>
				      </li>
              <li class="nav-item">
                <?php
					        if(isset($_SESSION['user'])){
						        echo" <a class='nav-link active' href='logout.php'>Logout</a>";
					        }
                ?>      
              </li>
              <li><a class='nav-link' href='regional.php'>Tiffin Vendors</a></li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
           </div>
          </div>
        </div>
      </nav>
	  
	  
		
	<h1> North Indian Tiffins</h1>

	<div >
		<table class="regional-container" table style="width:80%" >
			<tr>
			<th>V_Id</th>
			<th>Vendors</th>
			<th> Logo</th>
			<th> Address</th>
			<th> District</th>
			<th> Contact</th>
			<th> view</th>
			
			</tr>
			<?php
			$get_nvendor = "select * from vendors where V_regional='North Indian'";

			$run_nvendor = mysqli_query($con, $get_nvendor);

			while ($row_nvendor = mysqli_fetch_array($run_nvendor)) {
				$email=$row_nvendor["V_email"];
				$n_id = $row_nvendor['V_id'];
				$n_name = $row_nvendor['V_name'];
				$n_logo = $row_nvendor['V_logo'];
				$n_address = $row_nvendor['V_addrs'];
				$n_district = $row_nvendor['V_distrt'];
				$n_contact = $row_nvendor['V_contact'];
				
			?>
			<tr>
			<td><?php echo $n_id; ?></td>
			<td><?php echo $n_name; ?></td>
			<td> <img src="images/<?php echo $n_logo;?>" width="100 px" > </td>
			<td><?php echo $n_address; ?></td>
			<td><?php echo $n_district; ?></td>
			<td><?php echo $n_contact; ?></td>
			<td><button><a href='vendorMenuPage.php?email=<?php echo $email;?>'>View</a></button></td>
			
			</tr>
			<?php } ?>
		</table>

	</div>
	<div style="text-align:center">
		<a href="regional.php"><button class="btn1">Back</button></a> 
		<a href="#"><button class="btn2"> Next</button></a>
	</div>
		
	<div class="footer-bottom">
    	&copy; PLATTERLY 2023 All Rights Reserved
    </div>
	
	</body>
	</html>