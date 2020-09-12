<?php  
//export.php  
include('config.php');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM employee";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Code</th>  
                         <th>Phone</th>  
						   <th>Project</th>
						   <th>CNIC</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["ttcode"].'</td>  
                         <td>'.$row["phone"].'</td>  
						   <td>'.$row["project"].'</td>  
						   <td>'.$row["cnic"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=employee.xls');
  echo $output;
 }
}
?>