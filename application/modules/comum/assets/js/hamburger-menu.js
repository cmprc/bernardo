/*==============================================================
    pull menu
 ==============================================================*/

(function () {

    var $body = $('body'),
        isOpen = false;

    function init() {
        // abre menu
        $(document).on('click', '#open-button', function (e) {
            e.preventDefault();
            toggleMenu();
        });

        // fecha menu
        $(document).on('click', 'body.show-menu', function (e) {
            var container = $("body.show-menu #menu-options");

            if (!container.is(e.target) && container.has(e.target).length === 0) {
                toggleMenu();
            }
        });
    }

    function toggleMenu() {

        if (isOpen) {
            $body.removeClass('show-menu');
            $body.removeClass('overflow-hidden');
            $body.removeClass('position-relative');
        }
        else {
            $body.addClass('show-menu');
            $body.addClass('overflow-hidden');
            $body.addClass('position-relative');

        }
        isOpen = !isOpen;
    }

    init();

})();