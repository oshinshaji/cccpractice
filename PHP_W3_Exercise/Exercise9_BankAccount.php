<?php
class BankAccount{
    public $account_number;
    public $account_holder_name;
    public $balance;

    /* public function new_account(){
        
    } */
    public function __construct($account_number,$account_holder_name, $initialBalance) {
        $this->account_number = $account_number;
        $this->account_holder_name = $account_holder_name;
        $this->balance = $initialBalance;
    }

    public function deposit($amount){
        echo "After depositing:"."<br>";
        echo $this->balance+$amount."<br>";    
    }

    public function withdraw($amount){
        echo "After withdrawal:"."<br>";
        echo "Balance=".($this->balance -$amount)."<br>";  
    }

    public function display_balance(){
        echo "Balance:".$this->balance."<br>";
        
    }

    public function display(){
        echo "Account number:".$this->account_number."<br>";
        echo "Account Holder name:".$this->account_holder_name."<br>";
        echo "Balance:".$this->balance."<br>";
    } 

}

$account=new BankAccount(1234,'ABCD',30000);

$account->display();
$account->deposit(3000);
$account->withdraw(200);

?>