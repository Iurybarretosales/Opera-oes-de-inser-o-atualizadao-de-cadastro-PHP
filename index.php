<?php
//constantes para armazenamento das variaveis de conexão.
define ('HOST', '192.168.52.128');
define ('PORT', '5432');
define ('DBNAME', 'minimundo');
define ('USER', 'postegres');
define ('PASSWORD', 'admin123');

try {
    //Conexão postegres
    $dsn = new PDO ("pgsql:host=". HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";user=" . USER . ";password=" . PASSWORD);

} catch (PDOException $e) {
    echo 'A conexão falhou e retornou o seguinte mensagem de erro: '. $e ->getMessage();
}
9
$nome_cliente = "jose";
$cpf_cliente = "77488599632";
$email_cliente = "email@gominio.com.br";
$data_nascimento_cliente = "1980-10-01";

$stmt = $dsn->prepare ("INSERT INTO CLIENTES(nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente) values (?, ?, ?, ?)");

$resultSet = $stmt->execute([$nome_cliente, $cpf_cliente, $email_cliente, $data_nascimento_cliente]);

if ($resultSet){
    echo "Os dados foram inseridos com sucesso. \n\n";
}else {
    echo "Ocorreu um erro e não foi possivel inserir os dados ."
    exit;
}
die;


$instrucaoSQL = "SELECT id_cliente, nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente FROM CLIENTE";

$resultSet =  $dsn->query($instrucaoSQL);

while ($row = $resultSet -> fetch()) {
    echo $row ['id_cliente'] ."\t";
    echo $row ['nome_cliente'] ."\t";
    echo $row ['cpf_cliente']."\t";
    echo $row ['email_cliente'] ."\t";
    echo $row ['data_nascimento_cliente']."\t";

}
die;

$nome_cliente = "joao";
$cpf_cliente = "77488599632";
$email_cliente = "email@gominio.com.br";
$data_nascimento_cliente = "1980-10-01";
$id_cliente = 6;

$stmt =  $dsn->prepare("UPDATE cliente SET nome_cliente = ?, cpf_cliente = ?, email_cliente = ?, data_nascimento_cliente = ? WHERE id_cliente = ?").


$resultSet =  $stmt->execute([$nome_cliente, $cpf_cliente, $email_cliente, $data_nascimento_cliente, $id_cliente]);

if ($resultSet) {
    echo "Os dados do cliente foram atualizados com sucesso.";
} else {
    echo "Ocorreu um ERRO ao aualizar os dados do cliente";
    exit;
}




?>