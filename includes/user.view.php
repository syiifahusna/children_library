<?php
include('user.class.php');

class UserView extends User{

    public function displayAllUsers(){
        $users = new User();
        return $users->getAllusers();
    }

    public function getUserInfo($userId){
        $user = new User();
        return $user->getUserInfo($userId);
    }
}

?>