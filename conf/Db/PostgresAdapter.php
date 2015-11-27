<?php
namespace Db;

use Db\AdapterInterface as AdapterInterface;

/**
*
*@author Cezar Junior de Souza <cezar08@unochapeco.edu.br>
*/
class PostgresAdapter implements AdapterInterface
{
	/**
	*
	*@var \PDO
	*/
	protected $db_adapter;

	public function __construct()
	{		
		$this->db_adapter = new \PDO("pgsql:host=localhost port=5432 dbname=almoemi user=postgres");
	}

	/**
	*
	*@param string $table
	*@param object $object
	*@return integer
	*/
	public function insert($object)
	{	
		$table = $object->table_name;		
		$array = $object->getArrayCopy();
		unset($array['id']);
		unset($array['table_name']);
		$fields = implode(',', array_keys($array));
		$values = ':'.implode(',:', array_keys($array));
		$sql = "INSERT INTO $table ($fields) VALUES ($values)";				
		$stmp = $this->db_adapter->prepare($sql);
		foreach($array as $key => $value){
			$stmp->bindValue(":$key", $value);
		}
        $stmp->execute();
        return $this->db_adapter->lastInsertId($table.'_id_seq');
	}

	public function update($table, $values, $where)
	{
        $stmp = $this->db_adapter->prepare("UPDATE $table SET $values WHERE $where");
        $stmp->execute();
        return true;
	}

	public function fetchAll($table, $condition = null, $order = null)
	{
        if($condition != null){
            $stmp = $this->db_adapter->prepare("SELECT * FROM $table $condition");
        }else{
            $stmp = $this->db_adapter->prepare("SELECT * FROM $table");
        }
		$stmp->execute();
		return $stmp->fetchAll();
	}

	public function find($table, $id)
	{
        $stmp = $this->db_adapter->prepare("SELECT * FROM $table WHERE id = $id");
        $stmp->execute();
        return $stmp->fetchAll();
	}

	public function getLogin($login, $senha)
	{
        $stmp = $this->db_adapter->prepare("SELECT * FROM pessoa WHERE matricula = '$login' AND senha = '$senha';");
        $stmp->execute();
        $result = $stmp->fetchAll();
        if($result != null && $result != ''){
            $matricula = $result[0]['matricula'];
            $stmp2 = $this->db_adapter->prepare("SELECT * FROM gerente JOIN pessoa ON pessoa.matricula = gerente.matricula WHERE pessoa.matricula = $matricula;");
            $stmp2->execute();
            $pessoaCargo = $stmp2->fetchAll();
            if($pessoaCargo != null && $pessoaCargo != '') {
                return $pessoaCargo;
            } else {
                return $result;
            }

        }
        return false;
	}

	public function delete($table, $id)
	{
        $stmp = $this->db_adapter->prepare("DELETE FROM $table WHERE id = $id");
        $stmp->execute();
        return true;
	}

    public function banUsuario($id)
    {
        $stmp = $this->db_adapter
            ->prepare("UPDATE usuario SET status = 0 WHERE id = $id");
        $stmp->execute();
        return true;
    }

    public function unbanUsuario($id)
    {
        $stmp = $this->db_adapter
            ->prepare("UPDATE usuario SET status = 1 WHERE id = $id");
        $stmp->execute();
        return true;
    }

	public function close()
	{
		$this->db_adapter = null;
	}
}
