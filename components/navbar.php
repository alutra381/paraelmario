<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">CutreCloud</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?=$todoActive?>">
        <a class="nav-link" href="index.php">Todo</a>
      </li>
      <li class="nav-item <?=$imageActive?>">
        <a class="nav-link" href="index.php?section=imagenes">Imágenes</a>
      </li>
      <li class="nav-item <?=$videoActive?>">
        <a class="nav-link" href="index.php?section=videos">Vídeos</a>
      </li>
      <li class="nav-item <?=$audioActive?>">
        <a class="nav-link" href="index.php?section=audios">Audios</a>
      </li>

    </ul>
    <?php include_once 'form_upload.php'?>
  </div>
</nav>