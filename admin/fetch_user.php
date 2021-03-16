<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session(); 
    
    $query = "
SELECT * FROM employee_info
";

$statement = mysqli_query(con(),$query);
	
	
$c=0;
$output='';
$output .= '<ul class="dropdown-menu"><li><ul class="menu">';
while($row = mysqli_fetch_array($statement))
{
if(fetch_last_message($_SESSION['user']['chat_id'], $row['id'], con())!='fail')	{
                    if($row['upload_image']!=''){
		    $filename ="../employee/employee_photos/".$row['upload_image'];

if (!file_exists($filename)) 
{

            $img ='<img src="dist/img/admin_dummy.png" class="img-circle" alt="Employee Image">';
              } else{ 
             $img ='<img src="'.$filename.'" class="img-circle" alt="Employee Image">';
             
             }
                }
                else{
                
                
              $img ='<img src="dist/img/admin_dummy.png" class="img-circle" alt="Employee Image">';
              } 
    
 $unseen_msgs=count_unseen_message($row['id'], $_SESSION['user']['chat_id'], con());
 if($unseen_msgs==0){
     $unseen_msgs='';
 }
 else{
    $unseen_msgs=count_unseen_message($row['id'], $_SESSION['user']['chat_id'], con()); 
 }
            $output .='<li class="start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['user_name'].'">
                    <a>
                      <div class="pull-left">
                    '.$img.'
                      </div>
                      <h4>'.$row['user_name'].'
                        &nbsp;&nbsp;'.fetch_online_status($row['id'],con()).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-info">'.$unseen_msgs.'</span>
                      </h4>
                      <p style="padding-top:3px;">'.fetch_last_message($_SESSION['user']['chat_id'], $row['id'], con()).'</p>
                    </a>
                  </li>';
                 
                  
    
}

}
if($output!=''){
   $output .='</ul></li></ul>';
   
}
else{
    $output .= '<ul class="dropdown-menu"><li><ul class="menu"><li style="text-laign:center;">No Messages </li></ul></li></ul>';
}
echo $output;

?>
