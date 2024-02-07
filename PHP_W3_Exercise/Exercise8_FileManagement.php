<?php

class File {
    public $filename;
    public $size;

    public function getFileExtension() {
        $parts = explode(".", $this->filename);
        return end($parts);
    }

    public function displayFileInfo() {
        echo "Filename: $this->filename, Size: $this->size KB";
    }
}




?>