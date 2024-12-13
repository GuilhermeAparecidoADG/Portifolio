<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email para onde a mensagem será enviada
    $to = "seu_email@example.com"; // Substitua pelo seu endereço de email

    // Assunto do email
    $email_subject = "Novo contato: $subject";

    // Corpo do email
    $email_body = "Você recebeu uma nova mensagem de $name.\n\n" .
                  "Detalhes:\n" .
                  "Nome: $name\n" .
                  "Email: $email\n" .
                  "Telefone: $phone\n" .
                  "Mensagem: \n$message\n";

    // Cabeçalhos
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Enviar o email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Falha ao enviar mensagem. Tente novamente.'); window.location.href = 'index.html';</script>";
    }
	
	//if (mail($to, $email_subject, $email_body, $headers)) {
    //header("Location: obrigado.html");
    //exit;
//} else {
   // header("Location: erro.html");
    //exit;
//}
	if (mail($to, $email_subject, $email_body, $headers)) {
    header("Location: obrigado.html"); // Redireciona para uma página de sucesso
    exit; // Finaliza a execução do script
} else {
    header("Location: erro.html"); // Redireciona para uma página de erro
    exit;
}
}
?>