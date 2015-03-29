!function(){function t(){}function e(t){return h.retinaImageSuffix+t}function i(t,i){if(this.path=t||"","undefined"!=typeof i&&null!==i)this.at_2x_path=i,this.perform_check=!1;else{if(void 0!==document.createElement){var n=document.createElement("a");n.href=this.path,n.pathname=n.pathname.replace(o,e),this.at_2x_path=n.href}else{var a=this.path.split("?");a[0]=a[0].replace(o,e),this.at_2x_path=a.join("?")}this.perform_check=!0}}function n(t){this.el=t,this.path=new i(this.el.getAttribute("src"),this.el.getAttribute("data-at2x"));var e=this;this.path.check_2x_variant(function(t){t&&e.swap()})}var a="undefined"==typeof exports?window:exports,h={retinaImageSuffix:"@2x",check_mime_type:!0,force_original_dimensions:!0};a.Retina=t,t.configure=function(t){null===t&&(t={});for(var e in t)t.hasOwnProperty(e)&&(h[e]=t[e])},t.init=function(t){null===t&&(t=a);var e=t.onload||function(){};t.onload=function(){var t=document.getElementsByTagName("img"),i=t.length,a=[],h,o;for(h=0;i>h;h+=1)o=t[h],o.getAttributeNode("data-no-retina")||o.src&&a.push(new n(o));e()}},t.isRetina=function(){var t="(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx)";return a.devicePixelRatio>1?!0:a.matchMedia&&a.matchMedia(t).matches?!0:!1};var o=/\.\w+$/;a.RetinaImagePath=i,i.confirmed_paths=[],i.prototype.is_external=function(){return!(!this.path.match(/^https?\:/i)||this.path.match("//"+document.domain))},i.prototype.check_2x_variant=function(t){var e,n=this;return this.perform_check||"undefined"==typeof this.at_2x_path||null===this.at_2x_path?this.at_2x_path in i.confirmed_paths?t(!0):this.is_external()?t(!1):void 0:t(!0)},a.RetinaImage=n,n.prototype.swap=function(t){function e(){i.el.complete?(h.force_original_dimensions&&(0==i.el.offsetWidth&&0==i.el.offsetHeight?(i.el.setAttribute("width",i.el.naturalWidth),i.el.setAttribute("height",i.el.naturalHeight)):(i.el.setAttribute("width",i.el.offsetWidth),i.el.setAttribute("height",i.el.offsetHeight))),i.el.setAttribute("src",t)):setTimeout(e,5)}"undefined"==typeof t&&(t=this.path.at_2x_path);var i=this;e()},t.isRetina()&&t.init(a)}();

/**
* jquery.matchHeight-min.js v0.5.1
* http://brm.io/jquery-match-height/
* License: MIT
*/
(function(b){b.fn.matchHeight=function(a){if("remove"===a){var d=this;this.css("height","");b.each(b.fn.matchHeight._groups,function(b,a){a.elements=a.elements.not(d)});return this}if(1>=this.length)return this;a="undefined"!==typeof a?a:!0;b.fn.matchHeight._groups.push({elements:this,byRow:a});b.fn.matchHeight._apply(this,a);return this};b.fn.matchHeight._apply=function(a,d){var c=b(a),e=[c];d&&(c.css({display:"block","padding-top":"0","padding-bottom":"0","border-top":"0","border-bottom":"0",height:"100px"}),
e=k(c),c.css({display:"","padding-top":"","padding-bottom":"","border-top":"","border-bottom":"",height:""}));b.each(e,function(a,c){var d=b(c),e=0;d.each(function(){var a=b(this);a.css({display:"block",height:""});a.outerHeight(!1)>e&&(e=a.outerHeight(!1));a.css({display:""})});d.each(function(){var a=b(this),c=0;"border-box"!==a.css("box-sizing")&&(c+=f(a.css("border-top-width"))+f(a.css("border-bottom-width")),c+=f(a.css("padding-top"))+f(a.css("padding-bottom")));a.css("height",e-c)})});return this};
b.fn.matchHeight._applyDataApi=function(){var a={};b("[data-match-height], [data-mh]").each(function(){var d=b(this),c=d.attr("data-match-height");a[c]=c in a?a[c].add(d):d});b.each(a,function(){this.matchHeight(!0)})};b.fn.matchHeight._groups=[];var g=-1;b.fn.matchHeight._update=function(a){if(a&&"resize"===a.type){a=b(window).width();if(a===g)return;g=a}b.each(b.fn.matchHeight._groups,function(){b.fn.matchHeight._apply(this.elements,this.byRow)})};b(b.fn.matchHeight._applyDataApi);b(window).bind("load resize orientationchange",
b.fn.matchHeight._update);var k=function(a){var d=null,c=[];b(a).each(function(){var a=b(this),g=a.offset().top-f(a.css("margin-top")),h=0<c.length?c[c.length-1]:null;null===h?c.push(a):1>=Math.floor(Math.abs(d-g))?c[c.length-1]=h.add(a):c.push(a);d=g});return c},f=function(a){return parseFloat(a)||0}})(jQuery);

