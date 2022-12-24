<?php
interface Encryptor {
  public static function encrypt(string $msg):string;
}

class Md5Encryptor implements Encryptor {
  public static function encrypt(string $msg):string{
    return md5($msg);
  }
}

class SHA512Encryptor implements Encryptor {
  public static function encrypt(string $msg):string{
    $ob = ['cost' => 9];
    return password_hash($msg, PASSWORD_DEFAULT,$ob);
  }
}