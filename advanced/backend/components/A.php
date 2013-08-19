<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A
 * 数组处理类
 * @author Administrator
 */
class A {
   /**
    * Returns the values of a specified column in an array.
    * The input array should be multidimensional or an array of objects.
    *
    * For example,
    *
    * ~~~
    * $array = array(
    *     array('id' => '123', 'data' => 'abc'),
    *     array('id' => '345', 'data' => 'def'),
    * );
    * $result = A::getColumn($array, 'id');
    * // the result is: array( '123', '345')
    *
    * ~~~
    *
    * @param array $array
    * @param string $name
    * @param boolean $keepKeys whether to maintain the array keys. If false, the resulting array
    * will be re-indexed with integers.
    * @return array the list of column values
    */
   public static function getColumn($array, $name, $keepKeys = false)
   {
           $result = array();
           if ($keepKeys) {
                   foreach ($array as $k => $element) {
                           $result[$k] = self::getValue($element, $name);
                   }
           } else {
                   foreach ($array as $element) {
                           $result[] = self::getValue($element, $name);
                   }
           }

           return $result;
   }
   
   /**
    * Retrieves the value of an array element or object property with the given key or property name.
    * If the key does not exist in the array, the default value will be returned instead.
    *
    * Below are some usage examples,
    *
    * ~~~
    * // working with array
    * $username = A::getValue($_POST, 'username');
    * // working with object
    * $username = A::getValue($model, 'username');
    * // working with anonymous function
    * ~~~
    *
    * @param array|object $array array or object to extract value from
    * @param string $key key name of the array element, or property name of the object,
    * @param mixed $default the default value to be returned if the specified key does not exist
    * @return mixed the value of the
    */
   public static function getValue($array, $key, $default = null)
   {
        if (is_array($array)) {
                return isset($array[$key]) || array_key_exists($key, $array) ? $array[$key] : $default;
        } else {
                return $array->$key;
        }
   }
   
   /**
    * Indexes an array according to a specified key.
    * The input array should be multidimensional or an array of objects.
    *
    * The key can be a key name of the sub-array, a property name of object, or an anonymous
    * function which returns the key value given an array element.
    *
    * If a key value is null, the corresponding array element will be discarded and not put in the result.
    *
    * For example,
    *
    * ~~~
    * $array = array(
    *     array('id' => '123', 'data' => 'abc'),
    *     array('id' => '345', 'data' => 'def'),
    * );
    * $result = A::index($array, 'id');
    * // the result is:
    * // array(
    * //     '123' => array('id' => '123', 'data' => 'abc'),
    * //     '345' => array('id' => '345', 'data' => 'def'),
    * // )
    *
    * ~~~
    *
    * @param array $array the array that needs to be indexed
    * @param string $key the column name or anonymous function whose result will be used to index the array
    * @return array the indexed array
    */
   public static function index($array, $key)
   {
           $result = array();
           foreach ($array as $element) {
                   $value = self::getValue($element, $key);
                   $result[$value] = $element;
           }
           return $result;
   }
   
   /**
    * Builds a map (key-value pairs) from a multidimensional array or an array of objects.
    * The `$from` and `$to` parameters specify the key names or property names to set up the map.
    * Optionally, one can further group the map according to a grouping field `$group`.
    *
    * For example,
    *
    * ~~~
    * $array = array(
    *     array('id' => '123', 'name' => 'aaa', 'class' => 'x'),
    *     array('id' => '124', 'name' => 'bbb', 'class' => 'x'),
    *     array('id' => '345', 'name' => 'ccc', 'class' => 'y'),
    * );
    *
    * $result = A::map($array, 'id', 'name');
    * // the result is:
    * // array(
    * //     '123' => 'aaa',
    * //     '124' => 'bbb',
    * //     '345' => 'ccc',
    * // )
    *
    * $result = A::map($array, 'id', 'name', 'class');
    * // the result is:
    * // array(
    * //     'x' => array(
    * //         '123' => 'aaa',
    * //         '124' => 'bbb',
    * //     ),
    * //     'y' => array(
    * //         '345' => 'ccc',
    * //     ),
    * // )
    * ~~~
    *
    * @param array $array
    * @param string$from
    * @param string $to
    * @param string $group
    * @return array 返回键值对数组
    */
   public static function map($array, $from, $to, $group = null)
   {
           $result = array();
           foreach ($array as $element) {
                   $key = self::getValue($element, $from);
                   $value = self::getValue($element, $to);
                   if ($group !== null) {
                           $result[self::getValue($element, $group)][$key] = $value;
                   } else {
                           $result[$key] = $value;
                   }
           }
           return $result;
   }
   
   /**
    * 将数组根据指定的键按指定的键的顺序排序
    * @param array $teams 源数组
    * @param array/string $keys 数组中键的顺序表，可以是数组array(1,2,3),也可以是字串'1,2,3',字串用逗号分隔
    * @param string $id 数组中的键，排序就是根据它的值来
    * @return $newTeams/$teams 返回新数组或者源数组
    */
   static public function sortByKeys(&$array, $keys, $id = 'id') {
           //如果数组为空，或者要根据排序的ID为空，返回原数组
           if (empty($array) || empty($keys)) {
                   return $array;
           }
           //如果$key是用逗号分隔的字串
           if (is_string($keys)) {
                   $keys = explode(',', trim($keys, ','));
           }
           $new_array = array(); //定义一个新的空数组用来返回
           //将原数组按指定的键返回一个新数组
           $array = self::index($array, $id);
           foreach ($keys as $key) {
                   //按键的顺便把源数组中的值放入新数组
                   if (isset($array[$key])) {
                           $new_array[] = $array[$key];
                           //删掉源数组对应的值
                           unset($array[$key]);
                   }
           }
           return $new_array;
   }
   
   /**
    * 压入数组第一个位置
    * @param array $array 被压入的数组值
    * @param type $val 要压入的变量
    * @return array 返回压入的结果
    */
   static public function push($array, $value) {
           $arr = array();
           if (!empty($value)) {
                   $arr[] = $value;
           }
           foreach ($array as $key => $val) {
                   if (is_numeric($key)) {
                           $arr[] = $val;
                   }else{
                           $arr[$key]=$val;
                   }
           }
           return $arr;
   }
   
   /**
    * 将数组里面的值转换类型
    * @param array $array 源数组
    * @param string $type 要转换的类型 int float ...
    * @param bool $keepKeys 是否保存索引
    * @return array
    */
   static public function changeType($array,$type='int',$keepKeys = true){
       if(empty($array)){
           return $array;
       }
       $newArray = array();
       foreach ($array as $key => $value) {
           switch ($type) {
               case 'int':
                   $value = intval($value);
                   break;
               case 'float':
                   $value = floatval($value);
                   break;
               default:
                   break;
           }
           if($keepKeys){
               $newArray[$key] = $value;
           }else{
               $newArray[] = $value;
           }
       }
       return $newArray;
   }
}

?>
