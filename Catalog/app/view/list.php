<?php session_unset();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items</title>
    <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />    
    
   
  
</head>
<body>
    <h2>Item Details</h2>
    <a href="view/insert.php">Add New Items</a>

    <?php
        if($result->num_rows > 0){
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>#</th>";                                        
                        echo "<th>ISBN</th>";
                        echo "<th>Title</th>";
                        echo "<th>Edition</th>";
                        echo "<th>Name_of_Publisher</th>";
                        echo "<th>URL</th>";
                        echo "<th>Status</th>";
                        echo "<th>Action</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";                                        
                        echo "<td>" . $row['ISBN'] . "</td>";
                        echo "<td>" . $row['Title'] . "</td>";
                        echo "<td>" . $row['Edition'] . "</td>";
                        echo "<td>" . $row['Name_of_Publisher'] . "</td>";
                        echo "<td>" . $row['URL'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>";
                        echo "<a href='index.php?act=update&id=". $row['id'] ."' title='Update Record'><i class='fa fa-edit'></i></a>";
                        echo "<a href='index.php?act=delete&id=". $row['id'] ."' title='Delete Record'><i class='fa fa-trash'></i></a>";
                        echo "<a href='index.php?act=show&id=". $row['id'] ."' title='show Record'><i class='fa fa-search'></i></a>";
                        echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";                            
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "<p class='lead'><em>No records were found.</em></p>";
        }
    ?>
</body>
</html>