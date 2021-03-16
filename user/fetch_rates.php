<?php

 session_start();
 ob_start();
    include('includes/functions.php'); 
$email=$_SESSION['ruser']['email'];
    $query = "SELECT * FROM user_plan where email='$email'";

if(isset($_POST["search"]["value"]))
{
  
 $query .= '
 AND (id = "'.$_POST["search"]["value"].'" OR price = "'.$_POST["search"]["value"].'" OR coverage = "'.$_POST["search"]["value"].'" OR company_name LIKE "%'.$_POST["search"]["value"].'%" OR email LIKE "%'.$_POST["search"]["value"].'%") ';
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
 $sub_array[] = '<a href="product.php?productid='.$row["id"].'">'.$row["email"].'</a>';
  $sub_array[] =$row["price"];
  $sub_array[] ='$'.number_format($row["coverage"]);
 $sub_array[] = $row["company_name"];
 $filnam =getcwd()."/images/".$row['company_logo'];

if (!file_exists($filnam) || $row['company_logo']=='') {
   $sub_array[] = '<img src="images/company_dummy.png" width="110" height="70">'; 
}
else{
   $sub_array[] = '<img src="images/'.$row['company_logo'].'" width="110" height="70">'; 
}
 $sub_array[] ='<a href="delete_row.php?data='.$row["id"].'" class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete this plan ?\')">cancle Plan</a> <a href="upload_file.php?data='.$row["id"].'" class="btn btn-info">upload Document</a>'; $data[] = $sub_array;
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