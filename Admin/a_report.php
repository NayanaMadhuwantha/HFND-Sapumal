<?php

$dsn = 'mysql:host=localhost;dbname=somstore';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "somstore");


session_start();
date_default_timezone_set("Asia/Colombo");
$dateNow = date("Y-m-d");
$timeNow = date("H:i:s");
$dateTime = $dateNow." ".$timeNow;
$connect = mysqli_connect("localhost", "root", "", "somstore");
$query = "SELECT * FROM payment";
$result = mysqli_query($connect, $query);
$filter = null;
$date_from = null;
$date_to = null;

if (isset($_POST['back'])){
    $filter = false;
    $date_from = null;
    $date_to = null;
}

if (isset($_POST['year']) && isset($_POST['month'])){
    if (strlen($_POST['year']) == 4 && strlen($_POST['month']) == 2){
        $filter = $_POST['year']."-".$_POST['month'];
    }
    else if (strlen($_POST['year']) == 4){
        $filter = $_POST['year'];
    }
}

if (isset($_POST['date_from']) && isset($_POST['date_to'])){
    $filter = "duration";
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>HFND.COM | Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
</head>
  <style>
  
  .container-fluid{
    padding-top: 3%;
    padding-bottom: 3%;
    background-color: #f2f2f2;  
  } 

  .container{
    background-color: #fff;
    padding: 3%;
    border-radius: 5px;
  }

  .navbar{
     box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  </style>

<body>

	<div class="container-fluid">
        <?php
        if ($filter == "duration") {
                echo "
                
            <div class='container'style='padding-bottom: 0px'>
            <form action='a_report.php' method='post'>
                <input type='hidden' name='back' value='true'>
                <button class='btn btn-success'>Back</button>
            </form>
                <div class='row'>
                
                    <div class='col-sm'>
                        <center><h2 style='background-color: #6f93ff; color: rgb(247,249,247); border-radius: 3px; padding: 15px'>Order Report</h2></center>
                        <h4 style='color: #103674'>HFND</h4>
                        <h5 style='color: #000b74'>$date_from To $date_to</h5>
                    </div>
                </div>
            </div>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                        <table id='table-report' class='display'>
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>";

                $total_orders = 0;
                $total_units = 0;
                $total_price = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $current_order_ID = $row['order_ID'];
                    $current_Full_Name = $row['Full_Name'];
                    $current_Address = $row['Address'];
                    $current_Country = $row['Country'];
                    $current_City = $row['City'];
                    $current_Phone = $row['Phone'];
                    $current_Date = $row['Dilivery_Address'];
                    $current_Total_Amount = $row['Total_Amount'];
                    $current_P_quantity = 0;


                    //for filter
                    /*$H_year = null;
                    $H_year_and_month = null;

                    $H_year = explode("-", $current_Date)[0];
                    $H_month = explode("-", $current_Date)[1];
                    $H_year_and_month = $H_year . "-" . $H_month;*/
                    $current_Date = date('Y-m-d', strtotime($current_Date));
                    $DateBegin = date('Y-m-d', strtotime($date_from));
                    $DateEnd = date('Y-m-d', strtotime($date_to));

                    if (($current_Date >= $DateBegin) && ($current_Date <= $DateEnd)){
                        $total_price += explode("$", $current_Total_Amount)[0];
                        $total_orders++;

                        echo "
                                    <tr>
                                        <td>$current_order_ID</td>
                                        <td>$current_Full_Name</td>
                                        <td>$current_Address</td>
                                        <td>$current_Country</td>
                                        <td>$current_City</td>
                                        <td>$current_Phone</td>
                                        <td>$current_Date</td>
                                        <td>$current_Total_Amount</td>
                                    </tr>
                                ";
                    }

                    //if ($H_year == $filter || $H_year_and_month == $filter) {
                        /*$current_P_total = $current_P_price * $current_P_quantity;
                        $total_units += $current_P_quantity;
                        $total_price += $current_P_total;

                        $total_categories++;*/

                    //}
                }


                echo "
                            <tr>
                                <td><div style='visibility: hidden; position: absolute;'>z</div><b>Total</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>$total_price$</b></td>
                            </tr>
                        ";

                echo "</tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
            <div class='container' style='margin-top: 30px;'>
            
                <div class='container'>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='col-md-12'>
                                <div class='row space-16'>&nbsp;</div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='thumbnail'>
                                            <div class='caption text-center'  style='background-color: #d1f3d0'>
                                                <h4 id='thumbnail-label'>Total orders</h4>
                                                <h3>$total_orders</h3>
                                               </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-2'>&nbsp;</div>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class='col-md-12'>
                                <div class='row space-16'>&nbsp;</div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='thumbnail'>
                                            <div class='caption text-center' style='background-color: #d1f3d0'>
                                                <h4 id='thumbnail-label'>Total price</h4>
                                                <h3>$total_price$</h3>
                                               </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-2'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>";
        }
        else if ($filter){
            echo "
                
            <div class='container'style='padding-bottom: 0px'>
            <form action='a_report.php' method='post'>
                <input type='hidden' name='back' value='true'>
                <button class='btn btn-success'>Back</button>
            </form>
                <div class='row'>
                
                    <div class='col-sm'>
                        <center><h2 style='background-color: #6f93ff; color: rgb(247,249,247); border-radius: 3px; padding: 15px'>Order Report</h2></center>
                        <h4 style='color: #103674'>HFND</h4>
                        <h5 style='color: #000b74'>$filter</h5>
                    </div>
                </div>
            </div>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                        <table id='table-report' class='display'>
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>";

            $total_orders = 0;
            $total_units = 0;
            $total_price = 0;
            while ($row = mysqli_fetch_array($result)) {
                $current_order_ID = $row['order_ID'];
                $current_Full_Name = $row['Full_Name'];
                $current_Address = $row['Address'];
                $current_Country = $row['Country'];
                $current_City = $row['City'];
                $current_Phone = $row['Phone'];
                $current_Date = $row['Dilivery_Address'];
                $current_Total_Amount = $row['Total_Amount'];
                $current_P_quantity = 0;


                $H_date = $current_Date;
                $H_year = explode("-", $H_date)[0];
                $H_month = explode("-", $H_date)[1];
                $H_year_and_month = $H_year . "-" . $H_month;

                if (($H_year == $filter || $H_year_and_month == $filter)){
                    $total_price += explode("$", $current_Total_Amount)[0];
                    $total_orders++;

                    echo "
                                    <tr>
                                        <td>$current_order_ID</td>
                                        <td>$current_Full_Name</td>
                                        <td>$current_Address</td>
                                        <td>$current_Country</td>
                                        <td>$current_City</td>
                                        <td>$current_Phone</td>
                                        <td>$current_Date</td>
                                        <td>$current_Total_Amount</td>
                                    </tr>
                                ";
                }
            }
            echo "
                            <tr>
                                <td><div style='visibility: hidden; position: absolute;'>z</div><b>Total</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>$total_price$</b></td>
                            </tr>
                        ";

            echo "</tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
            <div class='container' style='margin-top: 30px;'>
            
                <div class='container' style='width:90%'>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='col-md-12'>
                                <div class='row space-16'>&nbsp;</div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='thumbnail'>
                                            <div class='caption text-center'  style='background-color: #d1f3d0'>
                                                <h4 id='thumbnail-label'>Total orders</h4>
                                                <h3>$total_orders</h3>
                                               </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-2'>&nbsp;</div>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class='col-md-12'>
                                <div class='row space-16'>&nbsp;</div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='thumbnail'>
                                            <div class='caption text-center' style='background-color: #d1f3d0'>
                                                <h4 id='thumbnail-label'>Total price</h4>
                                                <h3>$total_price$</h3>
                                               </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-2'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>";
        }
        else{
            echo "
            

            <div class='container'>
            <div class='row'>
                <h3>Please select a year and month to generate the report</h3>
                <h5>You can generate the annual reports only entering a year</h5>
                <br>
                <form action='a_report.php' method='post'>
                <br>
                    <div class='form-group'>
                        <label for='email' style='width: 100px'>Select year</label>
                        <input type='text' name='year' id='yearpicker' />
                    </div>
                    <br>
                    <div class='form-group'>
                        <label for='email' style='width: 100px'>Select month</label>
                        <input type='text' name='month' id='monthpicker' />
                    </div> 
                    <br>
                    <button type='submit' class='btn btn-primary'>Generate</button>
                </form>
             </div>
             <br>
             <h5>Or</h5>
             <div class='row'>
             <h3>Please select time duration to generate the report</h3>
            <br>
            <form action='a_report.php' method='post'>
            <br>
                <div class='form-group'>
                    <label for='date_from' style='width: 40px'>From</label>
                    <input type='date' name='date_from' id='date_from' required/>
                </div>
                <br>
                <div class='form-group'>
                    <label for='date_to' style='width: 40px'>To</label>
                    <input type='date' name='date_to' id='date_to' required/>
                </div> 
                
                <br>
                <button type='submit' class='btn btn-primary'>Generate</button>
            </form>
            </div>
            </div>";
        }
        ?>


	</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<script>

    $("#yearpicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
    $("#monthpicker").datepicker({
        format: "mm",
        viewMode: "months",
        minViewMode: "months"
    });

    $(document).ready(function() {
        // Append a caption to the table before the DataTables initialisation
        $('#table-report').append('<caption style="caption-side: bottom">HFND order report</caption>');

        $('#table-report').DataTable( {
            dom: 'Bfrtip',
            bPaginate: false,
            buttons: [
                'copy',
                {
                    extend: 'excel',
                    messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
                },
                {
                    extend: 'pdf',
                    messageBottom: null
                },
                {
                    extend: 'print',
                    messageTop: function () {
                        return '<?php
                            if ($filter == "duration"){
                                echo "Order report - $date_from To $date_to";
                            }
                            else{
                                echo $filter;
                            }
                            ?>';
                    },
                    messageBottom: null
                }
            ]
        } );
    } );
</script>
  </body>
</html>
