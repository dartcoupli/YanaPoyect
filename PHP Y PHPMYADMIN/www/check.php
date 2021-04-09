 <?php  
	require_once("dbconnect.php");
	
	
	//echo("<script>console.log('Holaddd');</script>"); //<================================= Tester 

	
	if(isset($_POST["password"]) && isset($_POST['email']))
	{
		
		
		echo "<script>console.log(' DEFINIDO ');</script>";
		//$query="SELECT cities.ciid,cities.ciname,cities_subzone.csname,cities_zone.czname FROM (cities left join cities_subzone on cities.cicsid = cities_subzone.csid) left join cities_zone on cities_subzone.csczid=cities_zone.czid where ciname LIKE '%".$_POST["query"]."%' LIMIT 10";  
		$mailx = $_GET['email'];
		$query = "SELECT uspassword FROM users WHERE usemail = '$mailx'";  
		$result = mysqli_query($connect, $query);
		$RealPasswordFromBd = mysqli_fetch_array($result);
						  
		if($_POST['password'] == $RealPasswordFromBd[0])
		{


			header("location: activacion_formPass.php?email=".$_POST['email']);
			//echo "<script>console.log(' CORRECTO!!!!!!! ');</script>"; //<=================================== Tester 
								
		}
		else
		{
								
								
			//echo "<script>console.log(' ERRONEO!!!!!!!!!!!! ');</script>"; //<=================================== Tester 
								
		}
							
							
			//echo("<script>console.log('$dd[0]');</script>"); //<=================================== Tester 
								
		}
		else
		{
						
						
			//echo "<script>console.log(' NO DEFINIDO!!!!!!!!!!!! ');</script>"; //<=================================== Tester 
						
		}
 ?>







