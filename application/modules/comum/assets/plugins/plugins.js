// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function f(){ log.history = log.history || []; log.history.push(arguments); if(this.console) { var args = arguments, newarr; try { args.callee = f.caller } catch(e) {}; newarr = [].slice.call(args); if (typeof console.log === 'object') log.apply.call(console.log, console, newarr); else console.log.apply(console, newarr);}};

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

// jQuery easing 1.3
jQuery.easing.jswing=jQuery.easing.swing;
jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,a,c,b,d){return jQuery.easing[jQuery.easing.def](e,a,c,b,d)},easeInQuad:function(e,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(e,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a+c:-b/2*(--a*(a-2)-1)+c},easeInCubic:function(e,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(e,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a+c:
b/2*((a-=2)*a*a+2)+c},easeInQuart:function(e,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(e,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a+c:-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(e,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(e,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a*a+c:b/2*((a-=2)*a*a*a*a+2)+c},easeInSine:function(e,a,c,b,d){return-b*Math.cos(a/
d*(Math.PI/2))+b+c},easeOutSine:function(e,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(e,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(e,a,c,b,d){return 0==a?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(e,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(e,a,c,b,d){return 0==a?c:a==d?c+b:1>(a/=d/2)?b/2*Math.pow(2,10*(a-1))+c:b/2*(-Math.pow(2,-10*--a)+2)+c},easeInCirc:function(e,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*
a)-1)+c},easeOutCirc:function(e,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(e,a,c,b,d){return 1>(a/=d/2)?-b/2*(Math.sqrt(1-a*a)-1)+c:b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f))+c},easeOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==
(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(2==(a/=d/2))return c+b;f||(f=d*0.3*1.5);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return 1>a?-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+c:0.5*g*Math.pow(2,-10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInBack:function(e,a,c,b,d,f){void 0==
f&&(f=1.70158);return b*(a/=d)*a*((f+1)*a-f)+c},easeOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return b*((a=a/d-1)*a*((f+1)*a+f)+1)+c},easeInOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return 1>(a/=d/2)?b/2*a*a*(((f*=1.525)+1)*a-f)+c:b/2*((a-=2)*a*(((f*=1.525)+1)*a+f)+2)+c},easeInBounce:function(e,a,c,b,d){return b-jQuery.easing.easeOutBounce(e,d-a,0,b,d)+c},easeOutBounce:function(e,a,c,b,d){return(a/=d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?
b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(e,a,c,b,d){return a<d/2?0.5*jQuery.easing.easeInBounce(e,2*a,0,b,d)+c:0.5*jQuery.easing.easeOutBounce(e,2*a-d,0,b,d)+0.5*b+c}});
/*
 Color animation jQuery-plugin
 http://www.bitstorm.org/jquery/color-animation/
 Copyright 2011 Edwin Martin <edwin@bitstorm.org>
 Released under the MIT and GPL licenses.
*/
(function(d){function i(){var b=d("script:first"),a=b.css("color"),c=false;if(/^rgba/.test(a))c=true;else try{c=a!=b.css("color","rgba(0, 0, 0, 0.5)").css("color");b.css("color",a)}catch(e){}return c}function g(b,a,c){var e="rgb"+(d.support.rgba?"a":"")+"("+parseInt(b[0]+c*(a[0]-b[0]),10)+","+parseInt(b[1]+c*(a[1]-b[1]),10)+","+parseInt(b[2]+c*(a[2]-b[2]),10);if(d.support.rgba)e+=","+(b&&a?parseFloat(b[3]+c*(a[3]-b[3])):1);e+=")";return e}function f(b){var a,c;if(a=/#([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})/.exec(b))c=
[parseInt(a[1],16),parseInt(a[2],16),parseInt(a[3],16),1];else if(a=/#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])/.exec(b))c=[parseInt(a[1],16)*17,parseInt(a[2],16)*17,parseInt(a[3],16)*17,1];else if(a=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(b))c=[parseInt(a[1]),parseInt(a[2]),parseInt(a[3]),1];else if(a=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9\.]*)\s*\)/.exec(b))c=[parseInt(a[1],10),parseInt(a[2],10),parseInt(a[3],10),parseFloat(a[4])];return c}
d.extend(true,d,{support:{rgba:i()}});var h=["color","backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","outlineColor"];d.each(h,function(b,a){d.fx.step[a]=function(c){if(!c.init){c.a=f(d(c.elem).css(a));c.end=f(c.end);c.init=true}c.elem.style[a]=g(c.a,c.end,c.pos)}});d.fx.step.borderColor=function(b){if(!b.init)b.end=f(b.end);var a=h.slice(2,6);d.each(a,function(c,e){b.init||(b[e]={a:f(d(b.elem).css(e))});b.elem.style[e]=g(b[e].a,b.end,b.pos)});b.init=true}})(jQuery);
/*
* Placeholder plugin for jQuery
* ---
* Copyright 2010, Daniel Stocks (http://webcloud.se)
* Released under the MIT, BSD, and GPL Licenses.
*/
(function(b){function d(a){this.input=a;a.attr("type")=="password"&&this.handlePassword();b(a[0].form).submit(function(){if(a.hasClass("placeholder")&&a[0].value==a.attr("placeholder"))a[0].value=""})}d.prototype={show:function(a){if(this.input[0].value===""||a&&this.valueIsPlaceholder()){if(this.isPassword)try{this.input[0].setAttribute("type","text")}catch(b){this.input.before(this.fakePassword.show()).hide()}this.input.addClass("placeholder");this.input[0].value=this.input.attr("placeholder")}},
hide:function(){if(this.valueIsPlaceholder()&&this.input.hasClass("placeholder")&&(this.input.removeClass("placeholder"),this.input[0].value="",this.isPassword)){try{this.input[0].setAttribute("type","password")}catch(a){}this.input.show();this.input[0].focus()}},valueIsPlaceholder:function(){return this.input[0].value==this.input.attr("placeholder")},handlePassword:function(){var a=this.input;a.attr("realType","password");this.isPassword=!0;if(b.browser.msie&&a[0].outerHTML){var c=b(a[0].outerHTML.replace(/type=(['"])?password\1/gi,
"type=$1text$1"));this.fakePassword=c.val(a.attr("placeholder")).addClass("placeholder").focus(function(){a.trigger("focus");b(this).hide()});b(a[0].form).submit(function(){c.remove();a.show()})}}};var e=!!("placeholder"in document.createElement("input"));b.fn.placeholder=function(){return e?this:this.each(function(){var a=b(this),c=new d(a);c.show(!0);a.focus(function(){c.hide()});a.blur(function(){c.show(!1)});b.browser.msie&&(b(window).on('load',function(){a.val()&&a.removeClass("placeholder");c.show(!0)}),
a.focus(function(){if(this.value==""){var a=this.createTextRange();a.collapse(!0);a.moveStart("character",0);a.select()}}))})}})(jQuery);
// Browser History
(function(){var e,t;jQuery.uaMatch=function(e){e=e.toLowerCase();var t=/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||e.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[];return{browser:t[1]||"",version:t[2]||"0"}};e=jQuery.uaMatch(navigator.userAgent);t={};if(e.browser){t[e.browser]=true;t.version=e.version}if(t.chrome){t.webkit=true}else if(t.webkit){t.safari=true}jQuery.browser=t})();
/* Lazyload (v1.6.0) by Ralf da Rocha */
!function(t,i,e,s){var n="lazyload",o={autoload:!0,background:!1,beforeLoad:null,class:"lazyload-image",onLoad:null,time:0,mobileBreakpoint:960,viewport:!1};function a(i,e){this.element=i,this.settings=t.extend({},o,e),this._defaults=o,this._name=n,this._timeout="",this._originalSrc="",this._init()}t.extend(a.prototype,{_init:function(){t(this.element).addClass("loading").data("status","waiting");var i=t(this.element).data();this._originalSrc=t(this.element).data("src"),t.each(i,t.proxy(function(t,i){void 0!==this.settings[t]&&(this.settings[t]=i)},this)),this._resize(),this.settings.autoload&&!this.settings.viewport?this.load():this.settings.autoload&&this.settings.viewport&&this._scroll()},_guid:function(){var t=(9999999999*Math.random()+9999999999*(1+Math.random())).toString();if(t.length>8){var i=Math.floor(Math.random()*(t.length-8));t=t.substring(i,i+8)}return t.length<8?("00000000".substring(0,8-t.length)+t).toString():t},_loadImg:function(i,e){t("<img/>",{src:i}).on("load",function(){if("function"==typeof e)return e(this)})},_scroll:function(){this.uid=this._guid()+this._guid(),t(i).on("scroll."+this.uid,t.proxy(function(){var e=t(this.element).offset().top,s=e+t(this.element).outerHeight();viewportMin=t(i).scrollTop(),viewportMax=viewportMin+t(i).height(),viewportMin<=s&&viewportMax>=e&&(this.load(),t(i).off("scroll."+this.uid).off("resize."+this.uid))},this)).on("resize."+this.uid,t.proxy(function(){t(i).trigger("scroll."+this.uid)},this)).trigger("scroll."+this.uid)},_resize:function(){if(!t(this.element).data("mobile"))return!1;if(this.uid=this._guid()+this._guid(),"undefined"==t(this.element).data("mobile"))return!1;var e=$window.outerWidth()>this.settings.mobileBreakpoint;t(i).on("resize."+this.uid,t.proxy(function(){e&&t(i).outerWidth()>this.settings.mobileBreakpoint?(e=!1,this.reload()):!e&&t(i).outerWidth()<=this.settings.mobileBreakpoint&&(e=!0,this.reload())},this)).on("resize."+this.uid,t.proxy(function(){t(i).trigger("scroll."+this.uid)},this)).trigger("resize."+this.uid)},load:function(){if("waiting"!==t(this.element).data("status"))return!1;clearTimeout(this._timeout),t(this.element).data("status","loading"),"function"==typeof this.settings.beforeLoad&&this.settings.beforeLoad(this.element);var e=t(this.element).attr("src")?t(this.element).attr("src"):this._originalSrc;if(t(this.element).data("mobile")&&t(i).outerWidth()<=this.settings.mobileBreakpoint)e=t(this.element).data("mobile");var s=e?e.split("?")[1]:i.location.search.slice(1);if(s){for(var n=s.split("&"),o={},a=0;a<n.length;a++){var r=n[a].split("=");o[r[0]]=decodeURIComponent(r[1])}var l=o.w/o.h,h=Math.round(t(this.element).width()/l)/t(this.element).width()*100;0==t(this.element).find(".preloader").length?t(this.element).prepend('<div class="preloader" style="padding-bottom:'+h+'%"></div>'):t(this.element).find("preloader").css("padding-bottom",h)}this._loadImg(e,t.proxy(function(i){var e=this.settings.background?t('<div style="background-image: url('+i.src+')" />'):t(i);e.addClass(this.settings.class),void 0!==t(this.element).data("alt")&&e.attr("alt",t(this.element).data("alt")),t(this.element).prepend(e),setTimeout(t.proxy(function(){t(this.element).removeClass("loading").addClass("loaded").data("status","loaded").find(".preloader").remove(),"function"==typeof this.settings.onLoad&&this.settings.onLoad(e)},this),50),t(this.element).removeAttr("data-src").removeAttr("data-alt")},this))},unload:function(i){if("waiting"===t(this.element).data("status"))return!1;this.destroy(),t(this.element).removeClass("loaded").addClass("loading").data("status","waiting"),this.settings.time>0?this._timeout=setTimeout(t.proxy(function(){t(this.element).children("."+this.settings.class).remove(),void 0!==i&&!0===i&&this.load()},this),this.settings.time):(t(this.element).children("."+this.settings.class).remove(),void 0!==i&&!0===i&&this.load())},reload:function(){if("waiting"===t(this.element).data("status"))return this.load();this.unload(!0)},destroy:function(){this.settings.viewport&&"waiting"!==t(this.element).data("status")&&t(i).off("scroll."+this.uid)},start:function(){this.settings.viewport&&"waiting"===t(this.element).data("status")&&this._scroll()}}),t.fn[n]=function(i){return this.each(function(){if(t.data(this,"plugin_"+n)){var e=t(this).data("plugin_"+n);if("object"==typeof i||!i)return this;if(e&&0!=i.indexOf("_")&&e[i]&&"function"==typeof e[i])return e[i](Array.prototype.slice.call(arguments,1));e?0==i.indexOf("_")?t.error("Method "+i+" is private!"):t.error("Method "+i+" does not exist."):t.error("Plugin must be initialised before using method: "+i)}else t.data(this,"plugin_"+n,new a(this,i))}),this}}(jQuery,window,document);
/*
Prefilter Ajax
CSRF Protection
envia o csrf_token em todas as requisições POST via ajax
*/
$.ajaxPrefilter(function(options, originalOptions) {
    if(typeof options.data == "undefined" || options.data == null){
        options.data = '';
    }
    if ( options.type.toUpperCase() === 'POST') {
        if(typeof options.data == 'string') {
            options.data += '&csrf_test_name='+csrf_test_name;
        } else {
            options.data['csrf_test_name'] = csrf_test_name;
        }
        if (options.data instanceof FormData) {
             options.data.append('csrf_test_name', csrf_test_name);
        }
    }
});
