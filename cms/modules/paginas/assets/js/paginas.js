var Configuracoes = $(function () {

  function Configuracoes() {
    if (!(this instanceof Configuracoes)) {
      return new Configuracoes();
    };
    this.init();
    this.submit();
  };

  Configuracoes.prototype.constructor = Configuracoes;

  Configuracoes.prototype.init = function () {
    var self = this;
  };

  Configuracoes.prototype.submit = function () {
    $('#form').submit(function (e) {
      e.preventDefault();

      let $form = $(this);
      let func = $form.data('ctr');

      $.ajax({
        type: "POST",
        url: site_url + 'configuracoes/' + func,
        data: $form.serialize(),
        dataType: "html",
        success: function (response) {
          var response = JSON.parse(response);

          if (response.status) {
            alert('salvo');
            window.location.reload();
          }
          else {
            for (item in response.response) {
              alert(response.response[item]);
            }
          }

        },
        error: function () { alert("Error."); }
      });

    });
  };

  return Configuracoes;
}());
