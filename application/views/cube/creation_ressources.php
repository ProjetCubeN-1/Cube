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
        <input class="form-control form-control-lg" id="texxt" name="texxt">
    </input>
    <button class="btn btn-dark">Publier</button>
      </form>
    </div>
  </div>
</div>