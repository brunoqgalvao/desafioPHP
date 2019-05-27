 <?php
    $usuario = ["logado" => true, "nome" => "Bruno Galvao", "nivelAcesso" => 1];

    $produtos = [
      "produto1" => [
        "nome" => "Curso Fullstack",
        "descricao" => "O curso full stack ensina programação",
        "preco" => 1200,
        "img_path" => 'img/fullstack.jpg',
      ],
      "produto2" => [
        "nome" => "Curso Data Science",
        "descricao" => "Este curso ensina ciência de dados em python e R",
        "preco" => 999,
        "img_path" => 'img/datascience.jpg',
      ],
      "produto3" => [
        "nome" => "Curso Mobile Android",
        "descricao" => "Este curso ensina desenvolvimento de app mobile em Android",
        "preco" => 1200,
        "img_path" => './img/android.jpg',
      ],
      "produto4" => [
        "nome" => "Curso Mobile Android",
        "descricao" => "Este curso ensina desenvolvimento de app mobile em Android",
        "preco" => 1200,
        "img_path" => 'img/teste.png',
      ],
      "produto5" => [
        "nome" => "Curso Mobile Android",
        "descricao" => "Este curso ensina desenvolvimento de app mobile em Android",
        "preco" => 1200,
        "img_path" => './img/dummy.png',
      ],
      "produto6" => [
        "nome" => "Curso Mobile Android",
        "descricao" => "Este curso ensina desenvolvimento de app mobile em Android",
        "preco" => 1200,
        "img_path" => './img/dummy.png',
      ],
      "produto7" => [
        "nome" => "Curso Mobile Android",
        "descricao" => "Este curso ensina desenvolvimento de app mobile em Android",
        "preco" => 1200,
        "img_path" => './img/dummy.png',
      ],
    ];
    $categorias = [
      "Cursos",
      "Tutoriais",
      "Artigos",
      "Forum",
      "Códigos",
    ];


 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Virtual PHP</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</head>

<body>

  <header>
    <!-- NAVBAR DO BOOSTRAP -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"> Cursos </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <?php if(isset($usuario) && $usuario != ""): ?>        
            <?php if($usuario['nivelAcesso'] == 0): ?>
              <li class="nav-item active">
                <a class="nav-link" href="#"> Perfil <span class="sr-only">(current)</span></a>
              </li>
            <?php else: ?>
              <li class="nav-item active">
                <a class="nav-link" href="#">Painel Admin<span class="sr-only">(current)</span></a>
              </li>
            <?php endif ?>
              <li class='nav-item'>
                <a href='#' class='nav-link'> Olá <?= $usuario['nome'] ?> </a>
              </li>
          <?php else: ?>
            <li class='nav-item'>
              <a href='#' class='nav-link'> Login </a>
            </li>
          <?php endif ?> 
        </ul>
      </div>
    </nav>
    <nav>
      <ul class="row mt-3 justify-content-center">
        <?php foreach( $categorias as $categoria ): ?>
          <li class="col-md-2"><?= $categoria ?></li>
        <?php endforeach ?>
      </ul>
    </nav>
  </header>
  <!-- container define que está num container fixo e mantém centralizado. container-fluid ele ocupa tudo -->
  <main class="container mt-5">
    <section class="row">

      <?php foreach($produtos as $chave => $produto):?>
        <div class="col-md-4 mb-3">
          <!-- coluna para segurar card -->
          <div class="card" style="width: 18rem;">
            <img src=<?= $produto['img_path'] ?> class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $produto['nome'] ?></h5>
              <p class="card-text"><?= $produto['descricao'] ?></p>
              <h4> R$ <?= $produto['preco'] ?> </h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $chave ?>">
                Comprar
              </button>
            </div>
          </div>
        </div>
      <!-- fecha a section no terceiro ou no último -->   
      <?php endforeach ?>
    </section>

  </main>

  <!-- Modal -->
  <?php foreach($produtos as $chave=>$produto): ?>
  <div class="modal fade" id="<?= $chave ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $chave ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="<?= $chave ?>Label"><?= $produto['nome'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class='row mb-3'>
            <div class='col-md-12'>
            <img src=<?= $produto['img_path'] ?> class="card-img-top" style="height:10rem;" alt="...">
            </div>
          </div>
          <div class='row'>
            <div class='col-sm-12'>
              <form>
                <div class="form-group">
                  <input type="text" name="nomeCliente" id="nomeCliente" placeholder="Nome Completo">
                </div>
                <div class="form-group">
                  <input type="number" name="cpfCliente" id="cpfCliente" placeholder='CPF'>
                  <small id="cpfHelp" class="form-text text-muted">Somente números</small>
                </div>
                <div class="form-group">
                  <input type="number" name="cartaoCliente" id="cartaoCliente" placeholder='Cartao de crédito'>
                </div>
                <div class="form-group">
                  <input type="date" name="dataValidadeCartao" id="dataValidadeCartao" placeholder='Data de Validade do Cartão'>
                </div> 
                <div class="form-group">
                  <input type="number" name="cvvCartao" id="cvvCartao" maxlength="3" placeholder='Data de Validade do Cartão'>
                </div>                            
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="text-primary">Preço Total: R$ <?= $produto['preco'] ?></div>
          <button type="button" class="btn btn-success">Finalizar Compra</button>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>

</body>

</html>