  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalhes do contato</h5>
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
      </div>
      <div class="modal-body">
        <?php if (!empty($item->name)) { ?>
          <div class="line name">Nome: <?php echo $item->name; ?></div>
        <?php }
        if (!empty($item->email)) { ?>
          <div class="line email">Email: <?php echo $item->email; ?></div>
        <?php }
        if (!empty($item->subject)) { ?>
          <div class="line subject">Assunto: <?php echo $item->subject; ?></div>
        <?php }
        if (!empty($item->message)) { ?>
          <div class="line message">Mensagem: <?php echo $item->message; ?></div>
        <?php } ?>
        <div class="line date">Enviado dia <?php echo $item->date_formatted; ?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Fechar</button>
        <?php if (!empty($item->email)) { ?>
          <a href="mailto:<?php echo $item->email; ?>" class="btn btn-primary btn-xs">Responder</a>
        <?php } ?>
      </div>
    </div>
  </div>
