<pre>
<?php
include_once "class.php";
include_once "connection.php";

class Data_Collection_Object
{
    protected $_data_c = [];
    public function addData($row)
    {
        $this->_data_c[] = new Data_Object($row);
    }

    public function getData()
    {
        return $this->_data_c;
    }
}

class Data_Object
{
    protected $_row = [];
    public function __construct($row)
    {
        $this->_row = $row;
    }

    public function __call($name, $arguments)
    {
        $name=strtolower(substr($name,3));
        return (isset($this->_row[$name])
        ?$this->_row[$name]
        :(isset($arguments[0])?$arguments[0]:null)
    );
    print_r($name);
    echo "<br/>";

    }
}


/* foreach($newObj->getData() as $_mmdata) {
    // print_r($_mmdata);
    echo "<br>";
    print_r($_mmdata->getId('Simple'));
    echo "<br>";
    print_r($_mmdata->getName());
} */

?>