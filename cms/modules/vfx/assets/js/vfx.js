var Vfx = $(function () {

  function Vfx() {
    if (!(this instanceof Vfx)) {
      return new Vfx();
    };
    this.init();
    this.submit();
  };

  // Vfx.prototype = new Main();
  Vfx.prototype.constructor = Vfx;

  Vfx.prototype.init = function () {
    var self = this;
  };

  Vfx.prototype.submit = function () {
    $('#form').submit(function (e) {
      e.preventDefault();

      let $form = $(this);
      let func = $form.data('ctr');

      $.ajax({
        type: "POST",
        url: site_url + 'vfx/' + func,
        data: $form.serialize(),
        dataType: "html",
        success: function (response) {
          var response = JSON.parse(response);

          if (response.status) {
            alert('salvo');
            window.location.href = site_url + 'vfx/index';
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

  // Vfx.prototype.delete = function(){
  //   $('a.detele').on('click', function(e){
  //     e.preventDefault();

  //     let
  //   });
  // };

  return Vfx;
}());
