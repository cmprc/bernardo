/**
 * js
 *
 * @package ezoom_framework
 * @subpackage main
 * @category js
 * @author
 * @copyright 2016 Ezoom
 */

"use strict";
var app,
    $window = $(window);

function Main() {
    this.init();
};

Main.prototype.colorbox = function(){
    var self = this;

};

Main.prototype.init = function(){
    this.configMenu();
    this.configPlugins();
    this.configForms();

    // para enviar o csrf_token em todas as requisições POST via ajax
    $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
        if ((originalOptions.type === 'POST' || options.type === 'POST') && !options.data.match(/csrf_test_name/g)) {
            if(typeof originalOptions.data == 'string')
                originalOptions.data += '&csrf_test_name='+csrf_test_name;
            else
                originalOptions.data['csrf_test_name'] = csrf_test_name;
            options.data += '&csrf_test_name='+csrf_test_name;
        }
    });
};

Main.prototype.configMenu = function(){
    var self = this;

    $('#open-menu').on('click', function(e){
        $('body').toggleClass('menu-open');
    });
    if (window.innerWidth > window.innerHeight) {
        $('#wrapper').addClass('landscape');
    }

    $(window).on('resize.calcFooter', function(e){
        $('#wrapper').css({paddingBottom: $('#footer').outerHeight(true) });
    }).trigger('resize.calcFooter');

};

Main.prototype.configPlugins = function(){
    $('.lazyload:not(.async)').lazyload();

};


Main.prototype.configForms = function(){

};


$(document).ready(function(){
    app = new Main();
});