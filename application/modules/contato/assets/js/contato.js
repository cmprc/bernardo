"use strict";

function Contato() {
  this.init();
  this.submit();
};

Contato.prototype.init = function () {
  var self = this;
};

Contato.prototype.submit = function () {
  $('#contact-form').submit(function (e) {
    e.preventDefault();

    let $form = $(this);
    $form.addClass('loading');

    $.ajax({
      type: "POST",
      url: site_url + 'contato/add_contact',
      data: $form.serialize(),
      dataType: "json",
      success: function (response) {
        console.log(response);

        if (response.status) {
          $form.addClass('active');
          $form.removeClass('loading');
          $form.trigger("reset");

          setTimeout(function () {
            $form.removeClass('active');
          }, 5000);
        }
        else {
          alert(response.message);
        }

        $form.removeClass('loading');

      },
      error: function () { alert("Error posting feed."); }
    });

    // $form.removeClass('loading');

  });
};

$(document).ready(function () {
  new Contato();
});
