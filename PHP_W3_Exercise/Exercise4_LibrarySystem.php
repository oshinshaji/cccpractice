<?php

class Book{
    public $title;
    public $author;
    
    public function display(){
        echo "Book:".$this->title."<br>".$this->author."<br>";  
    }

}

class Library{
    public $books=[];

    public function display_books(){
        foreach($this->books as $b){
            $b->display();
            echo "<br>";
        }

    }

    public function add_book(Book $book){
        $this->books[]=$book;

    }
    
    
}
?>