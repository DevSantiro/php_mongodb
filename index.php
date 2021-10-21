<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>PHP & MongoDB</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
   <div class="container">
      <h1>PHP & MongoDB</h1>

      <a href="create.php" class="btn btn-success">Add Clientes</a>

      <?php
         if(isset($_SESSION['success'])){
            echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
         }
      ?>

      <table class="table table-borderd">
         <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Action</th>
         </tr>
         <?php
            require 'config.php';

            $clientes = $collection->find([]);

            foreach($clientes as $cliente) {
               echo "<tr>";
               echo "<td>".$cliente->name."</td>";
               echo "<td>".$cliente->detail."</td>";
               echo "<td>";
               echo "<a href='edit.php?id=".$cliente->_id."' class='btn btn-primary'>Edit</a>";
               echo "<a href='delete.php?id=".$cliente->_id."' class='btn btn-danger'>Delete</a>";
               echo "</td>";
               echo "</tr>";
            };
         ?>
      </table>
      <footer>Creditos ao site: CRUD Operation Tutorials - <a target="_blank" href="http://www.ItSolutionStuff.com">ItSolutionStuff.com</a></footer>
   </div>

</body>
</html>