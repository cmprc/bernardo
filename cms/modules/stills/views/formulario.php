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
        <!-- <div class="form-group">
          <label for="still_images" class="col-form-label">Imagens</label>
          <input class="form-control dropzone" type="file" name="images[]" multiple id="images">
        </div> -->
        <div class="form-group">
        <div class="upload-container">
          <div class="imagesUpload">
                                <?php if (isset($item->images) && !empty($item->images)) { ?>
                                <?php foreach($item->images as $key => $image){ ?>
                                      <div>
                                          <img src="<?php echo base_url('image/resize?w=200&h=102&q=100&src=../userfiles/stills/' . $image->file_name) ?>">
                                          <span class="del-image"><i class="ti-close"></i></span>
                                          <input type="hidden" name="images_uploaded[<?php echo $key; ?>]" value="<?php echo $image->id; ?>">
                                      </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="upload-action">
                                <input type="file" name="images[]" multiple accept="image/*" class="upload-input"/>
                                <button type="button" class="btn btn-upload">ANEXAR</button>
                            </div>
                        </div>
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
