 

<?php
        mysql_connect("localhost","root","");
        mysql_select_db("doctor");
        $special=$_GET["P_uname"];
        $q=mysql_query("SELECT * FROM patient WHERE P_username ='$special'");
        while ($row = mysql_fetch_array($q)) {
            ?>
<option value="<?php echo $row["P_name"]?>"><?php echo $row["P_name"]?></option>      
        </tr>
            <?php
        }
        
        ?>