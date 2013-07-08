<?php
/**
 *
 * Handle with the string
 *
 * @author davidhhuan
 */
class YcStringHelper
{
    /**
     * 将内容进行json encode
     * 
     * @param mixed $rs 
     * @static
     * @access public
     * @return string
     */
    public static function jsonEncode($rs)
    {
        //存在$_GET['callback']，代表是跨域请求
        if (!empty($_GET['callback']))
        {
            return $_GET['callback'] . '('.CJSON::encode($rs) . ')';
        }
        else
        {
            return CJSON::encode($rs);
        }
    }
    
    /**
     * generate and return random string
     * 
     * @param type $onlyAlphanumeric only number and word
     * @param type $length 
     */
    public function randString($onlyAlphanumeric = true, $length = 10)
    {
        $rs = '';
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if (!$onlyAlphanumeric)
        {
            $chars .= '!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
        }
        
        $charsLen = strlen($chars);
        for ($i = 0; $i < $length; $i++)
        {
            $rs .= $chars[mt_rand(1, $charsLen) - 1];
        }
        
        return $rs;
    }
    
    /**
     * cut the string with utf8 or gbk
     *
     * @author davidhhuan
     * @param string $string: the string you want to handle with
     * @param int $start
     * @param int $length: how long of the string you want
     * @param string $append: The end of the output string
     * @param bool $onlyCharacters only return the number of characters, but not the length of string
     * @return string
     */
    public static function substr($string, $start = 0, $length = 0, $append = '...', $onlyCharacters = false)
    {
    	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
    	
        $stringLast = "";
        if ($start < 0 || $length < 0 || self::strlen($string, $onlyCharacters) <= $length)
        {
            $stringLast = $string;
        }
        else
        {
            $i = 0;
            $j = 0;
            if ($onlyCharacters)
            {
                $count = &$j;
            }
            else
            {
                $count = &$i;
            }
            while ($count < $length)
            {
                $stringTMP = substr($string, $i, 1);
                if ( ord($stringTMP) >=224 )
                {
                    $stringTMP = substr($string, $i, 3);
                    $i = $i + 3;
                }
                elseif( ord($stringTMP) >=192 )
                {
                    $stringTMP = substr($string, $i, 2);
                    $i = $i + 2;
                }
                else
                {
                    $i = $i + 1;
                }
                $j++;
                $stringLast[] = $stringTMP;
            }
            $stringLast = implode("", $stringLast);
            
        }
        
        $stringLast = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $stringLast);

        if(!empty($append) && self::strlen($string, $onlyCharacters) > $length)
        {
            $stringLast .= $append;
        }
        
