<?php

  class App{

    const DB_HOST = 'localhost';
    const DB_LOGIN = 'root';
    const DB_PASS = '';
    const DB_NAME = 'pwtest';

    private static $database;

    public static function getDb(){
      if(self::$database == null){
        self::$database = new Database(self::DB_NAME, self::DB_LOGIN, self::DB_PASS, self::DB_HOST);
      }
      return self::$database;
    }

  }
