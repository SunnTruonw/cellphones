!function(a,b){a.extend({lockfixed:function(b,c){c&&c.offset?(c.offset.bottom=parseInt(c.offset.bottom,10),c.offset.top=parseInt(c.offset.top,10)):c.offset={bottom:100,top:0};var b=a(b);if(b&&b.offset()){var d=b.css("position"),e=parseInt(b.css("marginTop"),10),f=b.css("top"),g=b.offset().top,h=!1;(c.forcemargin===!0||navigator.userAgent.match(/\bMSIE (4|5|6)\./)||navigator.userAgent.match(/\bOS ([0-9])_/)||navigator.userAgent.match(/\bAndroid ([0-9])\./i))&&(h=!0),b.wrap("<div class='lf-ghost' style='height:"+b.outerHeight()+"px;display:"+b.css("display")+"'></div>"),a(window).bind("DOMContentLoaded load scroll resize orientationchange lockfixed:pageupdate",b,function(i){if(!h||!document.activeElement||"INPUT"!==document.activeElement.nodeName){var j=0,k=b.outerHeight(),l=b.parent().innerWidth()-parseInt(b.css("marginLeft"),10)-parseInt(b.css("marginRight"),10),m=a(document).height()-c.offset.bottom,n=a(window).scrollTop();"fixed"===b.css("position")||h||(g=b.offset().top,f=b.css("top")),n>=g-(e?e:0)-c.offset.top?(j=m<n+k+e+c.offset.top?n+k+e+c.offset.top-m:0,h?b.css({marginTop:parseInt(n-g-j,10)+2*c.offset.top+"px"}):b.css({position:"fixed",top:c.offset.top-j+"px",width:l+"px"})):b.css({position:d,top:f,width:l+"px",marginTop:(e&&!h?e:0)+"px"})}})}}})}(jQuery);