<?php

class Post_blog{
    public $title;
    public $info;

    public function display(){
        echo "Title:".$this->title."<br>".$this->info;
        
    }
}
class Blog{
    private $blogs = [];
    public function add_blog(Post_blog $blog){
        $this->blogs[]=$blog;
        
        
    }
    public function display_blogs(){
        foreach($this->blogs as $b){
            $b->display();
            echo "<br>";

        }
    }

}
?>