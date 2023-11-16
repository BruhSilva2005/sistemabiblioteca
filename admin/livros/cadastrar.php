<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecario.php";  


    $livroController = new LivroController();

    $livroController->cadastrarLivro();
      
?>

<main class="container mt-3 mb-3">
    <h1>Cadastrar Livros</h1>
    <form action="cadastrar.php" method="post" class="row g-3" enctype="multipart/form-data">
        <div class="col-md-12">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="numero_pagina" class="form-label">Número de Páginas</label>
            <input type="number" name="numero_pagina" id="numero_pagina" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" name="preco" id="preco" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="capa" class="form-label">CAPA</label>
            <input type="file" name="capa" id="capa" class="form-control">
        </div>



        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

</main>


<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";  
?>
