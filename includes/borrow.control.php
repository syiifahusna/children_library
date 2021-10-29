<?php
include('borrow.class.php');

//model book class extends connection class
class BorrowControl extends Borrow{

    private $book_id;
    private $user_id;
    private $borrow_date;
    private $borrow_return;

    public function setBorrow($book_id,$user_id,$borrow_date,$borrow_return){
        $this->book_id = $book_id;
        $this->user_id = $user_id;
        $this->borrow_date = $borrow_date;
        $this->borrow_return = $borrow_return;
    }

    //insert new borrow
    public function insertBorrow(){
        //validate is true
        if(($this->validateBorrow() == true) && ($this->validateBookID() == true) && ($this->validateUserID() == true) && ($this->validateDate() == true)){
            //insert into db
            $inserted = $this->setNewBorrow($this->book_id,$this->user_id,$this->borrow_date,$this->borrow_return);
            if($inserted != false){
                //return the id
                return $inserted;
            }else{
                return "Something gone wrong";
            }
        }else{
            return "Error Detected";
        }
    }

    //validation not empty 
    private function validateBorrow(){
        if((empty($this->book_id)) && (empty($this->user_id)) && (empty($this->borrow_date)) && (empty($this->return_date))){
            return false;
        }else{
            return true;
        }
    }

    //validation book_id is number
    private function validateBookID(){
        if(is_numeric($this->book_id)){
            return true;
        }else{
            return false;
        }
    }

    //validation user_id is number
    private function validateUserID(){
        if(is_numeric($this->user_id)){
            return true;
        }else{
            return false;
        }
    }

    //validate date
    private function validateDate(){
        if (DateTime::createFromFormat('Y-m-d', $this->borrow_date) !== false) {
            if (DateTime::createFromFormat('Y-m-d', $this->borrow_return) !== false) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

?>