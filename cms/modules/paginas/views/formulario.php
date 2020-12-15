<div id="add">
  <form id="form" data-ctr="update">
    <div class="card">
      <div class="card-header">
        <h4 class="header-title">Páginas</h4>
        <div class="actions">
          <button type="submit" class="btn btn-dark btn-xs mr-1">Salvar</button>
        </div>
      </div>
      <div class="card-body">
        <div class="according accordion-s3">

          <?php foreach ($pages as $key => $page) { ?>
            <div class="card">
              <div class="card-header">
                <a class="card-link <?php echo $key === 0 ? '' : 'collapsed'; ?>" data-toggle="collapse" href="#<?php echo $page->slug; ?>"><?php echo $page->title; ?></a>
              </div>
              <div id="<?php echo $page->slug; ?>" class="collapse <?php echo $key === 0 ? 'show' : ''; ?>">
                <div class="card-body">

                  <div class="form-group form-row">
                    <div class="col-md-6">
                      <label for="meta-title-<?php echo $key; ?>" class="col-form-label">Título</label>
                      <input class="form-control" type="text" value="<?php echo isset($page) ? $page->meta_title : ''; ?>" name="page[<?php echo $key; ?>][meta_title]" id="meta-title-<?php echo $key; ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label for="keywords-<?php echo $key; ?>" class="col-form-label">Palavras-chave</label>
                      <input class="form-control" type="email" value="<?php echo isset($page) ? $page->keywords : ''; ?>" name="page[<?php echo $key; ?>][keywords]" id="keywords-<?php echo $key; ?>" required>
                    </div>
                    <div class="col-md-12">
                      <label for="meta-descriptio-<?php echo $key; ?>" class="col-form-label">Descrição</label>
                      <input class="form-control" type="email" value="<?php echo isset($page) ? $page->meta_description : ''; ?>" name="page[<?php echo $key; ?>][meta_description]" id="meta-descriptio-<?php echo $key; ?>" required>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </form>
</div>
