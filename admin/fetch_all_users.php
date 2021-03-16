<?php

 session_start();
 ob_start();
    include('includes/functions.php'); 
$columns = array('Sr.No', 'id', 'first_name', 'last_name', 'email', 'user_name', 'user_type', 'created_by', 'creation_time', 'updated_by', 'update_time', 'status', 'Action');
$username=$_SESSION['user']['user_name'];
$user_type=$_SESSION['user']['user_type'];

if($user_type=='admin'){
    $query = "SELECT * FROM login_credentials where user_type!='admin'";
}
if(isset($_POST["search"]["value"]))
{
  
 $query .= '
 AND (id = "'.$_POST["search"]["value"].'" 
 OR first_name LIKE "%'.$_POST["search"]["value"].'%" OR last_name LIKE "%'.$_POST["search"]["value"].'%" OR user_name = "'.$_POST["search"]["value"].'" OR email = "'.$_POST["search"]["value"].'" OR user_type = "'.$_POST["search"]["value"].'" OR created_by = "'.$_POST["search"]["value"].'" OR creation_time LIKE "%'.$_POST["search"]["value"].'%" OR updated_by = "'.$_POST["search"]["value"].'" OR update_time LIKE "%'.$_POST["search"]["value"].'%" OR status = "'.$_POST["search"]["value"].'") 
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
 $sub_array[] = '<a href="user_profile.php?data='.$row["user_name"].'">'.$row["first_name"].' '.$row["last_name"].'</a>';
  $sub_array[] = '<a href="user_profile.php?data='.$row["user_name"].'">'.$row["email"].'</a>';
 $sub_array[] = '<a href="user_profile.php?data='.$row["user_name"].'">'.$row["user_name"].'</a>';
 $sub_array[] = $row["user_type"];
 $sub_array[] = $row["created_by"];
 $sub_array[] = $row["creation_time"];
 $sub_array[] = $row["updated_by"];
 $sub_array[] = $row["update_time"];
 
 if($row["status"]=='') { $status="Active";}
 else{
    $status =$row["status"];
 }
 $sub_array[] = $status;
 $action='';
 if($row["status"]=='Block'){ $action .='<a class="btn btn-success" onclick="return confirm(\'Are you sure want to unblock this secondary admin?\')" href="unblock_user.php?t_id='.$row['id'].'">Unblock</a>'; }
 elseif($row["status"]==''){$action .='<a class="btn btn-warning" onclick="return confirm(\'Are you sure want to block this secondary admin?\')" href="block_user.php?t_id='.$row['id'].'">Block</a>';};

 $action .='<a class="btn btn-info"  href="user_profile.php?data='.$row["id"].'">Update</a>'; 
$sub_array[] = '<a class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete this secondary admin ?\')" href="delete_user.php?t_id='.$row['id'].'">Delete</a>'.$action;
 $data[] = $sub_array;
}

function get_all_data()
{
    $username=$_SESSION['user']['user_name'];
    $user_type=$_SESSION['user']['user_type'];

if($user_type=='admin'){
    $query = "SELECT * FROM login_credentials where user_type!='admin' ";
}
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