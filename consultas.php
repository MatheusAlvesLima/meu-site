<?php
// Configurações do banco de dados
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "clientes";

// Conecta-se ao banco de dados
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verifica se houve erro ao conectar-se ao banco de dados
if ($conn->connect_error) {
  die("Erro ao conectar-se ao banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['mensagem'])) {
  // Obtém os dados enviados pelo formulário
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $mensagem = $_POST['mensagem'];

  // Prepara a consulta SQL
  $stmt = $conn->prepare("INSERT INTO consultas (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nome, $email, $telefone, $mensagem);

  // Executa a consulta SQL
  if ($stmt->execute()) {
    // Exibe uma mensagem de confirmação para o usuário
    echo "Obrigado por enviar sua consulta, $nome! Entraremos em contato em breve.";
  } else {
    // Exibe uma mensagem de erro para o usuário
    echo "Ocorreu um erro ao enviar sua consulta. Por favor, tente novamente mais tarde.";
  }
} else {
  // Exibe uma mensagem para o usuário
  echo "Por favor, preencha o formulário para enviar sua consulta.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
