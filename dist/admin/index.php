<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inventory System</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <?php include 'navbar.php';?>
            <!-- Navbar-->
       <div id="layoutSidenav_content">
           <main>
               <div class="container-fluid">
                   <h1 class="mt-4">User Addition</h1>
                   <ol class="breadcrumb mb-4">
                       <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                       <li class="breadcrumb-item active">Tables</li>
                   </ol>
                   <div class="card mb-4">

                   </div>
                   <div class="card mb-4">
                       <div class="card-header">
                           <i class="fas fa-table mr-1"></i>
                           User Control Panel


                       </div>
                       <div class="card-body">

                           <div class="table-responsive">

                               <table class="table table-bordered" id="dataTable" cellspacing="0">

                                   <thead>

                                   <?php
                                   include "../conn.php";
                                   $sql = "select * from users";
                                   if($result =mysqli_query($link,$sql)){
                                       echo "<tr>";
                                       echo "<th>Username</th>";
                                       echo "<th>Email</th>";
                                       echo "<th>User Type</th>";
                                       echo "<th>Password</th>";
                                       echo "<th>Action</th>";

                                       echo "</tr>";
                                       echo "</thead>";
                                       echo "<tfoot>";
                                       echo "<tr>";
                                       echo "<th>Username</th>";
                                       echo "<th>Email</th>";
                                       echo "<th>User Type</th>";
                                       echo "<th>Password</th>";
                                       echo "<th>Action</th>";

                                       echo "</tr>";
                                       echo "</tfoot>";
                                       echo "<tbody>";
                                           echo "<tr>";
                                           echo "<td></td>";
                                           echo "<td></td>";
                                           echo "<td></td>";
                                           echo "<td>●●●●●●●●●●●</td>";
                                           echo "<td>";
                                           echo "<button type='button' class='btn btn-primary ' style=';' data-toggle='modal' data-target='#myModal'>Add User</button>";
                                           echo "</td>";
                                           echo "</tr>";
                                       while($row = mysqli_fetch_array($result)){
                                           echo "<tr>";
                                           echo "<td>". $row['uname'] ."</td>";
                                           echo "<td>". $row['email'] ."</td>";
                                           echo "<td>". $row['utype'] ."</td>";
                                           echo "<td>●●●●●●●●●●●</td>";
                                           echo "<td>";
                                           echo " <button class='btn btn-success' href='report.php'>Edit</button>";
                                           echo " <a class='btn btn-danger' href='../functions/deleteuser.php?id=echo ".$row['id'].";'>Delete</a>";
                                           echo "</td>";
                                           echo "</tr>";}
                                       echo "</tbody>";
                                   }
                                   ?>
                               </table>
                           </div>

                       </div>
                   </div>
               </div>
               <!-- Modal -->
               <div id="myModal" class="modal fade" role="dialog">
                   <div class="modal-dialog">

                       <!-- Modal content-->
                       <div class="modal-content">
                           <div class="modal-header">

                               <h4 class="modal-title">Add User</h4>
                           </div>
                           <div class="modal-body">

                               <form action="index.php" method="post">
                                   <div class="form-group">
                                   <label>Username:</label>
                                   <input type="text" class="form-control" name="uname" required/></div>
                                   <div class="form-group">
                                   <label>Email:</label>
                                   <input type="email" class="form-control" name="email" required/></div>
                                   <div class="form-group">
                                   <label>Password:</label>
                                   <input type="password" class="form-control" name="pass" required/></div>
                                   <div class="form-group">
                                   <label>User Type:</label>
                                   <select class="form-control" name="utype" required>
                                       <option value=""></option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                   </select></div>
                                   <div class="form-group">
                                   <input type="submit" class="btn btn-success" value="Submit"  name="adduser"/>
                                   </div>
                               </form>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                           </div>
                       </div>
<?php

include "../conn.php";

if(isset($_POST['adduser'])) {

    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $utype = $_POST['utype'];

    $password=md5($pass);

    $sql = "INSERT INTO users  (uname, email,pass,utype) VALUES ('$uname', '$email','$password','$utype')";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }}



?>
                   </div>
               </div>
                        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>
