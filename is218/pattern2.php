<?php
//Laptop
//builer design pattern
class buildLaptop {
	private $laptopBrand;
	private $laptopSize;

	public function __construct($laptopBrand, $laptopSize){
		$this->laptopBrand= $laptopBrand;
		$this->laptopSize = $laptopSize;
	}

	public function getlaptopBrand(){
		return $this->laptopBrand;
	}
	public function getlaptopSize(){
		return $this->laptopSize;
	}
	public function getlaptop(){
		return $this->getlaptopBrand() . ' in ' . $this->getlaptopSize();
	}
}

//decorator
class decorator {
	public $laptop;
	public $laptopSize;

	public function __construct(buildLaptop $laptop){
		$this->laptop=$laptop;
		$this->resetSize();
	}
	public function resetSize(){
		$this->laptopSize = $this->laptop->getlaptopSize();
	}
	public function theSize(){
		return $this->laptopSize;
	}
}
//extends decorator (above code) 

class fifteenInch extends decorator {
	private $decorator;
	public function __construct (decorator $decorator){
		$this->decor = $decorator;
	}
	public function sizeOfLaptop(){
		$this->decor->Size = "15-inch";	
	}
	
}

//factory push
class factory {
	public static function create($laptopBrand,$laptopSize){
		return new buildLaptop($laptopBrand,$laptopSize);
	}
}

$LAPTOP= factory::create('Lenovo is available', '15-inch.');
echo ($LAPTOP->getLaptop());
$decorator = new decorator($LAPTOP);
$fifteenDecor = new fifteenInch($LAPTOP);
$fifteenDecor = sizeOfLaptop();
echo $decorator->theSize();

?>

	

