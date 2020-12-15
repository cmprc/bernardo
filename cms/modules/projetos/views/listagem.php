<div id="projetos">
  <div class="card">
    <div class="card-header">
      <h4 class="header-title">Projetos</h4>
      <div class="actions">
        <a href="<?php echo site_url('projetos/add'); ?>" class="btn btn-dark btn-xs" title="Cadastrar">
          <i class="las la-plus"></i>
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="single-table">
        <div class="table-responsive">
          <table class="table table-bordered text-center">

            <thead class="text-uppercase">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($items as $key => $item) { ?>
                <tr>
                  <th scope="row"><?php echo $item->id; ?></th>
                  <td><?php echo $item->name; ?></td>
                  <td><?php echo $item->date_formatted; ?></td>
                  <td><?php echo $item->status ? 'Sim' : 'Não'; ?></td>
                  <td>
                    <a href="<?php echo site_url('projetos/edit/' . $item->id); ?>" class="mr-3" title="Editar">
                      <i class="ti-pencil"></i>
                    </a>
                    <a href="<?php echo site_url('projetos/delete/' . $item->id); ?>" title="Remover">
                      <i class="ti-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
