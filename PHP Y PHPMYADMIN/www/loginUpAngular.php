<?php
    #VERSION SUSTITUIDA. POR HEADER.PHP
# .____                 .__          ____ ___         __________  ___ _____________     _____    _______  ________       _____    _______    ________ ____ ___.____       _____ __________ 
# |    |    ____   ____ |__| ____   |    |   \_____   \______   \/   |   \______   \   /  _  \   \      \ \______ \     /  _  \   \      \  /  _____/|    |   \    |     /  _  \\______   \
# |    |   /  _ \ / ___\|  |/    \  |    |   |____ \   |     ___/    ~    \     ___/  /  /_\  \  /   |   \ |    |  \   /  /_\  \  /   |   \/   \  ___|    |   /    |    /  /_\  \|       _/
# |    |__(  <_> ) /_/  >  |   |  \ |    |  /|  |_> >  |    |   \    Y    /    |     /    |    \/    |    \|    `   \ /    |    \/    |    \    \_\  \    |  /|    |___/    |    \    |   \
# |_______ \____/\___  /|__|___|  / |______/ |   __/   |____|    \___|_  /|____|     \____|__  /\____|__  /_______  / \____|__  /\____|__  /\______  /______/ |_______ \____|__  /____|_  /
#        \/    /_____/         \/           |__|                      \/                    \/         \/        \/          \/         \/        \/                 \/       \/       \/ 
	
	// NOTAS IMPORTANTES.
	// CUIDADO; Mysql está obsoleto: https://es.stackoverflow.com/questions/294029/para-que-sirve-file-get-contentsphp-input
	
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Rquest-With, Content-Type, Accept");
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('content-type: application/json; charset=utf-8');
	
	$json = file_get_contents('php://input');

	$params = json_decode($json);
	
	require('dbconnect.php');
	$connect->set_charset("utf8");
	$query = "SELECT * FROM users WHERE usemail='dartcoupli@hotmail.com'";
	$result = $connect->query($query);
		
	//echo("<script>console.log('$gg');</script>");
	$reg = mysqli_fetch_array($result, MYSQLI_ASSOC);

	class Result
	{

	};
	
	$response = new Result();
	$response->usemail = $reg['usemail'];
	$response->uspassword = $reg['uspassword'];
	$response->ussurname = $reg['ussurname'];

	echo("<script>console.log('g');</script>"); //<========== TESTED
	
?>