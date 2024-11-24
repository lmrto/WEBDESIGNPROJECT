<!-- conexao.php -->
<?php
  abstract class Conexao {
    public static function getInstance() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=bdplaylist","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
      }
    }
  }
?>