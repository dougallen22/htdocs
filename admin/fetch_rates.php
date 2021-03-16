<?php

 session_start();
 ob_start();
    include('includes/functions.php'); 
$columns = array('Sr.No', 'r_id', 'age', 'gender', 'company_name', 'company_logo','updated_by', 'updated_at', 'Action', 'n3000', 'n4000', 'n5000', 'n6000', 'n7000', 'n8000', 'n9000', 'n10000', 'n11000', 'n12000', 'n13000', 'n14000', 'n15000', 'n16000', 'n17000', 'n18000', 'n19000', 'n20000', 'n25000', 'n30000', 'n35000', 'n40000', 'n45000', 'n50000', 'smoker');

    $query = "SELECT * FROM rates";

if(isset($_POST["search"]["value"]))
{
  
 $query .= '
 where (r_id = "'.$_POST["search"]["value"].'" OR age = "'.$_POST["search"]["value"].'" OR gender = "'.$_POST["search"]["value"].'" OR smoker = "'.$_POST["search"]["value"].'" OR company_name LIKE "%'.$_POST["search"]["value"].'%" OR updated_by LIKE "%'.$_POST["search"]["value"].'%" OR updated_at LIKE "%'.$_POST["search"]["value"].'%") 
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
 $sub_array[] = $row["r_id"];
 $sub_array[] = $row["age"];
  $sub_array[] =$row["gender"];
  $sub_array[] =$row["smoker"];
 $sub_array[] = $row["company_name"];
 $filnam =getcwd()."/images/".$row['company_logo'];

if (!file_exists($filnam) || $row['company_logo']=='') {
   $sub_array[] = '<img src="images/company_dummy.png" width="110" height="70">'; 
}
else{
   $sub_array[] = '<img src="images/'.$row['company_logo'].'" width="110" height="70">'; 
}
 $sub_array[] = $row["updated_by"];
 $sub_array[] = $row["updated_at"];
 $sub_array[] = '<a class="btn btn-info" href="edit_row.php?t_id='.$row['id'].'">Edit</a><a class="btn btn-danger" onclick="return confirm(\'Are you sure want to delete this row?\')" href="delete_row.php?t_id='.$row['id'].'">Delete</a><a class="btn btn-success" data-toggle="modal" data-target="#change_image'.$row['id'].'">Change Logo</a>';
 $sub_array[] = $row["n3000"];
$sub_array[] = $row["n4000"];
 $sub_array[] = $row["n5000"];
 $sub_array[] = $row["n6000"];
 $sub_array[] = $row["n7000"];
 $sub_array[] = $row["n8000"];
 $sub_array[] = $row["n9000"];
 $sub_array[] = $row["n10000"];
 $sub_array[] = $row["n11000"];
 $sub_array[] = $row["n12000"];
 $sub_array[] = $row["n13000"];
 $sub_array[] = $row["n14000"];
 $sub_array[] = $row["n15000"];
 $sub_array[] = $row["n16000"];
 $sub_array[] = $row["n17000"];
 $sub_array[] = $row["n18000"];
 $sub_array[] = $row["n19000"];
 $sub_array[] = $row["n20000"];
 $sub_array[] = $row["n25000"];
 $sub_array[] = $row["n30000"];
 $sub_array[] = $row["n35000"];
 $sub_array[] = $row["n40000"];
 $sub_array[] = $row["n45000"];
 $sub_array[] = $row["n50000"];
 $data[] = $sub_array;
}

function get_all_data()
{

    $query = "SELECT * FROM rates order by id desc";

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