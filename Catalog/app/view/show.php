<?php session_unset();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items</title>
    <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />    
    
   
  
</head>
<body>
   
        <a href="index.php">Home</a>
        <h2>Item Details</h2>
        <?php
                $row = mysqli_fetch_array($res);
                echo "<table>";
                echo "<tbody>";
                    echo "<tr>";
                        echo "<th>#</th>";                                        
                        echo "<td>" . $row['id'] . "</td>"; 
                    echo "</tr>";
                    
                    echo "<tr>";
                        echo "<th>ISBN:</th>";
                        echo "<td>" . $row['ISBN'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Call_No:</th>";
                        echo "<td>" . $row['Call_No'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Language_Code:</th>";
                        echo "<td>" . $row['Language_Code'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>Title:</th>";
                        echo "<td>" . $row['Title'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Sub_Title:</th>";
                        echo "<td>" . $row['Sub_Title'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>Statement_of_Responsibility:</th>";
                        echo "<td>" . $row['Satament_of_Responsibility'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>Edition:</th>";
                        echo "<td>" . $row['Edition'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>Place_of_Publication:</th>";
                        echo "<td>" . $row['Place_of_Publication'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<th>Name_of_Publisher:</th>";
                        echo "<td>" . $row['Name_of_Publisher'] . "</td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                        echo "<th>Year_of_Publication:</th>";
                        echo "<td>" . $row['Year_of_Publication'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>Physical_Description:</th>";
                        echo "<td>" . $row['Physical_Description'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Series:</th>";
                        echo "<td>" . $row['Series'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>General_Code:</th>";
                        echo "<td>" . $row['General_Code'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>Subject:</th>";
                        echo "<td>" . $row['Subject'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>URL:</th>";
                        echo "<td>" . $row['URL'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th>Added_Entry:</th>";
                        echo "<td>" . $row['Added_Entry'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Status:</th>";
                        echo "<td>" . $row['Status'] . "</td>";
                    echo "</tr>";
                    echo "</table>";
                // Free result set
                mysqli_free_result($res);
            
        ?>
</body>
</html>