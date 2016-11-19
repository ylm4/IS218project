<?php

class book {
	private $bookTitle;
	private $bookAuthor;
	private $bookPlace;

	public function __construct($title,$author,$place){
		$this->titlee = $title;
		$this->author = $author;
		$this->place = $place;

	}
	public function getTitle() {
		return $this->titlee;
	}
	public function getAuthor() {
		return $this->author;
	}
	public function getPlace() {
		return $this->place;
	}
	public function getBook() {
		return $this->getTitle() . ' '. $this->getAuthor();
	}
}

class bookfactory{
	public static function create ($title,$author,$place){
		return new book($title, $author, $place);
	}
}

class bookdecorator {
	public $book;
	public $bookPage;

	public function __construct(Book $bookk){
		$this->book=$bookk;
		$this->placeReset();
	}
	public function placeReset(){
		$this->place=$this->book->getPlace();
	}
}

class extension extends bookdecorator {
	private $headings;
	public function __construct (bookdecorator $heading){
		$this->heading=$heading;
		$this->heading();
	}
	public function heading(){
		$this->heading->place= 'www.Amazon.com';
		$this->heading->place= 'www.Books.com';
	}
	public function strat(){
		echo '<b>Information on the book Available</b> <br>';
		echo'Title:  ' . $this->heading->book->getTitle() .'<br>';
		echo 'Author: ' . $this->heading->book->getAuthor() . '<br>';
		echo 'Place Available: ' . $this->heading->place .'<br>';
	}
}

class bookStrategy {
	public $bookStrategy= NULL;
	public function __construct(bookdecorator $heading, $place){
		switch($place){
			case 'www.Amazon.com':
			$this->Strat= new extension ($heading);
			$this->Strat->strat();

			case 'www.Books.com':
			$this->Strat = new extension($heading);
			$this->Strat->strat();
			break;
		}
	}
}

$bookname = new book ('Practical PHP and MySQL Website Database','Adrian W West', '');
$bookstrat = new bookdecorator($bookname);

//stratgey
$amazon = new bookStrategy ($bookstrat, 'www.Amazon.com');
$booksss = new bookStrategy ($bookstrat, 'www.Books.com');
?>
