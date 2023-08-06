(()=>{function u(t){return t&&t.__esModule?t.default:t}var c={};c=function(){"use strict";function u(t){return(u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}var c=/^\s+/,f=/\s+$/;function d(t,e){if(e=e||{},(t=t||"")instanceof d)return t;if(!(this instanceof d))return new d(t,e);var r=function(t){var e,r,i,a={r:0,t:0,b:0},n=1,s=null,o=null,h=null,l=!1,d=!1;return"string"==typeof t&&(t=function(t){t=t.replace(c,"").replace(f,"").toLowerCase();var e,r=!1;if(v[t])t=v[t],r=!0;else if("transparent"==t)return{r:0,t:0,b:0,a:0,format:"name"};return(e=I.i.exec(t))?{r:e[1],t:e[2],b:e[3]}:(e=I.o.exec(t))?{r:e[1],t:e[2],b:e[3],a:e[4]}:(e=I.h.exec(t))?{l:e[1],s:e[2],u:e[3]}:(e=I.g.exec(t))?{l:e[1],s:e[2],u:e[3],a:e[4]}:(e=I.p.exec(t))?{l:e[1],s:e[2],k:e[3]}:(e=I.m.exec(t))?{l:e[1],s:e[2],k:e[3],a:e[4]}:(e=I.v.exec(t))?{r:A(e[1]),t:A(e[2]),b:A(e[3]),a:O(e[4]),format:r?"name":"hex8"}:(e=I.M.exec(t))?{r:A(e[1]),t:A(e[2]),b:A(e[3]),format:r?"name":"hex"}:(e=I.D.exec(t))?{r:A(e[1]+""+e[1]),t:A(e[2]+""+e[2]),b:A(e[3]+""+e[3]),a:O(e[4]+""+e[4]),format:r?"name":"hex8"}:!!(e=I.S.exec(t))&&{r:A(e[1]+""+e[1]),t:A(e[2]+""+e[2]),b:A(e[3]+""+e[3]),format:r?"name":"hex"}}(t)),"object"==u(t)&&(R(t.r)&&R(t.t)&&R(t.b)?(e=t.r,r=t.t,i=t.b,a={r:255*D(e,255),t:255*D(r,255),b:255*D(i,255)},l=!0,d="%"===String(t.r).substr(-1)?"prgb":"rgb"):R(t.l)&&R(t.s)&&R(t.k)?(s=C(t.s),o=C(t.k),a=function(t,e,r){t=6*D(t,360),e=D(e,100),r=D(r,100);var i=Math.floor(t),a=t-i,n=r*(1-e),s=r*(1-a*e),o=r*(1-(1-a)*e),h=i%6;return{r:255*[r,s,n,n,o,r][h],t:255*[o,r,r,s,n,n][h],b:255*[n,n,o,r,r,s][h]}}(t.l,s,o),l=!0,d="hsv"):R(t.l)&&R(t.s)&&R(t.u)&&(s=C(t.s),h=C(t.u),a=function(t,e,r){var i,a,n;function s(t,e,r){return r<0&&(r+=1),r>1&&(r-=1),r<1/6?t+6*(e-t)*r:r<.5?e:r<2/3?t+(e-t)*(2/3-r)*6:t}if(t=D(t,360),e=D(e,100),r=D(r,100),0===e)i=a=n=r;else{var o=r<.5?r*(1+e):r+e-r*e,h=2*r-o;i=s(h,o,t+1/3),a=s(h,o,t),n=s(h,o,t-1/3)}return{r:255*i,t:255*a,b:255*n}}(t.l,s,h),l=!0,d="hsl"),t.hasOwnProperty("a")&&(n=t.a)),n=y(n),{ok:l,format:t.format||d,r:Math.min(255,Math.max(a.r,0)),t:Math.min(255,Math.max(a.t,0)),b:Math.min(255,Math.max(a.b,0)),a:n}}(t);this.A=t,this.$=r.r,this.C=r.t,this.O=r.b,this.B=r.a,this.F=Math.round(100*this.B)/100,this.I=e.format||r.format,this.R=e.gradientType,this.$<1&&(this.$=Math.round(this.$)),this.C<1&&(this.C=Math.round(this.C)),this.O<1&&(this.O=Math.round(this.O)),this.j=r.ok}function a(t,e,r){t=D(t,255),e=D(e,255),r=D(r,255);var i,a,n=Math.max(t,e,r),s=Math.min(t,e,r),o=(n+s)/2;if(n==s)i=a=0;else{var h=n-s;switch(a=o>.5?h/(2-n-s):h/(n+s),n){case t:i=(e-r)/h+(e<r?6:0);break;case e:i=(r-t)/h+2;break;case r:i=(t-e)/h+4}i/=6}return{l:i,s:a,u:o}}function n(t,e,r){t=D(t,255),e=D(e,255),r=D(r,255);var i,a,n=Math.max(t,e,r),s=Math.min(t,e,r),o=n,h=n-s;if(a=0===n?0:h/n,n==s)i=0;else{switch(n){case t:i=(e-r)/h+(e<r?6:0);break;case e:i=(r-t)/h+2;break;case r:i=(t-e)/h+4}i/=6}return{l:i,s:a,k:o}}function e(t,e,r,i){var a=[$(Math.round(t).toString(16)),$(Math.round(e).toString(16)),$(Math.round(r).toString(16))];return i&&a[0].charAt(0)==a[0].charAt(1)&&a[1].charAt(0)==a[1].charAt(1)&&a[2].charAt(0)==a[2].charAt(1)?a[0].charAt(0)+a[1].charAt(0)+a[2].charAt(0):a.join("")}function s(t,e,r,i){return[$(x(i)),$(Math.round(t).toString(16)),$(Math.round(e).toString(16)),$(Math.round(r).toString(16))].join("")}function t(t,e){e=0===e?0:e||10;var r=d(t).N();return r.s-=e/100,r.s=S(r.s),d(r)}function r(t,e){e=0===e?0:e||10;var r=d(t).N();return r.s+=e/100,r.s=S(r.s),d(r)}function i(t){return d(t).T(100)}function o(t,e){e=0===e?0:e||10;var r=d(t).N();return r.u+=e/100,r.u=S(r.u),d(r)}function h(t,e){e=0===e?0:e||10;var r=d(t).H();return r.r=Math.max(0,Math.min(255,r.r-Math.round(-e/100*255))),r.t=Math.max(0,Math.min(255,r.t-Math.round(-e/100*255))),r.b=Math.max(0,Math.min(255,r.b-Math.round(-e/100*255))),d(r)}function l(t,e){e=0===e?0:e||10;var r=d(t).N();return r.u-=e/100,r.u=S(r.u),d(r)}function g(t,e){var r=d(t).N(),i=(r.l+e)%360;return r.l=i<0?360+i:i,d(r)}function b(t){var e=d(t).N();return e.l=(e.l+180)%360,d(e)}function p(t,e){if(isNaN(e)||e<=0)throw new Error("Argument to polyad must be a positive number");for(var r=d(t).N(),i=[d(t)],a=360/e,n=1;n<e;n++)i.push(d({l:(r.l+n*a)%360,s:r.s,u:r.u}));return i}function k(t){var e=d(t).N(),r=e.l;return[d(t),d({l:(r+72)%360,s:e.s,u:e.u}),d({l:(r+216)%360,s:e.s,u:e.u})]}function m(t,e,r){e=e||6,r=r||30;var i=d(t).N(),a=360/r,n=[d(t)];for(i.l=(i.l-(a*e>>1)+720)%360;--e;)i.l=(i.l+a)%360,n.push(d(i));return n}function w(t,e){e=e||6;for(var r=d(t)._(),i=r.l,a=r.s,n=r.k,s=[],o=1/e;e--;)s.push(d({l:i,s:a,k:n})),n=(n+o)%1;return s}d.prototype={L:function(){return this.q()<128},J:function(){return!this.L()},P:function(){return this.j},V:function(){return this.A},W:function(){return this.I},G:function(){return this.B},q:function(){var t=this.H();return(299*t.r+587*t.t+114*t.b)/1e3},U:function(){var t,e,r,i=this.H();return t=i.r/255,e=i.t/255,r=i.b/255,.2126*(t<=.03928?t/12.92:Math.pow((t+.055)/1.055,2.4))+.7152*(e<=.03928?e/12.92:Math.pow((e+.055)/1.055,2.4))+.0722*(r<=.03928?r/12.92:Math.pow((r+.055)/1.055,2.4))},setAlpha:function(t){return this.B=y(t),this.F=Math.round(100*this.B)/100,this},_:function(){var t=n(this.$,this.C,this.O);return{l:360*t.l,s:t.s,k:t.k,a:this.B}},K:function(){var t=n(this.$,this.C,this.O),e=Math.round(360*t.l),r=Math.round(100*t.s),i=Math.round(100*t.k);return 1==this.B?"hsv("+e+", "+r+"%, "+i+"%)":"hsva("+e+", "+r+"%, "+i+"%, "+this.F+")"},N:function(){var t=a(this.$,this.C,this.O);return{l:360*t.l,s:t.s,u:t.u,a:this.B}},X:function(){var t=a(this.$,this.C,this.O),e=Math.round(360*t.l),r=Math.round(100*t.s),i=Math.round(100*t.u);return 1==this.B?"hsl("+e+", "+r+"%, "+i+"%)":"hsla("+e+", "+r+"%, "+i+"%, "+this.F+")"},Y:function(t){return e(this.$,this.C,this.O,t)},Z:function(t){return"#"+this.Y(t)},tt:function(t){return function(t,e,r,i,a){var n=[$(Math.round(t).toString(16)),$(Math.round(e).toString(16)),$(Math.round(r).toString(16)),$(x(i))];return a&&n[0].charAt(0)==n[0].charAt(1)&&n[1].charAt(0)==n[1].charAt(1)&&n[2].charAt(0)==n[2].charAt(1)&&n[3].charAt(0)==n[3].charAt(1)?n[0].charAt(0)+n[1].charAt(0)+n[2].charAt(0)+n[3].charAt(0):n.join("")}(this.$,this.C,this.O,this.B,t)},et:function(t){return"#"+this.tt(t)},H:function(){return{r:Math.round(this.$),t:Math.round(this.C),b:Math.round(this.O),a:this.B}},rt:function(){return 1==this.B?"rgb("+Math.round(this.$)+", "+Math.round(this.C)+", "+Math.round(this.O)+")":"rgba("+Math.round(this.$)+", "+Math.round(this.C)+", "+Math.round(this.O)+", "+this.F+")"},it:function(){return{r:Math.round(100*D(this.$,255))+"%",t:Math.round(100*D(this.C,255))+"%",b:Math.round(100*D(this.O,255))+"%",a:this.B}},nt:function(){return 1==this.B?"rgb("+Math.round(100*D(this.$,255))+"%, "+Math.round(100*D(this.C,255))+"%, "+Math.round(100*D(this.O,255))+"%)":"rgba("+Math.round(100*D(this.$,255))+"%, "+Math.round(100*D(this.C,255))+"%, "+Math.round(100*D(this.O,255))+"%, "+this.F+")"},st:function(){return 0===this.B?"transparent":!(this.B<1)&&(M[e(this.$,this.C,this.O,!0)]||!1)},ot:function(t){var e="#"+s(this.$,this.C,this.O,this.B),r=e,i=this.R?"GradientType = 1, ":"";if(t){var a=d(t);r="#"+s(a.$,a.C,a.O,a.B)}return"progid:DXImageTransform.Microsoft.gradient("+i+"startColorstr="+e+",endColorstr="+r+")"},toString:function(t){var e=!!t;t=t||this.I;var r=!1,i=this.B<1&&this.B>=0;return e||!i||"hex"!==t&&"hex6"!==t&&"hex3"!==t&&"hex4"!==t&&"hex8"!==t&&"name"!==t?("rgb"===t&&(r=this.rt()),"prgb"===t&&(r=this.nt()),"hex"!==t&&"hex6"!==t||(r=this.Z()),"hex3"===t&&(r=this.Z(!0)),"hex4"===t&&(r=this.et(!0)),"hex8"===t&&(r=this.et()),"name"===t&&(r=this.st()),"hsl"===t&&(r=this.X()),"hsv"===t&&(r=this.K()),r||this.Z()):"name"===t&&0===this.B?this.st():this.rt()},clone:function(){return d(this.toString())},ht:function(t,e){var r=t.apply(null,[this].concat([].slice.call(e)));return this.$=r.$,this.C=r.C,this.O=r.O,this.setAlpha(r.B),this},lt:function(){return this.ht(o,arguments)},dt:function(){return this.ht(h,arguments)},ut:function(){return this.ht(l,arguments)},T:function(){return this.ht(t,arguments)},ct:function(){return this.ht(r,arguments)},ft:function(){return this.ht(i,arguments)},gt:function(){return this.ht(g,arguments)},bt:function(t,e){return t.apply(null,[this].concat([].slice.call(e)))},kt:function(){return this.bt(m,arguments)},wt:function(){return this.bt(b,arguments)},vt:function(){return this.bt(w,arguments)},Mt:function(){return this.bt(k,arguments)},yt:function(){return this.bt(p,[3])},Dt:function(){return this.bt(p,[4])}},d.St=function(t,e){if("object"==u(t)){var r={};for(var i in t)t.hasOwnProperty(i)&&(r[i]="a"===i?t[i]:C(t[i]));t=r}return d(t,e)},d.equals=function(t,e){return!(!t||!e)&&d(t).rt()==d(e).rt()},d.random=function(){return d.St({r:Math.random(),t:Math.random(),b:Math.random()})},d.At=function(t,e,r){r=0===r?0:r||50;var i=d(t).H(),a=d(e).H(),n=r/100;return d({r:(a.r-i.r)*n+i.r,t:(a.t-i.t)*n+i.t,b:(a.b-i.b)*n+i.b,a:(a.a-i.a)*n+i.a})},d.$t=function(t,e){var r=d(t),i=d(e);return(Math.max(r.U(),i.U())+.05)/(Math.min(r.U(),i.U())+.05)},d.Ct=function(t,e,r){var i,a,n=d.$t(t,e);switch(a=!1,(i=function(t){var e,r;return"AA"!==(e=((t=t||{level:"AA",size:"small"}).level||"AA").toUpperCase())&&"AAA"!==e&&(e="AA"),"small"!==(r=(t.size||"small").toLowerCase())&&"large"!==r&&(r="small"),{level:e,size:r}}(r)).level+i.size){case"AAsmall":case"AAAlarge":a=n>=4.5;break;case"AAlarge":a=n>=3;break;case"AAAsmall":a=n>=7}return a},d.xt=function(t,e,r){var i,a,n,s,o=null,h=0;a=(r=r||{}).Ot,n=r.level,s=r.size;for(var l=0;l<e.length;l++)(i=d.$t(t,e[l]))>h&&(h=i,o=d(e[l]));return d.Ct(t,o,{level:n,size:s})||!a?o:(r.Ot=!1,d.xt(t,["#fff","#000"],r))};var v=d.names={Et:"f0f8ff",Bt:"faebd7",Ft:"0ff",It:"7fffd4",Rt:"f0ffff",jt:"f5f5dc",Nt:"ffe4c4",Tt:"000",Ht:"ffebcd",blue:"00f",_t:"8a2be2",Lt:"a52a2a",qt:"deb887",Jt:"ea7e5d",Pt:"5f9ea0",Vt:"7fff00",Wt:"d2691e",zt:"ff7f50",Gt:"6495ed",Ut:"fff8dc",Kt:"dc143c",Xt:"0ff",Qt:"00008b",Yt:"008b8b",Zt:"b8860b",te:"a9a9a9",ee:"006400",re:"a9a9a9",ie:"bdb76b",ae:"8b008b",ne:"556b2f",se:"ff8c00",oe:"9932cc",he:"8b0000",le:"e9967a",de:"8fbc8f",ue:"483d8b",ce:"2f4f4f",fe:"2f4f4f",ge:"00ced1",be:"9400d3",pe:"ff1493",ke:"00bfff",me:"696969",we:"696969",ve:"1e90ff",Me:"b22222",ye:"fffaf0",De:"228b22",Se:"f0f",Ae:"dcdcdc",$e:"f8f8ff",Ce:"ffd700",xe:"daa520",Oe:"808080",green:"008000",Ee:"adff2f",Be:"808080",Fe:"f0fff0",Ie:"ff69b4",Re:"cd5c5c",je:"4b0082",Ne:"fffff0",Te:"f0e68c",He:"e6e6fa",_e:"fff0f5",Le:"7cfc00",qe:"fffacd",Je:"add8e6",Pe:"f08080",Ve:"e0ffff",We:"fafad2",ze:"d3d3d3",Ge:"90ee90",Ue:"d3d3d3",Ke:"ffb6c1",Xe:"ffa07a",Qe:"20b2aa",Ye:"87cefa",Ze:"789",tr:"789",er:"b0c4de",rr:"ffffe0",ir:"0f0",ar:"32cd32",nr:"faf0e6",sr:"f0f",hr:"800000",lr:"66cdaa",dr:"0000cd",ur:"ba55d3",cr:"9370db",gr:"3cb371",br:"7b68ee",pr:"00fa9a",kr:"48d1cc",mr:"c71585",wr:"191970",vr:"f5fffa",Mr:"ffe4e1",yr:"ffe4b5",Dr:"ffdead",Sr:"000080",Ar:"fdf5e6",$r:"808000",Cr:"6b8e23",Or:"ffa500",Er:"ff4500",Br:"da70d6",Fr:"eee8aa",Ir:"98fb98",Rr:"afeeee",jr:"db7093",Nr:"ffefd5",Tr:"ffdab9",Hr:"cd853f",_r:"ffc0cb",Lr:"dda0dd",qr:"b0e0e6",Jr:"800080",Pr:"663399",red:"f00",Vr:"bc8f8f",Wr:"4169e1",zr:"8b4513",Gr:"fa8072",Ur:"f4a460",Kr:"2e8b57",Xr:"fff5ee",Qr:"a0522d",Yr:"c0c0c0",Zr:"87ceeb",ti:"6a5acd",ei:"708090",ri:"708090",ii:"fffafa",ai:"00ff7f",ni:"4682b4",tan:"d2b48c",si:"008080",oi:"d8bfd8",hi:"ff6347",li:"40e0d0",di:"ee82ee",ui:"f5deb3",ci:"fff",fi:"f5f5f5",gi:"ff0",bi:"9acd32"},M=d.pi=function(t){var e={};for(var r in t)t.hasOwnProperty(r)&&(e[t[r]]=r);return e}(v);function y(t){return t=parseFloat(t),(isNaN(t)||t<0||t>1)&&(t=1),t}function D(t,e){(function(t){return"string"==typeof t&&-1!=t.indexOf(".")&&1===parseFloat(t)})(t)&&(t="100%");var r=function(t){return"string"==typeof t&&-1!=t.indexOf("%")}(t);return t=Math.min(e,Math.max(0,parseFloat(t))),r&&(t=parseInt(t*e,10)/100),Math.abs(t-e)<1e-6?1:t%e/parseFloat(e)}function S(t){return Math.min(1,Math.max(0,t))}function A(t){return parseInt(t,16)}function $(t){return 1==t.length?"0"+t:""+t}function C(t){return t<=1&&(t=100*t+"%"),t}function x(t){return Math.round(255*parseFloat(t)).toString(16)}function O(t){return A(t)/255}var E,B,F,I=(B="[\\s|\\(]+("+(E="(?:[-\\+]?\\d*\\.\\d+%?)|(?:[-\\+]?\\d+%?)")+")[,|\\s]+("+E+")[,|\\s]+("+E+")\\s*\\)?",F="[\\s|\\(]+("+E+")[,|\\s]+("+E+")[,|\\s]+("+E+")[,|\\s]+("+E+")\\s*\\)?",{ki:new RegExp(E),i:new RegExp("rgb"+B),o:new RegExp("rgba"+F),h:new RegExp("hsl"+B),g:new RegExp("hsla"+F),p:new RegExp("hsv"+B),m:new RegExp("hsva"+F),S:/^#?([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,M:/^#?([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/,D:/^#?([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,v:/^#?([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/});function R(t){return!!I.ki.exec(t)}return d}();let a=[],n=[];a=[...DarklupJs.exclude_element],a=[...a,".button.wp-color-result"];let i=!1;"yes"==DarklupJs.apply_bg_overlay&&(i=!0),n=[...DarklupJs.exclude_bg_overlay];let e=frontendObject.darklogo,r=frontendObject.lightlogo;let s=75;var t,o;t=frontendObject.darkenLevel,isNaN(t)||(0|(o=parseFloat(t)))!==o||(s=+frontendObject.darkenLevel);class h{constructor(){this.mi(),this.wi||this.vi||(this.Mi(),this.yi(),this.Di(),this.Si(),this.Ai?this.$i():this.Ci()),this.xi.style.display="block"}mi(){this.Oi=[],this.Ei=[],this.Bi=[],this.Fi=[],this.Ii=[],this.Ri=[],this.ji=[],this.Ni=[],this.Ti=[],this.Hi=[],this._i=[],this.Li=[],this.qi=[],this.Ai=!1,this.wi=!1,this.vi=!1,this.Ji=[],this.Pi=[],this.Vi=[],this.Wi=[],this.zi=[],this.Gi=[],this.Ui=[],this.Ki=0,this.Xi=0,this.xi=document.querySelector("html"),this.Qi=document.querySelector(".switch-trigger"),this.Yi=document.querySelectorAll(".switch-trigger"),this.Zi=".switch-trigger",this.ta=document.querySelector(".darklup-mode-switcher"),this.ea=document.querySelector("#wp-admin-bar-darklup-admin-switch"),this.ra=document.querySelector(".darklup-menu-switch"),this.ia=[this.ta,this.ea,this.ra],this.aa=this.ta?.querySelector(".switch-trigger"),this.na=this.ea?.querySelector(".switch-trigger"),this.sa=this.ra?.querySelector(".switch-trigger"),this.oa=[this.aa,this.na,this.sa],this.ha="darklup-dark-mode-enabled",this.la="darklup-admin-dark-mode-enabled";let t=document.querySelector("body");t.classList.contains("wp-admin")&&(this.Ai=!0),t.classList.contains("block-editor-page")&&(this.wi=!0),t.classList.contains("site-editor-php")&&(this.wi=!0),t.classList.contains("wp-customizer")&&(this.vi=!0);let e=this.da(t),r=this.da(this.xi);e?this.ua=e:r?this.ua=r:(this.ua="rgb(255, 255, 255)",t.classList.add("darklup_bg_0"))}yi(){let t,e;t=["head","meta","link","title","style","script",".darklup-mode-switcher",".darklup-mode-switcher *",".darklup-menu-switch",".darklup-menu-switch *",".darklup-switch-preview-inner",".darklup-switch-preview-inner *",".darklup-admin-settings-area .on-off-toggle",".darklup-admin-settings-area .on-off-toggle *",".wp-core-ui .darklup-section-title .button",".darklup-pro-ribbon","#adminmenuwrap","#adminmenuwrap *",".wpc-color-picker--input",".wpc-color-picker--input *",".darklup-single-popup-wrapper .darklup-single-popup",".darklup-main-area .darklup-menu-area ul li a",".darklup-dark-ignore",".darklup-switch-container",".darklup-switch-container *","video","mark","code","pre","ins","option","progress","iframe",".mejs-iframe-overlay","svg *","path","canvas","#wpadminbar","#wpadminbar *","#wpadminbar a","noscript"],a.length>0&&(t=[...a,...t],this.ca(a),this.fa(a)),e=this.ga(t,"html, html *"),this.Oi=document.querySelectorAll(e)}ba(){for(let t of this.Oi)this.pa(t),this.ka(t);this.ma()}wa(t){let e=t.tagName?.toLowerCase();if("a"==e){this.da(t)||t.classList.add("darklup--link")}else"button"==e?t.classList.add("darklup--btn"):"img"==e?t.classList.add("darklup--img"):"svg"==e?t.classList.add("darklup--inline-svg"):"input"==e||"textarea"==e||"select"==e?t.classList.add("darklup--input"):"del"==e?t.classList.add("darklup--text"):t.classList.add("darklup--observed");this.pa(t)}va(t){let e=!1;const r=t.split(",");if(3!==r.length)return e;const[i,a,n]=r.map(t=>parseInt(t));return isNaN(i)||isNaN(a)||isNaN(n)||(e=`rgb(${i}, ${a}, ${n})`),e}Ma(t){let e="",r=this.ya(t).H();return e=`${r.r}, ${r.t}, ${r.b}`,e}Da(){let n,s,o="";for(const t of document.styleSheets)try{for(const a of t.cssRules)if(a.type===CSSRule.STYLE_RULE){let i="";for(const o of a.style)if(o.startsWith("--")){let t=a.style.getPropertyValue(o),e=this.va(t),r=u(c)(t.trim());n=this.Sa(o,"--darklup-bg"),r.P()&&!o.includes("darklup")&&""!==o?i+=`    ${n}: ${this.Aa(t.trim())};\n`:t.includes("url")?i+=`    ${n}: ${t};\n`:e?i+=`    ${n}: ${this.Ma(e)};\n`:t.includes("var")&&(s=this.Sa(t,"--darklup-bg"),i+=`    ${n}: ${s};\n`)}i&&(o+=`${a.selectorText} {\n${i}}\n`)}}catch(t){}return o}Si(){const t=this.Da();this.$a(t,"darklup-variables-css")}pa(t){let e,r;e=this.Ca(t),e&&this._i.push(t),r=this.da(t),r&&(this.Ji.includes(r)?t.classList.add(`darklup_bg_${this.Ji.indexOf(r)}`):(this.Ji.push(r),t.classList.add(`darklup_bg_${this.Ki}`),this.Ki++),t.classList.add("darklup_bg"))}xa(){const r=document.styleSheets;let i="body{background-color:#242525;}";for(let t=0;t<r.length;t++){const d=r[t];try{const r=d.cssRules||d.rules;let e;if(r)for(let t=0;t<r.length;t++){const o=r[t];let h="",l=!0;if(n.length>0&&o.selectorText&&(e=document.querySelector(o.selectorText),e&&this.Gi.includes(e)&&(l=!1)),!(a.length>0&&o.selectorText&&(e=document.querySelector(o.selectorText),e&&this.Ui.includes(e)))){if(o.style){let i,t,e=!1,r=o.style.backgroundColor,a=o.style.backgroundImage,n=o.style.boxShadow;if(n&&"none"!==n){h+=`box-shadow: ${"0px 5px 10px rgba(255, 255, 255, 0.05);"};`}[o.style.borderColor,o.style.borderTopColor,o.style.borderRightColor,o.style.borderBottomColor,o.style.borderLeftColor].forEach((e,r)=>{if(e){let t;0==r?t="":1==r?t="top-":2==r?t="right-":3==r?t="bottom-":4==r&&(t="left-"),e.includes("var")?(i=this.Sa(e,"--darklup-bg"),h+=`border-${t}color: ${i};`):this.Oa(e)&&(h+=`border-${t}color: ${this.Aa(e)};`)}});let s=o.style.background;if(s)if(s.includes("var"))i=this.Sa(s,"--darklup-bg"),h+=`background: ${i} !important;`;else{u(c)(s).P()&&(h+=`background-color: ${this.Aa(s)} !important;`)}if(r)if(r.includes("var"))i=this.Sa(r,"--darklup-bg"),h+=`background-color: ${i} !important;`;else{u(c)(r).P()&&(h+=`background-color: ${this.Aa(r)} !important;`)}if(a&&this.Ea(a)){if(a.includes("var"))t=this.Ba(a,"--darklup-bg");else{if(!a.includes("http"))if(a.startsWith("url(")){let t=a.slice(4,-1).replace(/["']/g,"");a=`url(${new URL(t,d.href).href})`}else if(a.includes("url")){let t=/url\(["']?(.*?)["']?\)/g;a=a.replace(t,this.Fa.bind({Ia:d.href}))}l&&(t=this.Ra(a))}l&&t&&(h+=`background-image: ${t} !important;`,e=!0)}}if(h.length>0)if(o.selectorText.includes(",")){const u=o.selectorText.split(", ");i+=`${u.map(t=>t+":not(.darklup-dark-ignore)").join(", ")} {${h}}\n`}else i+=`${o.selectorText}:not(.darklup-dark-ignore) {${h}}\n`}}}catch(t){}}return i}Di(){n.length>0&&n.forEach(t=>{let e=document.querySelectorAll(t);this.Gi=[...e,...this.Gi]})}Mi(){a.length>0&&a.forEach(t=>{let e=document.querySelectorAll(t);this.Ui=[...e,...this.Ui]}),this.Ui.forEach(t=>{t.classList.add("darklup-dark-ignore")})}Fa(t,e,r,i){return`url(${new URL(e,this.Ia).href})`}ja(t){return t[0].toUpperCase()+t.slice(1)}$a(t,e="darklup-global-css"){const r=document.createElement("style");r.setAttribute("id",e),r.textContent=t,document.head.appendChild(r)}Na(t="darklup-global-css"){document.getElementById("darklup-global-css").remove()}Sa(t,e){return t.replace("--",`${e}--`)}Ba(t,e){return t.replace(/(var\()\s*--/g,"$1--darklup-bg--")}Oa(e){if("rgba(0, 0, 0, 0)"!==e&&"transparent"!==e&&"inherit"!==e&&"initial"!==e){if(e.includes("rgba")){let t;if(t=this.Ta(e),t&&0==t)return!1}return e}return!1}Ha(e){if("rgba(0, 0, 0, 0)"!==e&&"transparent"!==e&&"inherit"!==e&&"initial"!==e){if(e.includes("rgba")){let t;if(t=this.Ta(e),t&&0==t)return!1}return e}return!1}ma(){this.Ji.forEach(t=>{this.Wi.push(this.Aa(t)),this.Wi.push(this.Aa(t))})}Aa(t){let e=u(c)(t);return e=10*e.U()>4?e.ut(s).rt():e.ut(10).rt(),e}_a(t){console.log(t);let e=u(c)(t);return e=10*e.U()>4?e.ut(15).rt():e.ut(10).rt(),e}ya(t){let e=u(c)(t);return e=10*e.U()>4?e.ut(s):e.ut(10),e}La(){const t=document.createElement("style");t.setAttribute("id","darklup-inline-css");let r="";this.Wi.forEach((t,e)=>{r+=`.darklup_bg_${e}{background-color: ${t} !important;}`}),t.textContent=r,document.head.appendChild(t)}qa(){let t=document.getElementById("darklup-inline-css");t&&t.parentNode.removeChild(t)}ka(t){if("none"!==getComputedStyle(t).boxShadow){this.qi.push(t),t.classList.add("wpc--darklup-box-shadow"),this.da(t)||t.classList.add("darklup-non-bg-box-shadow")}}Ja(t){console.log(t),t.length>0&&t.forEach(t=>{document.querySelector(t)?.classList.add("darklup-dark-ignore")})}ca(t){t.length>0&&t.forEach(e=>{if(!e.includes("*")){let t=document.querySelectorAll(e);t&&t.forEach(e=>{if(!this.da(e)){let t=this.Pa(e);e.dataset.Va=t}})}})}fa(t){this.Ui.forEach(e=>{if(this.Wa(e)&&!this.za(e)){let t=this.Ga(e);e.dataset.Ua=t}})}Ka(){document.querySelectorAll(".darklup-dark-ignore").forEach(t=>{t.style.backgroundColor=t.dataset.Va,t.style.color=t.dataset.Ua})}$i(){this.Xa(),this.Qa(),this.Ya()}Ci(){"undefined"==typeof darklupPageExcluded&&(this.Za(),this.tn(),this.en(),this.rn(),this.Ya(),this.an())}Xa(){this.nn()&&(this.sn(),this.$a(this.xa()))}Za(){this.on()&&(this.hn(),this.$a(this.xa()))}on(){let t=!1,e=localStorage.getItem("lightOnDefaultDarkMode"),r=localStorage.getItem("lightOnOSDarkChecked"),i=localStorage.getItem("lightOnTimeBasedDarkMode"),a=!1;"undefined"!=typeof isDefaultDarkModeEnabled&&(a=isDefaultDarkModeEnabled);let n=!1;return"undefined"!=typeof isOSDarkModeEnabled&&(n=isOSDarkModeEnabled),(this.ln()||a&&!e||n&&window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&!r||this.dn()&&!i)&&(t=!0),t}dn(){let i=!1;if("yes"==frontendObject.time_based_mode_active){let t=this.un(frontendObject.time_based_mode_start_time),e=this.un(frontendObject.time_based_mode_end_time),r=new Date;r=Date.parse(r)/1e3,t=Date.parse(t)/1e3,e=Date.parse(e)/1e3,t>e&&(r<=e&&(i=!0),e+=86400),r>=t&&r<=e&&(i=!0)}return i}un(t){var e=t.split(":"),r=parseInt(e[0]),i=parseInt(e[1]),a=new Date;return new Date(a.getFullYear(),a.getMonth(),a.getDate(),r,i)}Qa(){this.ia.forEach(t=>{t?.addEventListener("click",t=>{if(t.target.classList.contains("switch-trigger")){t.target.checked?(this.cn(),this.$a(this.xa())):(this.fn(),this.Na())}})})}tn(){this.ia.forEach(t=>{t?.addEventListener("click",e=>{if(e.target.classList.contains("switch-trigger")){let t=e.target;t.checked?(this.gn(),this.$a(this.xa()),window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&localStorage.removeItem("lightOnOSDarkChecked"),this.ta.contains(t)?this.sa&&(this.sa.checked=!0):this.aa&&(this.aa.checked=!0)):(this.bn(),this.Na(),window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&localStorage.setItem("lightOnOSDarkChecked",!0),isDefaultDarkModeEnabled&&localStorage.setItem("lightOnDefaultDarkMode",!0),frontendObject.time_based_mode_active&&localStorage.setItem("lightOnTimeBasedDarkMode",!0),this.ta.contains(t)?this.sa&&(this.sa.checked=!1):this.aa&&(this.aa.checked=!1))}})})}en(){const t=document.querySelector(".switch-font-trigger");t?.addEventListener("click",()=>{this.xi.classList.toggle("darklup-font-mode-enabled")})}an(){if("undefined"!=typeof isOSDarkModeEnabled&&isOSDarkModeEnabled){let e=localStorage.getItem("lightOnOSDarkChecked");window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",t=>{"dark"===(t.matches?"dark":"light")?e||this.hn():this.pn()})}}rn(){if("undefined"!=typeof isKeyShortDarkModeEnabled&&isKeyShortDarkModeEnabled){let e=!1;document.addEventListener("keydown",t=>{17===t.which&&(e=!0)}),document.addEventListener("keyup",t=>{17===t.which&&(e=!1)}),document.addEventListener("keydown",t=>{if(e&&t.altKey&&68===t.which){this.ln()?(this.bn(),this.Na()):(this.gn(),this.$a(this.xa()))}})}}gn(){this.kn(),this.hn()}bn(){this.mn(),this.pn()}cn(){this.wn(),this.sn()}fn(){this.vn(),this.Mn()}kn(){localStorage.setItem("darklupModeEnabled",this.ha),localStorage.setItem("triggerCheked","checked")}mn(){localStorage.removeItem("darklupModeEnabled"),localStorage.removeItem("triggerCheked")}wn(){localStorage.setItem("adminDarklupModeEnabled",this.ha),localStorage.setItem("adminTriggerChecked","checked")}vn(){localStorage.removeItem("adminDarklupModeEnabled"),localStorage.removeItem("adminTriggerChecked")}yn(){if("undefined"==typeof frontendObject)return;const t=document.querySelector('[src="'+e+'"]');t&&(t.src=r,t.srcset=r),frontendObject.darkimages.forEach(function(t){const e=document.querySelector('[src="'+t[1]+'"]');e&&(e.src=t[0],e.srcset=t[0])})}Dn(){if("undefined"!=typeof frontendObject){var t=document.querySelector('[src="'+r+'"]');t&&(t.src=e,t.srcset=e),frontendObject.darkimages?.forEach(function(t){var e=document.querySelector('[src="'+t[0]+'"]');e&&(e.src=t[1],e.srcset=t[1])})}}hn(){this.xi.classList.add(this.ha),this.Sn(),this.oa.forEach(t=>{t&&(t.checked=!0)})}pn(){this.xi.classList.remove(this.ha),this.An(),this.oa.forEach(t=>{t&&(t.checked=!1)})}sn(){this.xi.classList.add(this.la),this.Sn(),this.oa.forEach(t=>{t&&(t.checked=!0)});let t=document.querySelectorAll(".admin-dark-icon"),e=document.querySelectorAll(".admin-light-icon");t.forEach(t=>{t.style.display="block"}),e.forEach(t=>{t.style.display="none"})}Mn(){this.xi.classList.remove(this.la),this.An(),this.oa.forEach(t=>{t&&(t.checked=!1)});let t=document.querySelectorAll(".admin-dark-icon"),e=document.querySelectorAll(".admin-light-icon");t.forEach(t=>{t.style.display="none"}),e.forEach(t=>{t.style.display="block"})}$n(){if(this.Ai){this.nn()?this.Sn():this.An()}else{this.ln()?this.Sn():this.An()}}Cn(){console.log("Document Ready"),document.addEventListener("DOMContentLoaded",()=>{})}Ya(){window.addEventListener("load",()=>{this.xn()})}On(t){let e=getComputedStyle(t).boxShadow,r=this.En(e);r&&(t.dataset.Bn=e,t.style.setProperty("box-shadow",r,"important"))}Fn(){if(isOSDarkModeEnabled){localStorage.getItem("WpcFrontEndSwitcherClicked")||window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",t=>{"dark"===(t.matches?"dark":"light")?this.Sn():this.An()})}}In(){if(this.Ai){this.nn()&&this.oa.forEach(t=>{t&&(t.checked=!0)})}else this.on()&&this.oa.forEach(t=>{t&&(t.checked=!0)})}Rn(t){let e="primary";const r=t.closest(".darklup--bg-applied");return r&&(r.classList.contains("darklup--bg")?e="primary":r.classList.contains("darklup--secondary-bg")?e="secondary":r.classList.contains("darklup--tertiary-bg")&&(e="tertiary")),e}Pa(t){let e=t.parentNode,r=!1;for(;e;){let t=this.da(e);if(t){r=t;break}e=e.parentNode}return r}Ga(t){let e=t.parentNode,r=!1;for(;e;){let t=this.za(e);if(t){r=t;break}e=e.parentNode}return r}jn(t){let e=!1,r=t.closest(".darklup--bg-applied");return r&&r.classList.contains("darklup--tertiary-bg")&&(e=!0),e}Nn(t){let e,r,i,a,n=window.getComputedStyle(t);return e=parseFloat(n.getPropertyValue("border-top-width")),r=parseFloat(n.getPropertyValue("border-right-width")),i=parseFloat(n.getPropertyValue("border-bottom-width")),a=parseFloat(n.getPropertyValue("border-left-width")),e>0||r>0||i>0||a>0}Tn(r){const i=window.getComputedStyle(r).backgroundColor;if("rgba(0, 0, 0, 0)"!==i&&"transparent"!==i){const t=r.parentElement,e=t?window.getComputedStyle(t):null;return i!==(e?e.backgroundColor:null)&&i}return!1}da(t){let e=window.getComputedStyle(t).getPropertyValue("background-color");if("rgba(0, 0, 0, 0)"!==e&&"transparent"!==e&&"inherit"!==e){if(e.includes("rgba")){let t;if(t=this.Ta(e),t&&0==t)return!1}return e}return!1}Hn(t){let e=window.getComputedStyle(t).color;const r=t.parentElement,i=r?window.getComputedStyle(r):null;return e!=(i?i.color:null)&&("rgba(0, 0, 0, 0)"!==e&&"transparent"!==e&&e)}za(r){const i=window.getComputedStyle(r).color;if("rgba(0, 0, 0, 0)"!==i&&"transparent"!==i){const t=r.parentElement,e=t?window.getComputedStyle(t):null;return i!==(e?e.color:null)&&i}return!1}Wa(t){let e;return e=t.childNodes[0]?.nodeValue?.trim(),e||(e=t.childNodes[t.childNodes.length-1]?.nodeValue?.trim()),""!==e&&void 0!==e&&"inherit"!==e}Ta(t){let e=!1,r=t.match(/rgba?\((\d{1,3}), (\d{1,3}), (\d{1,3}),? ?([\d\.]*)?\)/);return r&&(e=!!r[4]&&r[4]),e}_n(t){let e=window.getComputedStyle(t).getPropertyValue("background-color").match(/rgba?\((\d{1,3}), (\d{1,3}), (\d{1,3}),? ?([\d\.]*)?\)/),r=!1;return e&&(r=!!e[4]&&parseFloat(e[4])),r}Ln(t){return window.getComputedStyle(t).getPropertyValue("background-color")}qn(i){let a=this._n(i);if(a){let t=DarklupJs.secondary_bg,e=window.getComputedStyle(i).getPropertyValue("background-color");i.dataset.Jn=e;let r=t.replace(")",`, ${a})`).replace("rgb","rgba");i.style.backgroundColor=r}}Ca(t){let e=getComputedStyle(t).backgroundImage;return!("none"===e||!e.includes("linear-gradient")&&!e.includes("url"))&&e}Ea(t){return!("none"===t||!t.includes("linear-gradient")&&!t.includes("url"))&&t}Pn(e){let r=this.Ca(e);if(r){if(r.includes("linear-gradient")&&r.includes("url"))this.Vn(e,r),e.classList.add("darklup-bg-gradient--image");else if(r.includes("url")){if(e.classList.add("darklup-bg--image"),!this.Wn(e))if(this.Gi.includes(e));else if(i){let t=`${`linear-gradient(rgba(0, 0, 0, ${DarklupJs.bg_image_dark_opacity}), rgba(0, 0, 0,${DarklupJs.bg_image_dark_opacity}))`}, ${r}`;e.style.setProperty("background-image",t)}this.zn(e)}else r.includes("linear-gradient")&&(e.classList.add("darklup-bg-gradient"),this.Vn(e,r),this.zn(e));e.dataset.Gn=r}}Ra(t){let e;if(t.includes("linear-gradient")&&t.includes("url"))e=this.Un(t);else if(t.includes("url")){if(i){e=`${`linear-gradient(rgba(0, 0, 0, ${DarklupJs.bg_image_dark_opacity}), rgba(0, 0, 0,${DarklupJs.bg_image_dark_opacity}))`}, ${t}`}}else t.includes("linear-gradient")&&(e=this.Un(t));return e}Un(a){let n;const s=a.match(/rgba?\((\s*\d{1,3}\s*,){2}\s*\d{1,3}\s*(,\s*[0-9\.]+)?\)/g);return s.forEach((t,e)=>{let r=this.ya(t),i=r.G();i<.4&&(i=.4,r.setAlpha(i)),n=a?.replace(s[e],r.rt()),a=n}),n}Wn(t){let r=!1;t.classList.contains("darklup-under-darken-bg")&&(r=!0);let i=t.querySelector(":scope > .elementor-background-overlay");if(i){let t=this.Ca(i),e=this.da(i);(t||e)&&(r=!0)}return r}Vn(e,s){if("none"!==s&&s.includes("linear-gradient")){let a;const t=/rgba?\((\s*\d{1,3}\s*,){2}\s*\d{1,3}\s*(,\s*[0-9\.]+)?\)/g,n=s.match(t);n.forEach((t,e)=>{let r=this.ya(t),i=r.G();i<.4&&(i=.4,r.setAlpha(i)),a=s?.replace(n[e],r.rt()),s=a}),n&&a&&(e.style.backgroundImage=a)}}En(r){let i="";const a=r.match(/rgba?\((\s*\d{1,3}\s*,){2}\s*\d{1,3}\s*(,\s*[0-9\.]+)?\)/g);return a.forEach((t,e)=>{i=r?.replace(a[e],this.Aa(t)),r=i}),i}zn(t){let e=t.querySelectorAll("*");e&&e.forEach(t=>{t.classList.add("darklup-under-darken-bg")})}Kn(t){t.style.backgroundImage=t.dataset.Gn}Xn(t){t.style.backgroundColor=t.dataset.Jn}Qn(t){t.style.boxShadow=t.dataset.Bn}ga(t=[],e="html *"){return e+=`:not(:is(${t.join(", ")}))`}ln(){let t=localStorage.getItem("darklupModeEnabled"),e=localStorage.getItem("triggerCheked");return!(!t||!e)}nn(){let t=localStorage.getItem("adminDarklupModeEnabled"),e=localStorage.getItem("adminTriggerChecked");return!(!t||!e)}Sn(){this._i?.forEach(t=>this.Pn(t)),this.qi?.forEach(t=>this.On(t)),this.La(),this.Dn(),this.Ka()}An(){this._i?.forEach(t=>this.Kn(t)),this.qi?.forEach(t=>this.Qn(t)),this.yn(),this.qa()}Yn(r){let i=[];return a.length>0&&a.forEach(t=>{let e=r.parentElement?.querySelectorAll(t);i=[...e,...i]}),i.forEach(t=>{t.classList.add("darklup-dark-ignore")}),i}xn(){const t=document.querySelector("body");new MutationObserver(t=>{t.forEach(t=>{t.addedNodes.forEach(t=>{if(!(t instanceof HTMLElement))return;t.classList?.add("darklup-observer--node");this.Yn(t);this.wa(t);t.querySelectorAll("*").forEach(t=>{if(t.nodeType===Node.ELEMENT_NODE){this.wa(t);this.Yn(t)}})})})}).observe(t.parentNode,{attributes:!0,childList:!0,characterData:!0,subtree:!0})}}document.addEventListener("DOMContentLoaded",function(){new h})})();