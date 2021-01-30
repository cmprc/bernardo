<div id="add">
  <div class="card">

    <form id="form" method="POST" data-ctr="<?php echo isset($item) ? 'update' : 'insert'; ?>">
      <input type="hidden" name="id" value="<?php echo isset($item) ? $item->id : ''; ?>">
      <div class="card-header">
        <h4 class="header-title"><?php echo !isset($item) ? 'Novo' : ''; ?> Bloco</h4>
        <div class="actions">
          <a href="<?php echo site_url('blocos'); ?>" class="btn btn-light btn-xs mr-1">Cancelar</a>
          <button type="submit" class="btn btn-dark btn-xs mr-1">Salvar</button>
        </div>
      </div>
      <div class="card-body">

        <div class="form-group form-row">
          <div class="col-md-6">
            <label for="block_page" class="col-form-label">Página</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->page : ''; ?>" name="page" id="block_page" <?php echo isset($item) ? 'readonly' : ''; ?>>
          </div>
          <div class="col-md-6">
            <label for="block_section" class="col-form-label">Seção</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->section : ''; ?>" name="section" id="block_section" <?php echo isset($item) ? 'readonly' : ''; ?>>
          </div>
        </div>

        <div class="form-group">
          <label for="block_title" class="col-form-label">Título</label>
          <input class="form-control" type="text" value="<?php echo isset($item) ? $item->title : ''; ?>" name="title" id="block_title">
        </div>

        <div class="form-group">
          <label for="block_subtitle" class="col-form-label">Subtítulo</label>
          <input class="form-control" type="text" value="<?php echo isset($item) ? $item->subtitle : ''; ?>" name="subtitle" id="block_subtitle">
        </div>

        <div class="form-group">
          <label for="block_text" class="col-form-label">Texto</label>
          <textarea class="editor" id="block_text" name="text">
            <?php echo isset($item) ? $item->text : ''; ?>
          </textarea>
        </div>

        <div class="form-group">
          <label for="block_link" class="col-form-label">Link</label>
          <input class="form-control" type="text" value="<?php echo isset($item) ? $item->link : ''; ?>" name="link" id="block_link">
        </div>

        <div class="form-group">
            <div class="upload-container">
                <div class="imagesUpload">
                    <?php if (isset($item->image) && !empty($item->image)) { ?>
                        <div>
                            <img src="<?php echo base_url('image/resize?w=200&h=102&q=100&src=../userfiles/blocos/' . $item->image) ?>">
                            <span class="del-image"><i class="ti-close"></i></span>
                            <input type="hidden" name="image_uploaded" value="<?php echo $item->image; ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="upload-action">
                    <input type="file" name="image" accept="image/*" class="upload-input"/>
                    <button type="button" class="btn btn-upload">ANEXAR</button>
                </div>
            </div>
        </div>

      </div>
    </form>

  </div>
</div>
