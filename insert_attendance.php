<?php include("connect.php");

$sql="select * from add_employee";

$result=mysql_query($sql);

$rows=mysql_num_rows($result);

for($i=1;$i<=$rows;$i++)
{
$date=date('Y/m/d');
$time=date('h:i:s');

$check="employee_check".$i;
if(isset($_POST[$check])){
$empy_id=$_POST[$check];
$sql="select date from attandance where Emp_id='$empy_id' and date='$date'";
$sql=mysql_query($sql);
$row=mysql_num_rows($sql);
}
$radio_check="attendance_radio".$i;
if(isset($_POST[$check]) && isset($_POST[$radio_check]) &&($row=='0'))
{
date_default_timezone_set ("Asia/Calcutta");
$date=date('Y/m/d');
$time=date('h:i:s');
$emp_id=$_POST[$check];//checkbox
$emp_attend=$_POST[$radio_check];//radio button
$check="comments".$i;
$emp_comment=$_POST[$check];//comment 
$emp_time="time_box".$i;
$emp_name="emp_name".$i;
$emp_name=$_POST[$emp_name];//name of employee
$emp_date=$date;


if(isset($_POST[$emp_time])){
$emp_time=$_POST[$emp_time];

}

$sql="insert into attandance set Emp_id='$emp_id',emp_name='$emp_name',date='$emp_date',time='$emp_time',comment='$emp_comment',attendance='$emp_attend'";
$result=mysql_query($sql) or die(mysql_error());
unset($result);
if(!$result){
$temp=1;
}


}

}
header('location:attendance.php?temp='.$temp);




?>