/*
 * jQuery.share - social media sharing plugin
 * 
 * http://in1.com v1.0
 * MIT
*/

(function(e,t,n){var r=t.document;e.fn.share=function(n){var i={init:function(n){this.share.settings=e.extend({},this.share.defaults,n);var i=this.share.settings,o=this.share.settings.networks,u=this.share.settings.theme,a=this.share.settings.orientation,f=this.share.settings.affix,l=this.share.settings.margin,c=this.share.settings.title||e(r).attr("title"),h=this.share.settings.urlToShare||e(location).attr("href"),p="";e.each(e(r).find('meta[name="description"]'),function(t,n){p=e(n).attr("content")});return this.each(function(){var n=e(this),r=n.attr("id"),i=encodeURIComponent(h),d=encodeURIComponent(c),v=p.substring(0,250),m;for(var g in o){g=o[g];m=s.networkDefs[g].url;m=m.replace("|u|",i).replace("|t|",d).replace("|d|",v).replace("|140|",d.substring(0,130));e("<a href='"+m+"' title='Share this page on "+g+"' class='pop share-"+u+" share-"+u+"-"+g+"'></a>").appendTo(n)}e("#"+r+".share-"+u).css("margin",l);if(a!="horizontal"){e("#"+r+" a.share-"+u).css("display","block")}else{e("#"+r+" a.share-"+u).css("display","inline-block")}if(typeof f!="undefined"){n.addClass("share-affix");if(f.indexOf("right")!=-1){n.css("left","auto");n.css("right","0px");if(f.indexOf("center")!=-1){n.css("top","40%")}}else if(f.indexOf("left center")!=-1){n.css("top","40%")}if(f.indexOf("bottom")!=-1){n.css("bottom","0px");n.css("top","auto");if(f.indexOf("center")!=-1){n.css("left","40%")}}}e(".pop").click(function(){t.open(e(this).attr("href"),"t","toolbar=0,resizable=1,status=0,width=640,height=528");return false})})}};var s={networkDefs:{facebook:{url:"http://www.facebook.com/share.php?u=|u|"},twitter:{url:"https://twitter.com/share?url=|u|&text=|140|"},linkedin:{url:"http://www.linkedin.com/shareArticle?mini=true&url=|u|&title=|t|&summary=|d|&source=in1.com"},in1:{url:"http://www.in1.com/cast?u=|u|",w:"490",h:"529"},tumblr:{url:"http://www.tumblr.com/share?v=3&u=|u|"},digg:{url:"http://digg.com/submit?url=|u|&title=|t|"},googleplus:{url:"https://plusone.google.com/_/+1/confirm?hl=en&url=|u|"},reddit:{url:"http://reddit.com/submit?url=|u|"},pinterest:{url:"http://pinterest.com/pin/create/button/?url=|u|&media=&description=|d|"},posterous:{url:"http://posterous.com/share?linkto=|u|&title=|t|"},stumbleupon:{url:"http://www.stumbleupon.com/submit?url=|u|&title=|t|"},email:{url:"mailto:?subject=|t|"}}};if(i[n]){return i[n].apply(this,Array.prototype.slice.call(arguments,1))}else if(typeof n==="object"||!n){return i.init.apply(this,arguments)}else{e.error('Method "'+n+'" does not exist in social plugin')}};e.fn.share.defaults={networks:["facebook","twitter","linkedin"],theme:"icon",autoShow:true,margin:"3px",orientation:"horizontal",useIn1:false};e.fn.share.settings={}})(jQuery,window);