        return $stringLast;
    }


    /**
     *
     * strlen function
     *
     * @author davidhhuan
     * @param string $string
     * @param string $encoding It will be used in mb_strlen()
     * @param bool $onlyCharacters only return the number of characters, but not the length of string
     *
     */
    public static function strlen($string, $onlyCharacters = false)
    {
        $strlen = 0;
        $length = strlen($string);
        $characterLength = 0;
        while ($strlen < $length)
        {
            $stringTMP = substr($string, $strlen, 1);
            if ( ord($stringTMP) >=224 )
            {
                $strlen = $strlen + 3;
            }
            elseif( ord($stringTMP) >=192 )
            {
                $strlen = $strlen + 2;
            }
            else
            {
                $strlen = $strlen + 1;
            }
            $characterLength++;
        }

        return $onlyCharacters ? $characterLength : $strlen;
    }

    /**
     *
     * Limit the string of rows
     *
     * @author davidhhuan
     * @param string $string
     * @param int $rows: how many rows you want to limit the output
     * @return string
     */
    public static function limitRows($string, $rows = 100)
    {
        $lines = explode("\r\n", $string);

        if (count($lines) <= $rows)
        {
            return $string;
        }

        $rs = '';

        //echo count($rows);die();
        foreach($lines as $key=>$line)
        {
            if ($key>=$rows)
                break;

            $rs .= $line."\r\n";
        }

        return $rs;
    }
    
    
    /**
     *
     * convert the characters from full-width character to half-width character
     *
     * @author davidhhuan
     * @param string $string
     * @return string
     */
     public static function makeSemiangle($string)
     {
         $arr = array('０' => '0', '１' => '1', '２' => '2', '３' => '3', '４' => '4',
                 '５' => '5', '６' => '6', '７' => '7', '８' => '8', '９' => '9',
                 'Ａ' => 'A', 'Ｂ' => 'B', 'Ｃ' => 'C', 'Ｄ' => 'D', 'Ｅ' => 'E',
                 'Ｆ' => 'F', 'Ｇ' => 'G', 'Ｈ' => 'H', 'Ｉ' => 'I', 'Ｊ' => 'J',
                 'Ｋ' => 'K', 'Ｌ' => 'L', 'Ｍ' => 'M', 'Ｎ' => 'N', 'Ｏ' => 'O',
                 'Ｐ' => 'P', 'Ｑ' => 'Q', 'Ｒ' => 'R', 'Ｓ' => 'S', 'Ｔ' => 'T',
                 'Ｕ' => 'U', 'Ｖ' => 'V', 'Ｗ' => 'W', 'Ｘ' => 'X', 'Ｙ' => 'Y',
                 'Ｚ' => 'Z', 'ａ' => 'a', 'ｂ' => 'b', 'ｃ' => 'c', 'ｄ' => 'd',
                 'ｅ' => 'e', 'ｆ' => 'f', 'ｇ' => 'g', 'ｈ' => 'h', 'ｉ' => 'i',
                 'ｊ' => 'j', 'ｋ' => 'k', 'ｌ' => 'l', 'ｍ' => 'm', 'ｎ' => 'n',
                 'ｏ' => 'o', 'ｐ' => 'p', 'ｑ' => 'q', 'ｒ' => 'r', 'ｓ' => 's',
                 'ｔ' => 't', 'ｕ' => 'u', 'ｖ' => 'v', 'ｗ' => 'w', 'ｘ' => 'x',
                 'ｙ' => 'y', 'ｚ' => 'z',
                 '（' => '(', '）' => ')', '［' => '[', '］' => ']', '【' => '[',
                 '】' => ']', '〖' => '[', '〗' => ']', '「' => '[', '」' => ']',
                 '『' => '[', '』' => ']', '｛' => '{', '｝' => '}', '《' => '<',
                 '》' => '>',
                 '％' => '%', '＋' => '+', '—' => '-', '－' => '-', '～' => '-',
                 '：' => ':', '。' => '.', '、' => ',', '，' => '.', '、' => '.',
                 '；' => ',', '？' => '?', '！' => '!', '…' => '-', '‖' => '|',
                 '＂' => '"', '＇' => '`', '｀' => '`', '｜' => '|', '〃' => '"',
                 '　' => ' ');

        return strtr($string, $arr);
    }


    /**
     * Change the charset from unicode to utf8
     *
     * @author davidhhuan
     * @param string $str: The string you want to convert
     * @param int $order: Pad a string to a certain length with another string
     * @return string
     */
    public static function unicodeToUtf8($str,$order="little")
    {
        $utf8string ="";
        $n=strlen($str);
        for ($i=0;$i<$n ;$i++ )
        {
            if ($order=="little")
            {
                $val = str_pad(dechex(ord($str[$i+1])), 2, 0, STR_PAD_LEFT) .
                       str_pad(dechex(ord($str[$i])),      2, 0, STR_PAD_LEFT);
            }
            else
            {
                $val = str_pad(dechex(ord($str[$i])),      2, 0, STR_PAD_LEFT) .
                       str_pad(dechex(ord($str[$i+1])), 2, 0, STR_PAD_LEFT);
            }
            $val = intval($val,16);
            $i++;
            $c = "";
            if($val < 0x7F)
            { // 0000-007F
                $c .= chr($val);
            }
            elseif($val < 0x800)
            { // 0080-07F0
                $c .= chr(0xC0 | ($val / 64));
                $c .= chr(0x80 | ($val % 64));
            }
            else
            { // 0800-FFFF
                $c .= chr(0xE0 | (($val / 64) / 64));
                $c .= chr(0x80 | (($val / 64) % 64));
                $c .= chr(0x80 | ($val % 64));
            }
            $utf8string .= $c;
        }
        /* remove bom symbol */
        if (ord(substr($utf8string,0,1)) == 0xEF && ord(substr($utf8string,1,2)) == 0xBB && ord(substr($utf8string,2,1)) == 0xBF)
        {
            $utf8string = substr($utf8string,3);
        }
        return $utf8string;
    }

	/**
	 *
	 * @param type $string
	 * @param type $separator
	 * @param type $cleanPunctuation
	 * @param type $cleanSlash
	 * @return type 
	 */
	public static function cleanUrl($string, $separator = '-',$cleanPunctuation = TRUE, $cleanSlash = TRUE)
    {
        // Default words to ignore
        $ignoreWords = array(
            'a', 'an', 'as', 'at', 'before', 'but', 'by', 'for', 'from', 'is', 'in',
            'into', 'like', 'of', 'off', 'on', 'onto', 'per', 'since', 'than', 'the',
            'this', 'that', 'to', 'up', 'via', 'with',
        );

        $output = $string;
        if ($cleanPunctuation)
        {
            $punctuation = self::punctuationChars();
            foreach ($punctuation as $name => $details) 
            {
                // Slightly tricky inline if which either replaces with the separator or nothing
                $output = str_replace($details, $separator, $output);
            }
        }

        // If something is already urlsafe then don't remove slashes
        if ($cleanSlash) 
        {
            $output = str_replace('/', '', $output);
        }

        // Optionally remove accents and transliterate
        $translations = self::i18nToAscII();
        $output = strtr($output, $translations);

        // Reduce to the subset of ASCII96 letters and numbers
        //$pattern = '/[^a-zA-Z0-9\/]+/ ';
        //$output = preg_replace($pattern, $separator, $output);

        // Get rid of words that are on the ignore list
        $ignoreRe = '\b'. implode("|", preg_replace('/,/', '\b|\b', $ignoreWords)) .'\b';

        if (function_exists('mb_eregi_replace')) 
        {
            $output = mb_eregi_replace($ignoreRe, '', $output);
        }
        else 
        {
            $output = preg_replace("/$ignoreRe/i", '', $output);
        }

        // Always replace whitespace with the separator.
        $output = preg_replace('/\s+/', $separator, $output);

        // Trim duplicates and remove trailing and leading separators.
        $output = self::cleanSeparators($output, $separator);

        // Enforce the maximum component length
        //$maxlength = 128;
        //$output = substr($output, 0, $maxlength);

        return $output;
        
    }

     /**
     * Clean path separators from a given string.
     *
     * Trims duplicates and strips leading and trailing separators.
     *
     * @param $string
     *   The string to clean path separators from.
     * @param $separator
     *   The path separator to use when cleaning.
     * @return
     *   The cleaned version of the string.
     *
     * @see pathauto_cleanstring()
     * @see pathauto_clean_alias()
     */
    public static function cleanSeparators($string, $separator = NULL, $toLowCase = TRUE) 
    {
        $output = $string;

        // Clean duplicate or trailing separators.
        if (isset($separator) && strlen($separator)) 
        {
            // Escape the separator.
            $seppattern = preg_quote($separator, '/');

            // Trim any leading or trailing separators.
            $output = preg_replace("/^$seppattern+|$seppattern+$/", '', $output);

            // Replace trailing separators around slashes.
            $output = preg_replace("/$seppattern+\/|\/$seppattern+/", "/", $output);

            // Replace multiple separators with a single one.
            $output = preg_replace("/$seppattern+/", $separator, $output);
        }

        // Optionally convert to lower case.
        if ($toLowCase) 
        {
            $output = strtolower($output);
        }

        return $output;
    }   

    /**
     * Return an array of arrays for punctuation values.
     *
     * Returns an array of arrays for punctuation values keyed by a name, including
     * the value and a textual description.
     * Can and should be expanded to include "all" non text punctuation values.
     *
     * @return
     *   An array of arrays for punctuation values keyed by a name, including the
     *   value and a textual description.
     */
    public static function punctuationChars() 
    {
        // Handle " ' ` , . - _ : ; | { [ } ] + = * & % ^ $ # @ ! ~ ( ) ? < > \
        return array(
            "double_quotes"=>'"',
            "quotes"=>"'",
            "backtick"=>"`",
            "comma"=>",",
            "period"=>".",
            "hyphen"=>"-",
            "underscore"=>"_",
            "colon"=>":",
            "semicolon"=>";",
            "pipe"=>"|",
            "left_curly"=>"{",
            "left_square"=>"[",
            "right_curly"=>"}",
            "right_square"=>"]",
            "plus"=>"+",
            "equal"=>"=",
            "asterisk"=>"*",
            "ampersand"=>"&",
            "percent"=>"%",
            "caret"=>"^",
            "dollar"=>"$",
            "hash"=>"#",
            "at"=>"@",
            "exclamation"=>"!",
            "tilde"=>"~",
            "left_parenthesis"=>"(",
            "right_parenthesis"=>")",
            "question_mark"=>"?",
            "less_than"=>"<",
            "greater_than"=>">",
            "back_slash"=>'\\',
        );
    } 

    public static function i18nToAscII()
    {
        return array(
            "À" => "A",
            "Á" => "A",
            "Â" => "A",
            "Ã" => "A",
            "Ä" => "Ae",
            "Å" => "A",
            "Æ" => "A",
            "Ā" => "A",
            "Ą" => "A",
            "Ă" => "A",
            "Ç" => "C",
            "Ć" => "C",
            "Č" => "C",
            "Ĉ" => "C",
            "Ċ" => "C",
            "Ď" => "D",
            "Đ" => "D",
            "È" => "E",
            "É" => "E",
            "Ê" => "E",
            "Ë" => "E",
            "Ē" => "E",
            "Ę" => "E",
            "Ě" => "E",
            "Ĕ" => "E",
            "Ė" => "E",
            "Ĝ" => "G",
            "Ğ" => "G",
            "Ġ" => "G",
            "Ģ" => "G",
            "Ĥ" => "H",
            "Ħ" => "H",
            "Ì" => "I",
            "Í" => "I",
            "Î" => "I",
            "Ï" => "I",
            "Ī" => "I",
            "Ĩ" => "I",
            "Ĭ" => "I",
            "Į" => "I",
            "İ" => "I",
            "Ĳ" => "IJ",
            "Ĵ" => "J",
            "Ķ" => "K",
            "Ľ" => "K",
            "Ĺ" => "K",
            "Ļ" => "K",
            "Ŀ" => "K",
            "Ł" => "L",
            "Ñ" => "N",
            "Ń" => "N",
            "Ň" => "N",
            "Ņ" => "N",
            "Ŋ" => "N",
            "Ò" => "O",
            "Ó" => "O",
            "Ô" => "O",
            "Õ" => "O",
            "Ö" => "Oe",
            "Ø" => "O",
            "Ō" => "O",
            "Ő" => "O",
            "Ŏ" => "O",
            "Œ" => "OE",
            "Ŕ" => "R",
            "Ř" => "R",
            "Ŗ" => "R",
            "Ś" => "S",
            "Ş" => "S",
            "Ŝ" => "S",
            "Ș" => "S",
            "Š" => "S",
            "Ť" => "T",
            "Ţ" => "T",
            "Ŧ" => "T",
            "Ț" => "T",
            "Ù" => "U",
            "Ú" => "U",
            "Û" => "U",
            "Ü" => "Ue",
            "Ū" => "U",
            "Ů" => "U",
            "Ű" => "U",
            "Ŭ" => "U",
            "Ũ" => "U",
            "Ų" => "U",
            "Ŵ" => "W",
            "Ŷ" => "Y",
            "Ÿ" => "Y",
            "Ý" => "Y",
            "Ź" => "Z",
            "Ż" => "Z",
            "Ž" => "Z",
            "à" => "a",
            "á" => "a",
            "â" => "a",
            "ã" => "a",
            "ä" => "ae",
            "ā" => "a",
            "ą" => "a",
            "ă" => "a",
            "å" => "a",
            "æ" => "ae",
            "ç" => "c",
            "ć" => "c",
            "č" => "c",
            "ĉ" => "c",
            "ċ" => "c",
            "ď" => "d",
            "đ" => "d",
            "è" => "e",
            "é" => "e",
            "ê" => "e",
            "ë" => "e",
            "ē" => "e",
            "ę" => "e",
            "ě" => "e",
            "ĕ" => "e",
            "ė" => "e",
            "ƒ" => "f",
            "ĝ" => "g",
            "ğ" => "g",
            "ġ" => "g",
            "ģ" => "g",
            "ĥ" => "h",
            "ħ" => "h",
            "ì" => "i",
            "í" => "i",
            "î" => "i",
            "ï" => "i",
            "ī" => "i",
            "ĩ" => "i",
            "ĭ" => "i",
            "į" => "i",
            "ı" => "i",
            "ĳ" => "ij",
            "ĵ" => "j",
            "ķ" => "k",
            "ĸ" => "k",
            "ł" => "l",
            "ľ" => "l",
            "ĺ" => "l",
            "ļ" => "l",
            "ŀ" => "l",
            "ñ" => "n",
            "ń" => "n",
            "ň" => "n",
            "ņ" => "n",
            "ŉ" => "n",
            "ŋ" => "n",
            "ò" => "o",
            "ó" => "o",
            "ô" => "o",
            "õ" => "o",
            "ö" => "oe",
            "ø" => "o",
            "ō" => "o",
            "ő" => "o",
            "ŏ" => "o",
            "œ" => "oe",
            "ŕ" => "r",
            "ř" => "r",
            "ŗ" => "r",
            "ś" => "s",
            "š" => "s",
            "ş" => "s",
            "ť" => "t",
            "ţ" => "t",
            "ù" => "u",
            "ú" => "u",
            "û" => "u",
            "ü" => "ue",
            "ū" => "u",
            "ů" => "u",
            "ű" => "u",
            "ŭ" => "u",
            "ũ" => "u",
            "ų" => "u",
            "ŵ" => "w",
            "ÿ" => "y",
            "ý" => "y",
            "ŷ" => "y",
            "ż" => "z",
            "ź" => "z",
            "ž" => "z",
            "ß" => "ss",
            "ſ" => "ss",
            "Α" => "A",
            "Ά" => "A",
            "Ἀ" => "A",
            "Ἁ" => "A",
            "Ἂ" => "A",
            "Ἃ" => "A",
            "Ἄ" => "A",
            "Ἅ" => "A",
            "Ἆ" => "A",
            "Ἇ" => "A",
            "ᾈ" => "A",
            "ᾉ" => "A",
            "ᾊ" => "A",
            "ᾋ" => "A",
            "ᾌ" => "A",
            "ᾍ" => "A",
            "ᾎ" => "A",
            "ᾏ" => "A",
            "Ᾰ" => "A",
            "Ᾱ" => "A",
            "Ὰ" => "A",
            "Ά" => "A",
            "ᾼ" => "A",
            "Β" => "B",
            "Γ" => "G",
            "Δ" => "D",
            "Ε" => "E",
            "Έ" => "E",
            "Ἐ" => "E",
            "Ἑ" => "E",
            "Ἒ" => "E",
            "Ἓ" => "E",
            "Ἔ" => "E",
            "Ἕ" => "E",
            "Έ" => "E",
            "Ὲ" => "E",
            "Ζ" => "Z",
            "Η" => "I",
            "Ή" => "I",
            "Ἠ" => "I",
            "Ἡ" => "I",
            "Ἢ" => "I",
            "Ἣ" => "I",
            "Ἤ" => "I",
            "Ἥ" => "I",
            "Ἦ" => "I",
            "Ἧ" => "I",
            "ᾘ" => "I",
            "ᾙ" => "I",
            "ᾚ" => "I",
            "ᾛ" => "I",
            "ᾜ" => "I",
            "ᾝ" => "I",
            "ᾞ" => "I",
            "ᾟ" => "I",
            "Ὴ" => "I",
            "Ή" => "I",
            "ῌ" => "I",
            "Θ" => "TH",
            "Ι" => "I",
            "Ί" => "I",
            "Ϊ" => "I",
            "Ἰ" => "I",
            "Ἱ" => "I",
            "Ἲ" => "I",
            "Ἳ" => "I",
            "Ἴ" => "I",
            "Ἵ" => "I",
            "Ἶ" => "I",
            "Ἷ" => "I",
            "Ῐ" => "I",
            "Ῑ" => "I",
            "Ὶ" => "I",
            "Ί" => "I",
            "Κ" => "K",
            "Λ" => "L",
            "Μ" => "M",
            "Ν" => "N",
            "Ξ" => "KS",
            "Ο" => "O",
            "Ό" => "O",
            "Ὀ" => "O",
            "Ὁ" => "O",
            "Ὂ" => "O",
            "Ὃ" => "O",
            "Ὄ" => "O",
            "Ὅ" => "O",
            "Ὸ" => "O",
            "Ό" => "O",
            "Π" => "P",
            "Ρ" => "R",
            "Ῥ" => "R",
            "Σ" => "S",
            "Τ" => "T",
            "Υ" => "Y",
            "Ύ" => "Y",
            "Ϋ" => "Y",
            "Ὑ" => "Y",
            "Ὓ" => "Y",
            "Ὕ" => "Y",
            "Ὗ" => "Y",
            "Ῠ" => "Y",
            "Ῡ" => "Y",
            "Ὺ" => "Y",
            "Ύ" => "Y",
            "Φ" => "F",
            "Χ" => "X",
            "Ψ" => "PS",
            "Ω" => "O",
            "Ώ" => "O",
            "Ὠ" => "O",
            "Ὡ" => "O",
            "Ὢ" => "O",
            "Ὣ" => "O",
            "Ὤ" => "O",
            "Ὥ" => "O",
            "Ὦ" => "O",
            "Ὧ" => "O",
            "ᾨ" => "O",
            "ᾩ" => "O",
            "ᾪ" => "O",
            "ᾫ" => "O",
            "ᾬ" => "O",
            "ᾭ" => "O",
            "ᾮ" => "O",
            "ᾯ" => "O",
            "Ὼ" => "O",
            "Ώ" => "O",
            "ῼ" => "O",
            "α" => "a",
            "ά" => "a",
            "ἀ" => "a",
            "ἁ" => "a",
            "ἂ" => "a",
            "ἃ" => "a",
            "ἄ" => "a",
            "ἅ" => "a",
            "ἆ" => "a",
            "ἇ" => "a",
            "ᾀ" => "a",
            "ᾁ" => "a",
            "ᾂ" => "a",
            "ᾃ" => "a",
            "ᾄ" => "a",
            "ᾅ" => "a",
            "ᾆ" => "a",
            "ᾇ" => "a",
            "ὰ" => "a",
            "ά" => "a",
            "ᾰ" => "a",
            "ᾱ" => "a",
            "ᾲ" => "a",
            "ᾳ" => "a",
            "ᾴ" => "a",
            "ᾶ" => "a",
            "ᾷ" => "a",
            "β" => "b",
            "γ" => "g",
            "δ" => "d",
            "ε" => "e",
            "έ" => "e",
            "ἐ" => "e",
            "ἑ" => "e",
            "ἒ" => "e",
            "ἓ" => "e",
            "ἔ" => "e",
            "ἕ" => "e",
            "ὲ" => "e",
            "έ" => "e",
            "ζ" => "z",
            "η" => "i",
            "ή" => "i",
            "ἠ" => "i",
            "ἡ" => "i",
            "ἢ" => "i",
            "ἣ" => "i",
            "ἤ" => "i",
            "ἥ" => "i",
            "ἦ" => "i",
            "ἧ" => "i",
            "ᾐ" => "i",
            "ᾑ" => "i",
            "ᾒ" => "i",
            "ᾓ" => "i",
            "ᾔ" => "i",
            "ᾕ" => "i",
            "ᾖ" => "i",
            "ᾗ" => "i",
            "ὴ" => "i",
            "ή" => "i",
            "ῂ" => "i",
            "ῃ" => "i",
            "ῄ" => "i",
            "ῆ" => "i",
            "ῇ" => "i",
            "θ" => "th",
            "ι" => "i",
            "ί" => "i",
            "ϊ" => "i",
            "ΐ" => "i",
            "ἰ" => "i",
            "ἱ" => "i",
            "ἲ" => "i",
            "ἳ" => "i",
            "ἴ" => "i",
            "ἵ" => "i",
            "ἶ" => "i",
            "ἷ" => "i",
            "ὶ" => "i",
            "ί" => "i",
            "ῐ" => "i",
            "ῑ" => "i",
            "ῒ" => "i",
            "ΐ" => "i",
            "ῖ" => "i",
            "ῗ" => "i",
            "κ" => "k",
            "λ" => "l",
            "μ" => "m",
            "ν" => "n",
            "ξ" => "ks",
            "ο" => "o",
            "ό" => "o",
            "ὀ" => "o",
            "ὁ" => "o",
            "ὂ" => "o",
            "ὃ" => "o",
            "ὄ" => "o",
            "ὅ" => "o",
            "ὸ" => "o",
            "ό" => "o",
            "π" => "p",
            "ρ" => "r",
            "ῤ" => "r",
            "ῥ" => "r",
            "σ" => "s",
            "ς" => "s",
            "τ" => "t",
            "υ" => "y",
            "ύ" => "y",
            "ϋ" => "y",
            "ΰ" => "y",
            "ὐ" => "y",
            "ὑ" => "y",
            "ὒ" => "y",
            "ὓ" => "y",
            "ὔ" => "y",
            "ὕ" => "y",
            "ὖ" => "y",
            "ὗ" => "y",
            "ὺ" => "y",
            "ύ" => "y",
            "ῠ" => "y",
            "ῡ" => "y",
            "ῢ" => "y",
            "ΰ" => "y",
            "ῦ" => "y",
            "ῧ" => "y",
            "φ" => "f",
            "χ" => "x",
            "ψ" => "ps",
            "ω" => "o",
            "ώ" => "o",
            "ὠ" => "o",
            "ὡ" => "o",
            "ὢ" => "o",
            "ὣ" => "o",
            "ὤ" => "o",
            "ὥ" => "o",
            "ὦ" => "o",
            "ὧ" => "o",
            "ᾠ" => "o",
            "ᾡ" => "o",
            "ᾢ" => "o",
            "ᾣ" => "o",
            "ᾤ" => "o",
            "ᾥ" => "o",
            "ᾦ" => "o",
            "ᾧ" => "o",
            "ὼ" => "o",
            "ώ" => "o",
            "ῲ" => "o",
            "ῳ" => "o",
            "ῴ" => "o",
            "ῶ" => "o",
            "ῷ" => "o",
            "¨" => "",
            "΅" => "",
            "᾿" => "",
            "῾" => "",
            "῍" => "",
            "῝" => "",
            "῎" => "",
            "῞" => "",
            "῏" => "",
            "῟" => "",
            "῀" => "",
            "῁" => "",
            "΄" => "",
            "΅" => "",
            "`" => "",
            "῭" => "",
            "ͺ" => "",
            "᾽" => "",
            "А" => "A",
            "Б" => "B",
            "В" => "V",
            "Г" => "G",
            "Д" => "D",
            "Е" => "E",
            "Ё" => "E",
            "Ж" => "ZH",
            "З" => "Z",
            "И" => "I",
            "Й" => "I",
            "К" => "K",
            "Л" => "L",
            "М" => "M",
            "Н" => "N",
            "О" => "O",
            "П" => "P",
            "Р" => "R",
            "С" => "S",
            "Т" => "T",
            "У" => "U",
            "Ф" => "F",
            "Х" => "KH",
            "Ц" => "TS",
            "Ч" => "CH",
            "Ш" => "SH",
            "Щ" => "SHCH",
            "Ы" => "Y",
            "Э" => "E",
            "Ю" => "YU",
            "Я" => "YA",
            "а" => "A",
            "б" => "B",
            "в" => "V",
            "г" => "G",
            "д" => "D",
            "е" => "E",
            "ё" => "E",
            "ж" => "ZH",
            "з" => "Z",
            "и" => "I",
            "й" => "I",
            "к" => "K",
            "л" => "L",
            "м" => "M",
            "н" => "N",
            "о" => "O",
            "п" => "P",
            "р" => "R",
            "с" => "S",
            "т" => "T",
            "у" => "U",
            "ф" => "F",
            "х" => "KH",
            "ц" => "TS",
            "ч" => "CH",
            "ш" => "SH",
            "щ" => "SHCH",
            "ы" => "Y",
            "э" => "E",
            "ю" => "YU",
            "я" => "YA",
            "Ъ" => "",
            "ъ" => "",
            "Ь" => "",
            "ь" => "",
            "ð" => "d",
            "Ð" => "D",
            "þ" => "th",
            "Þ" => "TH" 
        );
    }
}
