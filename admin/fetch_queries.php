<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
   
$columns = array('Sr.No','id', 'email',  'subject', 'message', 'query_time', 'status', 'Action');
$username=$_SESSION['user']['user_name'];
$query = "SELECT * FROM admin_support";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 Where (id = "'.$_POST["search"]["value"].'"  OR status = "'.$_POST["search"]["value"].'" OR email = "'.$_POST["search"]["value"].'"  OR subject = "'.$_POST["search"]["value"].'" OR query_time LIKE "%'.$_POST["search"]["value"].'%") 
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
 $sub_array[] = $row["email"];
 $sub_array[] = $row["subject"];
 $sub_array[] = $row["message"];
 $sub_array[] = $row["query_time"];
 $sub_array[] = $row["status"];
 $action='';
 if($row["status"]!='Solved') { $action .='<a class="btn btn-success" onclick="return confirm(\'Are you sure want to mark as solved to this query ?\')" href="query_solved.php?q_id='.$row['id'].'">Solved</a>'; } 
 $sub_array[] = '<a class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete this query ?\')" href="delete_query.php?q_id='.$row['id'].'">Delete</a>'.$action;

 $data[] = $sub_array;
}

function get_all_data()
{
 $query = "SELECT * FROM admin_support";
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