<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/15
 * Time: 11:40
 */
class Person{
    public $_name;
    public $_age;

    public function __construct($name,$age)
    {
        $this->_name = $name;
        $this->_age = $age;
    }
}