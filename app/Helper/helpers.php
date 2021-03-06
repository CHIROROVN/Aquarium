<?php

    function formatDate($date = null, $comma = null){
        $dates = date_create($date);
        if($comma == null){
            return date_format($dates,"Y/m/d");
        }else{
            return date_format($dates,"Y".$comma."m".$comma."d");
        }
    }

    function formatYm($date = null, $comma = null){
        $ym     = str_split($date, 4);
        $y = $ym[0];
        $m = $ym[1];
        if($comma == null){
            return $y."/".$m;
        }else{
            return $y.$comma.$m;
        }
    }

    function permission($power){
        $arr = array('1'=>'Admin', '2'=>'Staff','3'=>'Guest');
        return @$arr[$power];
    }

    function status($status){
        if($status == 1){
            return "Active";
        }else{
            return "Iactive";
        }
    }

    function cContact(){
       $cContact = App\Http\Controllers\Backend\ContactController::countContact();
        return $cContact;
    }

    function getCountry($ipAdrs=null){
        if(!empty($ipAdrs)){
            $details = json_decode(file_get_contents("http://ipapi.co/{$ipAdrs}/json"));
            if(isset($details)){
                return $details;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    function getFullCountry($key=null){
        if(!empty($key)){
                $countries = array(
                        'AF'=>'AFGHANISTAN',
                        'AL'=>'ALBANIA',
                        'DZ'=>'ALGERIA',
                        'AS'=>'AMERICAN SAMOA',
                        'AD'=>'ANDORRA',
                        'AO'=>'ANGOLA',
                        'AI'=>'ANGUILLA',
                        'AQ'=>'ANTARCTICA',
                        'AG'=>'ANTIGUA AND BARBUDA',
                        'AR'=>'ARGENTINA',
                        'AM'=>'ARMENIA',
                        'AW'=>'ARUBA',
                        'AU'=>'AUSTRALIA',
                        'AT'=>'AUSTRIA',
                        'AZ'=>'AZERBAIJAN',
                        'BS'=>'BAHAMAS',
                        'BH'=>'BAHRAIN',
                        'BD'=>'BANGLADESH',
                        'BB'=>'BARBADOS',
                        'BY'=>'BELARUS',
                        'BE'=>'BELGIUM',
                        'BZ'=>'BELIZE',
                        'BJ'=>'BENIN',
                        'BM'=>'BERMUDA',
                        'BT'=>'BHUTAN',
                        'BO'=>'BOLIVIA',
                        'BA'=>'BOSNIA AND HERZEGOVINA',
                        'BW'=>'BOTSWANA',
                        'BV'=>'BOUVET ISLAND',
                        'BR'=>'BRAZIL',
                        'IO'=>'BRITISH INDIAN OCEAN TERRITORY',
                        'BN'=>'BRUNEI DARUSSALAM',
                        'BG'=>'BULGARIA',
                        'BF'=>'BURKINA FASO',
                        'BI'=>'BURUNDI',
                        'KH'=>'CAMBODIA',
                        'CM'=>'CAMEROON',
                        'CA'=>'CANADA',
                        'CV'=>'CAPE VERDE',
                        'KY'=>'CAYMAN ISLANDS',
                        'CF'=>'CENTRAL AFRICAN REPUBLIC',
                        'TD'=>'CHAD',
                        'CL'=>'CHILE',
                        'CN'=>'CHINA',
                        'CX'=>'CHRISTMAS ISLAND',
                        'CC'=>'COCOS (KEELING) ISLANDS',
                        'CO'=>'COLOMBIA',
                        'KM'=>'COMOROS',
                        'CG'=>'CONGO',
                        'CD'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
                        'CK'=>'COOK ISLANDS',
                        'CR'=>'COSTA RICA',
                        'CI'=>'COTE D IVOIRE',
                        'HR'=>'CROATIA',
                        'CU'=>'CUBA',
                        'CY'=>'CYPRUS',
                        'CZ'=>'CZECH REPUBLIC',
                        'DK'=>'DENMARK',
                        'DJ'=>'DJIBOUTI',
                        'DM'=>'DOMINICA',
                        'DO'=>'DOMINICAN REPUBLIC',
                        'TP'=>'EAST TIMOR',
                        'EC'=>'ECUADOR',
                        'EG'=>'EGYPT',
                        'SV'=>'EL SALVADOR',
                        'GQ'=>'EQUATORIAL GUINEA',
                        'ER'=>'ERITREA',
                        'EE'=>'ESTONIA',
                        'ET'=>'ETHIOPIA',
                        'FK'=>'FALKLAND ISLANDS (MALVINAS)',
                        'FO'=>'FAROE ISLANDS',
                        'FJ'=>'FIJI',
                        'FI'=>'FINLAND',
                        'FR'=>'FRANCE',
                        'GF'=>'FRENCH GUIANA',
                        'PF'=>'FRENCH POLYNESIA',
                        'TF'=>'FRENCH SOUTHERN TERRITORIES',
                        'GA'=>'GABON',
                        'GM'=>'GAMBIA',
                        'GE'=>'GEORGIA',
                        'DE'=>'GERMANY',
                        'GH'=>'GHANA',
                        'GI'=>'GIBRALTAR',
                        'GR'=>'GREECE',
                        'GL'=>'GREENLAND',
                        'GD'=>'GRENADA',
                        'GP'=>'GUADELOUPE',
                        'GU'=>'GUAM',
                        'GT'=>'GUATEMALA',
                        'GN'=>'GUINEA',
                        'GW'=>'GUINEA-BISSAU',
                        'GY'=>'GUYANA',
                        'HT'=>'HAITI',
                        'HM'=>'HEARD ISLAND AND MCDONALD ISLANDS',
                        'VA'=>'HOLY SEE (VATICAN CITY STATE)',
                        'HN'=>'HONDURAS',
                        'HK'=>'HONG KONG',
                        'HU'=>'HUNGARY',
                        'IS'=>'ICELAND',
                        'IN'=>'INDIA',
                        'ID'=>'INDONESIA',
                        'IR'=>'IRAN, ISLAMIC REPUBLIC OF',
                        'IQ'=>'IRAQ',
                        'IE'=>'IRELAND',
                        'IL'=>'ISRAEL',
                        'IT'=>'ITALY',
                        'JM'=>'JAMAICA',
                        'JP'=>'JAPAN',
                        'JO'=>'JORDAN',
                        'KZ'=>'KAZAKSTAN',
                        'KE'=>'KENYA',
                        'KI'=>'KIRIBATI',
                        'KP'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
                        'KR'=>'KOREA REPUBLIC OF',
                        'KW'=>'KUWAIT',
                        'KG'=>'KYRGYZSTAN',
                        'LA'=>'LAO PEOPLES DEMOCRATIC REPUBLIC',
                        'LV'=>'LATVIA',
                        'LB'=>'LEBANON',
                        'LS'=>'LESOTHO',
                        'LR'=>'LIBERIA',
                        'LY'=>'LIBYAN ARAB JAMAHIRIYA',
                        'LI'=>'LIECHTENSTEIN',
                        'LT'=>'LITHUANIA',
                        'LU'=>'LUXEMBOURG',
                        'MO'=>'MACAU',
                        'MK'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
                        'MG'=>'MADAGASCAR',
                        'MW'=>'MALAWI',
                        'MY'=>'MALAYSIA',
                        'MV'=>'MALDIVES',
                        'ML'=>'MALI',
                        'MT'=>'MALTA',
                        'MH'=>'MARSHALL ISLANDS',
                        'MQ'=>'MARTINIQUE',
                        'MR'=>'MAURITANIA',
                        'MU'=>'MAURITIUS',
                        'YT'=>'MAYOTTE',
                        'MX'=>'MEXICO',
                        'FM'=>'MICRONESIA, FEDERATED STATES OF',
                        'MD'=>'MOLDOVA, REPUBLIC OF',
                        'MC'=>'MONACO',
                        'MN'=>'MONGOLIA',
                        'MS'=>'MONTSERRAT',
                        'MA'=>'MOROCCO',
                        'MZ'=>'MOZAMBIQUE',
                        'MM'=>'MYANMAR',
                        'NA'=>'NAMIBIA',
                        'NR'=>'NAURU',
                        'NP'=>'NEPAL',
                        'NL'=>'NETHERLANDS',
                        'AN'=>'NETHERLANDS ANTILLES',
                        'NC'=>'NEW CALEDONIA',
                        'NZ'=>'NEW ZEALAND',
                        'NI'=>'NICARAGUA',
                        'NE'=>'NIGER',
                        'NG'=>'NIGERIA',
                        'NU'=>'NIUE',
                        'NF'=>'NORFOLK ISLAND',
                        'MP'=>'NORTHERN MARIANA ISLANDS',
                        'NO'=>'NORWAY',
                        'OM'=>'OMAN',
                        'PK'=>'PAKISTAN',
                        'PW'=>'PALAU',
                        'PS'=>'PALESTINIAN TERRITORY, OCCUPIED',
                        'PA'=>'PANAMA',
                        'PG'=>'PAPUA NEW GUINEA',
                        'PY'=>'PARAGUAY',
                        'PE'=>'PERU',
                        'PH'=>'PHILIPPINES',
                        'PN'=>'PITCAIRN',
                        'PL'=>'POLAND',
                        'PT'=>'PORTUGAL',
                        'PR'=>'PUERTO RICO',
                        'QA'=>'QATAR',
                        'RE'=>'REUNION',
                        'RO'=>'ROMANIA',
                        'RU'=>'RUSSIAN FEDERATION',
                        'RW'=>'RWANDA',
                        'SH'=>'SAINT HELENA',
                        'KN'=>'SAINT KITTS AND NEVIS',
                        'LC'=>'SAINT LUCIA',
                        'PM'=>'SAINT PIERRE AND MIQUELON',
                        'VC'=>'SAINT VINCENT AND THE GRENADINES',
                        'WS'=>'SAMOA',
                        'SM'=>'SAN MARINO',
                        'ST'=>'SAO TOME AND PRINCIPE',
                        'SA'=>'SAUDI ARABIA',
                        'SN'=>'SENEGAL',
                        'SC'=>'SEYCHELLES',
                        'SL'=>'SIERRA LEONE',
                        'SG'=>'SINGAPORE',
                        'SK'=>'SLOVAKIA',
                        'SI'=>'SLOVENIA',
                        'SB'=>'SOLOMON ISLANDS',
                        'SO'=>'SOMALIA',
                        'ZA'=>'SOUTH AFRICA',
                        'GS'=>'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
                        'ES'=>'SPAIN',
                        'LK'=>'SRI LANKA',
                        'SD'=>'SUDAN',
                        'SR'=>'SURINAME',
                        'SJ'=>'SVALBARD AND JAN MAYEN',
                        'SZ'=>'SWAZILAND',
                        'SE'=>'SWEDEN',
                        'CH'=>'SWITZERLAND',
                        'SY'=>'SYRIAN ARAB REPUBLIC',
                        'TW'=>'TAIWAN, PROVINCE OF CHINA',
                        'TJ'=>'TAJIKISTAN',
                        'TZ'=>'TANZANIA, UNITED REPUBLIC OF',
                        'TH'=>'THAILAND',
                        'TG'=>'TOGO',
                        'TK'=>'TOKELAU',
                        'TO'=>'TONGA',
                        'TT'=>'TRINIDAD AND TOBAGO',
                        'TN'=>'TUNISIA',
                        'TR'=>'TURKEY',
                        'TM'=>'TURKMENISTAN',
                        'TC'=>'TURKS AND CAICOS ISLANDS',
                        'TV'=>'TUVALU',
                        'UG'=>'UGANDA',
                        'UA'=>'UKRAINE',
                        'AE'=>'UNITED ARAB EMIRATES',
                        'GB'=>'UNITED KINGDOM',
                        'US'=>'UNITED STATES',
                        'UM'=>'UNITED STATES MINOR OUTLYING ISLANDS',
                        'UY'=>'URUGUAY',
                        'UZ'=>'UZBEKISTAN',
                        'VU'=>'VANUATU',
                        'VE'=>'VENEZUELA',
                        'VN'=>'VIET NAM',
                        'VG'=>'VIRGIN ISLANDS, BRITISH',
                        'VI'=>'VIRGIN ISLANDS, U.S.',
                        'WF'=>'WALLIS AND FUTUNA',
                        'EH'=>'WESTERN SAHARA',
                        'YE'=>'YEMEN',
                        'YU'=>'YUGOSLAVIA',
                        'ZM'=>'ZAMBIA',
                        'ZW'=>'ZIMBABWE',
                      );
                return $countries[$key];
            }else{
                return '';
            }
    }

    function showCity($str=null){
        if(!empty($str)){
           return trim(str_replace('City','',$str));
        }else {
            return '';
        }
    }

    function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}

function gen_string($string,$max=20)
{
    $tok=strtok($string,' ');
    $string='';
    while($tok!==false && mb_strlen($string)<$max)
    {
        if (mb_strlen($string)+mb_strlen($tok)<=$max)
            $string.=$tok.' ';
        else
            break;
        $tok=strtok(' ');
    }
    return trim($string).' ...';
}

function neatest_trim($content, $chars) {
  if (strlen($content) > $chars) 
  {
    $content = str_replace('&nbsp;', ' ', $content);
    $content = str_replace("\n", '', $content);
    // use with wordpress    
    //$content = strip_tags(strip_shortcodes(trim($content)));
    $content = strip_tags(trim($content));
    $content = preg_replace('/\s+?(\S+)?$/', '', mb_substr($content, 0, $chars));

    $content = trim($content) . '...';
    return $content;
  }else {
      return $content;
  }

}

