<?php
if (isset($_POST['age'])) {
    include 'admin/includes/functions.php';
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $smoker = $_POST['smoker'];
    if (isset($_POST['coverage'])) {
        $coverage = $_POST['coverage'];
    } else {
        $coverage = $_POST['coverge'];
    }

    if (isset($_POST['v'])) {
        $v = $_POST['v'];
    } else {
        $v = 3;
    }

    $get_rate_query = "SELECT * FROM new_rates where rates='$coverage'";
    $run_query_get = mysqli_query(
        con(),
        $get_rate_query
    );
    $quote_results = '';
    while (
        $fetch_data = mysqli_fetch_array($run_query_get)
    ) {
        $fetch_id = $fetch_data['id'];
        $select_years = "SELECT DISTINCT year from company_rates where gender='$gender' AND smoker='$smoker' AND age='$age' AND rates_id='$fetch_id' AND value!='' ORDER BY year ASC";
        $run_years = mysqli_query(con(), $select_years);
        $n_of_years = mysqli_num_rows($run_years);
        $yrss = 0;
        $n_of_quotes = 0;
        while (
            $fetch_year = mysqli_fetch_array($run_years)
        ) {
            $count = 0;
            $yrss++;
            $yer = $fetch_year['year'];
            $count_quotes = "SELECT * from company_rates where gender='$gender' AND smoker='$smoker' AND age='$age' AND rates_id='$fetch_id' AND value!='' ";
            $run_count_quotes = mysqli_query(
                con(),
                $count_quotes
            );
            $no_count_quotes = mysqli_num_rows(
                $run_count_quotes
            );
            $select_quotes = "SELECT * from company_rates where gender='$gender' AND smoker='$smoker' AND age='$age' AND rates_id='$fetch_id' AND value!='' AND year='$yer' ORDER BY value ASC";
            $run_quotes = mysqli_query(
                con(),
                $select_quotes
            );
            $no_of_quotes = mysqli_num_rows(
                $run_quotes
            );
            $n_of_quotes =
                $n_of_quotes +
                mysqli_num_rows($run_quotes);

            if ($n_of_quotes > 0) {
                if ($yrss == 1) {
                    $quote_results .=
                        '
    <div class= "wrapper">
        <h1 class= "plans"> We found ' .
                        $no_count_quotes .
                        ' low plans</h1><br>
            
        <div class="flex">
            <div class= "leftdiv">
                <div class= "info">          
                    <!--COVERAGE-->

                    <div>          
                        <h1 class= "coverage">Coverage $' .
                        number_format($coverage) .
                        '</h1><br>
                    </div>
                                                    
                    <div>               
                        <input type="button" class="btn plusminus" id="minus" value="-" >&nbsp;&nbsp; &nbsp; <input type="button" id="plus" class="btn plusminus" value="+">
                        <input type="hidden" id="v" value="' .
                        $v .
                        '">
                    </div><br> 
                                        
                    <div>
                        <h3> How much coverage do I need?</h3><br>    
                        <p class= "tip">Financial Planners use a rule of 10 times your annual income for coverage amount. Or you can use our Life Insurance Caculator.</p>
                    </div> 

                </div>         
            </div>    <!--end leftdiv-->';
                }
                if ($yrss == 1) {
                    $quote_results .=
                        '<div class="rightdiv">';
                }
                while (
                    $row = mysqli_fetch_array(
                        $run_quotes
                    )
                ) {
                    $count++;

                    $company_id = $row['company_id'];
                    $img_query = "SELECT * FROM company where id='$company_id'";
                    $run_query = mysqli_query(
                        con(),
                        $img_query
                    );
                    $img = mysqli_fetch_array(
                        $run_query
                    );

                    $filnam =
                        getcwd() .
                        '/admin/images/' .
                        $img['company_logo'];

                    if (
                        !file_exists($filnam) ||
                        $img['company_logo'] == ''
                    ) {
                        $logo =
                            '<img src="admin/images/company_dummy.png" >';
                    } else {
                        $logo =
                            '<img src="admin/images/' .
                            $img['company_logo'] .
                            '" >';
                    }

                    if ($count == 1) {
                        $ccls = '';
                        if ($no_of_quotes > 1) {
                            $ccls = 'bbt';
                        }

                        $quote_results .=
                            '<div class="card" style="border:1px solid #00aeff;z-index:1;">
                                <div class= "top-card">
                                    <div class= "insurance-logo">' .
                            $logo .
                            '</div>
                                    <div> Policy Term<br><br><span class= "price" style= "font-size: 36px;">' .
                            $row['year'] .
                            '</span> Yrs</div>
                                    <div> Monthly <br><br><span class= "price" style= "font-size: 36px;">$' .
                            $row['value'] .
                            '</span> </div>
                                    <div class= "cov"> Coverage<br><br><span class= "price" style= "font-size: 36px;"> $' .
                            number_format($coverage) .
                            '</span></div>
                                </div>
                                <div class= "bottom-card">
                                         
                                    <a class="dropbtn ' .
                            $ccls .
                            '" data-toggle="collapse" data-target="#rbyy' .
                            $row['year'] .
                            '">More Options <i class="fa fa-caret-down"></i></a><div><a class="con" href="plan-form.php?id=' .
                            $row['id'] .
                            '&coverage=' .
                            $coverage .
                            '&coveragevalue=' .
                            $row['value'] .
                            '&company_name=' .
                            $img['company_name'] .
                            '&company_logo=' .
                            $img['company_logo'] .
                            '&year=' .
                            $row['year'] .
                            '"><button class= "continue">CONTINUE</button></a></div>   
                                </div></div>';
                    }

                    if (
                        $count == 2 &&
                        $no_of_quotes > 1
                    ) {
                        $quote_results .=
                            '<div id="rbyy' .
                            $row['year'] .
                            '" class="collapse" >';
                    }
                    if (
                        $count > 1 &&
                        $no_of_quotes > 1
                    ) {
                        $bbr = '';
                        if ($count == $no_of_quotes) {
                            $bbr =
                                'border-bottom:1px solid #00aeff;';
                        }
                        $quote_results .=
                            '<div class="card" style="border-left:1px solid #00aeff;border-right:1px solid #00aeff;' .
                            $bbr .
                            '">
                                <div class= "top-card">
                                    <div class= "insurance-logo">' .
                            $logo .
                            '</div>
                                    <div> Policy Term<br><br><span class= "price" style= "font-size: 36px;">' .
                            $row['year'] .
                            '</span> Yrs</div>
                                    <div> Monthly <br><br><span class= "price" style= "font-size: 36px;">$' .
                            $row['value'] .
                            '</span> </div>
                                    <div class= "cov"> Coverage<br><br><span class= "price" style= "font-size: 36px;"> $' .
                            number_format($coverage) .
                            '</span></div>
                                </div>
                                <div class= "bottom-card">
                                         <a></a><div><a class="con" href="plan-form.php?id=' .
                            $row['id'] .
                            '&coverage=' .
                            $coverage .
                            '&coveragevalue=' .
                            $row['value'] .
                            '&company_name=' .
                            $img['company_name'] .
                            '&company_logo=' .
                            $img['company_logo'] .
                            '&year=' .
                            $row['year'] .
                            '"><button class= "continue">Continue</button></a></div>   
                                </div></div>';
                    }
                    if (
                        $count == $no_of_quotes &&
                        $no_of_quotes > 1
                    ) {
                        $quote_results .= '</div>';
                    }
                    /*if($count==$no_of_quotes){
                                                   $quote_results .='</div>';
                                               }*/
                    if ($yrss == $n_of_years) {
                        $quote_results .=
                            '</div></div></div>';
                    }
                }
            }
        }
    }
}
echo $quote_results;