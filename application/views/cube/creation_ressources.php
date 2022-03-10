<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>

<div class="container">
  <div class="card">
    <div class="card-header">
      Créer une ressource
    </div>
    <div class="card-body">
      <form method="post" action="/cube/publier_ressources">
        <textarea id="mytextarea" name="mytextarea">
    </textarea>
    <button class="btn btn-dark">Publier</button>
      </form>
    </div>
  </div>
</div>