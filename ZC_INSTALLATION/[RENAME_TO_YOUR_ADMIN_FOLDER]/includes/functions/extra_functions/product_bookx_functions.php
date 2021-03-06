<?php

/**
 * This file is part of the ZenCart add-on Book X which
 * introduces a new product type for books to the Zen Cart
 * shop system. Tested for compatibility on ZC v. 1.5
 *
 * For latest version and support visit:
 * https://sourceforge.net/p/zencartbookx
 *
 * @package admin
 * @author  Philou
 * @copyright Copyright 2013
 * @copyright Portions Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.gnu.org/licenses/gpl.txt GNU General Public License V2.0
 *
 * @version BookX V 0.9.4-revision8 BETA
 * @version $Id: [admin]/includes/functions/extra_functions/product_type_bookx_functions.php 2016-02-02 philou $
 */
function bookx_get_products_subtitle($products_id, $language_id)
{
  global $db;
  $product = $db->Execute("SELECT products_subtitle
                           FROM " . TABLE_PRODUCT_BOOKX_EXTRA_DESCRIPTION . "
                           WHERE products_id = " . (int)$products_id . "
                           AND languages_id = " . (int)$language_id);
  if (!$product->EOF) {
    return ($product->fields['products_subtitle'] ? $product->fields['products_subtitle'] : '');
  } else {
    return null;
  }
}

function bookx_get_isbn($products_id)
{
  global $db;
  $product = $db->Execute("SELECT isbn
                           FROM " . TABLE_PRODUCT_BOOKX_EXTRA . "
                           WHERE products_id = " . (int)$products_id);
  if (!$product->EOF) {
    return ($product->fields['isbn']) ?? '';
  }
}

function bookx_get_family_name($products_id)
{
  global $db;
  $product = $db->Execute("SELECT bookx_family_name
                           FROM " . TABLE_PRODUCT_BOOKX_FAMILIES . " bf LEFT JOIN
                                " . TABLE_PRODUCT_BOOKX_FAMILIES_TO_PRODUCTS . " bftp ON bf.bookx_family_id = bftp.bookx_family_id
                           WHERE bftp.products_id = " . (int)$products_id);
  if (!$product->EOF) {
    return ($product->fields['bookx_family_name']) ?? '';
  }
}

// Return the Authors URL
function bookx_get_author_url($bookx_author_id)
{
  global $db;
  $author = $db->Execute("SELECT author_url
                          FROM " . TABLE_PRODUCT_BOOKX_AUTHORS . "
                          WHERE bookx_author_id = " . (int)$bookx_author_id);
  if (!$author->EOF) {
    return $author->fields['author_url'];
  } else {
    return null;
  }
}

function bookx_get_author_name($bookx_author_id)
{
  global $db;
  $author = $db->Execute("SELECT author_name
                          FROM " . TABLE_PRODUCT_BOOKX_AUTHORS . "
                          WHERE bookx_author_id = " . (int)$bookx_author_id);

  if (!$author->EOF) {
    return ($author->fields['author_name'] ? $author->fields['author_name'] : '');
  } else {
    return null;
  }
}

function bookx_get_author_description($bookx_author_id, $language_id)
{
  global $db;
  $author = $db->Execute("SELECT author_description
                          FROM " . TABLE_PRODUCT_BOOKX_AUTHORS_DESCRIPTION . "
                          WHERE bookx_author_id = " . (int)$bookx_author_id . "
                          AND languages_id = " . (int)$language_id);

  if (!$author->EOF) {
    return ($author->fields['author_description'] ? $author->fields['author_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_author_type_description($bookx_author_type_id, $language_id)
{
  global $db;
  $author_type = $db->Execute("SELECT type_description
                               FROM " . TABLE_PRODUCT_BOOKX_AUTHOR_TYPES_DESCRIPTION . "
                               WHERE bookx_author_type_id = " . (int)$bookx_author_type_id . "
                               AND languages_id = " . (int)$language_id );

  if (!$author_type->EOF) {
    return ($author_type->fields['type_description'] ? $author_type->fields['type_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_author_type_image_url($bookx_author_type_id, $language_id)
{
  global $db;
  $author_type = $db->Execute("SELECT type_image
                               FROM " . TABLE_PRODUCT_BOOKX_AUTHOR_TYPES_DESCRIPTION . "
                               WHERE bookx_author_type_id = " . (int)$bookx_author_type_id . "
                               AND languages_id = " . (int)$language_id);

  if (!$author_type->EOF) {
    return ($author_type->fields['type_image'] ? $author_type->fields['type_image'] : '');
  } else {
    return null;
  }
}

function bookx_get_publisher_name($bookx_publisher_id)
{
  global $db;
  $publisher = $db->Execute("SELECT publisher_name
                             FROM " . TABLE_PRODUCT_BOOKX_PUBLISHERS . "
                             WHERE bookx_publisher_id = " . (int)$bookx_publisher_id);

  if (!$publisher->EOF) {
    return ($publisher->fields['publisher_name'] ? $publisher->fields['publisher_name'] : '');
  } else {
    return null;
  }
}

/*
 * Return the Publisher URL in the needed language
 *
 */

function bookx_get_publisher_url($bookx_publisher_id, $language_id)
{
  global $db;
  $publisher = $db->Execute("SELECT publisher_url
                             FROM " . TABLE_PRODUCT_BOOKX_PUBLISHERS_DESCRIPTION . "
                             WHERE bookx_publisher_id = " . (int)$bookx_publisher_id . "
                             AND languages_id = " . (int)$language_id);

  if (!$publisher->EOF) {
    return ($publisher->fields['publisher_url'] ? $publisher->fields['publisher_url'] : '');
  } else {
    return null;
  }
}

function bookx_get_publisher_description($bookx_publisher_id, $language_id)
{
  global $db;
  $publisher = $db->Execute("SELECT publisher_description
                             FROM " . TABLE_PRODUCT_BOOKX_PUBLISHERS_DESCRIPTION . "
                             WHERE bookx_publisher_id = " . (int)$bookx_publisher_id . "
                             AND languages_id = " . (int)$language_id);

  if (!$publisher->EOF) {
    return ($publisher->fields['publisher_description'] ? $publisher->fields['publisher_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_imprint_name($bookx_imprint_id)
{
  global $db;
  $imprint = $db->Execute("SELECT imprint_name
                           FROM " . TABLE_PRODUCT_BOOKX_IMPRINTS . "
                           WHERE bookx_imprint_id = " . (int)$bookx_imprint_id);

  if (!$imprint->EOF) {
    return ($imprint->fields['imprint_name'] ? $imprint->fields['imprint_name'] : '');
  } else {
    return null;
  }
}

function bookx_get_imprint_description($bookx_imprint_id, $language_id)
{
  global $db;
  $imprint = $db->Execute("SELECT imprint_description
                           FROM " . TABLE_PRODUCT_BOOKX_IMPRINTS_DESCRIPTION . "
                           WHERE bookx_imprint_id = " . (int)$bookx_imprint_id . "
                           AND languages_id = " . (int)$language_id);

  if (!$imprint->EOF) {
    return ($imprint->fields['imprint_description'] ? $imprint->fields['imprint_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_genre_description($bookx_genre_id, $language_id)
{
  global $db;
  $genre = $db->Execute("SELECT genre_description
                         FROM " . TABLE_PRODUCT_BOOKX_GENRES_DESCRIPTION . "
                         WHERE bookx_genre_id = " . (int)$bookx_genre_id . "
                         AND languages_id = " . (int)$language_id);

  if (!$genre->EOF) {
    return ($genre->fields['genre_description'] ? $genre->fields['genre_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_genre_image_url($bookx_genre_id, $language_id)
{
  global $db;
  $genre = $db->Execute("SELECT genre_image
                         FROM " . TABLE_PRODUCT_BOOKX_GENRES_DESCRIPTION . "
                         WHERE bookx_genre_id = " . (int)$bookx_genre_id . "
                         AND languages_id = " . (int)$language_id);

  if (!$genre->EOF) {
    return ($genre->fields['genre_image'] ? $genre->fields['genre_image'] : '');
  } else {
    return null;
  }
}

function bookx_get_series_image_url($bookx_series_id, $language_id)
{
  global $db;
  $series = $db->Execute("SELECT series_image
                          FROM " . TABLE_PRODUCT_BOOKX_SERIES_DESCRIPTION . "
                          WHERE bookx_series_id = " . (int)$bookx_series_id . "
                          AND languages_id = " . (int)$language_id);

  if (!$series->EOF) {
    return ($series->fields['series_image'] ? $series->fields['series_image'] : '');
  } else {
    return null;
  }
}

function bookx_get_series_name($bookx_series_id, $language_id)
{
  global $db;
  $series = $db->Execute("SELECT series_name
                          FROM " . TABLE_PRODUCT_BOOKX_SERIES_DESCRIPTION . "
                          WHERE bookx_series_id = " . (int)$bookx_series_id . "
                          AND languages_id = " . (int)$language_id);

  if (!$series->EOF) {
    return ($series->fields['series_name'] ? $series->fields['series_name'] : '');
  } else {
    return null;
  }
}

function bookx_get_series_description($bookx_series_id, $language_id)
{
  global $db;
  $series = $db->Execute("SELECT series_description
                          FROM " . TABLE_PRODUCT_BOOKX_SERIES_DESCRIPTION . "
                          WHERE bookx_series_id = " . (int)$bookx_series_id . "
                          AND languages_id = " . (int)$language_id);

  if (!$series->EOF) {
    return ($series->fields['series_description'] ? $series->fields['series_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_printing_description($bookx_printing_id, $language_id)
{
  global $db;
  $printing = $db->Execute("SELECT printing_description
                            FROM " . TABLE_PRODUCT_BOOKX_PRINTING_DESCRIPTION . "
                            WHERE bookx_printing_id = " . (int)$bookx_printing_id . "
                            AND languages_id = " . (int)$language_id);

  if (!$printing->EOF) {
    return ($printing->fields['printing_description'] ? $printing->fields['printing_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_binding_description($bookx_binding_id, $language_id)
{
  global $db;
  $binding = $db->Execute("SELECT binding_description
                           FROM " . TABLE_PRODUCT_BOOKX_BINDING_DESCRIPTION . "
                           WHERE bookx_binding_id = " . (int)$bookx_binding_id . "
                           AND languages_id = " . (int)$language_id);

  if (!$binding->EOF) {
    return ($binding->fields['binding_description'] ? $binding->fields['binding_description'] : '');
  } else {
    return null;
  }
}

function bookx_get_condition_description($bookx_condition_id, $language_id)
{
  global $db;
  $condition = $db->Execute("SELECT condition_description
                             FROM " . TABLE_PRODUCT_BOOKX_CONDITIONS_DESCRIPTION . "
                             WHERE bookx_condition_id = " . (int)$bookx_condition_id . "
                             AND languages_id = " . (int)$language_id);

  if (!$condition->EOF) {
    return ($condition->fields['condition_description'] ? $condition->fields['condition_description'] : '');
  } else {
    return null;
  }
}

function bookx_delete_product($product_id = null, $delete_linked = true)
{
  global $db;
  if (null != $product_id) {
    bookx_delete_bookx_specific_product_entries($product_id);

    zen_remove_product($product_id, $delete_linked);
  }
}

function bookx_delete_bookx_specific_product_entries($product_id = null, $delete_linked = true)
{
  global $db;
  if (null != $product_id) {
    $db->Execute("DELETE FROM " . TABLE_PRODUCT_BOOKX_EXTRA . "
                  WHERE products_id = " . (int)$product_id);

    $db->Execute("DELETE FROM " . TABLE_PRODUCT_BOOKX_EXTRA_DESCRIPTION . "
                  WHERE products_id = " . (int)$product_id);

    $db->Execute("DELETE FROM " . TABLE_PRODUCT_BOOKX_GENRES_TO_PRODUCTS . "
                  WHERE products_id = " . (int)$product_id);

    $db->Execute("DELETE FROM " . TABLE_PRODUCT_BOOKX_AUTHORS_TO_PRODUCTS . "
                  WHERE products_id = " . (int)$product_id);
  }
}

function bookx_convert_product_to_bookx_type($product_id = null)
{
  global $db;

  $sql = "SELECT *
          FROM " . TABLE_PRODUCT_TYPES . "
          WHERE type_handler = 'product_bookx'";

  $results = $db->Execute($sql); /* @var $result queryFactoryResult */
  foreach ($results as $result) {
    $bookx_type_id = $result['type_id'];
  }

  if (null != $product_id) {
    $db->Execute("UPDATE " . TABLE_PRODUCTS . "
                  SET products_type = " . (int)$bookx_type_id . "
                  WHERE products_id = " . (int)$product_id);

    $db->Execute("REPLACE INTO " . TABLE_PRODUCT_BOOKX_EXTRA . " (products_id)
                  VALUES (" . (int)$product_id . ")");
  }
}

function bookx_convert_product_from_bookx_to_type($product_id = null, $destination_type = null)
{
  global $db;

  if (null != $product_id && null != $destination_type) {
    bookx_delete_bookx_specific_product_entries($product_id);
    $db->Execute("UPDATE " . TABLE_PRODUCTS . "
                  SET products_type = " . (int)$destination_type . "
                  WHERE products_id = " . (int)$product_id);
  }
}

function bookx_format_isbn_for_display($isbn = null)
{
  $isbn = preg_replace('/[^0-9]/', '', $isbn);
  if (!empty($isbn) && 13 == strlen($isbn)) {
    $isbn = substr($isbn, 0, 3) . '-' . substr($isbn, 3, 1) . '-' . substr($isbn, 4, 6) . '-' . substr($isbn, 10, 2) . '-' . substr($isbn, 12);
  }
  return $isbn;
}

/*
 * Look up SHOW_XXX_INFO switch for product type bookx
 */

function bookx_get_show_product_switch($field, $suffix = 'SHOW_', $prefix = '_INFO', $field_prefix = '_', $field_suffix = '')
{
  global $db;

  $zv_key = strtoupper($suffix . 'PRODUCT_BOOKX' . $prefix . $field_prefix . $field . $field_suffix);

  $sql = "SELECT configuration_key, configuration_value
          FROM " . TABLE_PRODUCT_TYPE_LAYOUT . "
          WHERE configuration_key = '" . $zv_key . "'";
  $zv_key_value = $db->Execute($sql);
  if ($zv_key_value->RecordCount() > 0) {
    return $zv_key_value->fields['configuration_value'];
  } else {
    $sql = "SELECT configuration_key, configuration_value
            FROM " . TABLE_CONFIGURATION . "
            WHERE configuration_key = '" . $zv_key . "'";
    $zv_key_value = $db->Execute($sql);
    if ($zv_key_value->RecordCount() > 0) {
      return $zv_key_value->fields['configuration_value'];
    } else {
      return false;
    }
  }
}

/*
 * This is just a slightly modified copy of zen_image_OLD in the CATALOG
 * since the ADMIN Zen Image does not scale with maintaining proportions
 */

function bookx_image($src, $alt = '', $width = '', $height = '', $parameters = '')
{

  if ((empty($src) || ($src == DIR_WS_IMAGES))) {
    return false;
  }

  // Convert width/height to int for proper validation.
  $width = empty($width) ? $width : intval($width);
  $height = empty($height) ? $height : intval($height);

  // alt is added to the img tag even if it is null to prevent browsers from outputting
  // the image filename as default
  $image = '<img src="' . zen_output_string($src) . '" alt="' . zen_output_string($alt) . '"';

  if (zen_not_null($alt)) {
    $image .= ' title=" ' . zen_output_string($alt) . ' "';
  }

  if ((CONFIG_CALCULATE_IMAGE_SIZE == 'true') && (empty($width) || empty($height))) {
    if ($image_size = @getimagesize($src)) {
      if (empty($width) && zen_not_null($height)) {
        $ratio = $height / $image_size[1];
        $width = $image_size[0] * $ratio;
      } elseif (zen_not_null($width) && empty($height)) {
        $ratio = $width / $image_size[0];
        $height = $image_size[1] * $ratio;
      } elseif (empty($width) && empty($height)) {
        $width = $image_size[0];
        $height = $image_size[1];
      }
    }
  }

  if (zen_not_null($width) && zen_not_null($height)) {
//      $image .= ' width="' . zen_output_string($width) . '" height="' . zen_output_string($height) . '"';
// proportional images
    $image_size = @getimagesize($src);
    // fix division by zero error
    $ratio = ($image_size[0] != 0 ? $width / $image_size[0] : 1);
    if ($image_size[1] * $ratio > $height) {
      $ratio = $height / $image_size[1];
      $width = $image_size[0] * $ratio;
    } else {
      $height = $image_size[1] * $ratio;
    }
// only use proportional image when image is larger than proportional size
    if ($image_size[0] < $width and $image_size[1] < $height) {
      $image .= ' width="' . $image_size[0] . '" height="' . intval($image_size[1]) . '"';
    } else {
      $image .= ' width="' . round($width) . '" height="' . round($height) . '"';
    }
  } else {
    // override on missing image to allow for proportional and required/not required
    if (IMAGE_REQUIRED == 'false') {
      return false;
    } else if (substr($src, 0, 4) != 'http') {
      $image .= ' width="' . intval(SMALL_IMAGE_WIDTH) . '" height="' . intval(SMALL_IMAGE_HEIGHT) . '"';
    }
  }

  if (zen_not_null($parameters)) {
    $image .= ' ' . $parameters;
  }

  $image .= ' />';

  return $image;
}

/**
 * @since v1.0.0
 * Insures that empty values are inserted Null in database
 * @param type $value The value received to insert in database
 * @return string
 */
function bookx_null_check($value)
{
  $value = zen_db_prepare_input($value);
  if (empty($value)) {
    return 'null';
  } else {
    return $value;
  }
}

/**
 * Checks missing relations between bookx tables_to_products and table products.
 * 
 * @category admin
 * @global type $db
 * @param array $bx_tables an array on tables to check
 * @param bool $delete default false
 * @return string $msg info
 * 
 */
function bookx_check_missing_product_relations($bx_tables, $field_id, $delete = false)
{
  global $db;
  $msg = '';
  if (is_array($bx_tables)) {

    foreach ($bx_tables as $table => $table2) {
      $check = $db->Execute("SELECT " . $field_id . "
                             FROM " . $table . "
                             WHERE " . $field_id . "
                             NOT IN (SELECT " . $field_id . " FROM " . $table2 . ");");

      $msg .= ($check->Count() > 0) ? "Found " . $check->Count() . " missing relations in table[" . $table . "]<br />" : $table . " all Good!<br />";
      if ($delete == true && $check->Count() > 0) {
        $msg .= ($check->Count() > 0) ? "Deleted " . $check->Count() . " in " . $table . "<br />" : "All Goodfff!";
        $db->Execute("DELETE FROM " . $table . "
                      WHERE " . $field_id . "
                      NOT IN (SELECT " . $field_id . " FROM " . $table2 . ");");
      }
    }
  }

  return $msg;
}

/**
 * 
 * @param type $url the git api release links
 * @param type $compare if <b>TRUE</b> returns an array. Else, display formated info (on install) 
 * @param type $install maybe future git install releases. 
 * @return type array
 */
function check_git_release_for($url, $compare = false, $install = null)
{
  //$download_folder = '';
  $cInit = curl_init();
  curl_setopt($cInit, CURLOPT_URL, $url);
  curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); // 1 = TRUE
  curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($cInit, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

  $output = curl_exec($cInit);
  $response = curl_getinfo($cInit, CURLINFO_HTTP_CODE);

  if ($response == "200") {
    $result = json_decode($output, true);
  } else {
    $info = "No info found " . $response;
  }

  if ($compare == false) {
    $info = "Latest Release: " . $result[0]['name'] . " <br />Download: <a href=" . $result[0]['zipball_url'] . " rel=\"no-follow\" >" . $result[0]['name'] . "</a> <br />published: " . $result[0]['published_at'] . "\n";
  } else {
    $info = array(
      'tag_name' => $result[0]['tag_name'],
      'html_url' => $result[0]['html_url'],
      'zipball_url' => $result[0]['zipball_url'],
      'published_at' => $result[0]['published_at'],
      'body' => $result[0]['body'],
      'author' => $result[0]['author']['login']
    );
  }

  curl_close($cInit);

  return $info;
}

function download_img_from_url($url, $imageName)
{

  if (!file_exists($imageName)) {

    $ch = curl_init($url);
    $fp = fopen($imageName, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
  }
}

function cleanImageName($post_name, $type = null)
{

  $r = array(' ', '-', '.');

  if (class_exists('CeonURIMappingAdmin')) {

    require_once(DIR_FS_CATALOG . DIR_WS_CLASSES . 'class.CeonURIMappingAdmin.php');
    $handleUri = new CeonURIMappingAdmin();

    $lang_code = $_SESSION['languages_code'];

    $name = $handleUri->_convertStringForURI(trim($post_name), $lang_code);
    //some extra string checks

    if ($type == 'lower') {
      //for file names
      $post_name = str_replace($r, '_', strtolower($name));
      return $post_name;
    } else {
      // for Folders Name
      $post_name = str_replace($r, '', ucwords($name, '-'));
      return $post_name;
    }
  } elseif (extension_loaded('intl')) {

    $t = str_replace($r, '_', $post_name);
    return transliterator_transliterate('Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; Lower();', $t);
  } else {
    return null;
  }
}

function bookx_update_plugin_release($now = true, $days = null)
{
  global $objGit;

  $file = DIR_FS_ADMIN . 'includes/exra_datafiles/bookx/plugin_check.json';
  $msg = '';
  $date = new DateTime(); //this returns the current date time
  $today = $date->format('Y-m-d');

//    if (zen_not_null($days) && zen_date_diff($today, $last_checked) <= -$conf_date) {
//        $last_checked = $read_file->last_check_date;
//        //@todo by days
//    }

  if ($now) {
    foreach ($objGit as $key => $plugin) {
      if ($key !== 'last_check_date') {
        $msg .= (empty($plugin->url)) ? '<span class="text-danger">No url found for ' . $key . '</span><br />' : '<span>Updated Info for ' . $key . '</span><br />';
        $check = check_git_release_for($plugin->url, true);
        if ($tag_name !== $plugin->installed) {
          $objGit->{$key}->last_release = $check['tag_name'];
          $objGit->{$key}->html_url = $check['html_url'];
        }
      }
    }
  }
  $objGit->last_check_date = $today;

  file_put_contents($file, json_encode($objGit, JSON_PRETTY_PRINT));
  return $msg;
}

function pr($v, $die = null, $dedug = null)
{
  echo '<pre>';
  echo $vn;
  print_r($v);
  if ($dedug) {
    debug_print_backtrace();
  }
  echo '</pre>';
  if ($die)
    die();
}

function vd($v, $n = null)
{
  echo "<pre>$n";
  var_dump($v);
  echo "</pre>";
}
