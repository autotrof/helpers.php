<?php

if (! function_exists('number_to_day')) {
    function number_to_day($nomor_hari)
    {
        switch($nomor_hari){
            case 1:
                return "Senin";
            break;
            case 2:
                return "Selasa";
            break;
            case 3:
                return "Rabu";
            break;
            case 4:
                return "Kamis";
            break;
            case 5:
                return "Jumat";
            break;
            case 6:
                return "Sabtu";
            break;
            case 0:
                return "Minggu";
            break;
        }
    }
}

if (! function_exists('number_to_month')) {
    function number_to_month($nomoer_bulan)
    {
        switch($nomoer_bulan){
            case 1:
                return "Januari";
            break;
            case 2:
                return "Februari";
            break;
            case 3:
                return "Maret";
            break;
            case 4:
                return "April";
            break;
            case 5:
                return "Mei";
            break;
            case 6:
                return "Juni";
            break;
            case 7:
                return "Juli";
            break;
            case 8:
                return "Agustus";
            break;
            case 9:
                return "September";
            break;
            case 10:
                return "Oktober";
            break;
            case 11:
                return "November";
            break;
            case 12:
                return "Desember";
            break;
        }
    }
}

if (! function_exists('jt')) {
    function jt(){
        return response()->json(true);
    }
}

if (! function_exists('jf')) {
    function jf($pesan=false,$status=200){
        return response()->json($pesan,$status);
    }
}

if (! function_exists('create_date_range')) {
    function create_date_range($startDate, $endDate, $format = "Y-m-d")
    {
        $begin = new DateTime($startDate);
        $endDate = \Carbon\Carbon::parse($endDate)->addDay();
        $end = new DateTime($endDate);
        $interval = new DateInterval('P1D'); // 1 Day
        $dateRange = new DatePeriod($begin, $interval, $end);
        $range = [];
        foreach ($dateRange as $date) {
            $range[] = $date->format($format);
        }
        return $range;
    }
}

if (! function_exists('all_date_in_month')) {
    function all_date_in_month($month,$year)
    {
        for($i = 1; $i <=  date('t',strtotime($year.'-'.$month.'-01')); $i++)
        {
           // add the date to the dates array
           $dates[] = $year . "-" . date('m',strtotime($year.'-'.$month.'-01')) . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
        }
        return $dates;
    }
}

if (! function_exists('gen_uuid')) {
    function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}

if (! function_exists('db')) {
    function db($table,$connection=null)
    {
        if(is_null($connection)) $connection = env('DB_CONNECTION');
        return DB::connection($connection)->table($table);
    }
}

// FROM PHP SITE
if (! function_exists('after')) {
    function after ($this, $inthat)
    {
        if (!is_bool(strpos($inthat, $this)))
        return substr($inthat, strpos($inthat,$this)+strlen($this));
    };
}
if (! function_exists('after_last')) {
    function after_last ($this, $inthat)
    {
        if (!is_bool(strrevpos($inthat, $this)))
        return substr($inthat, strrevpos($inthat, $this)+strlen($this));
    };
}
if (! function_exists('before')) {
    function before ($this, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $this));
    };
}
if (! function_exists('before_last')) {
    function before_last ($this, $inthat)
    {
        return substr($inthat, 0, strrevpos($inthat, $this));
    };
}
if (! function_exists('between')) {
    function between ($this, $that, $inthat)
    {
        return before ($that, after($this, $inthat));
    };
}
if (! function_exists('between_last')) {
    function between_last ($this, $that, $inthat)
    {
     return after_last($this, before_last($that, $inthat));
    };
}
if (! function_exists('strrevpos')) {
    // use strrevpos function in case your php version does not include it
    function strrevpos($instr, $needle)
    {
        $rev_pos = strpos (strrev($instr), strrev($needle));
        if ($rev_pos===false) return false;
        else return strlen($instr) - $rev_pos - strlen($needle);
    };
}



// if (! function_exists('base64_to_jpeg')) {
//     function base64_to_jpeg($base64_string, $output_file) {
//         // open the output file for writing
//         $ifp = fopen( $output_file, 'wb' ); 

//         // split the string on commas
//         // $data[ 0 ] == "data:image/png;base64"
//         // $data[ 1 ] == <actual base64 string>
//         $data = explode( ',', $base64_string );

//         // we could add validation here with ensuring count( $data ) > 1
//         fwrite( $ifp, base64_decode( $data[ 1 ] ) );

//         // clean up the file resource
//         fclose( $ifp ); 

//         return $output_file; 
//     }
// }
