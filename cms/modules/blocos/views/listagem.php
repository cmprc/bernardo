<div id="blocks">
  <div class="card">
    <div class="card-header">
      <h4 class="header-title">Blocos</h4>
      <div class="actions">
        <!-- <a href="<?php echo site_url('blocos/add'); ?>" class="btn btn-dark btn-xs" title="Cadastrar">
          <i class="las la-plus"></i>
        </a> -->
      </div>
    </div>
    <div class="card-body">
      <div class="single-table">
        <div class="table-responsive">
          <table class="table table-bordered text-center">

            <thead class="text-uppercase">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Página</th>
                <th scope="col">Seção</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($items as $key => $item) { ?>
                <tr>
                  <th scope="row"><?php echo $item->id; ?></th>
                  <td><?php echo $item->page; ?></td>
                  <td><?php echo $item->section; ?></td>
                  <td><?php echo $item->status == '1' ? 'Ativo' : 'Inativo'; ?></td>
                  <td>
                    <a href="<?php echo site_url('blocos/edit/' . $item->id); ?>" class="mr-3" title="Editar">
                      <i class="ti-pencil"></i>
                    </a>
                    <a href="<?php echo site_url('blocos/delete/' . $item->id); ?>" title="Remover">
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
