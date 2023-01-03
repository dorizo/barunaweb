<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


const IMAGE_HANDLERS = [
    IMAGETYPE_JPEG => [
        'load' => 'imagecreatefromjpeg',
        'save' => 'imagejpeg',
        'quality' => 100
    ],
    IMAGETYPE_PNG => [
        'load' => 'imagecreatefrompng',
        'save' => 'imagepng',
        'quality' => 0
    ],
    IMAGETYPE_GIF => [
        'load' => 'imagecreatefromgif',
        'save' => 'imagegif'
    ]
];

function secho($str)
{
    echo htmlspecialchars($str);
}

function post($key = '', $clean = false)
{
    if ($key) {
        $CI = &get_instance();
        return $CI->input->post($key);
    } else {
        return $_POST;
    }
}

function get($key = '', $clean = false)
{
    if ($key) {
        $CI = &get_instance();
        return $CI->input->get($key);
    } else {
        return $_GET;
    }
}

function is_post_request()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return true;
    } else {
        return false;
    }
}

function uri($segment, $default = 0)
{
    $CI = &get_instance();
    return $CI->uri->segment($segment, $default);
}

function model($model = '', $alias = '')
{
    $CI = &get_instance();

    if ($alias) {
        $CI->load->model($model, $alias);
        return $CI->$alias;
    } else {
        $CI->load->model($model);
        $modelName = explode('/', $model);
        $modelName = $modelName[count($modelName) - 1];
        return $CI->$modelName;
    }
}

function library($lib = '')
{
    $libName = explode('/', $lib);

    $CI = &get_instance();
    $CI->load->library($lib);

    $libName = $libName[count($libName) - 1];
    return $CI->{$libName};
}

function get_theme($view = null)
{
    $rm = model('Rak_model');
    $theme = $rm->get_theme(true);
    if ($theme->num_rows() > 0) {
        if ($view) {
            return $theme->row()->path . '/' . $view;
        }

        return $theme->row()->path . '/';
    }
    if ($view) {
        return 'material/' . $view;
    }

    return 'material/';
}

function std_number_format($str, $decimal = 0)
{
    return number_format($str, $decimal, ',', '.');
}

function kekata($x)
{
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x < 12) {
        $temp = " " . $angka[$x];
    } else if ($x < 20) {
        $temp = kekata($x - 10) . " belas";
    } else if ($x < 100) {
        $temp = kekata($x / 10) . " puluh" . kekata($x % 10);
    } else if ($x < 200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x < 1000) {
        $temp = kekata($x / 100) . " ratus" . kekata($x % 100);
    } else if ($x < 2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x < 1000000) {
        $temp = kekata($x / 1000) . " ribu" . kekata($x % 1000);
    } else if ($x < 1000000000) {
        $temp = kekata($x / 1000000) . " juta" . kekata($x % 1000000);
    } else if ($x < 1000000000000) {
        $temp = kekata($x / 1000000000) . " milyar" . kekata(fmod($x, 1000000000));
    } else if ($x < 1000000000000000) {
        $temp = kekata($x / 1000000000000) . " trilyun" . kekata(fmod($x, 1000000000000));
    }
    return $temp;
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function session($key)
{
    $CI = &get_instance();
    return $CI->session->userdata($key);
}

function setsession($data)
{
    $CI = &get_instance();
    return $CI->session->set_userdata($data);
}

function setflashdata($label, $msg)
{
    $CI = &get_instance();
    $CI->session->set_flashdata($label, $msg);
}

function flashdata($key)
{
    $CI = &get_instance();
    return $CI->session->flashdata($key);
}

function getBilangan($x, $style = 4)
{
    if ($x < 0) {
        $hasil = "minus " . trim(kekata($x));
    } else {
        $hasil = trim(kekata($x)) . " rupiah";
    }

    return $hasil;
}

function inject_post($data)
{
    foreach ($data as $key => $val) {
        $_POST[$key] = $val;
    }
}

function set_selected($field, $val)
{
    if ($field == $val) {
        return ' selected="selected"';
    }

}

function now()
{
    return date('Y-m-d H:i:s');
}

function getBulan($tgl, $id = true)
{
    $t = explode('-', $tgl);
    $b['01'] = 'Januari';
    $b['02'] = 'Februari';
    $b['03'] = 'Maret';
    $b['04'] = 'April';
    $b['05'] = 'Mei';
    $b['06'] = 'Juni';
    $b['07'] = 'Juli';
    $b['08'] = 'Agustus';
    $b['09'] = 'Septermber';
    $b['10'] = 'Oktober';
    $b['11'] = 'November';
    $b['12'] = 'Desember';

    $be['01'] = 'January';
    $be['02'] = 'February';
    $be['03'] = 'March';
    $be['04'] = 'April';
    $be['05'] = 'May';
    $be['06'] = 'Juni';
    $be['07'] = 'July';
    $be['08'] = 'August';
    $be['09'] = 'Septermber';
    $be['10'] = 'October';
    $be['11'] = 'November';
    $be['12'] = 'December';

    if ($id) {
        return $t[2] . ' ' . $b[$t[1]] . ' ' . $t[0];
    }

    return $t[2] . ' ' . $be[$t[1]] . ' ' . $t[0];
}

function getDay($tgl, $id = true)
{
    $ret['Monday'] = 'Senin';
    $ret['Tuesday'] = 'Selasa';
    $ret['Wednesday'] = 'Rabu';
    $ret['Thursday'] = 'Kamis';
    $ret['Friday'] = 'Jumat';
    $ret['Saturday'] = 'Sabtu';
    $ret['Sunday'] = 'Minggu';
    $day = date('l', strtotime($tgl));

    if ($id) {
        return $ret[$day];
    }

    return $day;
}

