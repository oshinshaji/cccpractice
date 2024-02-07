<?php

include_once "Exercise1_SimpleCalculator.php";
include_once "Exercise2_StudentInformation.php";
include_once "Exercise3_Point_in_2D_Space.php";
include_once "Exercise4_LibrarySystem.php";
include_once "Exercise5_EmployeeManagement.php";
include_once "Exercise6_BlogSystem.php";
include_once "Exercise7_ShapeHierarchy.php";
include_once "Exercise8_FileManagement.php";
include_once "Exercise9_BankAccount.php";
include_once "Exercise10_OnlineShop.php";

echo "All the classes used here";
echo "<br>";
$obj1=new Calculator();
echo $obj1->add(2,3);
echo $obj1->mul(57,9);
echo "<br>";

$obj2=new Student();
$obj2->name="Oshin";
$obj2->enr_no="1073";
$obj2->age="21";
$obj2->surname="Kochutharayil";
$obj2->display_data();
echo "<br>";

$obj3=new TwoD_Space();
$obj3->x=3;
$obj3->y=4;

$obj11=new TwoD_Space();
$obj11->x=5;
$obj11->y=6;

echo $obj3->Calc_Distance($obj11);
echo "<br>";

$obj4=new Book();
$obj4->title="Harry Potter";
$obj4->author="J K Rowling";
$obj4->display();
echo "<br>";
$obj12=new Library();
$obj12->add_book($obj4);
$obj12->display_books();
echo "<br>";

$employee=new Employee();
$employee->e_name="Luffy";
$employee->e_age=19;
$employee->e_salary=300000;
$employee->calc_yealry_bonus();
echo "<br>";

$blog=new Post_blog();
$blog->title="Rain";
$blog->info="Rain is beautiful";
$blog->display();
$blog2=new Post_blog();
$blog2->title="abc";
$blog2->info="dsfsdfsdf";

echo "<br>";
$post=new Blog();
$post->add_blog($blog);
$post->add_blog($blog2);
$post->display_blogs();
echo "<br>";

$circle=new Circle();
$circle->radius=4;
$circle->calc_area();
$circle->calc_perimeter();
echo "<br>";
$rectangle=new Rectangle();
$rectangle->length=4;
$rectangle->breadth=3;
$rectangle->calc_area();
$rectangle->calc_perimeter();
echo "<br>";
$square=new Square();
$square->length=4;
$square->calc_area();
$square->calc_perimeter();
echo "<br>";

$file = new File();
$file->filename = "document.txt";
$file->size = 1024;

echo "File Extension: " . $file->getFileExtension() . "<br>";
$file->displayFileInfo();
echo "<br>";

$obj9=new Student();
echo "<br>";


$obj10=new Student();
?>