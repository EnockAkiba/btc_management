!function(i){"use strict";var a=function(t,s){this.el=i(t),this.options=i.extend({},i.fn.typed.defaults,s),this.text=this.el.text(),this.typeSpeed=this.options.typeSpeed,this.startDelay=this.options.startDelay,this.backSpeed=this.options.backSpeed,this.backDelay=this.options.backDelay,this.strings=this.options.strings,this.strPos=0,this.arrayPos=0,this.stopNum=0,this.loop=this.options.loop,this.loopCount=this.options.loopCount,this.curLoop=0,this.stop=!1,this.build()};a.prototype={constructor:a,init:function(){var t=this;t.timeout=setTimeout(function(){t.typewrite(t.strings[t.arrayPos],t.strPos)},t.startDelay)},build:function(){this.cursor=i('<span class="typed-cursor">|</span>'),this.el.after(this.cursor),this.init()},typewrite:function(o,i){if(!0!==this.stop){var t=Math.round(70*Math.random())+this.typeSpeed,a=this;1==a.arrayPos?(a.stopNum=3,a.backDelay=10):(a.stopNum=0,a.backDelay=a.options.backDelay),a.timeout=setTimeout(function(){var t=0,s=o.substr(i);if("^"===s.charAt(0)){var e=1;s.match(/^\^\d+/)&&(e+=(s=s.replace(/^\^(\d+).*/,"$1")).length,t=parseInt(s)),o=o.substring(0,i)+o.substring(i+e)}a.timeout=setTimeout(function(){if(i===o.length){if(a.options.onStringTyped(a.arrayPos),a.arrayPos===a.strings.length-1&&(a.options.callback(),a.curLoop++,!1===a.loop||a.curLoop===a.loopCount))return;a.timeout=setTimeout(function(){a.backspace(o,i)},a.backDelay)}else 0===i&&a.options.preStringTyped(a.arrayPos),a.el.text(a.text+o.substr(0,i+1)),i++,a.typewrite(o,i)},t)},t)}},backspace:function(t,s){if(!0!==this.stop){var e=Math.round(70*Math.random())+this.backSpeed,o=this;o.timeout=setTimeout(function(){o.el.text(o.text+t.substr(0,s)),s>o.stopNum?(s--,o.backspace(t,s)):s<=o.stopNum&&(o.arrayPos++,o.arrayPos===o.strings.length?(o.arrayPos=0,o.init()):o.typewrite(o.strings[o.arrayPos],s))},e)}},reset:function(){clearInterval(this.timeout);var t=this.el.attr("id");this.el.after('<span id="'+t+'"/>'),this.el.remove(),this.cursor.remove(),this.options.resetCallback()}},i.fn.typed=function(o){return this.each(function(){var t=i(this),s=t.data("typed"),e="object"==typeof o&&o;s||t.data("typed",s=new a(this,e)),"string"==typeof o&&s[o]()})},i.fn.typed.defaults={strings:["These are the default values...","You know what you should do?","Use your own!","Have a great day!"],typeSpeed:0,startDelay:0,backSpeed:0,backDelay:500,loop:!1,loopCount:!1,callback:function(){},preStringTyped:function(){},onStringTyped:function(){},resetCallback:function(){}}}(window.jQuery);