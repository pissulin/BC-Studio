<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
		$mensagem = $_POST['mensagem'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "bcstudioeproducoes@gmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "pissulin.ads@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá BC-Studio, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email<br>Endereço: $endereco <br> Telefone: $telefone<br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
        ?>
    </body>
</html>