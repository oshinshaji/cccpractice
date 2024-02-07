<?php

include_once "sql/connection.php";
include_once "sql/class.php";
include_once "sql/object_for_data.php";

/*---making objects of the func_builder and func_executer class---*/
$fb4=new func_building();
$fe4=new func_executer();
$newObj=new Data_Collection_Object();
$c_data=array('*');

/*------calling select function------*/
$extra="";
$sql=$fb4->select('ccc_category',$c_data,$extra);
$result=$fe4->query_executer($sql,$conn);
$_temp=$fe4->fetch_association($result);
foreach ($_temp as $temp) {
   $newObj->addData($temp);
}
echo "<table border='1'>
<tr>
<th>Category Id</th>
<th>Category Names</th>
</tr>";
foreach($newObj->getData() as $_mmdata){
   echo "<tr>";
   echo "<td>".$_mmdata->getCat_Id()."</td>";
   echo "<td>".$_mmdata->getName()."</td>";  
   echo "</tr>";
   
 }
 echo "</table>";

?>