var Usuarios = $(function () {

  function Usuarios() {
    if (!(this instanceof Usuarios)) {
      return new Usuarios();
    };
    this.init();
    this.submit();
  };

  // Usuarios.prototype = new Main();
  Usuarios.prototype.constructor = Usuarios;

  Usuarios.prototype.init = function () {
    var self = this;
  };

  Usuarios.prototype.submit = function () {
    $('#form').submit(function (e) {
      e.preventDefault();

      let $form = $(this);
      let func = $form.data('ctr');

      $.ajax({
        type: "POST",
        url: site_url + 'usuarios/' + func,
        data: $form.serialize(),
        dataType: "html",
        success: function (response) {
          var response = JSON.parse(response);

          if (response.status) {
            alert('salvo');
            window.location.href = site_url + 'usuarios';
          }
          else {
            for (item in response.response) {
              alert(response.response[item]);
            }
          }

        },
        error: function () { alert("Error posting feed."); }
      });

    });
  };

  return Usuarios;
}());
