<pre>
<?php
    echo "Practice class"."<br>";
    class A
    {
        public $i = 0;
        public function inc()
        {
        //    $this->i++;
        //    ++$this->i;
        }
        public function reset()
        {
            $this->i = 10;
        }
    }

    $obj1 = new A();
    print_r($obj1);//0
    // print_r(print_r($obj1->inc()));
    $obj1->inc();//1
    print_r($obj1);//1
    $obj1->reset();//10
    $obj1->i = 10;//10

    $obj2 = new A();
    $obj2->inc();//1

    print_r($obj1);//10
    $obj1->inc();//11
    print_r($obj2);//1

    ?>