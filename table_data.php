<?php 
session_start();
                        include_once 'config.php';
                        $con=Database();
                        $c=1;
                        $sql="SELECT * FROM `sensored_data` WHERE api=".$_SESSION["api"];
                        $res=$con->query($sql);
                        echo "<table class='table'><tr><th>No</th><th>GAS(m<sup>3</sup>)</th><th>FIRE(F)</th><th>HUMIDITY(%)</th><th>TEMPERATURE(<sup>o</sup>C)</th><th>DATE AND TIME</th></tr>";
                        
                        while($row=$res->fetch_assoc()){
                            echo "<tr><td>".$c++."</td><td>".$row["gas"]."</td><td>".$row["fire"]."</td><td>".$row["humidity"]."</td><td>".$row["temperature"]."</td><td>".$row["datetime"]."</td></tr>";  
                        }
                        echo "<table>";
?>