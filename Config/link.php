<?php
	class Link{

		private $conn;

		function __construct($server = 'localhost',$database = 'prolixo',$user = 'root',$password = 'ken01'){
			$conn = mysql_connect($server, $user, $password);
			$this->conn = mysql_select_db($database);
		}
		 function getConn(){
			return $this->conn;
		}

		public function fechaConexao(){
			mysql_close($this->conn);
		}

	}

?>