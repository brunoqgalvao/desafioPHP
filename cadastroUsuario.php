<!DOCTYPE html>
<html lang="en">
  <?php include("components/head.php") ?>
<body>
  <?php include("components/header.php") ?>
  <main class="container">
    <section class='row'>
      <div class='col-md-6'>
        <form action="salvarUsuario.php" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
          <label for="nomeUsuario">Nome do Usuário</label>
          <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder= "Nome do Usuário">
        </div>
        <div class="form-group">
          <label for="emailUsuario">Email do Usuario</label>
          <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="senhaUsuario">Senha</label>
          <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Senha do Usuário">
          <label for="confirmarSenha">Confirmar Senha</label>
          <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" placeholder = "Confirmar Senha">
        </div>
        <div class="form-group">
          <label for="nivelAcessoUsuario">Nível de Acesso</label>
          <select name="nivelAcessoUsuario" id="nivelAcessoUsuario" class="form-control" required>
            <option selected disabled>Selecione</option> 
            <option value="0">Usuário</option>
            <option value="1">Administrador</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Finalizar Cadastro</button>
        </form>
      </div>
    </section class='row'>
  </main>
</body>
</html>