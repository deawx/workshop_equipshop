<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_valid'))
{
  function check_valid($date)
  {
    $date_created = DateTime::createFromFormat("Y-m-d",$date);
    $date_created = ($date_created !== FALSE) ? $date_created : date('Y-m-d');

    list($y, $m, $d) = array_pad(explode('-', $date, 3), 3, 0);

    return checkdate($m, $d, $y) ? $date_created : FALSE;
  }
}

if ( ! function_exists('age_calculate'))
{
  function age_calculate($birthdate,$todate=NULL)
  {
    $birthdate = is_numeric($birthdate) ? $birthdate : NOW();
    $todate = is_numeric($todate) ? $todate : NOW();

    $birthdate = date('Y-m-d',$birthdate);
    $todate = date('Y-m-d',$todate);

    return date_diff(date_create($birthdate),date_create($todate))->y;
  }
}
