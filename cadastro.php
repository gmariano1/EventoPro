<?php
require 'banco.php';
$mensagem = '';
//nome, sobrenome, data de nascimento, sexo, email, usuario, senha.
if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['data_de_nascimento']) && isset($_POST['sexo']) && isset($_POST['email']) && isset($_POST['usuario']) && isset($_POST['senha']))
{
	$nome = $_POST['nome'];
	$telefone = $_POST['sobrenome'];
	$data_de_nascimento = $_POST['data_de_nascimento'];
	$sexo = $_POST['sexo'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	//criptografa senha
	$criptosenha = password_hash($senha, PASSWORD_DEFAULT);
	//Query para inserir os dados do usuário
	$query = 'INSERT INTO tb_usuario (nme_usuario, sno_usuario, dta_nascimento_usuario, sex_usuario, eml_usuario, usr_usuario, pwd_usuario) VALUES (:nome, :sobrenome, :data_de_nascimento, :sexo, :email, :usuario, :criptosenha)';
	//conexão com o banco de dados
	$insere=$conn->prepare($query);
	if($insere->execute([':nome' => $nome, ':sobrenome' => $sobrenome, ':data_de_nascimento' => $data_de_nascimento, ':sexo' => $sexo, ':email' => $email, ':usuario' => $usuario, ':criptosenha' => $criptosenha])){
		$mensagem = 'Inserido com sucesso';
		header("location: cadastro.php?verifica=s");
	}
}

?>
<div>
	<?php if(!empty($mensagem)): ?>
        <div class="alert alert-success">
          <?= $mensagem; ?>
        </div>
<?php endif; ?>
</div>
<form method="post">
	<h1>Cadastro usuario</h1>
	<tr>
		<td>Nome</td>
		<input class="form-control" type="text" name="nome" required />
	</tr>
	<tr>
		<td>Sobrenome</td>
		<input class="form-control" type="text" name="sobrenome" required />
	</tr>
	<tr>
		<td>Sexo</td>
		<select class="custom-select" name="sexo" required><option disabled selected>Selecione o perfil</option><option value="M">Masculino</option><option value="F">Feminino</option></select>
	</tr>
	<tr>
		<td>E-mail</td>
		<input class="form-control" type="email" name="email" required />
	</tr>
	<tr>
		<td>Data</td>
		<input class="form-control" type="date" name="data_de_nascimento" required />
	</tr>
	<tr>
		<td>Usuario</td>
		<input class="form-control" type="text" name="usuario" required />
	</tr>
	<tr>
		<td>Senha</td>
		<input class="form-control" type="password" name="senha"  required />
	</tr>
	<button type="submit">Cadastrar</button>
</form>
