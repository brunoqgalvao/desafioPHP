<main class="container mt-5">
    <section class="row">

      <?php foreach($produtos as $produto):?>
        <div class="col-md-4 mb-3">
          <!-- coluna para segurar card -->
          <div class="card" style="width: 18rem;">
            <img src=<?= $produto['img_path'] ?> class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $produto['nome'] ?></h5>
              <p class="card-text"><?= $produto['descricao'] ?></p>
              <h4> R$ <?= $produto['preco'] ?> <h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $produto['id'] ?>">
                Comprar
              </button>
            </div>
          </div>
        </div>
      <!-- fecha a section no terceiro ou no último -->   
      <?php endforeach ?>
    </section>
    <?php include("modal.php") ?>
  </main>