<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class F {
    
    static public function hello() {
	echo 'hello';
    }
    
    static public function rand_color() {
	for ($a = 0; $a < 6; $a++) {    //采用#FFFFFF方法，  
	    $d.=dechex(rand(0, 15)); //累加随机的数据--dechex()将十进制改为十六进制  
	}
	return '#' . $d;
    }

    /**
     * 语言翻译
     *
     * @param unknown_type $message
     * @param unknown_type $category
     * @param unknown_type $params
     * @param unknown_type $source
     * @param unknown_type $language
     * @return unknown
     */
    static public function t($message, $category = 'frontend', $params = array(), $source = null, $language = null) {
	return Yii::t($category, $message, $params, $source, $language);
	//t('hello','xx');xx是语言包
    }

    /**
      +----------------------------------------------------------
     * 字符串截取，支持中文和其他编码
      +----------------------------------------------------------
     * @static
     * @access public
      +----------------------------------------------------------
     * @param string $str 需要转换的字符串
     * @param string $start 开始位置
     * @param string $length 截取长度
     * @param string $charset 编码格式
     * @param string $suffix 截断显示字符
      +----------------------------------------------------------
     * @return string
      +----------------------------------------------------------
     */
    static public function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
	if (function_exists("mb_substr"))
	    return mb_substr($str, $start, $length, $charset);
	elseif (function_exists('iconv_substr')) {
	    return iconv_substr($str, $start, $length, $charset);
	}
	$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $str, $match);
	$slice = join("", array_slice($match[0], $start, $length));
	if ($suffix)
	    return $slice . "…";
	return $slice;
    }

    //按日期生成目录
    static public function do_mkdir($day_file, $path) {
	$dir_array = explode("-", $day_file);
	if (count($dir_array) == 3) {
	    $dir_1 = $path . '/' . $dir_array[0];
	    $dir_2 = $dir_1 . "/" . $dir_array[1];
	    $dir_3 = $dir_2 . "/" . $dir_array[2];
	    $dir_file_array = array($dir_1, $dir_2, $dir_3);
	    $dir_file_array = array();
	    $dir_str = $path . '/';
	    for ($i = 0; $i < count($dir_array); $i++) {
		$dir_str.=$dir_array[$i] . "/";
		array_push($dir_file_array, $dir_str);
	    }
	    for ($i = 0; $i < count($dir_file_array); $i++) {
		$dir_file = $dir_file_array[$i];
		if (file_exists($dir_file)) {
		    continue;
		} else {
//                    echo $dir_file;
//                    exit;
		    mkdir($dir_file, 0777);
		    chmod($dir_file, 0777);
		}
	    }
	    return $dir_file_array[count($dir_file_array) - 1];
	} else {
	    echo "error!!!!!!!!!";
	    exit;
	}
    }

    /**
     * 得到新订单号
     * @return  string
     */
    static public function get_order_id() {
	/* 选择一个随机的方案 */
	mt_srand((double) microtime() * 1000000);
	return date('Ymd') . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }

    static public function script($file) {
	Yii::app()->getClientScript()->registerScriptFile($file);
    }

    /**
     * 直接写script
     *
     * @param unknown_type $file
     */
    static public function rgScript($id, $script) {
	Yii::app()->getClientScript()->registerScript($id, $script);
    }

    static public function check2Array($array) {
	foreach ($array as $k => $v) {
	    if (is_array($v)) {
		return true;
	    }
	}
	return false;
    }

    static public function isfile($url) {
	$isfile = get_headers($url);
	foreach ($isfile as $str) {
	    $isfilestr.=$str;
	}
	$pos = strpos($isfilestr, "Content-Type: image/");
	if ($pos > 0) {
	    $result = true;
	} else {
	    $result = false;
	}
	return $result;
    }

    /* set a flash message to display after the request is done */

    static public function setFlash($message) {
	Yii::app()->user->setFlash('mysite', $message);
    }

    static public function hasFlash() {
	return Yii::app()->user->hasFlash('mysite');
    }

    /* retrieve the flash message again */

    static public function getFlash() {
	if (Yii::app()->user->hasFlash('mysite')) {
	    return Yii::app()->user->getFlash('mysite');
	}
    }

    static public function renderFlash() {
	if (Yii::app()->user->hasFlash('mysite')) {
	    echo '<div class="errorSummary">';
	    echo F::getFlash();
	    echo '</div>';
	    Yii::app()->clientScript->registerScript('fade', "
setTimeout(function() { $('.errorSummary').fadeOut('slow'); }, 5000);	
");
	}
    }

    /**
     * 无限级分类，显示
     * @$arr 数组 
     * @$id id
     * @$show_curent 是否显示当然分类
     * @$pid 分类上级id
     * @$name 显示名
     */
    static public function toTree($arr, $selected = '', $id = 'id', $pid = 'pid', $name = 'title', $span = 1) {
	foreach ($arr as $rs) {
	    if ($rs->$pid == 0) {
		if ($selected == $rs->$id)
		    $select = "selected='selected'";
		$str .= "<option value='" . $rs->$id . "' $select >" . F::t($rs->$name) . "</option>";
		$str .= self::toTreeHelper($arr, $selected, $rs->$id, $pid, $id, $name, $span);
	    }
	}
	return $str;
    }

    //辅助生成tree
    static public function toTreeHelper($arr, $selected, $value, $pid, $id, $name, $span) {
	$array = array();
	for ($i = 0; $i < $span; $i++) {
	    $string .='&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	foreach ($arr as $rs) {
	    if ($value == $rs->$pid) {
		if ($selected == $rs->$id)
		    $select = "selected='selected'";
		$str .="<option value='" . $rs->$id . "' $select>" . $string . F::t($rs->$name) . "</option>";
		if (self::toTreeHelper($arr, $selected, $rs->$id, $pid, $id, $name, $span))
		    $str .=self::toTreeHelper($arr, $selected, $rs->$id, $pid, $id, $name, $span + 1);
	    }
	}
	return $str;
    }

    /**
     * 所多维数组 转成一维数组
     *
     * @param unknown_type $array
     * @return unknown
     */
    static public function array_values_one($array) {
	$arrayValues = array();
	$i = 0;
	foreach ($array as $key => $value) {
	    if (is_scalar($value) or is_resource($value)) {
		$arrayValues[$key] = $span . $value;
	    } elseif (is_array($value)) {

		$arrayValues = array_merge($arrayValues, self::array_values_one($value));
	    }
	}

	return $arrayValues;
    }

    /**
     * 函数名： deleteDir
     * 功 能： 递归地删除指定目录
     * 参 数： $dir 目录
     * 返回值： 无
     */
    static public function deleteDir($dir) {
	if ($items = glob($dir . "/*")) {
	    foreach ($items as $obj) {
		is_dir($obj) ? deleteDir($obj) : unlink($obj);
	    }
	}
	rmdir($dir);
    }

    function listFile($dir) {
	$fileArray = array();
	$cFileNameArray = array();
	if ($handle = opendir($dir)) {
	    while (($file = readdir($handle)) !== false) {
		if ($file != "." && $file != "..") {
		    if (is_dir($dir . "\\" . $file)) {
			$cFileNameArray = self::listFile($dir . "\\" . $file);
			for ($i = 0; $i < count($cFileNameArray); $i++) {
			    $fileArray[] = $cFileNameArray[$i];
			}
		    } else {
			$fileArray[] = $file;
		    }
		}
	    }

	    return $fileArray;
	} else {
	    echo "listFile出错了";
	}
    }

    //以下四个函数为必须函数。
    static public function sub($content, $maxlen = 300, $show = false, $f = '……') {
	//把字符按HTML标签变成数组。
	$content = preg_split("/(<[^>]+?>)/si", $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
	$wordrows = 0; //中英字数
	$outstr = "";  //生成的字串
	$wordend = false; //是否符合最大的长度
	$beginTags = 0; //除<img><br><hr>这些短标签外，其它计算开始标签，如<div*>
	$endTags = 0;  //计算结尾标签，如</div>，如果$beginTags==$endTags表示标签数目相对称，可以退出循环。
	//print_r($content);
	foreach ($content as $value) {
	    if (trim($value) == "")
		continue; //如果该值为空，则继续下一个值
	    if (strpos(";$value", "<") > 0) {
		//如果与要载取的标签相同，则到处结束截取。
		if (trim($value) == $maxlen) {
		    $wordend = true;
		    continue;
		}
		if ($wordend == false) {
		    $outstr.=$value;
		    if (!preg_match("/<img([^>]+?)>/is", $value) && !preg_match("/<param([^>]+?)>/is", $value) && !preg_match("/<!([^>]+?)>/is", $value) && !preg_match("/<br([^>]+?)>/is", $value) && !preg_match("/<hr([^>]+?)>/is", $value)) {
			$beginTags++; //除img,br,hr外的标签都加1
		    }
		} elseif (preg_match("/<\/([^>]+?)>/is", $value, $matches)) {
		    $endTags++;
		    $outstr.=$value;
		    if ($beginTags == $endTags && $wordend == true)
			break; //字已载完了，并且标签数相称，就可以退出循环。
		}else {
		    if (!preg_match("/<img([^>]+?)>/is", $value) && !preg_match("/<param([^>]+?)>/is", $value) && !preg_match("/<!([^>]+?)>/is", $value) && !preg_match("/<br([^>]+?)>/is", $value) && !preg_match("/<hr([^>]+?)>/is", $value)) {
			$beginTags++; //除img,br,hr外的标签都加1
			$outstr.=$value;
		    }
		}
	    } else {
		if (is_numeric($maxlen)) { //截取字数
		    $curLength = self::getStringLength($value);
		    $maxLength = $curLength + $wordrows;
		    if ($wordend == false) {
			if ($maxLength > $maxlen) { //总字数大于要截取的字数，要在该行要截取
			    $outstr.=self::subString($value, 0, $maxlen - $wordrows);
			    $wordend = true;
			} else {
			    $wordrows = $maxLength;
			    $outstr.=$value;
			}
		    }
		} else {
		    if ($wordend == false)
			$outstr.=$value;
		}
	    }
	}

	//循环替换掉多余的标签，如<p></p>这一类
	while (preg_match("/<([^\/][^>]*?)><\/([^>]+?)>/is", $outstr)) {
	    $outstr = preg_replace_callback("/<([^\/][^>]*?)><\/([^>]+?)>/is", "strip_empty_html", $outstr);
	}
	//把误换的标签换回来
	if (strpos(";" . $outstr, "[html_") > 0) {
	    $outstr = str_replace("[html_&lt;]", "<", $outstr);
	    $outstr = str_replace("[html_&gt;]", ">", $outstr);
	}
	//echo htmlspecialchars($outstr);
	if (true == $show && true == $wordend) {
	    $outstr .=$f;
	}
	return $outstr;
    }

    //取得字符串的长度，包括中英文。
    static public function getStringLength($text) {
	if (function_exists('mb_substr')) {
	    $length = mb_strlen($text, 'UTF-8');
	} elseif (function_exists('iconv_substr')) {
	    $length = iconv_strlen($text, 'UTF-8');
	} else {
	    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $text, $ar);
	    $length = count($ar[0]);
	}
	return $length;
    }

    /*     * *********按一定长度截取字符串（包括中文）******** */

    static public function subString($text, $start = 0, $limit = 12) {
	if (function_exists('mb_substr')) {
	    $more = (mb_strlen($text, 'UTF-8') > $limit) ? TRUE : FALSE;
	    $text = mb_substr($text, 0, $limit, 'UTF-8');
	    return $text;
	} elseif (function_exists('iconv_substr')) {
	    $more = (iconv_strlen($text, 'UTF-8') > $limit) ? TRUE : FALSE;
	    $text = iconv_substr($text, 0, $limit, 'UTF-8');
	    //return array($text, $more);
	    return $text;
	} else {
	    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $text, $ar);
	    if (func_num_args() >= 3) {
		if (count($ar[0]) > $limit) {
		    $more = TRUE;
		    $text = join("", array_slice($ar[0], 0, $limit));
		} else {
		    $more = FALSE;
		    $text = join("", array_slice($ar[0], 0, $limit));
		}
	    } else {
		$more = FALSE;
		$text = join("", array_slice($ar[0], 0));
	    }
	    return $text;
	}
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 512 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source http://gravatar.com/site/implement/images/php/
     */
    static public function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array()) {
	$url = 'http://www.gravatar.com/avatar/';
	$url .= md5(strtolower(trim($email)));
	$url .= "?s=$s&d=$d&r=$r";
	if ($img) {
	    $url = '<img src="' . $url . '"';
	    foreach ($atts as $key => $val)
		$url .= ' ' . $key . '="' . $val . '"';
	    $url .= ' />';
	}
	return $url;
    }

    //去掉多余的空标签
    static public function strip_empty_html($matches) {
	$arr_tags1 = explode(" ", $matches[1]);
	if ($arr_tags1[0] == $matches[2]) { //如果前后标签相同，则替换为空。
	    return "";
	} else {
	    $matches[0] = str_replace("<", "[html_&lt;]", $matches[0]);
	    $matches[0] = str_replace(">", "[html_&gt;]", $matches[0]);
	    return $matches[0];
	}
    }

    /**
     * 获得当前格林威治时间的时间戳
     *
     * @return  integer
     */
    static public function gmtime() {
	return (time() - date('Z'));
    }

    /**
     * 将XML对象转换成数组
     * @param type $xml
     * @return type
     */
    static public function xml_to_array($xml) {
	$res = array();
	foreach ($xml as $key => $value) {
	    if (count($value) >= 1) {
		isset($keys[$key]) ? ($keys[$key]+=1) : ($keys[$key] = 1);
		if ($keys[$key] == 1)
		    $res[$key] = to_array($value);
		elseif ($keys[$key] == 2)
		    $res[$key] = array($res[$key], to_array($value));
		else
		    $res[$key][] = to_array($value);
	    }else {
		$res[$key] = (string) $value;
	    }
	}
	return $res;
    }

    /**
     * usage:
     * F::sg('site', 'name');
     * Shortcut for Yii::app()->settings->get();
     * @param string $param 
     */
    static public function sg($category, $key) {
	return Yii::app()->settings->get($category, $key);
    }

    /**
     * Transforms the responseobject to an array
     * @param object $object
     * @return array An arrayrepresentation of the given object
     */
    static public function objectToArray($object) {
	$out = array();
	foreach ($object as $key => $value) {
	    switch (true) {
		case is_object($value):
		    $out[$key] = $this->objectToArray($value);
		    break;

		case is_array($value):
		    $out[$key] = $this->objectToArray($value);
		    break;

		default:
		    $out[$key] = $value;
		    break;
	    }
	}

	return $out;
    }

    static public function jquery() {
	Yii::app()->clientScript->registerCoreScript('jquery');
    }

    /**
     * Theme url
     */
    static public function themeUrl() {
	$uri = Yii::app()->theme->baseUrl;
	return $uri;
    }

    /**
     * Base url
     */
    static public function baseUrl() {
	$uri = Yii::app()->request->baseUrl;
	return $uri;
    }
    
    /**
     * Base Path
     */
    static public function basePath() {
        $uri = Yii::app()->basePath;
        return $uri;
    }

    /**
     * date i18n
     * @param type $date
     * @return type
     */
    static public function date($date, $dateWidth = 'medium', $timeWidth = 'medium') {
	$format = new CDateFormatter(Yii::app()->translate->getLanguage());
	return $format->formatDateTime($date, $dateWidth, $timeWidth);
    }

    /**
     * PHP判断字符串纯汉字 OR 纯英文 OR 汉英混合 
     * @param type $str
     * @return string
     */
    static public function utf8_str($str) {
	$mb = mb_strlen($str, 'utf-8');
	$st = strlen($str);
	if ($st == $mb)
	    return '1';  //纯英文
	if ($st % $mb == 0 && $st % 3 == 0)
	    return '2';  //纯汉字
	return '3';  //汉英混合
    }
	
	public static function convert_props_js_id($string){
		$json = CJSON::decode($string);
		$result = implode("_",$json);
		return $result;
	}
	
	public static function strip_prop_strto_csv($str){
		$string = str_replace(":","#cln#",$str);
		$string = str_replace(";","#scln#",$string);
		return $string;
	  }


	public static function strip_prop_csvto_string($str){
		$string = str_replace("#cln#",":",$str);
		$string = str_replace("#scln#",";",$string);
		return $string;
	}

}