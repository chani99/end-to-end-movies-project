<?php
require_once ('DAL.php');

class BL {

    
// selects all from a table in a DB and returns it as array
  function SelectAllFromTable($table_name, $classname) {
        $DB = new DAL();
        $res = $DB->GetAllTable("SELECT * FROM `".$table_name."`", $classname);
        return $res;

    }

// checks if a id exists on a id row in a DB and returns true or false
 function Check_if_id_exists($table_name, $id) {
        $DB = new DAL();
        $res =  $DB->CheckId("SELECT id FROM ".$table_name." WHERE id='$id'");
        $istrue = ($res > 0 ?  true : false);
        return $istrue;
    }


 // updates data in a table 
 function update_table($table_name, $id, $updateValues) {
        $DB = new DAL();
        $DB = $DB->updateSQL("UPDATE ".$table_name." SET ".$updateValues." WHERE id='$id'");
        return $DB;

}


 function create_new_row($table_name, $column, $values, $exicute) {
        $DB = new DAL();
        $query = "INSERT INTO ".$table_name."(".$column.") VALUES (".$values.")";
        $Create = $DB->insertSQL($query, $exicute);
        return $Create;


}

 function DeleteRow($table_name, $id) {
        $DB = new DAL();
        $DB = $DB->getDB();

        $delete =  $DB->prepare("DELETE FROM ".$table_name." WHERE id =". $id);
        $delete->execute();
        return $delete;

}

}