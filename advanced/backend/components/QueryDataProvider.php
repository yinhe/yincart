<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QueryDataProvider
 *
 * @author Administrator
 */
class QueryDataProvider extends CSqlDataProvider{
    public $_query;
    
    public function __construct($query,$config=array())
    {
        $this->_query = $query;
        foreach($config as $key=>$value){
            $this->$key=$value;
        }

        $this->setTotal();
    }
    
    //设置查询项目总数
    protected function setTotal() {
        $countQuery= clone $this->_query;
        $countQuery->select('count(1)');
        $itemCount = $countQuery->queryScalar();//符合条件的总数量
//        dump($itemCount);
        $this->setTotalItemCount($itemCount);
    }


    protected function fetchData()
    {
        if(($pagination=$this->getPagination())!==false)
        {
            $pagination->setItemCount($this->getTotalItemCount());
            $pagination->applyLimit($this->_query);
        }

        return $this->_query->queryAll();
    }
    
    protected function getSqltext(){
        return strtr($this->_query->text, $this->_query->params);
    }

}

?>
