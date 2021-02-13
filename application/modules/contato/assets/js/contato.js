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

        $.ajax({
            type: "POST",
            url: site_url + 'contato/add_contact',
            data: $form.serialize(),
            dataType: "json",
            beforeSend: function () {
                $form.addClass('loading');
            },
            success: function (response) {
                if (response.status) {
                    $form.addClass('active');
                    $form.removeClass('loading');
                    $form.trigger("reset");
                }
                else {
                    alert(response.message);
                }
            },
            complete: function () {
                $form.removeClass('loading');

                setTimeout(function () {
                    $form.removeClass('active');
                }, 5000);
            },
            error: function () { alert("Ocorreu algum erro. Tente novamente mais tarde!"); }
        });

        // $form.removeClass('loading');

    });
};

$(document).ready(function () {
    new Contato();
});
