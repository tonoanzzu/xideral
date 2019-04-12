<?php
//require_once '';
class Usuario{
    
private $id;
private $nombres;
private $apellido_p;
private $apellido_m;
private $password;
private $estatus;
private $db;

public function __construct(){
    $this->db = Database::connect();
}

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getNombres() {
		return $this->nombres;
	}

	function setNombres($nombres) {
		$this->nombres = $this->db->real_escape_string($nombres);
	}

	function getApellido_p() {
		return $this->apellido_p;
	}

	function setApellido_p($apellido_p) {
		$this->apellido_p = $this->db->real_escape_string($apellido_p);
	}

	function getApellido_m() {
		return $this->apellido_m;
	}

	function setApellido_m($apellido_m) {
		$this->apellido_m = $this->db->real_escape_string($apellido_m);
	}
	
	function getEmail() {
		return $this->email;
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4]); 
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function getEstatus() {
		return $this->estatus;
	}

	function setEstatus($estatus) {
		$this->estatus = $estatus;
	}

	    
    public function save(){
        $sql= "insert into usuarios values (null,'{$this->getNombres()}','{$this->getApellido_p()}','{$this->getApellido_m()}','{$this->getEmail()}', '{$this->getPassword()}','{$this->getEstatus()}')";
        $save = $this->db->query($sql);
        $id = $this->db->insert_id;
        $result = false;
        if($save){
            $result=true;
            $response['id']=$id;
            $response['result']=$result;
        }else{
            $response['id']=null;
            $response['result']=$result;
        }

        return $response;
    }

    public function login(){
        $result = false;
        $email= $this->email;
		$password= $this->password;
		//$email = $this->getEmail();
		//$password = $this->getPassword();
				
        $sql="SELECT * FROM usuarios WHERE email = '$email' ";
        
        $login= $this->db->query($sql);

        if($login && $login->num_rows == 1){

			$usuario = $login->fetch_object();
			

			$verify = password_verify($password, $usuario->password);  
			var_dump($verify); 
			if($verify){
				$result= $usuario;
			}
        }

        return $result;




    }






}