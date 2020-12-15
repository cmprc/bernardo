<div id="data" class="card">
  <div class="card-body">
    <h4 class="header-title">Dados gerais</h4>
    <div class="form-row mt-4">
      <div class="col-md-6 mb-2">
        <div class="card">
          <div class="seo-fact sbg2">
            <div class="p-4 d-flex justify-content-between align-items-center">
              <div class="seofct-icon"><i class="ti-calendar"></i> Hoje</div>
              <h2><?php echo date('d.m.Y'); ?></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-2">
        <div class="card">
          <div class="seo-fact sbg1">
            <div class="p-4 d-flex justify-content-between align-items-center">
              <div class="seofct-icon"><i class="ti-email"></i> Contatos</div>
              <h2><?php echo $data['contacts']; ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="projects" class="card mt-4">
  <div class="card-body">
    <h4 class="header-title">Últimos Projetos</h4>
    <div class="table-responsive">
      <table class="dbkit-table">
        <tbody>
          <tr class="heading-td">
            <td width="250">Nome</td>
            <td>Descrição</td>
            <td>Status</td>
            <td>Última modificação</td>
            <td>Caminho</td>
          </tr>
          <?php foreach ($items as $item) { ?>
            <tr>
              <td width="250"><?php echo $item->name; ?></td>
              <td><?php echo !empty($item->description) ? $item->description : '-' ?></td>
              <td><?php echo $item->status === 1 ? 'Ativo' : 'Inativo'; ?></td>
              <td><?php echo isset($item->updated_formatted) ? $item->updated_formatted : $item->date_formatted; ?></td>
              <td><a href="<?php echo site_url('projetos/edit/' . $item->id); ?>"><i class="ti-eye" title="Ver"></i></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
