<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("adb.php");
/**
 * Description of checkLogin
 *
 * @author Kc
 */
class login extends adb {
    function login() {
        adb::adb();
    }
    
    function check_login($username, $password){
        $query = "Select * from user 
                    where username = '$username' and password = '$password';";
//        print $query;
        return $this->query($query);
    }
}
