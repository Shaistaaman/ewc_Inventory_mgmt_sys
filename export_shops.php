<?php  
//export.php  
include('config.php');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM shop";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Location</th>  
                         <th>Owner</th> 
                         <th>Phone</th>  
				     <th>Email</th>
						   
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Name"].'</td>  
                         <td>'.$row["location"].'</td> 
                         <td>'.$row["owner"].'</td>   
                         <td>'.$row["phone"].'</td>  
						   <td>'.$row["email"].'</td>  
						   
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=shops.xls');
  echo $output;
 }
}
?>