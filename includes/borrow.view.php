<?php
include('borrow.class.php');

//model book class extends connection class
class BorrowView extends Borrow{
    
    public function displayBorrowInfo($id){
        $borrow = new Borrow();
        return $borrow->getBorrow($id);
    }

    public function displayBorrowsInfo($user_id){
        $borrow = new Borrow();
        return $borrow->getBorrows($user_id);
    }

    public function displayBorrows(){
        $borrow = new Borrow();
        return $borrow->getAllBorrow();
    }

}