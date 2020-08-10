<?php 
include("connection.php");

class Model{
	
	function commonSelect($table,$order="",$limit=""){
		$obj = new Connection;
		$con = $obj->getConnection();
		if($limit != ""){
			$sql = "select * from $table order by $order limit $limit";
		}else{
			$sql = "select * from $table order by $order";
		}
		$record = $con->query($sql);
		return $record;
	}

	function commonSelectJoin($select,$table1,$table2,$condition){
		$obj = new Connection;
		$con = $obj->getConnection();
		$sql = "SELECT $select FROM $table1 INNER JOIN $table2 ON $condition";
		$record = $con->query($sql);
		return $record;
	}

	function commonSelectJoinThree($select,$table1,$table2,$table3,$condition1,$condition2){
		$obj = new Connection;
		$con = $obj->getConnection();
		$sql = "SELECT $select FROM $table1 INNER JOIN $table2 ON $condition1 INNER JOIN $table3 ON $condition2";
		$record = $con->query($sql);
		return $record;
	}

	function commonSelectJoinFour($select,$table1,$table2,$table3,$table4,$condition1,$condition2,$condition3){
		$obj = new Connection;
		$con = $obj->getConnection();
		$sql = "SELECT $select FROM $table1 INNER JOIN $table2 ON $condition1 INNER JOIN $table3 ON $condition2 INNER JOIN $table4 ON $condition3";
		$record = $con->query($sql);
		return $record;
	}
	
	function commonSelectWhere($table,$where="",$order="",$limit=""){
		$obj = new Connection;
		$con = $obj->getConnection();
		if($limit != ""){
			$sql = "SELECT * FROM $table where $where order by $order limit $limit";
		}else{
			$sql = "SELECT * FROM $table where $where order by $order";
		}
		$record = $con->query($sql);
		return $record;
	}
	
	function commonUpdate($table,$data,$where){
		$obj = new Connection;
		$con = $obj->getConnection();
		$sql = "update $table set $data where $where";
		$record = $con->exec($sql);
		return $record;
	}
	
	function commonInsert($table,$coloum,$data){
		$obj = new Connection;
		$con = $obj->getConnection();
		$sql = "INSERT INTO $table($coloum) VALUES ($data)";
		$con->exec($sql);
		return $con->lastInsertId();
	}
	
	function commonDelete($table,$where){
		$obj = new Connection;
		$con = $obj->getConnection();
		$sql = "DELETE FROM $table WHERE $where";
		$record = $con->exec($sql);
		return $record;
	}
	
}

 
?>