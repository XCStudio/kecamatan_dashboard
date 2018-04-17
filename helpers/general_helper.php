<?php
/* -----------------------------------------------------
 | Function Helpers.
 | -----------------------------------------------------
 |
 | Create basic function to easier developing
 | Yoga <thetaramolor@gmail.com>
 */

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Support\Carbon;

/**
 * { function_description }
 *
 * @param      <type>  $parent_id  The parent identifier
 *
 * @return     <type>  ( description_of_the_return_value )
 */
function define_child($parent_id)
{
    $child = Menu::Where('parent_id', $parent_id)->where('is_active', TRUE)->get();

    return $child;
}

/**
 * { function_description }
 *
 * @param      <type>  $id          The identifier
 * @param      <type>  $permission  The permission
 *
 * @return     <type>  ( description_of_the_return_value )
 */
function permission_val($id, $permission)
{
    $role = Role::find($id);
    $format = json_decode(json_encode($role), true);

    $result = (isset($format['permissions'][$permission]) && $format['permissions'][$permission] != '' ? 1 : 0);
    return $result;
}

/**
 * Uploads an image.
 *
 * @param      <type>  $image  The image
 * @param      string $file The file
 *
 * @return     string  ( description_of_the_return_value )
 */
function upload_image($image, $file)
{
    $extension = $image->getClientOriginalExtension();
    $path = public_path('uploads/' . $file . '/');
    if (!file_exists($path)) {
        File::makeDirectory($path, 0777, true);
    }

    $name = time() . uniqid();
    $img = Image::make($image->getRealPath());
    $img->save($path . $name . '.' . $extension);

    return $name . '.' . $extension;
}

/**
 * Generate Password
 *
 * @param      integer $length Length Character
 *
 * @return     string   voucher
 */
function generate_password($length = 6)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $number = '0123456789';
    $charactersLength = strlen($characters);
    $numberLength = strlen($number);
    $randomString = '';
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $number[rand(0, $numberLength - 1)];
    }
    $randomString = str_shuffle($randomString);
    return $randomString;
}

/**
 * Respon Meta
 *
 * @param      <type>  $message  The message
 */
function respon_meta($code, $message)
{
    $meta = array(
        'code' => $code,
        'message' => $message
    );

    return $meta;
}

function convert_xml_to_array($filename)
{
    try {
        $xml = file_get_contents($filename);

        $convert = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);

        $json = json_encode($convert);

        $array = json_decode($json, TRUE);
        return $array;
    } catch (\Exception $e) {
        \Log::info([
            "ERROR MESSAGE" => $e->getMessage(),
            "LINE" => $e->getLine(),
            "FILE" => $e->getFile()
        ]);
        return false;
        // throw new \UnexpectedValueException(trans('message.news.import-error'), 1);
    }

}


function convert_born_date_to_age($date)
{
    $from = new DateTime($date);
    $to   = new DateTime('today');
    return $from->diff($to)->y;
}

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function years_list()
{
    // Create Year List for 4 years ago
    $this_year = date('Y');
    $year_list = [];

    for($i = 1; $i<=4; $i++){
        $year_list[] = (int) $this_year --;
    }

    return $year_list;
}

function get_words($sentence, $count = 10) {
    preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
    return $matches[0];
}

function diff_for_humans($date)
{
    Carbon::setLocale('id');
    return  Carbon::parse($date)->diffForHumans();
}