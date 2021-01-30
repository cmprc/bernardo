var Blocos = $(function () {

    var filesUpload = [];

    function Blocos() {
        if (!(this instanceof Blocos)) {
            return new Blocos();
        };
        this.init();
        this.submit();
        this.upload_events();
    };

    Blocos.prototype.constructor = Blocos;

    Blocos.prototype.init = function () {
        var self = this;
    };

    Blocos.prototype.upload_events = function () {
        let $self = this;

        $('.btn-upload').on("click", function (e) {
            e.preventDefault();
            $(this).parent().find('.upload-input').trigger('click');
        });

        $('.upload-container').on("click", '.del-image', function (e) {
            e.preventDefault();
            let input = $(this).parents('.upload-container').find('.upload-input');
            input.val('');
            $(this).parent().remove();
        });

        $('.upload-input').on('change', function () {
            var files = this.files;

            if (!$(this).attr('multiple')) {
                $(this).parents('.upload-container').find('.imagesUpload div').remove();
            }
            $self.uploadFile(files, this);
        });
    };

    Blocos.prototype.uploadFile = function (files, el) {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            filesUpload.push(file);
            var index = filesUpload.length - 1;
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }

            $(el).prop('files', files);

            var img = document.createElement('img');
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg, idx) {
                return function (e) {
                    aImg.src = e.target.result;
                    var div = document.createElement('div');
                    $(div).append(aImg);
                    $(div).append('<span class="del-image" data-idx="' + idx + '"><i class="ti-close"></i><span>');
                    $(el).parents('.upload-container').find('.imagesUpload').append(div);
                    $(aImg).fadeIn();
                };
            })(img, index);
            reader.readAsDataURL(file);
        }
    };

    Blocos.prototype.submit = function () {
        $('#form').on('submit', function (e) {
            e.preventDefault();

            let $form = $(this);
            let func = $form.data('ctr');

            var formData = new FormData($form[0]);

            $.ajax({
                url: site_url + 'blocos/' + func,
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    console.log(response);

                    if (response.status) {
                        alert('salvo');
                        window.location.href = site_url + 'blocos/index';
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

    return Blocos;
}());
