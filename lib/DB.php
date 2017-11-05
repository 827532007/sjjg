<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MysqlDB {
    var $conn = NULL;
    public function __construct() {
        $this->conn=mysqli_connect("localhost","root","123456", 'zuoye');
    }
    
    public function queryOne($sql) {
        $result=mysql_query($sql, $this->conn);
        $row=mysql_fetch_assoc($result);
        return $row;
    }
    
    public function query($sql) {
        $result=mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_all($result);
        return $row;
    }
    
    public function getId() {
        return mysqli_insert_id($this->conn);
    }
}

