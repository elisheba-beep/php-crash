<?php
class Person{
    public $name;
    public $age;
    private $genotype;
    protected $blood_group;

    public function __construct($name, $age, $genotype, $blood_group){
        $this->name = $name;
        $this->age = $age;
        $this->genotype = $genotype;
        $this->blood_group = $blood_group;
    }

    function get_name(){
        return $this->name;
    }

    function get_age(){
        return $this->age;
    }
}


class Child extends Person{
  public $child_name;
  public function __construct($name, $age, $genotype, $blood_group, $child_name){
    parent::__construct($name, $age, $genotype, $blood_group);
    $this->child_name = $child_name;
  }

  function get_child_name(){
    return $this->child_name;
  }
}

$person1 = new Person('Sheba', 24, 'AA', 'O+');
echo $person1->get_name();

$child1 = new Child('John', 10, 'Aa', 'O-', 'Jane');
echo $child1->get_child_name();
?>