var Projetos = $(function () {

  function Projetos() {
    if (!(this instanceof Projetos)) {
      return new Projetos();
    };
    this.init();
    this.submit();
  };

  // Projetos.prototype = new Main();
  Projetos.prototype.constructor = Projetos;

  Projetos.prototype.init = function () {
    var self = this;
  };

  Projetos.prototype.submit = function () {
    $('#form').submit(function (e) {
      e.preventDefault();

      let $form = $(this);
      let func = $form.data('ctr');

      $.ajax({
        type: "POST",
        url: site_url + 'projetos/' + func,
        data: $form.serialize(),
        dataType: "html",
        success: function (response) {
          var response = JSON.parse(response);

          if (response.status) {
            alert('salvo');
            window.location.href = site_url + 'projetos/index';
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

  // Projetos.prototype.delete = function(){
  //   $('a.detele').on('click', function(e){
  //     e.preventDefault();

  //     let
  //   });
  // };

  return Projetos;
}());
