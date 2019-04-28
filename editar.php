<?php
require 'banco.php';
$id = $_GET['id'];
$query = 'SELECT nme_usuario, sno_usuario, dta_nascimento_usuario, eml_usuario FROM tb_usuario WHERE idt_usuario='.$id;
$lista = $conn->prepare($query);
$lista->execute();
$usuario = $lista->fetch(PDO::FETCH_OBJ);
if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['data_de_nascimento']) && isset($_POST['email'])){
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
  	$data_de_nascimento = $_POST['data_de_nascimento'];
  	$email = $_POST['email'];
	$query = 'UPDATE tb_usuario SET nme_usuario='.$nome.', sno_usuario='.$sobrenome.', dta_nascimento_usuario='.$data_de_nascimento.', eml_usuario='.$email.' WHERE idt_usuario='.$id;
	$atualiza = $conn->prepare($query);
	if($atualiza->execute()){
		header('location: listar.php?editado');
	}

}

?>


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Editar usuário</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Nome</label>
          <input value="<?= $usuario->nme_usuario; ?>" type="text" name="nome" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="sobrenome">Sobrenome</label>
          <input type="text" value="<?= $usuario->sno_usuario; ?>" name="sobrenome" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="sobrenome">Data de Nascimento</label>
          <input type="date" value="<?= $usuario->dta_nascimento_usuario; ?>" name="data_de_nascimento" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $usuario->eml_usuario; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Editar</button>
        </div>
        <div class="form-group">
          <a href="listar.php"><input type="button" value="Voltar"></a>
        </div>
      </form>
    </div>
  </div>
</div>