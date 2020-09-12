<?php  
//export.php  
include('config.php');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM vehicle";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Driver</th>  
                         <th>Passport</th>  
                         <th>Area</th> 
                         <th>Vehicle Number</th> 
                         <th>Phone</th>  
				     <th>Email</th>
						   
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["driver"].'</td>  
                         <td>'.$row["passport"].'</td> 
                         <td>'.$row["area"].'</td>  
                         <td>'.$row["veh_num"].'</td>  
                         <td>'.$row["phone"].'</td>  
						   <td>'.$row["email"].'</td>  
						   
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=vehicles.xls');
  echo $output;
 }
}
?>