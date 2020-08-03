<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DataBaseController extends Controller

{
 public function create(){
 $user = 'root';
 $pass = '';
 $dsn = "mysql:host=localhost;dbname=cili;charset=utf8mb4";
 $options = [
 \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
 \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
 \PDO::ATTR_EMULATE_PREPARES => false,
 ];
 try {
 $pdo = new \PDO($dsn, $user, $pass, $options);
 } catch (\PDOException $e) {
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
 }

 try {
  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS users (
      id bigint(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
      name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      email varchar(255) COLLATE utf8mb4_unicode_ci  UNIQUE KEY NOT NULL,
      email_verified_at timestamp NULL DEFAULT NULL,
      password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      created_at timestamp NULL DEFAULT NULL,
      updated_at timestamp NULL DEFAULT NULL
    )
  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$pdo->exec($sql);
} catch(PDOException $e) {
echo $sql . '<br>' . $e->getMessage();
}

try {
  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS menus (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  price DECIMAL(6,2) NOT NULL,
  weight INT(11),
  meat INT(11),
  about TEXT,
  portret VARCHAR(64),
  created_at TIMESTAMP,
  updated_at TIMESTAMP
  )";
  // use exec() because no results are returned
  $pdo->exec($sql);
  // echo “Table MyGuests created successfully“;
  } catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  }

 try {
// sql to create table
 $sql = "CREATE TABLE IF NOT EXISTS restaurants (
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(64) NOT NULL,
 customers int(11) NOT NULL,
 employees int(11) NOT NULL,
 menu_id int(11) UNSIGNED NOT NULL,

 created_at TIMESTAMP,
 updated_at TIMESTAMP,
 FOREIGN KEY (menu_id) REFERENCES menus(id)
 )";
 // use exec() because no results are returned
 $pdo->exec($sql);
 // echo “Table MyGuests created successfully“;
 } catch(PDOException $e) {
 echo $sql . "<br>" . $e->getMessage();
 }


 }
}