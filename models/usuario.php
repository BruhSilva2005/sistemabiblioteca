<?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
        
        session_start();


class Usuario{

    protected $db;
    protected $table = "usuarios";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
  /**
     * buscar registro unico
     * @param int $id
     * @return Usuario|null 
     */
    public function buscar($id_usuario){
        try {
            $sql = ("SELECT * FROM {$this->table} WHERE id_usuario = :id_usuario");
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt ->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro na inserção!" . $e->getMessage();
            return null;
        }
    }

    /**
     * listar todos os registros da tabela usuario
     */ 
    public function listar(){

        try{
            $sql = "SELECT * FROM {$this->table}";
            $stmt= $this ->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo 'Erro ao Listar: '.$e->getMessage();
            return  null;
        }
    }
    /**
     * cadastrar usuario
     * @param array $dados
     * @return bool
     */
    public function cadastrar($dados){
        try{
            $query= "INSERT INTO {$this->table} (nome,email, senha, perfil)
            VALUES (:nome,:email,:senha,:perfil)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nome',$dados['nome']);
            $stmt->bindParam(':email',$dados['email']);
            $stmt->bindParam(':senha',$dados['senha']);
            $stmt->bindParam(':perfil',$dados['perfil']);
            $stmt->execute();
            $_SESSION['sucesso'] ="Cadastro realizado com sucesso!";
        }catch(PDOException $e){
            echo "erro na preparação da consulta:" .$e -> getMessage();
            $_SESSION['erro'] ="Erro ao cadastrar usuario!";
            return false;
            
        }
    }
    /**
     * editar usuario
     *@param int $id
     *@param array $dados
     *@return bool
     */

    public function editar($id_usuario,$dados){

        try{
            
            $sql = "UPDATE {$this->table} SET nome=:nome, email = :email ,senha =:senha , perfil = :perfil WHERE id_usuario = :id_usuario";
            $stmt =$this->db->prepare($sql);
            $stmt->bindParam(':nome',$dados['nome']);
            $stmt->bindParam(':email',$dados['email']);
            $stmt->bindParam(':senha',$dados['senha']);
            $stmt->bindParam(':perfil',$dados['perfil']);
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuario editado com sucesso!";
            return true;
        }catch(PDOException $e){
            echo "Erro na preparacao da consulta: ".$e-> getMessage();
            exit;
            return false;
        }
    }
    //excluir usuario
    public function excluir($id_usuario){

        try{
            $sql = "DELETE FROM {$this->table} where id_usuario=:id_usuario";
            $stmt = $this -> db-> prepare($sql);
            //passagem de parametros e execução do sql
            $stmt->bindParam(':id_usuario',$id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuario excluido com sucesso!";
        }catch(PDOException $e){
            echo"Erro ao excluir dado" .$e->  getMessage();
        }   
    }
}