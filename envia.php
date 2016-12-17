<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"html://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd ">
<html xmlns="http://www.w3.org/1999/xhtml "> 
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" type="text/css" href="css/viewer.css" />
   <meta http-equiv="refresh" content="5;index.php">
   <title>EMQDESENV</title>
 </head>
 <body> 
  <?php
     //Dados do formulario
    $remetente = "emquintino@ig.com.br";
    $to = "admin@emqdesenv.html-5.me";
    $email = $_POST["Email"];
    $subject = $_POST["Assunto"];
    $mensage = $_POST["Mensagem"];
    $cpf = ($_POST["cpf"]);
    $nome = ($_POST["Nome"]);
    $tel = ($_POST["Telefone"]);
					
    // Configurando a quebra de linha
	if(PATH_SEPARATOR == ":") {
          $quebra = "\r\n";
	}else{
          $quebra = "\n";
	}
					
    // Cabeçalho configurado de acordo com a regra RFC 822
    $headers = "MIME-Version: 1.1".$quebra;
    $headers .= "Content-type: text/plain; charset=iso-859-1".$quebra;
    $headers .= "From: $remetente".$quebra; // e-mail do remetente(obrigatório)
    $headers .= "Return-Path: $remetente".$quebra; // e-mail do remetente(obrigatório)
    $headers .= "Reply-To:<"."$to".">".$quebra; // e-mail informado no formulário
	
    echo '<div class="envio">';
    if(mail($to, $subject, $message, $headers, "-r"."$remetente")){			
      print "Mensagem enviada com sucesso para:<br />
      $remetente<br />		
      Assunto: $subject<br />
      Cliente: $nome <br />
      E-mail: $email<br />
      Tel.: $tel <br />
      Mensagem: $mensage\n";
    }else{
      print "A mensagem não pode ser enviada";
    }
    echo '</div>';
 ?>
  </body>
</html>
