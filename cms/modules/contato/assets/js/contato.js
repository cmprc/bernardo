var Contato = $(function () {

  function Contato() {
    if (!(this instanceof Contato)) {
      return new Contato();
    };

    this.init();
    this.openModal();
  };

  Contato.prototype.constructor = Contato;

  Contato.prototype.init = function () {
    var self = this;
  };

  Contato.prototype.openModal = function () {
    $('.open-modal').on('click', function () {

      let $modal = $('#contact-details');
      let id = $(this).parents('tr').data('id');

      if(id.length == 0){
        return false;
      }

      // carrega html no modal e o abre
      $modal.load(site_url + 'contato/open', {id: id}, function(){
        $modal.modal();
      });

    });
  };

  return Contato;
}());
