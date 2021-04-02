(self.AMP=self.AMP||[]).push({n:"amp-fx-collection",v:"2101211748002",m:0,f:(function(AMP,_){
'use strict';function aa(a){var b=!1,c=null,d=a;return function(e){for(var f=[],g=0;g<arguments.length;++g)f[g-0]=arguments[g];b||(c=d.apply(self,f),b=!0,d=null);return c}};var l=self.AMP_CONFIG||{},ba=("string"==typeof l.cdnProxyRegex?new RegExp(l.cdnProxyRegex):l.cdnProxyRegex)||/^https:\/\/([a-zA-Z0-9_-]+\.)?cdn\.ampproject\.org$/;function m(a){if(self.document&&self.document.head&&(!self.location||!ba.test(self.location.origin))){var b=self.document.head.querySelector('meta[name="'+a+'"]');b&&b.getAttribute("content")}}l.cdnUrl||m("runtime-host");l.geoApiUrl||m("amp-geo-api");function ca(a){for(var b=null,c="",d=0;d<arguments.length;d++){var e=arguments[d];if(e instanceof Error&&!b){b=void 0;var f=Object.getOwnPropertyDescriptor(e,"message");if(f&&f.writable)b=e;else{f=e.stack;var g=Error(e.message);for(b in e)g[b]=e[b];g.stack=f;b=g}}else c&&(c+=" "),c+=e}b?c&&(b.message=c+": "+b.message):b=Error(c);return b}function da(a){var b=ca.apply(null,arguments);setTimeout(function(){self.__AMP_REPORT_ERROR(b);throw b;})}self.__AMP_LOG=self.__AMP_LOG||{user:null,dev:null,userForEmbed:null};
var n=self.__AMP_LOG;function p(){if(!n.user)throw Error("failed to call initLogConstructor");return n.user}function q(){if(n.dev)return n.dev;throw Error("failed to call initLogConstructor");}function r(a,b,c){return p().assert(a,b,c,void 0,void 0,void 0,void 0,void 0,void 0,void 0,void 0)};var t="fade-in fade-in-scroll float-in-bottom float-in-top fly-in-bottom fly-in-left fly-in-right fly-in-top parallax".split(" "),u=t[0],v=t[1],ea=t[2],fa=t[3],w=t[4],x=t[5],y=t[6],z=t[7],A=t[8],B={},C=(B[u]={observes:0,opacity:!0},B[v]={observes:0,opacity:!0},B[ea]={observes:1,translates:{y:!0}},B[fa]={observes:1,translates:{y:!0}},B[w]={observes:0,translates:{y:!0}},B[x]={observes:0,translates:{x:!0}},B[y]={observes:0,translates:{x:!0}},B[z]={observes:0,translates:{y:!0}},B[A]={observes:0,translates:{y:!0}},
B);function ha(a){return r(-1<t.indexOf(a),"Invalid amp-fx type `%s`",a)}
function ia(a){a.hasAttribute("amp-fx");var b=a.getAttribute("amp-fx").trim().toLowerCase().split(/\s+/);r(b.length,"No value provided for `amp-fx` attribute");a=b.filter(ha);for(var c=0;c<a.length;c++)for(var d=a[c],e=c+1;e<a.length;e++){var f=a[e];if(d==f)var g=!1;else{g=C[d];var h=g.translates,k=C[f],N=k.translates,ya=k.opacity;g=g.observes!==k.observes||g.opacity&&ya||h&&N&&(h.x&&N.x||h.y&&N.y)?!1:!0}g||(p().warn("amp-fx-collection","%s preset can't be combined with %s preset as the resulting animation isn't valid.",
d,f),a.splice(e--,1))}return a};function D(a,b,c){var d=E(a),e=F(d),f=G(e),g=f[b];g||(g=f[b]={obj:null,promise:null,resolve:null,reject:null,context:null,ctor:null,adopted:!1});g.ctor||g.obj||(g.ctor=c,g.context=d,g.adopted=!1,g.resolve&&H(e,b))}function I(a,b){a=a.__AMP_TOP||(a.__AMP_TOP=a);return H(a,b)}function J(a,b){var c=E(a);c=F(c);return H(c,b)}function E(a){return a.nodeType?I((a.ownerDocument||a).defaultView,"ampdoc").getAmpDoc(a):a}function F(a){a=E(a);return a.isSingleDoc()?a.win:a}
function H(a,b){a=G(a)[b];a.obj||(a.obj=new a.ctor(a.context),a.ctor=null,a.context=null,a.resolve&&a.resolve(a.obj));return a.obj}function G(a){var b=a.__AMP_SERVICES;b||(b=a.__AMP_SERVICES={});return b};/*
 https://mths.be/cssescape v1.5.1 by @mathias | MIT license */
function ja(a,b){for(var c=a.length,d=0;d<c;d++)b(a[d],d)};function K(a){return J(a,"viewport")};function ka(a,b){return{left:0,top:0,width:a,height:b,bottom:0+b,right:0+a,x:0,y:0}}function L(a,b){return a&&b?a.left==b.left&&a.top==b.top&&a.width==b.width&&a.height==b.height:!1};function M(a,b,c,d){this.element=b;this.K=d;this.fidelity=c;this.turn=0==c?Math.floor(4*Math.random()):0;this.D=null;this.o=K(a)}
M.prototype.update=function(a){var b=this;if(!a){if(0!=this.turn){this.turn--;return}0==this.fidelity&&(this.turn=4)}var c=this.o.getSize(),d=ka(c.width,c.height);this.o.getClientRectAsync(this.element).then(function(e){var f={positionRect:e,viewportRect:d,relativePos:null},g=b.D;if(!(g&&L(g.positionRect,f.positionRect)&&L(g.viewportRect,f.viewportRect))){g=f.positionRect;var h=f.viewportRect;f.relativePos=g.top<h.top?"top":g.bottom>h.bottom?"bottom":"inside";h=f.viewportRect;g.top<=h.bottom&&h.top<=
g.bottom&&g.left<=h.right&&h.left<=g.right?(b.D=f,b.K(f)):b.D&&(b.D=null,f.positionRect=null,b.K(f))}})};var O,la="Webkit webkit Moz moz ms O o".split(" ");function ma(a,b,c){if(b.startsWith("--"))return b;O||(O=Object.create(null));var d=O[b];if(!d||c){d=b;if(void 0===a[b]){var e=b.charAt(0).toUpperCase()+b.slice(1);a:{for(var f=0;f<la.length;f++){var g=la[f]+e;if(void 0!==a[g]){e=g;break a}}e=""}var h=e;void 0!==a[h]&&(d=h)}c||(O[b]=d)}return d}function na(a,b){a=a.style;for(var c in b)a.setProperty(ma(a,c),b[c].toString(),"important")}
function P(a,b){for(var c in b){var d=a,e=b[c],f=ma(d.style,c,void 0);f&&(f.startsWith("--")?d.style.setProperty(f,e):d.style[f]=e)}}function oa(a){"display"in a&&q().error("STYLE","`display` style detected in styles. You must use toggle instead.");return a};function Q(a,b,c){var d=a.element,e="X"==b,f=c*a.flyInDistance+(e?"vw":"vh");a.initialTrigger||(J(d,"mutator").mutateElement(d,function(){var g=a.win.getComputedStyle(d)||Object.create(null),h=e?"left":"top",k={position:"static"===g.position?"relative":g.position,visibility:"visible"};k[h]="calc("+("auto"===g[h]?"0px":g[h])+" - "+f+")";P(d,oa(k))}),a.initialTrigger=!0);P(d,{"transition-duration":a.duration,"transition-timing-function":a.easing,transform:"translate"+b+"("+f+")"})}
function R(a){var b=parseFloat(a.getAttribute("data-margin-start"));b&&r(0<=b&&100>=b,"data-margin-start must be a percentage value and be between 0% and 100% for: %s",a);return b}function S(a){return a&&a.positionRect?a.positionRect.top:null}function pa(a,b,c){a=S(a);return!!a&&a+c*b.viewportHeight*b.flyInDistance/100<=(1-b.marginStart)*b.viewportHeight}function T(a,b,c){a=S(a);var d=void 0!==c?c:b.viewportHeight;return!!a&&a<=(1-b.marginStart)*d}
var U={},qa=(U[A]={userAsserts:function(a){var b=r(a.getAttribute("data-parallax-factor"),"data-parallax-factor=<number> attribute must be provided for: %s",a);r(0<parseFloat(b),"data-parallax-factor must be a number and greater than 0 for: %s",a)},update:function(a){if((a=S(a))&&!(a>this.adjustedViewportHeight)){var b=-(parseFloat(this.factor)-1);this.offset=(this.adjustedViewportHeight-a)*b;P(this.element,{transform:"translateY("+this.offset.toFixed(0)+"px)"})}}},U[w]={userAsserts:R,update:function(a){pa(a,
this,-1)&&Q(this,"Y",-1)}},U[x]={userAsserts:R,update:function(a){T(a,this)&&Q(this,"X",1)}},U[y]={userAsserts:R,update:function(a){T(a,this)&&Q(this,"X",-1)}},U[z]={userAsserts:R,update:function(a){pa(a,this,1)&&Q(this,"Y",1)}},U[u]={userAsserts:R,update:function(a){T(a,this)&&P(this.element,{"transition-duration":this.duration,"transition-timing-function":this.easing,opacity:1})}},U[v]={userAsserts:function(a){var b=R(a),c=parseFloat(a.getAttribute("data-margin-end"));c&&(r(0<=c&&100>=c,"data-margin-end must be a percentage value and be between 0% and 100% for: %s",
a),r(c>b,"data-margin-end must be greater than data-margin-start for: %s",a))},update:function(a){var b=this.viewportHeight,c=this.marginStart;!T(a,this,this.adjustedViewportHeight)||!this.hasRepeat&&1<=this.offset||(a=S(a),this.offset=(b-a-c*b)/((this.marginEnd-c)*b),P(this.element,{opacity:this.offset}))}},U);function V(){this.h=null}V.prototype.add=function(a){var b=this;this.h||(this.h=[]);this.h.push(a);return function(){b.remove(a)}};V.prototype.remove=function(a){this.h&&(a=this.h.indexOf(a),-1<a&&this.h.splice(a,1))};V.prototype.removeAll=function(){this.h&&(this.h.length=0)};V.prototype.fire=function(a){if(this.h)for(var b=this.h,c=0;c<b.length;c++)(0,b[c])(a)};V.prototype.getHandlerCount=function(){return this.h?this.h.length:0};function ra(a){var b=this;this.l=a;this.M=new V;this.R=aa(function(){return sa(b)});this.B=this.C=0;this.A=!0}ra.prototype.observe=function(a){this.M.add(a);this.R()};function sa(a){var b=K(a.l);b.onScroll(function(){var c=b.getScrollTop();a.B=c;c=a.B-a.C;if(!a.A&&0<c||a.A&&0>c)a.C=a.B;!a.A&&36>=a.B?(W(a,!0),a.C=a.B):!a.A&&-20>c?(W(a,!0),a.C=a.B):a.A&&80<c&&(W(a,!1),a.C=a.B)})}function W(a,b){a.A!=b&&(a.A=b,a.M.fire(b))}
function ta(a,b){return X(b,"overflow","hidden",a)&&X(b,"position","fixed",a)}function ua(a,b,c){var d=b.replace(/^float\-in\-([^\s]+)$/,"$1");return X(c,d,"0px",a,"amp-fx="+b)?d:null}function X(a,b,c,d,e){if(a[b]==c)return!0;e=e?" "+e:"";var f=va(d);p().warn("amp-fx","FX element must have `"+b+": "+c+"` ["+f+"]"+e+".");return!1}
function va(a,b){b=void 0===b?0:b;var c=a.id,d=a.classList,e=a.parentElement;if(c)return"#"+c;c=a.tagName.toLowerCase();0<d.length&&(c+="."+d[0]+(1<d.length?"...":""));if(!e)return c+" (detached)";var f=e.firstElementChild,g=e.lastElementChild;if(a!=f||a!=g)a==f?c+=":first-child":a==g&&(c+=":last-child");return 0<b?c:va(e,b+1)+" > "+c};function wa(a){var b={linear:"cubic-bezier(0.00, 0.00, 1.00, 1.00)","ease-in-out":"cubic-bezier(0.80, 0.00, 0.20, 1.00)","ease-in":"cubic-bezier(0.80, 0.00, 0.60, 1.00)","ease-out":"cubic-bezier(0.40, 0.00, 0.40, 1.00)"};if(b[a])return b[a];r(a.startsWith("cubic-bezier"),"All custom bezier curves should be specified by following the `cubic-bezier()` function notation.");return a}function xa(a){var b=parseFloat(a);return isNaN(b)?null:b/100}
function za(a){switch(a){case A:return{"will-change":"transform"};case u:return{"will-change":"opacity",opacity:0};case v:return{"will-change":"opacity",opacity:0};case w:case z:case x:case y:return{"will-change":"transform"};default:return{visibility:"visible"}}}function Aa(a,b){switch(b){case u:return"1000ms";case w:case z:case x:case y:return a=K(a).getSize().width,a=Math.min(1E3,a),480>a?a=480:1E3<a&&(a=1E3),200*(a-480)/520+400+"ms";default:return"1ms"}}
function Ba(a){switch(a){case u:case y:case x:case z:case w:return{start:.05};case v:return{start:0,end:.5};default:return{start:0,end:1}}};function Ca(a,b){function c(){d=0;var g=500-(a.Date.now()-e);if(0<g)d=a.setTimeout(c,g);else{var h=f;f=null;b.apply(null,h)}}var d=0,e=0,f=null;return function(g){for(var h=[],k=0;k<arguments.length;++k)h[k-0]=arguments[k];e=a.Date.now();f=h;d||(d=a.setTimeout(c,500))}};function Y(a){var b=this;this.l=a;this.N=a.win;this.j=[];this.T=I(this.N,"vsync");this.o=K(a);this.F=[];this.G=this.I=this.H=!1;this.O=Ca(this.N,function(){b.H=!1})}Y.prototype.observe=function(a,b,c){var d=this,e=new M(this.l,a,b,c);this.j.push(e);this.G||Da(this);e.update();return function(){for(var f=0;f<d.j.length;f++)if(d.j[f]==e){d.j.splice(f,1);0==d.j.length&&Ea(d);break}}};
Y.prototype.unobserve=function(a){for(var b=0;b<this.j.length;b++)if(this.j[b].element==a){this.j.splice(b,1);0==this.j.length&&Ea(this);return}q().error("POSITION_OBSERVER","cannot unobserve unobserved element")};function Da(a){a.G=!0;a.F.push(a.o.onScroll(function(){a.O();a.H=!0;a.I||Fa(a)}));a.F.push(a.o.onResize(function(){a.updateAllEntries(!0)}))}function Ea(a){for(a.G=!1;a.F.length;)a.F.pop()()}Y.prototype.updateAllEntries=function(a){for(var b=0;b<this.j.length;b++)this.j[b].update(a)};
function Fa(a){a.updateAllEntries();a.I=!0;a.H?a.T.measure(function(){Fa(a)}):a.I=!1};function Ga(a,b,c){if(!J(b,"viewer").isEmbedded()){D(a,"fx-scroll-dispatch",ra);var d=J(a,"fx-scroll-dispatch"),e=!0;J(b,"mutator").measureMutateElement(b,function(){var f=a.win.getComputedStyle(b)||Object.create(null),g=ua(b,c,f),h=ta(b,f);g&&h?d.observe(function(k){Ha(b,k,g)}):e=!1},function(){e&&na(b,{"will-change":"transform"})})}}
function Ha(a,b,c){var d=0;J(a,"mutator").measureMutateElement(a,function(){if(b)d=0;else{var e=a.getBoundingClientRect().height;d="top"==c?-e:e}},function(){na(a,{transition:"transform 300ms ease",transform:"translate(0, "+(d+"px)")})})}
function Ia(a,b,c){var d=this;this.win=a.win;this.S=J(b,"position-observer");this.o=K(b);this.L=J(b,"mutator");this.adjustedViewportHeight=this.viewportHeight=null;this.element=b;this.offset=0;this.P=c;qa[c].userAsserts(b);this.factor=parseFloat(b.getAttribute("data-parallax-factor"));this.marginStart=b.hasAttribute("data-margin-start")?xa(b.getAttribute("data-margin-start")):Ba(c).start;this.marginEnd=b.hasAttribute("data-margin-end")?xa(b.getAttribute("data-margin-end")):Ba(c).end;if(b.hasAttribute("data-easing"))var e=
b.getAttribute("data-easing");else a:switch(c){case u:e="ease-in";break a;case y:case x:case z:case w:e="ease-out";break a;default:e="ease-in"}this.easing=wa(e);this.duration=b.hasAttribute("data-duration")?b.getAttribute("data-duration"):Aa(a,c);if(b.hasAttribute("data-fly-in-distance"))a=parseFloat(b.getAttribute("data-fly-in-distance"));else a:switch(c){case w:case z:a=1E3>K(a).getSize().width?25:33;break a;case x:case y:a=100;break a;default:a=1}this.flyInDistance=a;this.hasRepeat=b.hasAttribute("data-repeat");
this.initialTrigger=!1;Ja(this).then(function(f){d.adjustedViewportHeight=f;Ka(d)});La(this)}function Ka(a){a.S.observe(a.element,1,qa[a.P].update.bind(a));a.o.onResize(function(){La(a);Ja(a).then(function(b){a.adjustedViewportHeight=b})})}function La(a){a.L.measureElement(function(){a.viewportHeight=a.o.getHeight()})}function Ja(a){return a.L.measureElement(function(){for(var b=a.o.getHeight(),c=0,d=a.element;d;d=d.offsetParent)c+=d.offsetTop;return c<b?c:b})};var Z;function Ma(a,b){var c=Na();a.addEventListener("amp:dom-update",function(d){try{return b(d)}catch(e){throw self.__AMP_REPORT_ERROR(e),e;}},c?void 0:!1)}function Na(){if(void 0!==Z)return Z;Z=!1;try{var a={get capture(){Z=!0}};self.addEventListener("test-options",null,a);self.removeEventListener("test-options",null,a)}catch(b){}return Z};function Oa(a,b){Ma(a,b)};function Pa(a){var b=this;this.l=a;this.J=[];Promise.all([a.whenReady(),a.whenFirstVisible()]).then(function(){var c=b.l.getRootNode();Qa(b);Oa(c,function(){return Qa(b)})})}function Qa(a){var b=a.l.getRootNode().querySelectorAll("[amp-fx]");ja(b,function(c){if(!a.J.includes(c))try{Ra(a,c)}catch(d){da(d)}})}
function Ra(a,b){b.hasAttribute("amp-fx");a.J.includes(b);a.l.isVisible();ia(b).forEach(function(c){if(1==C[c].observes)Ga(a.l,b,c);else{var d=a.l;D(d,"position-observer",Y);new Ia(d,b,c);P(b,oa(za(c)))}});a.J.push(b)}(function(a){a.registerServiceForDoc("amp-fx-collection",Pa)})(self.AMP);
})});

//# sourceMappingURL=amp-fx-collection-0.1.js.map
