<?php

 session_start();
 ob_start();
    include('includes/functions.php'); 
$columns = array('Sr.No', 'id', 'fname', 'sname', 'gender','email', 'phone','city', 'state', 'zip', 'address', 'tobbaco', 'created_at', 'updated_by', 'updated_at','status', 'Action');
$username=$_SESSION['user']['user_name'];
$user_type=$_SESSION['user']['user_type'];

    $query = "SELECT * FROM user_info where";

if(isset($_POST["search"]["value"]))
{
  
 $query .= '(id = "'.$_POST["search"]["value"].'" 
 OR fname LIKE "%'.$_POST["search"]["value"].'%" OR sname LIKE "%'.$_POST["search"]["value"].'%" OR email = "'.$_POST["search"]["value"].'" OR gender = "'.$_POST["search"]["value"].'" OR phone LIKE "%'.$_POST["search"]["value"].'%" OR city = "'.$_POST["search"]["value"].'" OR state = "'.$_POST["search"]["value"].'" OR zip = "'.$_POST["search"]["value"].'" OR address LIKE "%'.$_POST["search"]["value"].'%" OR created_at LIKE "%'.$_POST["search"]["value"].'%" OR updated_by = "'.$_POST["search"]["value"].'" OR updated_at LIKE "%'.$_POST["search"]["value"].'%" OR status = "'.$_POST["search"]["value"].'") 
 ';
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
 $sub_array[] = '<a href="users_profile.php?data='.$row["id"].'">'.$row["fname"].' '.$row["sname"].'</a>';
 $sub_array[] = $row["gender"];
 $sub_array[] = '<a href="users_profile.php?data='.$row["id"].'">'.$row["email"].'</a>';
 
 $sub_array[] = $row["phone"];
 $sub_array[] = $row["city"];
 $sub_array[] = $row["state"];
 $sub_array[] = $row["zip"];
 $sub_array[] = $row["address"];
 $sub_array[] = $row["tobbaco"];
 $sub_array[] = $row["created_at"];
 if($row["updated_by"]==''){
 $sub_array[] = 'User';
 }
 else{
    $sub_array[] = $row["updated_by"]; 
 }
 $sub_array[] = $row["updated_at"];
 
 if($row["status"]=='') { $status="Active";}
 else{
    $status =$row["status"];
 }
 $sub_array[] = $status;
 $action='';
 if($row["status"]=='Block'){ $action .='<a class="btn btn-success" onclick="return confirm(\'Are you sure want to unblock this user?\')" href="unblock_ruser.php?t_id='.$row['id'].'">Unblock</a>'; }
 elseif($row["status"]==''){$action .='<a class="btn btn-warning" onclick="return confirm(\'Are you sure want to block this user?\')" href="block_ruser.php?t_id='.$row['id'].'">Block</a>';};

 $action .='<a class="btn btn-info"  href="users_profile.php?data='.$row["id"].'">Update</a>'; 
$sub_array[] = '<a class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete this user ? Keep in mind your all plans will be deleted too related to this user\')" href="delete_ruser.php?t_id='.$row['id'].'&email='.$row['email'].'">Delete</a>'.$action;
 $data[] = $sub_array;
}

function get_all_data()
{
    $username=$_SESSION['user']['user_name'];
    $user_type=$_SESSION['user']['user_type'];

    $query = "SELECT * FROM user_info";

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