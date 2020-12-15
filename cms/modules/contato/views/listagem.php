<div id="contato">
  <div class="card">
    <div class="card-header">
      <h4 class="header-title">Contatos</h4>
      <div class="actions">
        <a href="<?php echo site_url('contato/export'); ?>" class="btn btn-dark btn-xs" title="Exportar">
          <i class="las la-file-csv"></i>
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
                <th scope="col">Ações</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($items as $key => $item) { ?>
                <tr data-id="<?php echo $item->id; ?>">
                  <th scope="row"><?php echo $item->id; ?></th>
                  <td><?php echo $item->name; ?></td>
                  <td><?php echo $item->date_formatted; ?></td>
                  <td>
                    <span class="mr-3 open-modal" data-toggle="modal" title="Abrir">
                      <i class="lar la-envelope-open"></i>
                    </span>
                    <a href="<?php echo site_url('contato/delete/' . $item->id); ?>" title="Remover">
                      <i class="ti-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
      <div class="modal fade" id="contact-details" style="display: none;" aria-hidden="true">

      </div>
    </div>
  </div>
</div>
