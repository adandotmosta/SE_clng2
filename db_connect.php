<?

$db = new MySQLi("localhost","root","","db_todo") or die("unable to connect");
mysqli_query($db,"CREATE TABLE IF NOT EXISTS users(ID INT NOT NULL AUTO_INCREMENT,Email VARCHAR(30),Password VARCHAR(30),PRIMARY KEY(ID));");
mysqli_query($db,"CREATE TABLE IF NOT EXISTS items (
    item_id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    create_time bigint(20) NOT NULL,
    id_u number NOT NULL,
    PRIMARY KEY(item_id),
    FOREIGN KEY(id_u) REFERENCES users(ID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");








?>