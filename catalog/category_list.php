<?php
// oshin
include_once "sql/connection.php";
include_once "sql/class.php";

/*---making objects of the func_builder and func_executer class---*/
$fb4=new func_building();
$fe4=new func_executer();

$c_data=array("name");


/*------calling select function------*/
$sql=$fb4->select('ccc_category',$c_data);
$result=$fe4->query_executer($sql,$conn);
$extra="";

echo "<table border='1'>
<tr>
<th>Category Names</th>
</tr>";

if($result->num_rows>0){
   /*------calling fetch_association function------*/
   $fe4->fetch_association($result,$c_data,$extra);
}
echo "</table>";
//oshin
?>