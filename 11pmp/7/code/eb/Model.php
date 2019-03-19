<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/3/19
 * Time: 10:56
 */

include 'Db.php';
class Model
{
    protected $_db = null;

    //sql属性
    protected $_table = '';
    protected $_fields = '*';
    protected $_where = '';
    protected $_order = '';
    protected $_limit = '';
    protected $_join = '';
    protected $_group = '';

    public function __construct()
    {
        $db = Db::getInstance();
        $this->_db = $db::connect();
    }

    /**
     * 成员属性赋值
     */
    public function table($table){
        $this->_table = $table;
        return $this;
    }

    public function fields($fields){
        $this->_fields = $fields;
        return $this;
    }

    public function where($where){
        //where 拼接处理
        $str = 'where';
        foreach ($where as $k=>$v){
            $str.=" ".$k."='".$v."' and";
        }
        $str = substr($str,0,-3);
        //给成员变量赋值
        $this->_where = $str;
        return $this;
    }

    public function order($field,$order='asc'){
        $str = 'order by '.$field.' '.$order;
        $this->_order = $str;
        return $this;
    }

    public function join($table,$join,$dir='inner'){
        $str = $dir.' join '.$table.' on '.$join;
        $this->_join = $str;
        return $this;
    }

    public function group($group){
        $str = 'group by '.$group;
        $this->_group = $str;
        return $this;
    }

    public function limit($limit,$offset=0){
        $str = 'limit '.$offset.','.$limit;
        $this->_limit = $str;
        return $this;
    }

    /**
     * 查询
     */
    public function select(){
        $sql = 'select '.$this->_fields.' from '.$this->_table.' '.$this->_join.' '.$this->_group.' '.$this->_where.' '.$this->_order.' '.$this->_limit;
        return $this->_db->query($sql)->fetchAll();
    }

    public function find(){
        $sql = 'select '.$this->_fields.' from '.$this->_table.' '.$this->_join.' '.$this->_group.' '.$this->_where.' '.$this->_order.' '.$this->_limit;
        return $this->_db->query($sql)->fetch();
    }

    /**
     * @param $data ['username'=>'guoguo','passwd'=>''];
     */
    public function add($data){
        $sql = "insert into ".$this->_table." ";
        $fields = array_keys($data);
        $values = array_values($data);
        $sql .= "(".implode(',',$fields).")";
        $sql .= " values ('".implode("','",$values)."')";

        return $this->_db->exec($sql);
    }
}