function day($date, $stime = false)
{
    $m['01'] = 'Jan';
    $m['02'] = 'Feb';
    $m['03'] = 'Mar`';
    $m['04'] = 'Apr';
    $m['05'] = 'May';
    $m['06'] = 'Jun';
    $m['07'] = 'Jul';
    $m['08'] = 'Aug';
    $m['09'] = 'Sep';
    $m['10'] = 'Oct';
    $m['11'] = 'Nov';
    $m['12'] = 'Dec';

    $date = explode(" ", $date);
    $time = $date[1];
    $date = explode("-", $date[0]);

    if ($stime) {
        return $m[$date['1']] . ' ' . $date['2'] . ' ' . $date['0'] . ', ' . $time . ' WIB';
    }

    return $m[$date['1']] . '-' . $date['2'] . '-' . $date['0'];
}

function encrypt($TEXT)
{
    if (!$TEXT && $TEXT != "0") {
        return false;
    }

    $CRYPT_KEY = "NenekMoyangKuOr4ngP3lauT";
    $KeyVal = KeyValue($CRYPT_KEY);
    $Estr = "";

    for ($i = 0; $i < strlen($TEXT); $i++) {
        $Chr = ord(substr($TEXT, $i, 1));
        $Chr = $Chr + $KeyVal[1];
        $Chr = $Chr * $KeyVal[2];
        (double) microtime() * 1000000;
        $Rstr = chr(rand(97, 122));
        $Estr .= "$Rstr$Chr";
    }

    return $Estr;
}

function decrypt($TEXT)
{
    if (!$TEXT && $TEXT != "0") {
        return false;
    }

    $CRYPT_KEY = "NenekMoyangKuOr4ngP3lauT";
    $KeyVal = KeyValue($CRYPT_KEY);
    $Estr = "";
    $Tmp = "";

    for ($i = 0; $i < strlen($TEXT); $i++) {
        if (ord(substr($TEXT, $i, 1)) > 96 && ord(substr($TEXT, $i, 1)) < 123) {
            if ($Tmp != "") {
                $Tmp = $Tmp / $KeyVal[2];
                $Tmp = $Tmp - $KeyVal[1];
                $Estr .= chr($Tmp);
                $Tmp = "";
            }
        } else {
            $Tmp .= substr($TEXT, $i, 1);
        }
    }

    $Tmp = $Tmp / $KeyVal[2];
    $Tmp = $Tmp - $KeyVal[1];
    $Estr .= chr($Tmp);

    return $Estr;
}

function slug($string)
{
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return strtolower($slug);
}

//For encryption-decrypt
function KeyValue($CRYPT_KEY)
{
    $KeyVal = "";
    $KeyVal[1] = "0";
    $KeyVal[2] = "0";
    for ($i = 1; $i < strlen($CRYPT_KEY); $i++) {
        $CurChr = ord(substr($CRYPT_KEY, $i, 1));
        $KeyVal[1] = $KeyVal[1] + $CurChr;
        $KeyVal[2] = strlen($CRYPT_KEY);
    }
    return $KeyVal;
}

function pictureName($origin)
{
    $ext = end((explode(".", $origin))); # extra () to prevent notice
    return 'n_' . date('YmdHis') . '_' . uniqid() . '.' . $ext;
}

function createThumbnail($src, $dest, $targetWidth, $targetHeight = null)
{

    // 1. Load the image from the given $src
    // - see if the file actually exists
    // - check if it's of a valid image type
    // - load the image resource

    // get the type of the image
    // we need the type to determine the correct loader
    $type = exif_imagetype($src);

    // if no valid type or no handler found -> exit
    if (!$type || !IMAGE_HANDLERS[$type]) {
        return null;
    }

    // load the image with the correct loader
    $image = call_user_func(IMAGE_HANDLERS[$type]['load'], $src);

    // no image found at supplied location -> exit
    if (!$image) {
        return null;
    }

    // 2. Create a thumbnail and resize the loaded $image
    // - get the image dimensions
    // - define the output size appropriately
    // - create a thumbnail based on that size
    // - set alpha transparency for GIFs and PNGs
    // - draw the final thumbnail

    // get original image width and height
    $width = imagesx($image);
    $height = imagesy($image);

    // maintain aspect ratio when no height set
    if ($targetHeight == null) {

        // get width to height ratio
        $ratio = $width / $height;

        // if is portrait
        // use ratio to scale height to fit in square
        if ($width > $height) {
            $targetHeight = floor($targetWidth / $ratio);
        }
        // if is landscape
        // use ratio to scale width to fit in square
        else {
            $targetHeight = $targetWidth;
            $targetWidth = floor($targetWidth * $ratio);
        }
    }

    // create duplicate image based on calculated target size
    $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);

    // set transparency options for GIFs and PNGs
    if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_PNG) {

        // make image transparent
        imagecolortransparent(
            $thumbnail,
            imagecolorallocate($thumbnail, 0, 0, 0)
        );

        // additional settings for PNGs
        if ($type == IMAGETYPE_PNG) {
            imagealphablending($thumbnail, false);
            imagesavealpha($thumbnail, true);
        }
    }

    // copy entire source image to duplicate image and resize
    imagecopyresampled(
        $thumbnail,
        $image,
        0, 0, 0, 0,
        $targetWidth, $targetHeight,
        $width, $height
    );

    // 3. Save the $thumbnail to disk
    // - call the correct save method
    // - set the correct quality level

    // save the duplicate version of the image to disk
    return call_user_func(
        IMAGE_HANDLERS[$type]['save'],
        $thumbnail,
        $dest,
        IMAGE_HANDLERS[$type]['quality']
    );
}
