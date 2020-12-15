<div id="add">
  <div class="card">

    <form id="form" data-ctr="<?php echo isset($item) ? 'update' : 'insert'; ?>">
      <input type="hidden" name="id" value="<?php echo isset($item) ? $item->id : ''; ?>">
      <div class="card-header">
        <h4 class="header-title"><?php echo !isset($item) ? 'Novo' : ''; ?> Usuario</h4>
        <div class="actions">
          <a href="<?php echo site_url('usuarios'); ?>" class="btn btn-light btn-xs mr-1">Cancelar</a>
          <button type="submit" class="btn btn-dark btn-xs mr-1">Salvar</button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="project_name" class="col-form-label">Nome</label>
          <input class="form-control" type="text" value="<?php echo isset($item) ? $item->name : ''; ?>" name="name" id="project_name">
        </div>
        <div class="form-group">
          <label for="project_date" class="col-form-label ">Data</label>
          <input class="form-control" type="date" value="<?php echo isset($item) ? $item->date : ''; ?>" name="date" id="project_date">
        </div>
      </div>
    </form>

  </div>
</div>
