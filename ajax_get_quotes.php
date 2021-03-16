   <?php
    if (isset($_POST['age'])) {

        include('admin/includes/functions.php');
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $smoker = $_POST['smoker'];
        if (isset($_POST['coverage'])) {

            $coverage = $_POST['coverage'];
            $ncoverage = 'n' . $coverage;
        } else {
            $coverage = 10000;
            $ncoverage = 'n' . $coverage;
        }

        if (isset($_POST['v'])) {
            $v = $_POST['v'];
        } else {
            $v = 7;
        }

        $select_quotes = "select * from rates where age='$age' AND gender='$gender' AND smoker='$smoker' order by $ncoverage asc";
        $run_quotes = mysqli_query(con(), $select_quotes);
        $n_of_quotes = mysqli_num_rows($run_quotes);

        $quote_results = '';
        if ($n_of_quotes > 0) {

            $quote_results .= '
    <div class="row" >
    
        <div class="col-md-6">
            <div class="row">
            <table class="table text-center well" style="background:white;">
            <tr>
                <td width="50%"><h1>Coverage $' . number_format($coverage) . '</h1></td>
                    <td width="50%">
 <input type="button" class="btn plusminus" id="minus" value="-" >&nbsp;&nbsp; &nbsp; <input type="button" id="plus" class="btn plusminus" value="+">
 <input type="hidden" id="v" value="' . $v . '">
   </td>
                            </tr>
                            </table>
                            <br><br>
                                
                                    <p class= "text-center"> 
                                    <span id="demo" style="padding:10px;color:black;font-size:20px;">For a $' . number_format($coverage) . ' plan we found a total of ' . $n_of_quotes . ' options.</span></p>
                                        
                                            <div class= "hidden-xs hidden-sm">
                                              <h2>Policy Benefits</h2>
                                              <ul class="list-group d-sm-none d-md-block ">
                                                <li class="list-group-item">Rates Never Increase</li>
                                                <li class="list-group-item">No Medical Exam</li>
                                                <li class="list-group-item">You Can Not Be Turned Down</li>
                                                <li class="list-group-item">Premiums Never Increase</li>
                                                <li class="list-group-item">Coverage Never Decreases</li>
                                              </ul>
                                            
                                        </div>
                                       
  
   </div>
   </div>
   
   
   <div class="col-md-6">
   <div class="row plans-alert">
   <div class="col-md-12">
   <div class="alert alert-info">
   <strong>Here all ' . $n_of_quotes . ' plans side by side</strong>
   </div>
   
   </div>';
            while ($row = mysqli_fetch_array($run_quotes)) {

                $filnam = getcwd() . "/admin/images/" . $row['company_logo'];

                if (!file_exists($filnam) || $row['company_logo'] == '') {
                    $logo = '<img src="admin/images/company_dummy.png" class="img-circle"  width="100px" style="height:100px">';
                } else {
                    $logo = '<img src="admin/images/' . $row['company_logo'] . '" class="img-circle"  width="100px" style="height:100px">';
                }
                $quote_results .= '
 <table class="table text-center well" style="background:white;" id="reach">
 <tr>
 <td width="30%">' . $logo . '</td>
 <td width="45%">
 <h4>' . $row['company_name'] . '</h4>
 <h3><b>' . $row[$ncoverage] . '/mo</b></h3>
 <h4>$' . number_format($coverage) . '<span style="font-size:14px;">coverage</span></h4>
 </td>
 <td width="25%">
 <a href="plan-form.php?id=' . $row['id'] . '&ncoverage=' . $row[$ncoverage] . '&coverage=' . $coverage . '&gender=' . $gender . '&smoker=' . $smoker . '" class="btn btn-success" style="border-radius:0; color:black; background-color:#e9e0cf; width:100%;border-color:#e9e0cf;">Apply > </a>
 </td>
 </tr>
 </table>

 
 ';
            }
            $quote_results .= '</div>
 </div>';
        } else {

            $quote_results .= '
  <div class="row" style="padding:5px;">
  <div class="col-md-12">
  <div class="alert alert-info">
  <strong>No Plans Found</strong>
  </div>
  </div>
  </div>
  </div>
  ';
        }

        echo $quote_results;
    }


    ?>
   <div>