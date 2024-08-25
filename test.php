<?php
$hi=$_POST['Pdate'];
$age=date('Y-m-d')-date("Y-m-d",strtotime($hi)); 

echo $age; 

?>
<form method="POST">
<input type="date" name="Pdate">
<button type="submit" name="">hi</button>
</form>
