/**
 * js
 *
 * @package ezoom_framework
 * @subpackage home
 * @category js
 * @author Diogo Taparello
 * @copyright 2016 Ezoom
 */
var Home = $(function() {

    function Home() {
        if (!(this instanceof Home)) {
            return new Home();
        };
        this.init();
    };

    Home.prototype = new Main();
    Home.prototype.constructor = Home;

    Home.prototype.init = function() {
        var self = this;
    };

    return Home;
}());
