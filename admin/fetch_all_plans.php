<?php

 session_start();
 ob_start();
    include('includes/functions.php'); 
    $query = "SELECT * FROM user_plan where ";

if(isset($_POST["search"]["value"]))
{
  
 $query .= '(id = "'.$_POST["search"]["value"].'" OR price = "'.$_POST["search"]["value"].'" OR coverage = "'.$_POST["search"]["value"].'" OR company_name LIKE "%'.$_POST["search"]["value"].'%" OR email LIKE "%'.$_POST["search"]["value"].'%" OR created_at = "'.$_POST["search"]["value"].'" OR updated_by = "'.$_POST["search"]["value"].'" OR updated_at LIKE "%'.$_POST["search"]["value"].'%" OR status = "'.$_POST["search"]["value"].'") ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}


if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query(con(), $query));

$result = mysqli_query(con(), $query);

$data = array();
$a=0;

while($row = mysqli_fetch_array($result))
{
    $a++;
 $sub_array = array();
 $sub_array[] = $a;
 $sub_array[] = $row["id"];
 $sub_array[] = '<a href="users_profile.php?data='.$row["email"].'">'.$row["email"].'</a>';
  $sub_array[] =$row["price"];
  $sub_array[] =number_format($row["coverage"]);
 $sub_array[] = $row["company_name"];
 $filnam =getcwd()."/images/".$row['company_logo'];

if (!file_exists($filnam) || $row['company_logo']=='') {
   $sub_array[] = '<img src="images/company_dummy.png" width="110" height="70">'; 
}
else{
   $sub_array[] = '<img src="images/'.$row['company_logo'].'" width="110" height="70">'; 
}

 

$sub_array[] = $row["status"];
$sub_array[] = $row["created_at"];
 if($row["updated_by"]==''){
 $sub_array[] = 'User';
 }
 else{
    $sub_array[] = $row["updated_by"]; 
 }
$sub_array[] = $row["updated_at"];
$document='';
$doc=explode(",", $row["document"]);
for($m=0;$m<count($doc);$m++){
    
    $filename =str_replace("admin","user",getcwd()."/document/".$doc[$m]);
    if (file_exists($filename) && $doc[$m]!='') {
$document .= '<a class="btn btn-info"  href="/user/document/'.$doc[$m].'" download>'.$doc[$m].'</a>';
}
}
$sub_array[]=$document;
$sub_array[] = '<a class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete this plan ?\')" href="delete_plan.php?t_id='.$row['id'].'">Delete</a>';
$data[] = $sub_array;
}
function get_all_data()
{

$query = "SELECT * FROM user_plan order by id desc";
$result = mysqli_query(con(), $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data(),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>