<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MysqlDB {
    var $conn = NULL;
    public function __construct() {
        $this->conn=mysql_connect("localhost","root","123456");
        //mysql_query("set name 'utf-8'");
        mysql_select_db("zuoye",$this->conn);
    }
    
    public function queryOne($sql) {
        $result=mysql_query($sql, $this->conn);
        $row=mysql_fetch_assoc($result);
        return $row;
    }
    
    public function query($sql) {
        $this->conn=mysql_connect("localhost","root","123456");
        // mysql_query("set name 'utf-8'");
        mysql_select_db("zuoye",$this->conn);
        echo $sql;
        $row=mysql_query($sql);
        echo '----'.count($row);
        // $row=mysql_query($result);
        return $row;
    }
}

