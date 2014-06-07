<?php
	require_once('../Config/link.php');
	
	class LixeiraDAO {
		
		private $id;
		private $identificador;
		private $nome;
		private $status;
		private $conn;
		private $table = 'lixeiras';

		public function __construct($id = null, $identificador = null, $nome = null, $status = null){
			$this->id = $id;
			$this->identificador = $identificador;
			$this->nome= $nome;
			$this->status = $status;					
			$link = new Link();
			$this->conn = $link->getConn();

		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getIdentificador(){
			return $this->identificador;
		}

		public function setIdentificador($identificador){
			$this->identificador = $identificador;
		}

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($status){
			$this->status = $status;
		}


		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function save(LixeiraDAO $ld){

			$query = mysql_query("insert into $ld->table (identificador,nome,status) values($ld->identificador,'$ld->nome',$ld->status)");
			return mysql_insert_id();
		}

		private function query($query){
			return mysql_query($query);
		}

		public function findById($id){
			$result = $this->query("select * from $this->table where id = $id");
			$data = mysql_fetch_assoc($result);
			return new LixeiraDAO($data['id'],$data['identificador'],$data['nome'],$data['status']);

		}
		public function delete($id){
			return mysql_query("delete from $this->table where id = $id");

		}

		public function update(LixeiraDAO $ld){
			$query = "update $this->table set identificador = $ld->identificador, nome = '{$ld->nome}' , status = $ld->status where id = $ld->id";
			$exec = mysql_query($query) or die(mysql_error().' QUERY: '$query);
			return mysql_affected_rows();

		}
		


	}

?>