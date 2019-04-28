<?php
require 'banco.php';
$query = "SELECT idt_usuario, nme_usuario, sno_usuario, date_format(dta_nascimento_usuario, '%d/%m/%Y') as data_de_nascimento, sex_usuario, eml_usuario, usr_usuario FROM tb_usuario";
$lista = $conn->prepare($query);
$lista->execute();
$usuarios = $lista->fetchAll(PDO::FETCH_OBJ);
?>

<table>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Data de Nascimento</th>
          <th>Sexo</th>
          <th>E-mail</th>
          <th>Usuário</th>
        </tr>
        <?php foreach($usuarios as $usuario): ?>
          <tr>
            <td><?= $usuario->idt_usuario; ?></td>
            <td><?= $usuario->nme_usuario; ?></td>
            <td><?= $usuario->sno_usuario; ?></td>
            <td><?= $usuario->data_de_nascimento; ?></td>
            <td><?= $usuario->sex_usuario; ?></td>
            <td><?= $usuario->eml_usuario; ?></td>
            <td><?= $usuario->usr_usuario; ?></td>
            <td>
              <a href="editar.php?id=<?= $usuario->idt_usuario ?>" class="btn btn-info">Editar</a>
              <a onclick="return confirm('Deseja excluir esse usuário?')" href="deletar.php?id=<?= $usuario->idt_usuario ?>" class='btn btn-danger'>Apagar</a>
            </td>
          </tr>
        <?php endforeach; ?>
</table>