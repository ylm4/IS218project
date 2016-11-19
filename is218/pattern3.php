<?php

//initalizing my class for scoops of icecream

class Scoops{
	private $perScoop;
	public function __construct($times){
		$this->perScoop=$times;
	}
	public function getAnswerForScoops(){
		return 'I would like ' . $this->perScoop . ' scoops please.';
	}
}

class iceCreamfactory{
	public static function create ($times){
		return new Scoops($times);
	}
}
//tried to implement observer
//looked at  tutorial from www.sourcemaking.com/design_patterns/observer/php

abstract class abstractObserver {
        abstract function update(abstractSubject $subject_in);
}

abstract class abstractSubject {
        abstract function attach(abstractObserver $observer_in);
	abstract function detach(abstractObserver $observer_in);
        abstract function notify();
}

function writeln($line_in) {
        echo $line_in."<br/>";
}

//this function will print on afs
class icecreamObserver extends abstractObserver {
        public function _construct() {}
	public function update (abstractSubject $subject) {
                writeln('How many scoops of vanilla?');
                writeln("Customer's response: ".$subject->getAnswer());
		writeln('<br>');
	}
}
class icecreamSubject extends abstractSubject {
        private $number  = NULL;
        private $flavor = array();
        function __construct(){}
	function attach(abstractObserver $observer_in) {
                $this->observers[]= $observer_in;
	}
	function detach(abstractObserver $observer_in) {
                foreach($this->observers as $okey=> $oval) {
			if ($oval == $observer_in) {
				unset($this->observers[$okey]);
			}
		}
	}
	function notify(){
		foreach($this->observers as $obs) {
                        $obs->update($this);
		}
	}
	function updateNumOfScoops($updatedScoops) {
                $this->scoops=$updatedScoops;
		$this->notify();
	}
	function getAnswer() {
		return $this->scoops;
	}
}

$func1=iceCreamfactory::create(6);
$func2=iceCreamfactory::create(3);
$updateScoops = $func1->getAnswerForScoops();
$updateScoopsss = $func2->getAnswerForScoops();
$scoopSubject = new icecreamSubject();
$scoopObserver = new icecreamObserver();
$scoopSubject->attach($scoopObserver);
$scoopSubject->updateNumOfScoops($updateScoops);
$scoopSubject->updateNumOfScoops($updateScoopsss);

