<?php
require_once('../inc/connection.php');
$sql="SELECT s.id ,s.subject FROM subject s, batch b where b.courseid=s.courseid And b.id=?";
extract($_REQUEST);
$cmd=$db->prepare($sql);
$cmd->bindParam(1,$batchid);
$cmd->execute();
$table= $cmd->fetchAll();
echo "<select name='subjectid'>";
foreach($table as $row)
{
    echo "<option value='{$row['id']}'>{$row['subject']}</option>";
}
echo "</select>";
?>