(function(e){var t=e.event,n,r;n=t.special.debouncedresize={setup:function(){e(this).on("resize",n.handler)},teardown:function(){e(this).off("resize",n.handler)},handler:function(e,i){var s=this,o=arguments,u=function(){e.type="debouncedresize";t.dispatch.apply(s,o)};if(r){clearTimeout(r)}i?u():r=setTimeout(u,n.threshold)},threshold:250};var i="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";e.fn.imagesLoaded=function(t){function l(){var i=e(a),s=e(f);if(r){if(f.length){r.reject(o,i,s)}else{r.resolve(o)}}if(e.isFunction(t)){t.call(n,o,i,s)}}function c(t,n){if(t.src===i||e.inArray(t,u)!==-1){return}u.push(t);if(n){f.push(t)}else{a.push(t)}e.data(t,"imagesLoaded",{isBroken:n,src:t.src});if(s){r.notifyWith(e(t),[n,o,e(a),e(f)])}if(o.length===u.length){setTimeout(l);o.unbind(".imagesLoaded")}}var n=this,r=e.isFunction(e.Deferred)?e.Deferred():0,s=e.isFunction(r.notify),o=n.find("img").add(n.filter("img")),u=[],a=[],f=[];if(e.isPlainObject(t)){e.each(t,function(e,n){if(e==="callback"){t=n}else if(r){r[e](n)}})}if(!o.length){l()}else{o.bind("load.imagesLoaded error.imagesLoaded",function(e){c(e.target,e.type==="error")}).each(function(t,n){var r=n.src;var s=e.data(n,"imagesLoaded");if(s&&s.src===r){c(n,s.isBroken);return}if(n.complete&&n.naturalWidth!==undefined){c(n,n.naturalWidth===0||n.naturalHeight===0);return}if(n.readyState||n.complete){n.src=i;n.src=r}})}return r?r.promise(n):n};var s=function(){function d(n){p=e.extend(true,{},p,n);t.imagesLoaded(function(){m(true);b();g()})}function v(t){n=n.add(t);t.each(function(){var t=e(this);t.data({offsetTop:t.offset().top,height:t.height()})});y(t)}function m(t){n.each(function(){var n=e(this);n.data("offsetTop",n.offset().top);if(t){n.data("height",n.height())}})}function g(){y(n);u.on("debouncedresize",function(){s=0;i=-1;m();b();var t=e.data(this,"preview");if(typeof t!="undefined"){E()}})}function y(t){t.on("click","span.og-close",function(){E();return false}).children("a").on("click",function(t){var n=e(this).parent();r===n.index()?E():w(n);return false})}function b(){a={width:u.width(),height:u.height()}}function w(t){var n=e.data(this,"preview"),r=t.data("offsetTop");s=0;if(typeof n!="undefined"){if(i!==r){if(r>i){s=n.height}E()}else{n.update(t);return false}}i=r;n=e.data(this,"preview",new S(t));n.open()}function E(){r=-1;var t=e.data(this,"preview");t.close();e.removeData(this,"preview")}function S(e){this.$item=e;this.expandedIdx=this.$item.index();this.create();this.update()}var t=e("#portfolio-grid"),n=t.children("li"),r=-1,i=-1,s=0,o=10,u=e(window),a,f=e("html, body"),l={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",msTransition:"MSTransitionEnd",transition:"transitionend"},c=l[Modernizr.prefixed("transition")],h=Modernizr.csstransitions,p={minHeight:600,speed:350,easing:"ease"};S.prototype={create:function(){this.$title=e("<h3></h3>");this.$description=e("<p></p>");this.$href=e('<a href="#"></a>');this.$button=this.$href.append(this.$button);this.$details=e('<div class="og-details"></div>').append(this.$title,this.$description,this.$href,this.$button);this.$loading=e('<div class="og-loading"></div>');this.$fullimage=e('<div class="og-fullimg"></div>').append(this.$loading);this.$closePreview=e('<span class="og-close">&times;</span>');this.$previewInner=e('<div class="og-expander-inner"></div>').append(this.$closePreview,this.$fullimage,this.$details);this.$previewEl=e('<div class="og-expander"></div>').append(this.$previewInner);this.$item.append(this.getEl());if(h){this.setTransition()}},update:function(t){if(t){this.$item=t}if(r!==-1){var i=n.eq(r);i.removeClass("og-expanded");this.$item.addClass("og-expanded");this.positionPreview()}r=this.$item.index();var s=this.$item.children("a"),o={href:s.attr("href"),largesrc:s.data("largesrc"),title:s.data("title"),description:s.data("description"),button:s.data("button")};this.$title.html(o.title);this.$description.html(o.description);this.$button.html(o.button);this.$href.attr("href",o.href);var u=this;if(typeof u.$largeImg!="undefined"){u.$largeImg.remove()}if(u.$fullimage.is(":visible")){this.$loading.show();e("<img/>").load(function(){var t=e(this);if(t.attr("src")===u.$item.children("a").data("largesrc")){u.$loading.hide();u.$fullimage.find("img").remove();u.$largeImg=t.fadeIn(350);u.$fullimage.append(u.$largeImg)}}).attr("src",o.largesrc)}},open:function(){setTimeout(e.proxy(function(){this.setHeights();this.positionPreview()},this),25)},close:function(){var t=this,r=function(){if(h){e(this).off(c)}t.$item.removeClass("og-expanded");t.$previewEl.remove()};setTimeout(e.proxy(function(){if(typeof this.$largeImg!=="undefined"){this.$largeImg.fadeOut("fast")}this.$previewEl.css("height",0);var e=n.eq(this.expandedIdx);e.css("height",e.data("height")).on(c,r);if(!h){r.call()}},this),25);return false},calcHeight:function(){var e=a.height-this.$item.data("height")-o,t=a.height;if(e<p.minHeight){e=p.minHeight;t=p.minHeight+this.$item.data("height")+o}this.height=e;this.itemHeight=t},setHeights:function(){var e=this,t=function(){if(h){e.$item.off(c)}e.$item.addClass("og-expanded")};this.calcHeight();this.$previewEl.css("height",this.height);this.$item.css("height",this.itemHeight).on(c,t);if(!h){t.call()}},positionPreview:function(){var e=this.$item.data("offsetTop"),t=this.$previewEl.offset().top-s,n=this.height+this.$item.data("height")+o<=a.height?e:this.height<a.height?t-(a.height-this.height):t;f.animate({scrollTop:n},p.speed)},setTransition:function(){this.$previewEl.css("transition","height "+p.speed+"ms "+p.easing);this.$item.css("transition","height "+p.speed+"ms "+p.easing)},getEl:function(){return this.$previewEl}};return{init:d,addItems:v}}();s.init()})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* Grey scale iamges
/*-----------------------------------------------------------------------------------*/

(function(a){a.fn.greyScale=function(c){$options=a.extend({fadeTime:a.fx.speeds._default,reverse:false},c);function b(f,e,d){can=a("<canvas>").css({display:"none",left:"0",position:"absolute",top:"0"}).attr({width:e,height:d}).addClass("gsCanvas");ctx=can[0].getContext("2d");ctx.drawImage(f,0,0,e,d);imageData=ctx.getImageData(0,0,e,d);px=imageData.data;for(i=0;i<px.length;i+=4){grey=px[i]*0.3+px[i+1]*0.59+px[i+2]*0.11;px[i]=px[i+1]=px[i+2]=grey}ctx.putImageData(imageData,0,0);return can}if(navigator.userAgent.match(/msie/i) && navigator.userAgent.match(/6/)){this.each(function(){var d=$options.reverse?0:1;a(this).css({filter:"progid:DXImageTransform.Microsoft.BasicImage(grayscale="+d+")",zoom:"1"});a(this).hover(function(){var e=$options.reverse?1:0;a(this).css({filter:"progid:DXImageTransform.Microsoft.BasicImage(grayscale="+e+")"})},function(){var e=$options.reverse?0:1;a(this).css("filter","progid:DXImageTransform.Microsoft.BasicImage(grayscale="+e+")")})})}else{this.each(function(d){a(this).wrap('<div class="gsWrapper">');gsWrapper=a(this).parent();gsWrapper.css({position:"relative",display:"inline-block"});if(window.location.hostname!==this.src.split("/")[2]){a.getImageData({url:a(this).attr("src"),success:a.proxy(function(e){can=b(e,e.width,e.height);if($options.reverse){can.appendTo(gsWrapper).css({display:"block",opacity:"0"})}else{can.appendTo(gsWrapper).fadeIn($options.fadeTime)}},gsWrapper),error:function(f,e){}})}else{can=b(a(this)[0],a(this).width(),a(this).height());if($options.reverse){can.appendTo(gsWrapper).css({display:"block",opacity:"0"})}else{can.appendTo(gsWrapper).fadeIn($options.fadeTime)}}});a(this).parent().delegate(".gsCanvas","mouseover mouseout",function(d){over=$options.reverse?1:0;out=$options.reverse?0:1;(d.type=="mouseover")&&a(this).stop().animate({opacity:over},$options.fadeTime);(d.type=="mouseout")&&a(this).stop().animate({opacity:out},$options.fadeTime)})}}})(jQuery);(function(X,V){function O(){}function H(c){E=[c]}function W(c,g,e){return c&&c.apply(g.context||g,e)}function U(A){function s(K){!n++&&V(function(){g();e&&(z[w]={s:[K]});x&&(K=x.apply(A,[K]));W(A.success,A,[K,G]);W(h,A,[A,G])},0)}function o(K){!n++&&V(function(){g();e&&K!=F&&(z[w]=K);W(A.error,A,[A,K]);W(h,A,[A,K])},0)}A=X.extend({},B,A);var h=A.complete,x=A.dataFilter,J=A.callbackParameter,I=A.callback,t=A.cache,e=A.pageCache,D=A.charset,w=A.url,u=A.data,C=A.timeout,c,n=0,g=O;A.abort=function(){!n++&&g()};if(W(A.beforeSend,A,[A])===false||n){return A}w=w||y;u=u?typeof u=="string"?u:X.param(u,A.traditional):y;w+=u?(/\?/.test(w)?"&":"?")+u:y;J&&(w+=(/\?/.test(w)?"&":"?")+encodeURIComponent(J)+"=?");!t&&!e&&(w+=(/\?/.test(w)?"&":"?")+"_"+(new Date).getTime()+"=");w=w.replace(/=\?(&|$)/,"="+I+"$1");e&&(c=z[w])?c.s?s(c.s[0]):o(c):V(function(L,K,M){if(!n){M=C>0&&V(function(){o(F)},C);g=function(){M&&clearTimeout(M);L[q]=L[v]=L[p]=L[r]=null;R[m](L);K&&R[m](K)};window[I]=H;L=X(l)[0];L.id=k+b++;if(D){L[a]=D}var N=function(P){(L[v]||O)();P=E;E=undefined;P?s(P[0]):o(j)};if(f.msie){L.event=v;L.htmlFor=L.id;L[q]=function(){/loaded|complete/.test(L.readyState)&&N()}}else{L[r]=L[p]=N;f.opera?(K=X(l)[0]).text="jQuery('#"+L.id+"')[0]."+r+"()":L[d]=d}L.src=w;R.insertBefore(L,R.firstChild);K&&R.insertBefore(K,R.firstChild)}},0);return A}var d="async",a="charset",y="",j="error",k="_jqjsp",v="onclick",r="on"+j,p="onload",q="onreadystatechange",m="removeChild",l="<script/>",G="success",F="timeout",f=X.browser,R=X("head")[0]||document.documentElement,z={},b=0,E,B={callback:k,url:location.href};U.setup=function(c){X.extend(B,c)};X.jsonp=U})(jQuery,setTimeout);(function(a){a.getImageData=function(b){var d=/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;if(b.url){var c=location.protocol==="https:",h="";h=b.server&&d.test(b.server)&&b.server.indexOf("https:")&&(c||b.url.indexOf("https:"))?b.server:"//img-to-json.appspot.com/?callback=?";a.jsonp({url:h,data:{url:escape(b.url)},dataType:"jsonp",timeout:10000,success:function(e){var f=new Image;a(f).load(function(){this.width=e.width;this.height=e.height;typeof b.success==typeof Function&&b.success(this)}).attr("src",e.data)},error:function(e,f){typeof b.error==typeof Function&&b.error(e,f)}})}else{typeof b.error==typeof Function&&b.error(null,"no_url")}}})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* Anything Slider
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$(".anything-slider > .wpb_column > .wpb_wrapper").owlCarousel({navigation:true,singleItem:true,autoHeight:true,navigationText:["<i class=\'ub-icon-arrow-left7\'></i>","<i class=\'ub-icon-arrow-right7\'></i>"],});});

jQuery(document).ready(function($){"use strict";$(".anything-slider-autoplay > .wpb_column > .wpb_wrapper").owlCarousel({navigation:true,singleItem:true,autoPlay:7000,autoHeight:true,navigationText:["<i class=\'ub-icon-arrow-left7\'></i>","<i class=\'ub-icon-arrow-right7\'></i>"],});});

/*-----------------------------------------------------------------------------------*/
/* overrides default visual coposer flex slider script function
/*-----------------------------------------------------------------------------------*/

jQuery(window).load(function() {"use strict";
    jQuery('.wpb_flexslider').each(function() {
        var this_element = jQuery(this);
        var sliderSpeed = 800,
            sliderTimeout = parseInt(this_element.attr('data-interval'))*1000,
            sliderFx = this_element.attr('data-flex_fx'),
            slideshow = true;
        if ( sliderTimeout == 0 ) slideshow = false;

        this_element.flexslider({
            animation: sliderFx,
            slideshow: slideshow,
            slideshowSpeed: sliderTimeout,
            sliderSpeed: sliderSpeed,
            prevText: "",
            nextText: "", 
            smoothHeight: true
        });
    });
});

/* ===========================================================
 * jquery-simple-text-rotator.js v1
 * ===========================================================
 * Copyright 2013 Pete Rojwongsuriya.
 * http://www.thepetedesign.com
 *
 * A very simple and light weight jQuery plugin that 
 * allows you to rotate multiple text without changing 
 * the layout
 * https://github.com/peachananr/simple-text-rotator
 *
 * ========================================================== */

!function(e){var t={animation:"dissolve",separator:",",speed:2e3};e.fx.step.textShadowBlur=function(t){e(t.elem).prop("textShadowBlur",t.now)};e.fn.textrotator=function(n){var r=e.extend({},t,n);return this.each(function(){var t=e(this);var n=[];e.each(t.text().split(r.separator),function(e,t){n.push(t)});t.text(n[0]);var i=function(){switch(r.animation){case"dissolve":t.animate({textShadowBlur:20,opacity:0},500,function(){s=e.inArray(t.text(),n);if(s+1==n.length)s=-1;t.text(n[s+1]).animate({textShadowBlur:0,opacity:1},500)});break;case"flip":if(t.find(".back").length>0){t.html(t.find(".back").html())}var i=t.text();var s=e.inArray(i,n);if(s+1==n.length)s=-1;t.html("");e("<span class='front'>"+i+"</span>").appendTo(t);e("<span class='back'>"+n[s+1]+"</span>").appendTo(t);t.wrapInner("<span class='rotating' />").find(".rotating").hide().addClass("flip").show().css({"-webkit-transform":" rotateY(-180deg)","-moz-transform":" rotateY(-180deg)","-o-transform":" rotateY(-180deg)",transform:" rotateY(-180deg)"});break;case"flipUp":if(t.find(".back").length>0){t.html(t.find(".back").html())}var i=t.text();var s=e.inArray(i,n);if(s+1==n.length)s=-1;t.html("");e("<span class='front'>"+i+"</span>").appendTo(t);e("<span class='back'>"+n[s+1]+"</span>").appendTo(t);t.wrapInner("<span class='rotating' />").find(".rotating").hide().addClass("flip up").show().css({"-webkit-transform":" rotateX(-180deg)","-moz-transform":" rotateX(-180deg)","-o-transform":" rotateX(-180deg)",transform:" rotateX(-180deg)"});break;case"flipCube":if(t.find(".back").length>0){t.html(t.find(".back").html())}var i=t.text();var s=e.inArray(i,n);if(s+1==n.length)s=-1;t.html("");e("<span class='front'>"+i+"</span>").appendTo(t);e("<span class='back'>"+n[s+1]+"</span>").appendTo(t);t.wrapInner("<span class='rotating' />").find(".rotating").hide().addClass("flip cube").show().css({"-webkit-transform":" rotateY(180deg)","-moz-transform":" rotateY(180deg)","-o-transform":" rotateY(180deg)",transform:" rotateY(180deg)"});break;case"flipCubeUp":if(t.find(".back").length>0){t.html(t.find(".back").html())}var i=t.text();var s=e.inArray(i,n);if(s+1==n.length)s=-1;t.html("");e("<span class='front'>"+i+"</span>").appendTo(t);e("<span class='back'>"+n[s+1]+"</span>").appendTo(t);t.wrapInner("<span class='rotating' />").find(".rotating").hide().addClass("flip cube up").show().css({"-webkit-transform":" rotateX(180deg)","-moz-transform":" rotateX(180deg)","-o-transform":" rotateX(180deg)",transform:" rotateX(180deg)"});break;case"spin":if(t.find(".rotating").length>0){t.html(t.find(".rotating").html())}s=e.inArray(t.text(),n);if(s+1==n.length)s=-1;t.wrapInner("<span class='rotating spin' />").find(".rotating").hide().text(n[s+1]).show().css({"-webkit-transform":" rotate(0) scale(1)","-moz-transform":"rotate(0) scale(1)","-o-transform":"rotate(0) scale(1)",transform:"rotate(0) scale(1)"});break;case"fade":t.fadeOut(r.speed,function(){s=e.inArray(t.text(),n);if(s+1==n.length)s=-1;t.text(n[s+1]).fadeIn(r.speed)});break}};setInterval(i,r.speed)})}}(window.jQuery);

/*!
 * hoverIntent v1.8.0 // 2014.06.29 // jQuery v1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license. Basically that
 * means you are free to use hoverIntent as long as this header is left intact.
 * Copyright 2007, 2014 Brian Cherne
 */
(function($){$.fn.hoverIntent=function(handlerIn,handlerOut,selector){var cfg={interval:100,sensitivity:6,timeout:0};if(typeof handlerIn==="object"){cfg=$.extend(cfg,handlerIn)}else{if($.isFunction(handlerOut)){cfg=$.extend(cfg,{over:handlerIn,out:handlerOut,selector:selector})}else{cfg=$.extend(cfg,{over:handlerIn,out:handlerIn,selector:handlerOut})}}var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if(Math.sqrt((pX-cX)*(pX-cX)+(pY-cY)*(pY-cY))<cfg.sensitivity){$(ob).off("mousemove.hoverIntent",track);ob.hoverIntent_s=true;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=false;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=$.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type==="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).on("mousemove.hoverIntent",track);if(!ob.hoverIntent_s){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).off("mousemove.hoverIntent",track);if(ob.hoverIntent_s){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.on({"mouseenter.hoverIntent":handleHover,"mouseleave.hoverIntent":handleHover},cfg.selector)}})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* footable (responsive tables)
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready( function($) {"use strict";$('.shop_table').footable();});

/*-----------------------------------------------------------------------------------*/
/* iLightbox
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($) {"use strict";$('.ilightbox, .gallery-item .gallery-icon a').iLightBox({path:'horizontal'});});

/*-----------------------------------------------------------------------------------*/
/* iLighbox Video
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$('.ilightbox-video, .ilightbox-video a').bind('click',function(event){var url = $(this).attr("href");event.preventDefault();$.iLightBox([{URL: url,type: 'iframe',options:{width:1920,height: 1080}}]);});});

/*-----------------------------------------------------------------------------------*/
/* search bar functions
/*-----------------------------------------------------------------------------------*/

//slides the menu search form down and up
jQuery(document).ready(function($){"use strict";$('#collapsable-search-form .search-toggle').click(function(){$(this).parent().parent().find('.the-search-form .column').stop().slideToggle('fast');
	
	if ( $('html').is('.touch') === false) {
		$(this).parent().parent().find('.the-search-form input[type="search"]').focus();
	}

	});
});

//slides back up when clicked outside of it
jQuery(document).mouseup(function(e){"use strict";var container=jQuery("#collapsable-search-form .the-search-form .column");if(!container.is(e.target)&&container.has(e.target).length === 0){container.slideUp('fast');}e.stopPropagation();});


// corporate header dropdown search
//slides the menu search form down and up
jQuery(document).ready(function($){"use strict";$('.corporate-header-style #collapsable-search-form .search-toggle').click(function(){$(this).parent().parent().find('.the-search-form').stop().slideToggle('fast');

	if ( $('html').is('.touch') === false) {
		$(this).parent().parent().find('.the-search-form input[type="search"]').focus();
	}

	});
});

//slides back up when clicked outside of it
jQuery(document).mouseup(function(e){"use strict";var container=jQuery(".corporate-header-style #collapsable-search-form .the-search-form");if(!container.is(e.target)&&container.has(e.target).length === 0){container.slideUp('fast');}e.stopPropagation();});

/*-----------------------------------------------------------------------------------*/
/* adds animation classes to header cart while adding to cart
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$('body').bind('adding_to_cart',function(){$('.woo-mini-cart-container').removeClass('empty');$('.woo-mini-cart-container .cart-count').addClass('animated wobble');});$('body').bind('added_to_cart',function(){$('.woo-mini-cart-container .cart-count').removeClass('animated wobble');});});

jQuery(document).ready(function($){"use strict";$('body').bind('adding_to_cart',function(){$('.corporate-header-style .top-bar.has-widget').removeClass('empty');});});

/*-----------------------------------------------------------------------------------*/
/* offcanvas menu left
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$(".sidepanel-title").click(function(){$('html').toggleClass('off-canvas-left');});});
jQuery(document).ready(function($){"use strict";$('#touch-trigger').click(function(){$('html').removeClass('off-canvas-left');});});

/*-----------------------------------------------------------------------------------*/
/* offcanvas menu Right
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$(".menu-icon > a").click(function(){$('html').toggleClass('off-canvas-right');});});
jQuery(document).ready(function($){"use strict";$('#touch-trigger').click(function(){$('html').removeClass('off-canvas-right');});});

/*-----------------------------------------------------------------------------------*/
/* Testimonials Slider
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$(".capital-testimonial-slider").owlCarousel({singleItem:true,navigationText:["<i class='ub-icon-arrow-left7'></i>","<i class='ub-icon-arrow-right7'></i>"],navigation:true,pagination:true,slideSpeed:600,paginationSpeed:700,autoPlay:false,autoHeight:true,transitionStyle:"backSlide",});});

/*-----------------------------------------------------------------------------------*/
/* Shop page options slide-toggler
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$('li.page-options > a').click(function(){$('.page-options-container').slideToggle('fast');});});

/*-----------------------------------------------------------------------------------*/
/* Back to top button
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";$('#back-top a').click(function(){$('body,html').animate({scrollTop:0},800);return false;});});

/*-----------------------------------------------------------------------------------*/
/* Smooth scroll on local anchors
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready( function($) {"use strict";
	$('body.page-template-page-templatestransparent-menu-light-on-dark-php a[href*=#]:not([href=#]), body.page-template-page-templatestransparent-menu-dark-on-light-php a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
			}
		}
	});
});

/*-----------------------------------------------------------------------------------*/
/* Toggle shipping calculator description box
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready( function($) {"use strict";$('.shipping-calculator-button').click(function(){$('.shipping_calculator_note').slideToggle("fast");});});

/*-----------------------------------------------------------------------------------*/
/* Text rotator init
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($) {"use strict";
	$(".rotate").textrotator({
		animation: "dissolve", //Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
		separator: ",",
		speed: 3000
	});
});

/*-----------------------------------------------------------------------------------*/
/* Grey Scale Images init
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";
	$(function() {
		$('.grey-scale').hide().fadeIn(1000);
	});
	$(window).load(function () {
		$('.grey-scale').greyScale({
			fadeTime: 250,
			reverse: false
		});
	});
});

/*-----------------------------------------------------------------------------------*/
/* Menu dropdowns
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";
	$('.top-bar-section .has-dropdown').hoverIntent(function(){
		$(this).find(' > .sub-menu ').stop().fadeToggle('fast');
	});
});

/*-----------------------------------------------------------------------------------*/
/* WooCommerce Scripts
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function($){"use strict";
	$(document).on( 'click', '.add_to_cart_button', function() {
		
		if ( typeof wc_add_to_cart_params === 'undefined' )
		return false;

		var $thisbutton = $( this ),
			notif = '.product-added-notif',
			notif_leave = null;

		//$(notif).addClass('bounceOutLeft').removeClass('visible bounceInLeft');

		if ( $thisbutton.is( '.product_type_simple' ) ) {

		if ( ! $thisbutton.attr( 'data-product_id' ) )
		return true;


		$(notif).removeClass('bounceOutLeft').delay(1000).queue(function(){
			$(this).removeClass('hidden').addClass('visible animated bounceInLeft').dequeue();
		});

		$('.notif-close').click(function() {
			$(notif).addClass('bounceOutLeft').removeClass('visible bounceInLeft').delay(1000).queue(function(){
					$(this).addClass('hidden').dequeue();
				});
		});


		// setTimeout(function(){
		// 	$(notif).addClass('bounceOutLeft').removeClass('visible bounceInLeft');
		// }, 7000);

		}

	});
});









