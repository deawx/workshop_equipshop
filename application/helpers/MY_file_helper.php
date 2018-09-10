<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_file_lines'))
{
  function get_file_lines($file)
  {
    $count = 0;
    $linebreak = fopen($file, "r");
    while( ! feof($linebreak))
    {
      $line = fgets($handle);
      $count++;
    }
    fclose($handle);

    return $count;
  }
}
