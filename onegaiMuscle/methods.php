
<?php
require_once("dbinit.php");
?>

<?php
	if(isset($_POST['q']) && $_POST['q'] == 'login' && isset($_POST['username']) && isset($_POST['pass'])){
		if ($stmt = $mysqli->prepare("SELECT id,username,imageURL FROM users WHERE username=? AND password=?")) {
			$salt = $_POST['username'] . '20Jun96'; 
			$passM = md5($_POST['pass'].$salt);
			$stmt->bind_param("ss", $_POST['username'],$passM);
			$stmt->execute();
			$stmt->bind_result($yourID, $yourUsername,$yourImageURL);
			if($stmt->fetch()){
				$_SESSION['yourId'] = $yourID;
				$_SESSION['yourUsername'] = $yourUsername;
				$_SESSION['yourImageURL'] = $yourImageURL;
				echo 'success';
			}
			$stmt->close();
			return;
		}
	}
	elseif(isset($_POST['q']) && $_POST['q'] == 'signin' && isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['imageURL'])){
		
		//check if user exist
		if ($stmt = $mysqli->prepare("SELECT id FROM users WHERE username=?")) {
			$stmt->bind_param("s", $_POST['username']);
			$stmt->execute();
			$stmt->bind_result($checkedID);
			if($stmt->fetch()){
				echo 'UsernameExist';
				return;
			}
		}
		
		
		if ($stmt = $mysqli->prepare("INSERT INTO users (username,password,imageURL) VALUES (?,?,?)")) {
			$salt = $_POST['username'] . '20Jun96'; 
			$passM = md5($_POST['pass'].$salt);
			$stmt->bind_param("sss", $_POST['username'], $passM, $_POST['imageURL']);
			$stmt->execute();
			$stmt->close();
			echo 'success';
			return;
		}
	}elseif(isset($_POST['q']) && $_POST['q'] == 'logout'){
		session_destroy();
	}
	elseif(isset($_POST['q']) && $_POST['q'] == 'addTime' && isset($_SESSION['yourId']) && isset($_POST['runningTime']) && isset($_POST['distance']) && isset($_POST['userID'])){
		if ($stmt = $mysqli->prepare("INSERT INTO times (userID,distance, dateOfRun,runningTime) VALUES (?,?,NOW(),?)")) {
			$rTime = strval($_POST['runningTime']);
			$stmt->bind_param("ids", $_POST['userID'], $_POST['distance'],$rTime);
			$stmt->execute();
			//printf("Error: %s.\n", $stmt->error);
			$stmt->close();
			echo 'success';
			return;
		}
	}



function getTimes($id){
		$user = 'root';
		$password = ''; //To be completed if you have set a password to root
		$database = 'onegaimuscle'; //To be completed to connect to a database. The database must exist.
		$port = NULL; //Default must be NULL to use default port
		$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);
		$mysqli->report_mode = MYSQLI_REPORT_STRICT;
		if ($mysqli->connect_error) {
			die('Connect Error (' . $mysqli->connect_errno . ') '
					. $mysqli->connect_error);
		}
		//check if user exist
		if ($stmt = $mysqli->prepare("SELECT distance, dateOfRun,runningTime FROM times WHERE userID=?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($distance,$dateOfRun,$runningTime);
			$times = array();
			$i = 0;
			while($stmt->fetch()){
				$times[$i] = new stdClass;
				$times[$i]->distance = $distance;
				$times[$i]->dateOfRun = substr($dateOfRun,0,10);
				$times[$i]->runningTime = substr($runningTime,0,5);
				$i++;
			}
			return $times;
		}
}


function getAllUsers(){
		$user = 'root';
		$password = ''; //To be completed if you have set a password to root
		$database = 'onegaimuscle'; //To be completed to connect to a database. The database must exist.
		$port = NULL; //Default must be NULL to use default port
		$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);
		$mysqli->report_mode = MYSQLI_REPORT_STRICT;
		if ($mysqli->connect_error) {
			die('Connect Error (' . $mysqli->connect_errno . ') '
					. $mysqli->connect_error);
		}
		//check if user exist
		if ($stmt = $mysqli->prepare("SELECT id, username,imageURL FROM users")) {
			$stmt->execute();
			$stmt->bind_result($id,$username,$imageURL);
			$users = array();
			$i = 0;
			while($stmt->fetch()){
				$users[$i] = new stdClass;
				$users[$i]->id = $id;
				$users[$i]->username = $username;
				$users[$i]->imageURL = $imageURL;
				$i++;
			}
			return $users;
		}
}
function getUser($id){
		$user = 'root';
		$password = ''; //To be completed if you have set a password to root
		$database = 'onegaimuscle'; //To be completed to connect to a database. The database must exist.
		$port = NULL; //Default must be NULL to use default port
		$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);
		$mysqli->report_mode = MYSQLI_REPORT_STRICT;
		if ($mysqli->connect_error) {
			die('Connect Error (' . $mysqli->connect_errno . ') '
					. $mysqli->connect_error);
		}
		//check if user exist
		if ($stmt = $mysqli->prepare("SELECT id, username,imageURL FROM users WHERE id = ?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($id,$username,$imageURL);

			if($stmt->fetch()){
				$user = new stdClass;
				$user->id = $id;
				$user->username = $username;
				$user->imageURL = $imageURL;
			}
			return $user;
		}
}


?>