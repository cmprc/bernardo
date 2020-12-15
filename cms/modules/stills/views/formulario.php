<div id="add">
  <div class="card">

    <form id="form" data-ctr="<?php echo isset($item) ? 'update' : 'insert'; ?>">
      <input type="hidden" name="id" value="<?php echo isset($item) ? $item->id : ''; ?>">
      <div class="card-header">
        <h4 class="header-title"><?php echo !isset($item) ? 'Novo' : ''; ?> Still</h4>
        <div class="actions">
          <a href="<?php echo site_url('stills'); ?>" class="btn btn-light btn-xs mr-1">Cancelar</a>
          <button type="submit" class="btn btn-dark btn-xs mr-1">Salvar</button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="still_name" class="col-form-label">Nome</label>
          <input class="form-control" type="text" value="<?php echo isset($item) ? $item->name : ''; ?>" name="name" id="still_name">
        </div>
        <div class="form-group">
          <label for="still_description" class="col-form-label">Descrição</label>
          <input class="form-control" type="text" value="<?php echo isset($item) ? $item->description : ''; ?>" name="description" id="still_description">
        </div>
        <div class="form-group">
          <label for="still_link" class="col-form-label">Link</label>
          <input class="form-control" type="text" value="<?php echo isset($item) ? $item->link : ''; ?>" name="link" id="still_link">
        </div>
        <div class="form-group">
          <label for="still_images" class="col-form-label">Imagens</label>
          <input class="form-control" type="file" value="<?php echo ''; ?>" name="images[]" multiple id="images">
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <label for="still_author" class="col-form-label">Autor</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->author : ''; ?>" name="author" id="still_author">
          </div>
          <div class="col-md-6">
            <label for="still_date" class="col-form-label ">Data</label>
            <input class="form-control" type="date" value="<?php echo isset($item) ? $item->date : ''; ?>" name="date" id="still_date">
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
