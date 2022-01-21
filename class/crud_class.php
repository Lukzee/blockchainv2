<?php

class crud {

    /**
     * Insert data into the table
     * @param string $table
     * @param string $args
     * @param string $db
     * @return $query
     */
    public static function insert($table, $args, $db){
        $query = mysqli_query($db, 'INSERT INTO '.$table.' SET '.$args);
        return $query;
    }
    
    /**
     * Select data from the table
     * @param string $table
     * @param string $args
     * @param string $db
     * @return $query
     */
    public static function select($table, $args, $db){
        $query = mysqli_query($db, 'SELECT * FROM '.$table.' '.$args);
        return $query;
    }
    
    /**
     * Update data in the table
     * @param string $table
     * @param string $args
     * @param string $db
     * @return $query
     */
    public static function update($table, $args, $db){
        $query = mysqli_query($db, 'UPDATE '.$table.' SET '.$args);
        return $query;
    }

    /**
     * Delete data from the table
     * @param string $table
     * @param string $args
     * @param string $db
     * @return $query
     */
    public static function del($table, $args, $db) {
        $query = mysqli_query($db, 'DELETE FROM '.$table.' WHERE '.$args);
        return $query;
    }
}

?>