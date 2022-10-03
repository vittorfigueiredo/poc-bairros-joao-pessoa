<?php

class Response
{
  static function json($array)
  {
    if ($array) {
      echo json_encode($array);
      return;
    }
    return;
  }
}
