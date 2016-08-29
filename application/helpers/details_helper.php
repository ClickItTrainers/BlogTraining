<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('url_details'))
{
  function url_details($title){
    return url_title(convert_accented_characters($title), '-', TRUE);
  }
}
