<?php
    include('includes/book.class.php');
    class BookControl extends Book{

        public function updateBook($bookId,$bookTitle,$aboutBook,$publishDate,$category){
            $book = new Book();
            $result = $book->editBook($bookId,$bookTitle,$aboutBook,$publishDate,$category);
        }

        public function addBook($bookTitle,$aboutBook,$publishDate,$category){
            $upload=$this->uploadImg();
            if($upload != false){
                $bookCover = $upload;
                $book = new Book();
                return $book->setBook($bookTitle,$aboutBook,$publishDate,$category,$bookCover);
            }else{
                return false;
            }
        }

        private function uploadImg(){

            $uploadOk = 1;
            //get teh file exetention
            $fileExe = pathinfo($_FILES["bookCover"]["name"],PATHINFO_EXTENSION);
            $target_dir = "book_img/";
            $imgName = uniqid("img_") .".".$fileExe;
            //new file name
            $target_file = $target_dir . $imgName;
            
            //file less than 500kb;
            if ($_FILES["bookCover"]["size"] > 500000) {
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                return false;
            }else{
                // if everything is ok, try to upload file
                //move_uploaded_file(//filename, directory)
                if (move_uploaded_file($_FILES["bookCover"]["tmp_name"], $target_file)){
                    return $imgName;
                } else {
                    return false;
                }
            }
            
        }

        public function deleteBook($bookId,$bookCover){
            $this->deleteImg($bookCover);

            $book = new Book();            
            $book->removeBorrowBook($bookId);
            $book->removeBook($bookId);
            return true;
        }

        private function deleteImg($bookCover){
            $path = "book_img"."/". trim($bookCover);
            unlink($path);
        }
    }

?>