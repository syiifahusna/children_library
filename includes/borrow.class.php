<?php
include('connection.php');

//model book class extends connection class
class Borrow extends Connection{

    protected function setNewBorrow($book_id,$user_id,$borrow_date,$borrow_return){
        //insert into borrow table
        $sql = "INSERT INTO borrow (book_id, user_id, borrow_date, borrow_return) VALUES ('".$book_id."', '".$user_id."', '".$borrow_date."','".$borrow_return."')";
        
        //must redeclaie to get last id
        $connect = $this->connect();
        
        if ($connect->query($sql) === TRUE) {
            //get the inserted id
            $inserted_id = $connect->insert_id;
            return $inserted_id;
        } else {
            return false;
        }
    }

    protected function getBorrows($user_id){
        //have to revers to select the book idk
        $sql = "SELECT * FROM books INNER JOIN borrow ON borrow.book_id = books.id WHERE borrow.user_id ='". $_SESSION["userID"]."'";
        $result = $this->connect()->query($sql);

        if($result){
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return $result;
            }
        }else{
            return false;
        }
    }

    protected function getBorrow($id){
        $sql = "SELECT * FROM borrow INNER JOIN books ON borrow.book_id = books.id INNER JOIN users ON borrow.user_id = users.id WHERE borrow.id='". $id ."' AND borrow.user_id ='". $_SESSION["userID"]."'";
        $result = $this->connect()->query($sql);
        //have to add if($result) so Trying To Get Property 'Num_rows' Of Non-Object not occor
        //erro happen when sql is written poorly
        if($result){
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return $result->fetch_assoc();
            }
        }else{
            return false;
        }
    }

    protected function getAllBorrow(){
        $sql = "SELECT * FROM borrow INNER JOIN books ON borrow.book_id = books.id INNER JOIN users ON borrow.user_id = users.id ORDER BY borrow.id DESC";
        $result = $this->connect()->query($sql);
        //have to add if($result) so Trying To Get Property 'Num_rows' Of Non-Object not occor
        //erro happen when sql is written poorly
        if($result){
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return $result;
            }
        }else{
            return false;
        }
    }
}

?>