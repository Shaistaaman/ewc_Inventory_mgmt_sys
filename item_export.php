<?php  
//export.php  
include('config.php');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM item";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>ID</th>
                    <th>Name</th>  
                    <th>Type</th>  
                    <th>Minimum Level</th>  
				<th>Unit</th>
						
						 
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["item_ID"].'</td>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["type"].'</td>  
						 <td>'.$row["min_level"].'</td>  
						 <td>'.$row["unit"].'</td>
						 
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=items.xls');
  echo $output;
 }
}
?>