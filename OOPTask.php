

<?php
class Fruit {
  public $name;
  public $color;
  protected $type='regular';
  private $shape='round';
  const SAYHI = 'Hi there fruit lovers';
  
protected function get_properties(){
  echo 'the fruit named ' . $this->name . ' has the color ' . $this->color . ' and has the type ' . $this->type . '.';
  }
  
  function set_type($type){
  $this->type = $type;
  }
  
  function set_shape($shape){
  $this->shape = $shape;
  }
  
  final function get_info(){
  echo 'this is a final function';
  }
 
  
}

class CitrusFruit extends Fruit{
function get_type(){
echo 'this is a ' . $this->type . ' fruit.';
}

/*function get_shape(){
echo 'this fruit has a ' . $this->shape . ' shape.';
$this->get_properties();
}*/

function hi(){
echo self::SAYHI;
}

/*function get_info(){
echo 'this should give an error';
}*/

}

/*$apple = new Fruit();
$apple->name = 'apple';
$apple->color = 'red';
$apple->set_type('not regular');
$apple->get_properties();*/
$orange = new CitrusFruit();
$orange->set_type('citrus');
//$orange->get_properties();
$orange->set_shape('oval');
//$orange->get_shape();
//$orange->get_info();
$orange->hi();

//var_dump($apple instanceof Fruit);



// Create an Iterator
class MyIterator implements Iterator {
  private $items = [];
  private $pointer = 0;

  public function __construct($items) {
    // array_values() makes sure that the keys are numbers
    $this->items = array_values($items);
  }

  public function current(): mixed {
    return $this->items[$this->pointer];
  }

  public function key(): mixed {
    return $this->pointer;
  }

  public function next(): void {
    $this->pointer++;
  }

  public function rewind(): void {
    $this->pointer = 0;
  }

  public function valid(): bool {
    // count() indicates how many items are in the list
    return $this->pointer < count($this->items);
  }
}

// A function that uses iterables
function printIterable(iterable $myIterable) {
  foreach($myIterable as $item) {
    echo $item;
  }
}

// Use the iterator as an iterable
$iterator = new MyIterator(["a", "b", "c"]);
printIterable($iterator);


?>
