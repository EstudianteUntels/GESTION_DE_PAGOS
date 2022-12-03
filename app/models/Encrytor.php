<?php
interface Encryptor {
  public static function encrypt(string $msg):string;
}

class Md5Encryptor implements Encryptor {
  public static function encrypt(string $msg):string{
    return md5($msg);
  }
}