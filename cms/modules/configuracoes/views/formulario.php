<div id="add">
  <form id="form" data-ctr="update">
    <div class="card">

      <input type="hidden" name="id" value="<?php echo isset($item) ? $item->id : ''; ?>">
      <div class="card-header">
        <h4 class="header-title">Configurações</h4>
        <div class="actions">
          <button type="submit" class="btn btn-dark btn-xs mr-1">Salvar</button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group form-row">
          <div class="col-md-6">
            <label for="owner_name" class="col-form-label">Nome</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->name : ''; ?>" name="name" id="owner_name" required>
          </div>
          <div class="col-md-6">
            <label for="owner_email" class="col-form-label">Email</label>
            <input class="form-control" type="email" value="<?php echo isset($item) ? $item->email : ''; ?>" name="email" id="owner_email" required>
          </div>
        </div>
        <div class="form-group form-row">
          <div class="col-md-4">
            <label for="phone" class="col-form-label">Telefone</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->phone : ''; ?>" name="phone" id="phone" data-mask="(000) 000000009">
          </div>
          <div class="col-md-4">
            <label for="whatsapp" class="col-form-label">Whatsapp</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->whatsapp : ''; ?>" name="whatsapp" id="whatsapp" data-mask="(000) 000000009">
          </div>
          <div class="col-md-4">
            <label for="instagram" class="col-form-label">Instagram</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->instagram : ''; ?>" name="instagram" id="instagram">
          </div>
        </div>
        <div class="form-group form-row">
          <div class="col-md-4">
            <label for="behance" class="col-form-label">Behance</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->behance : ''; ?>" name="behance" id="behance">
          </div>
          <div class="col-md-4">
            <label for="linkedin" class="col-form-label">Linkedin</label>
            <input class="form-control" type="text" value="<?php echo isset($item) ? $item->linkedin : ''; ?>" name="linkedin" id="linkedin">
          </div>
        </div>
      </div>

    </div>
  </form>
</div>
