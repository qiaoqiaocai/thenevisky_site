<?php
class Database {
	private static $cont = null;

	public function __construct() {
		die('Init function is not allowed');
	}//construct
	
	public static function connect() {
		$config = json_decode(file_get_contents("config.json"));

		if(null == self::$cont) {
			try {
				self::$cont = new PDO("mysql:host=". $config->host. "; dbname=". $config->database, $config->username, $config->password);
			}catch(PDOException $e) {
				die($e->getMessage());
			}//try-catch
			return self::$cont;
		}//if
	}//connect
	
	public static function disconnect() {
		self::$cont = null;
	}//disconnect
}//Database
?>
