var Stills = $(function () {

    function Stills() {
        if (!(this instanceof Stills)) {
            return new Stills();
        };
        this.init();
        this.submit();
    };

    Stills.prototype.constructor = Stills;

    Stills.prototype.init = function () {
        var self = this;
        var $form = $('#form');
        var id = $form.find('[name=id]').val();

    };

    Stills.prototype.submit = function () {
        $('#form').submit(function (e) {
            e.preventDefault();

            let $form = $(this);
            let func = $form.data('ctr');

            var formData = new FormData($form[0]);

            $.ajax({
                url: site_url + 'stills/' + func,
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    var response = JSON.parse(response);

                    if (response.status) {
                        alert('salvo');
                        window.location.href = site_url + 'stills/index';
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

    return Stills;
}());
