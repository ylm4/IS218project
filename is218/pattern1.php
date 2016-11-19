<?php
// defining a class with a car's make, model, color

class car {
	private $carMake;
	private $carModel;
	private $carColor;

	public function __construct($make,$model,$color){
		$this->Make = $make;
		$this->Model = $model;
		$this->Color = $color;
	}
	public function getMake(){
		return $this->Make;
	}
	public function getModel(){
		return $this->Model;
	}
	public function getColor(){
		return $this->Color;
	}
	public function getCar(){
		return $this->getMake() . 'plus' . $this->getModel();
	}
}

//class factory of class car
class factory {
	public static function create($make,$model,$color){
		return new car($make,$model,$color);
	}
}

//class decorator
class decorator {
	public $car;
	public $carColor;

	public function __construct(Car $carr){
		$this->car=$carr;
		$this->colorReset();
	}
	public function colorReset(){
		$this->Color=$this->car->getColor();
	}
}
// will make the type of category each falls into
class blackCar extends decorator {
	private $decorator;
	
	public function __construct(decorator $decorate){
		$this->decor=$decorate;
		$this->BlackCar();
	}

	public function BlackCar(){
		$this->decor->Color= 'black';
	}
	public function strat(){
		echo 'Make-  ' . $this->decor->car->getMake() .'<br>';
		echo 'Model- ' . $this->decor->car->getModel() . '<br>';
		echo 'Color- ' . $this->decor->Color .'<br>';
	}
}

//strategy class

class strategy {
	public $strategy;
	
	public function __construct(decorator $decorate, $color){
		switch($color){
			case 'black':
			$this->Strat= new blackCar($decorate);
			$this->Strat->strat();
			break;
		}
	}
}
$CAR = new car('Nissan','Altima','yellow');
$dec = new decorator($CAR);
//strategy class
$black = new strategy ($dec, 'black');
?>

