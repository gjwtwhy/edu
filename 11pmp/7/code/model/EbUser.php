<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/19
 * Time: 15:20
 */
include 'eb/Model.php';
class EbUser extends Model{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'eb_user';
    }
}