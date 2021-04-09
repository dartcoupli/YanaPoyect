 <?php  
 require_once("dbconnect.php");
	  //echo("<script>console.log('Holaddd');</script>"); <===== Tester
 if(isset($_POST["query"]))  
 {  
      $output = ''; 
      $query="SELECT cities.ciid,cities.ciname,cities_subzone.csname,cities_zone.czname FROM (cities left join cities_subzone on cities.cicsid = cities_subzone.csid) left join cities_zone on cities_subzone.csczid=cities_zone.czid where ciname LIKE '%".$_POST["query"]."%' LIMIT 10";  
      //$query = "SELECT * FROM cities WHERE ciname LIKE '%".$_POST["query"]."%' LIMIT 10";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled autocomplete">'; 
	  echo("<script>console.log('HolaCXXXXXXXXXXXXXX');</script>");
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li data-ciid="'.$row["ciid"].'">'.
                    $row["ciname"].' ('.$row["czname"].')</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>No encuentro ciudades</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>







