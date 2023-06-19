<?php
class Conexao
{
    private $host = "localhost";
    private $dbname = "tarefasja";
    private $user = "root";
    private $pass = "";
    private $pdo;
    private $conectado = false;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conectado = true;
        } catch (PDOException $e) {
            echo "Erro ao conectar com o banco: " . $e->getMessage();
        }
    }
    
    public function testarConexao()
    {
        return $this->conectado;
    }
    
    public function executar($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }
}
