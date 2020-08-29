<?php


    /**
     * Convert english to bangla
     */
     if (! function_exists('convert_to_bangla')) {
     	
	    function convert_to_bangla($engString) {
	        $engNumber = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	        $bangNumber = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
	        return str_replace($engNumber, $bangNumber, $engString);
	    }
    }

    /**
     * Convert to English
     */
      if (! function_exists('convert_to_english')) {
        function convert_to_english($bnString) {
            $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
            $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '0');
            $converted = str_replace($bangNumber, $engNumber, $bnString);

            return $converted;
        }
    }

    /**
     * Convert any valid date format to any valid date format
     */
    if (! function_exists('custom_date_format')) {
        function custom_date_format($date = "0000-00-00", $format = 'Y-m-d') {
            if ($date) {
                $date = date($format,strtotime($date));
            }
            return $date;
        }
    }

    if (! function_exists('custom_time_format')) {
        function custom_time_format($time = '00:00:00', $format = 'H:i:s') {
            if ($time) {
                $time = date($format,strtotime($time));
            }
            return $time;
        }
    }

    /**
     * Long string showing as a limit with tooltip
     *
     * @param $str
     * @param int $len
     * @return mixed|string
     */
    function limitString($str, $len = 100) {
        if(strlen($str) < $len) {
            return $str;
        }

        $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));
        if(strlen($str) <= $len) {
            return $str;
        }

        $out = '';
        foreach(explode(' ', trim($str)) as $val) {
            $out .= $val . ' ';
            if(strlen($out) >= $len) {
                $out = trim($out);
                return (strlen($out) == strlen($str)) ? $out : $out . " <a class='tooltip-icon' href='javascript:void(0)' title='".$str."'><i class='glyphicon glyphicon-info-sign'></i></a>";
            }
        }
    }
