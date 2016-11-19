<?php
//tutorial help from www.phptherightway.com

class Singleton 
{

	private static $dollar;
	

	public static function getDollar()
	
	{
		if (null ===static::$dollar) {
			static::$dollar = new static();
		}


		return static::$dollar;
	}

	//used a protected constructor so that dollar doesnt repeat

	protected function __construct() {}


	//clone function to prevent cloning

	private function __clone() {}
	private function __wakeup() {}
}


class money 
{
	private $number;
	public function __construct ($number) {
		$this->number = $number;
	}
	public function displayNumber(){
		return $this->number;
	}
}

//factory method

class moneyFactory
{
	public static function create ($number){
		return new money($number);
	}
}

class moneyDecorator 
{
	public $money;
	public $number;
	public function __construct(moneyy $money){
		$this->moneyz=$money;
		$this->newMoney();
	}
	public function newMoney(){
		$this->number= $this->moneyz->displayNumber();
	}
	public function theMoney() {
		return $this->number;
	}
}
class fivek extends moneyDecorator{
	private $decorator;
	public function __construct(moneyDecorator $decorator){
		$this->decor=$decorator;
	}
	public function amountOfMoney(){
		$this->decor->mon = "";
	}
}

$singleton = Singleton::getDollar();
$factory = moneyFactory::create ("There is $5,000 available in your account.");
echo($factory->displayNumber());

$dec= new moneyDecorator($factory);
$ndec = new fivek($factory);
$ndec = amountOfMoney();
echo $dec->theMoney();


?>
