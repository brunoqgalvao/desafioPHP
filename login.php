<!DOCTYPE html>
<html lang="en">
  <?php include("components/head.php") ?>
<body>
  <?php include("components/header.php") ?>
  <main class="container">
    <section class='row'>
      <div class='col-md-6'>
        <form action="logarUsuario.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="emailUsuario">Email do Usuario</label>
            <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="E-mail">
          </div>
          <div class="form-group">
            <label for="senhaUsuario">Senha</label>
            <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Senha do Usuário">
          </div>
          <button type="submit" class="btn btn-primary">Logar</button>
          <div> Ou </div>
          <a class="btn btn-primary" href='cadastroUsuario.php'>Cadastre-se</a>
        </form>
      </div>
    </section class='row'>
  </main>
</body>
</html>