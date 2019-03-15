<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/15
 * Time: 11:41
 */
include 'Person.php';
include 'Walk.php';

class Student extends Person implements Walk{
    public function run()
    {
        // TODO: Implement run() method.
    }
}