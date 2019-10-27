<?php

function get_db() {
	$db = NULL;
	try {
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');
		if (!isset($dbUrl) || empty($dbUrl)) {
			// example localhost configuration URL with user: "ta_user", password: "ta_pass"
			// and a database called "scripture_ta"
			// $dbUrl = "postgres://ugnwjdmwxniiya:2ecea2acdb5c80dbdac4546a4b3dff94fef3bbc3d7568ff01395af99ed6c36f3@ec2-107-20-243-220.compute-1.amazonaws.com:5432/d6u9e77r40atnf";
			// NOTE: It is not great to put this sensitive information right
			// here in a file that gets committed to version control. It's not
			// as bad as putting your Heroku user and password here, but still
			// not ideal.
			
			// It would be better to put your local connection information
			// into an environment variable on your local computer. That way
			// it would work consistently regardless of whether the application
			// were running locally or at heroku.
			/***********************************************************************/
			$dbopts = parse_url($dbUrl);
			$dbHost = "ec2-107-20-243-220.compute-1.amazonaws.com";
			$dbPort = "5432";
			$dbUser = "ugnwjdmwxniiya";
			$dbPassword = "2ecea2acdb5c80dbdac4546a4b3dff94fef3bbc3d7568ff01395af99ed6c36f3";
			$dbName = "d6u9e77r40atnf";
			// Create the PDO connection
			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			/*************************************************************************/
		}
		// Get the various parts of the DB Connection from the URL
		else {
			$dbopts = parse_url($dbUrl);
			$dbHost = $dbopts["host"];
			$dbPort = $dbopts["port"];
			$dbUser = $dbopts["user"];
			$dbPassword = $dbopts["pass"];
			$dbName = ltrim($dbopts["path"],'/');
			// Create the PDO connection
			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
	}
	catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
		echo "Error connecting to DB. Details: $ex";
		echo "<br><br>dbURL = $dbUrl<br><br>";
		echo "<br><br>dbopts = $dbopts<br><br>";
		echo "dbhost = $dbHost<br><br>";
		echo "dbPort = $dbPort<br><br>";
		echo "dbUser = $dbUser<br><br>";
		echo "dbName = $dbName<br><br>";
		die();
	}
	
    
	return $db;
}

?>
