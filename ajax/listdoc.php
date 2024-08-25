
<?php
        mysql_connect("localhost","root","");
        mysql_select_db("doctor");
        $special=$_GET["DA_special"];
        $q=mysql_query("SELECT * FROM doctors WHERE DA_special='$special' ");
        while ($row = mysql_fetch_array($q)) {
            ?>
<option value="<?php echo $row["DA_name"]?>"><?php echo $row["DA_name"]?></option>      
        </tr>
            <?php
        }
        
        ?>