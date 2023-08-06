(()=>{function u(t){return t&&t.__esModule?t.default:t}var c={};c=function(){"use strict";function u(t){return(u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}var c=/^\s+/,f=/\s+$/;function d(t,e){if(e=e||{},(t=t||"")instanceof d)return t;if(!(this instanceof d))return new d(t,e);var r=function(t){var e,r,i,a={r:0,t:0,b:0},n=1,s=null,o=null,l=null,h=!1,d=!1;return"string"==typeof t&&(t=function(t){t=t.replace(c,"").replace(f,"").toLowerCase();var e,r=!1;if(v[t])t=v[t],r=!0;else if("transparent"==t)return{r:0,t:0,b:0,a:0,format:"name"};return(e=I.i.exec(t))?{r:e[1],t:e[2],b:e[3]}:(e=I.o.exec(t))?{r:e[1],t:e[2],b:e[3],a:e[4]}:(e=I.l.exec(t))?{h:e[1],s:e[2],u:e[3]}:(e=I.g.exec(t))?{h:e[1],s:e[2],u:e[3],a:e[4]}:(e=I.k.exec(t))?{h:e[1],s:e[2],p:e[3]}:(e=I.m.exec(t))?{h:e[1],s:e[2],p:e[3],a:e[4]}:(e=I.v.exec(t))?{r:$(e[1]),t:$(e[2]),b:$(e[3]),a:O(e[4]),format:r?"name":"hex8"}:(e=I.M.exec(t))?{r:$(e[1]),t:$(e[2]),b:$(e[3]),format:r?"name":"hex"}:(e=I.S.exec(t))?{r:$(e[1]+""+e[1]),t:$(e[2]+""+e[2]),b:$(e[3]+""+e[3]),a:O(e[4]+""+e[4]),format:r?"name":"hex8"}:!!(e=I.D.exec(t))&&{r:$(e[1]+""+e[1]),t:$(e[2]+""+e[2]),b:$(e[3]+""+e[3]),format:r?"name":"hex"}}(t)),"object"==u(t)&&(R(t.r)&&R(t.t)&&R(t.b)?(e=t.r,r=t.t,i=t.b,a={r:255*S(e,255),t:255*S(r,255),b:255*S(i,255)},h=!0,d="%"===String(t.r).substr(-1)?"prgb":"rgb"):R(t.h)&&R(t.s)&&R(t.p)?(s=x(t.s),o=x(t.p),a=function(t,e,r){t=6*S(t,360),e=S(e,100),r=S(r,100);var i=Math.floor(t),a=t-i,n=r*(1-e),s=r*(1-a*e),o=r*(1-(1-a)*e),l=i%6;return{r:255*[r,s,n,n,o,r][l],t:255*[o,r,r,s,n,n][l],b:255*[n,n,o,r,r,s][l]}}(t.h,s,o),h=!0,d="hsv"):R(t.h)&&R(t.s)&&R(t.u)&&(s=x(t.s),l=x(t.u),a=function(t,e,r){var i,a,n;function s(t,e,r){return r<0&&(r+=1),r>1&&(r-=1),r<1/6?t+6*(e-t)*r:r<.5?e:r<2/3?t+(e-t)*(2/3-r)*6:t}if(t=S(t,360),e=S(e,100),r=S(r,100),0===e)i=a=n=r;else{var o=r<.5?r*(1+e):r+e-r*e,l=2*r-o;i=s(l,o,t+1/3),a=s(l,o,t),n=s(l,o,t-1/3)}return{r:255*i,t:255*a,b:255*n}}(t.h,s,l),h=!0,d="hsl"),t.hasOwnProperty("a")&&(n=t.a)),n=y(n),{ok:h,format:t.format||d,r:Math.min(255,Math.max(a.r,0)),t:Math.min(255,Math.max(a.t,0)),b:Math.min(255,Math.max(a.b,0)),a:n}}(t);this.$=t,this.A=r.r,this.C=r.t,this.O=r.b,this.B=r.a,this.F=Math.round(100*this.B)/100,this.I=e.format||r.format,this.R=e.gradientType,this.A<1&&(this.A=Math.round(this.A)),this.C<1&&(this.C=Math.round(this.C)),this.O<1&&(this.O=Math.round(this.O)),this.T=r.ok}function a(t,e,r){t=S(t,255),e=S(e,255),r=S(r,255);var i,a,n=Math.max(t,e,r),s=Math.min(t,e,r),o=(n+s)/2;if(n==s)i=a=0;else{var l=n-s;switch(a=o>.5?l/(2-n-s):l/(n+s),n){case t:i=(e-r)/l+(e<r?6:0);break;case e:i=(r-t)/l+2;break;case r:i=(t-e)/l+4}i/=6}return{h:i,s:a,u:o}}function n(t,e,r){t=S(t,255),e=S(e,255),r=S(r,255);var i,a,n=Math.max(t,e,r),s=Math.min(t,e,r),o=n,l=n-s;if(a=0===n?0:l/n,n==s)i=0;else{switch(n){case t:i=(e-r)/l+(e<r?6:0);break;case e:i=(r-t)/l+2;break;case r:i=(t-e)/l+4}i/=6}return{h:i,s:a,p:o}}function e(t,e,r,i){var a=[A(Math.round(t).toString(16)),A(Math.round(e).toString(16)),A(Math.round(r).toString(16))];return i&&a[0].charAt(0)==a[0].charAt(1)&&a[1].charAt(0)==a[1].charAt(1)&&a[2].charAt(0)==a[2].charAt(1)?a[0].charAt(0)+a[1].charAt(0)+a[2].charAt(0):a.join("")}function s(t,e,r,i){return[A(C(i)),A(Math.round(t).toString(16)),A(Math.round(e).toString(16)),A(Math.round(r).toString(16))].join("")}function t(t,e){e=0===e?0:e||10;var r=d(t).j();return r.s-=e/100,r.s=D(r.s),d(r)}function r(t,e){e=0===e?0:e||10;var r=d(t).j();return r.s+=e/100,r.s=D(r.s),d(r)}function i(t){return d(t).H(100)}function o(t,e){e=0===e?0:e||10;var r=d(t).j();return r.u+=e/100,r.u=D(r.u),d(r)}function l(t,e){e=0===e?0:e||10;var r=d(t).N();return r.r=Math.max(0,Math.min(255,r.r-Math.round(-e/100*255))),r.t=Math.max(0,Math.min(255,r.t-Math.round(-e/100*255))),r.b=Math.max(0,Math.min(255,r.b-Math.round(-e/100*255))),d(r)}function h(t,e){e=0===e?0:e||10;var r=d(t).j();return r.u-=e/100,r.u=D(r.u),d(r)}function g(t,e){var r=d(t).j(),i=(r.h+e)%360;return r.h=i<0?360+i:i,d(r)}function k(t){var e=d(t).j();return e.h=(e.h+180)%360,d(e)}function p(t,e){if(isNaN(e)||e<=0)throw new Error("Argument to polyad must be a positive number");for(var r=d(t).j(),i=[d(t)],a=360/e,n=1;n<e;n++)i.push(d({h:(r.h+n*a)%360,s:r.s,u:r.u}));return i}function b(t){var e=d(t).j(),r=e.h;return[d(t),d({h:(r+72)%360,s:e.s,u:e.u}),d({h:(r+216)%360,s:e.s,u:e.u})]}function m(t,e,r){e=e||6,r=r||30;var i=d(t).j(),a=360/r,n=[d(t)];for(i.h=(i.h-(a*e>>1)+720)%360;--e;)i.h=(i.h+a)%360,n.push(d(i));return n}function w(t,e){e=e||6;for(var r=d(t)._(),i=r.h,a=r.s,n=r.p,s=[],o=1/e;e--;)s.push(d({h:i,s:a,p:n})),n=(n+o)%1;return s}d.prototype={L:function(){return this.q()<128},P:function(){return!this.L()},V:function(){return this.T},W:function(){return this.$},U:function(){return this.I},G:function(){return this.B},q:function(){var t=this.N();return(299*t.r+587*t.t+114*t.b)/1e3},J:function(){var t,e,r,i=this.N();return t=i.r/255,e=i.t/255,r=i.b/255,.2126*(t<=.03928?t/12.92:Math.pow((t+.055)/1.055,2.4))+.7152*(e<=.03928?e/12.92:Math.pow((e+.055)/1.055,2.4))+.0722*(r<=.03928?r/12.92:Math.pow((r+.055)/1.055,2.4))},setAlpha:function(t){return this.B=y(t),this.F=Math.round(100*this.B)/100,this},_:function(){var t=n(this.A,this.C,this.O);return{h:360*t.h,s:t.s,p:t.p,a:this.B}},K:function(){var t=n(this.A,this.C,this.O),e=Math.round(360*t.h),r=Math.round(100*t.s),i=Math.round(100*t.p);return 1==this.B?"hsv("+e+", "+r+"%, "+i+"%)":"hsva("+e+", "+r+"%, "+i+"%, "+this.F+")"},j:function(){var t=a(this.A,this.C,this.O);return{h:360*t.h,s:t.s,u:t.u,a:this.B}},X:function(){var t=a(this.A,this.C,this.O),e=Math.round(360*t.h),r=Math.round(100*t.s),i=Math.round(100*t.u);return 1==this.B?"hsl("+e+", "+r+"%, "+i+"%)":"hsla("+e+", "+r+"%, "+i+"%, "+this.F+")"},Y:function(t){return e(this.A,this.C,this.O,t)},Z:function(t){return"#"+this.Y(t)},tt:function(t){return function(t,e,r,i,a){var n=[A(Math.round(t).toString(16)),A(Math.round(e).toString(16)),A(Math.round(r).toString(16)),A(C(i))];return a&&n[0].charAt(0)==n[0].charAt(1)&&n[1].charAt(0)==n[1].charAt(1)&&n[2].charAt(0)==n[2].charAt(1)&&n[3].charAt(0)==n[3].charAt(1)?n[0].charAt(0)+n[1].charAt(0)+n[2].charAt(0)+n[3].charAt(0):n.join("")}(this.A,this.C,this.O,this.B,t)},et:function(t){return"#"+this.tt(t)},N:function(){return{r:Math.round(this.A),t:Math.round(this.C),b:Math.round(this.O),a:this.B}},rt:function(){return 1==this.B?"rgb("+Math.round(this.A)+", "+Math.round(this.C)+", "+Math.round(this.O)+")":"rgba("+Math.round(this.A)+", "+Math.round(this.C)+", "+Math.round(this.O)+", "+this.F+")"},it:function(){return{r:Math.round(100*S(this.A,255))+"%",t:Math.round(100*S(this.C,255))+"%",b:Math.round(100*S(this.O,255))+"%",a:this.B}},nt:function(){return 1==this.B?"rgb("+Math.round(100*S(this.A,255))+"%, "+Math.round(100*S(this.C,255))+"%, "+Math.round(100*S(this.O,255))+"%)":"rgba("+Math.round(100*S(this.A,255))+"%, "+Math.round(100*S(this.C,255))+"%, "+Math.round(100*S(this.O,255))+"%, "+this.F+")"},st:function(){return 0===this.B?"transparent":!(this.B<1)&&(M[e(this.A,this.C,this.O,!0)]||!1)},ot:function(t){var e="#"+s(this.A,this.C,this.O,this.B),r=e,i=this.R?"GradientType = 1, ":"";if(t){var a=d(t);r="#"+s(a.A,a.C,a.O,a.B)}return"progid:DXImageTransform.Microsoft.gradient("+i+"startColorstr="+e+",endColorstr="+r+")"},toString:function(t){var e=!!t;t=t||this.I;var r=!1,i=this.B<1&&this.B>=0;return e||!i||"hex"!==t&&"hex6"!==t&&"hex3"!==t&&"hex4"!==t&&"hex8"!==t&&"name"!==t?("rgb"===t&&(r=this.rt()),"prgb"===t&&(r=this.nt()),"hex"!==t&&"hex6"!==t||(r=this.Z()),"hex3"===t&&(r=this.Z(!0)),"hex4"===t&&(r=this.et(!0)),"hex8"===t&&(r=this.et()),"name"===t&&(r=this.st()),"hsl"===t&&(r=this.X()),"hsv"===t&&(r=this.K()),r||this.Z()):"name"===t&&0===this.B?this.st():this.rt()},clone:function(){return d(this.toString())},lt:function(t,e){var r=t.apply(null,[this].concat([].slice.call(e)));return this.A=r.A,this.C=r.C,this.O=r.O,this.setAlpha(r.B),this},ht:function(){return this.lt(o,arguments)},dt:function(){return this.lt(l,arguments)},ut:function(){return this.lt(h,arguments)},H:function(){return this.lt(t,arguments)},ct:function(){return this.lt(r,arguments)},ft:function(){return this.lt(i,arguments)},gt:function(){return this.lt(g,arguments)},kt:function(t,e){return t.apply(null,[this].concat([].slice.call(e)))},bt:function(){return this.kt(m,arguments)},wt:function(){return this.kt(k,arguments)},vt:function(){return this.kt(w,arguments)},Mt:function(){return this.kt(b,arguments)},yt:function(){return this.kt(p,[3])},St:function(){return this.kt(p,[4])}},d.Dt=function(t,e){if("object"==u(t)){var r={};for(var i in t)t.hasOwnProperty(i)&&(r[i]="a"===i?t[i]:x(t[i]));t=r}return d(t,e)},d.equals=function(t,e){return!(!t||!e)&&d(t).rt()==d(e).rt()},d.random=function(){return d.Dt({r:Math.random(),t:Math.random(),b:Math.random()})},d.$t=function(t,e,r){r=0===r?0:r||50;var i=d(t).N(),a=d(e).N(),n=r/100;return d({r:(a.r-i.r)*n+i.r,t:(a.t-i.t)*n+i.t,b:(a.b-i.b)*n+i.b,a:(a.a-i.a)*n+i.a})},d.At=function(t,e){var r=d(t),i=d(e);return(Math.max(r.J(),i.J())+.05)/(Math.min(r.J(),i.J())+.05)},d.xt=function(t,e,r){var i,a,n=d.At(t,e);switch(a=!1,(i=function(t){var e,r;return"AA"!==(e=((t=t||{level:"AA",size:"small"}).level||"AA").toUpperCase())&&"AAA"!==e&&(e="AA"),"small"!==(r=(t.size||"small").toLowerCase())&&"large"!==r&&(r="small"),{level:e,size:r}}(r)).level+i.size){case"AAsmall":case"AAAlarge":a=n>=4.5;break;case"AAlarge":a=n>=3;break;case"AAAsmall":a=n>=7}return a},d.Ct=function(t,e,r){var i,a,n,s,o=null,l=0;a=(r=r||{}).Ot,n=r.level,s=r.size;for(var h=0;h<e.length;h++)(i=d.At(t,e[h]))>l&&(l=i,o=d(e[h]));return d.xt(t,o,{level:n,size:s})||!a?o:(r.Ot=!1,d.Ct(t,["#fff","#000"],r))};var v=d.names={Et:"f0f8ff",Bt:"faebd7",Ft:"0ff",It:"7fffd4",Rt:"f0ffff",Tt:"f5f5dc",jt:"ffe4c4",Ht:"000",Nt:"ffebcd",blue:"00f",_t:"8a2be2",Lt:"a52a2a",qt:"deb887",Pt:"ea7e5d",Vt:"5f9ea0",Wt:"7fff00",zt:"d2691e",Ut:"ff7f50",Gt:"6495ed",Jt:"fff8dc",Kt:"dc143c",Xt:"0ff",Qt:"00008b",Yt:"008b8b",Zt:"b8860b",te:"a9a9a9",ee:"006400",re:"a9a9a9",ie:"bdb76b",ae:"8b008b",ne:"556b2f",se:"ff8c00",oe:"9932cc",le:"8b0000",he:"e9967a",de:"8fbc8f",ue:"483d8b",ce:"2f4f4f",fe:"2f4f4f",ge:"00ced1",ke:"9400d3",pe:"ff1493",be:"00bfff",me:"696969",we:"696969",ve:"1e90ff",Me:"b22222",ye:"fffaf0",Se:"228b22",De:"f0f",$e:"dcdcdc",Ae:"f8f8ff",xe:"ffd700",Ce:"daa520",Oe:"808080",green:"008000",Ee:"adff2f",Be:"808080",Fe:"f0fff0",Ie:"ff69b4",Re:"cd5c5c",Te:"4b0082",je:"fffff0",He:"f0e68c",Ne:"e6e6fa",_e:"fff0f5",Le:"7cfc00",qe:"fffacd",Pe:"add8e6",Ve:"f08080",We:"e0ffff",ze:"fafad2",Ue:"d3d3d3",Ge:"90ee90",Je:"d3d3d3",Ke:"ffb6c1",Xe:"ffa07a",Qe:"20b2aa",Ye:"87cefa",Ze:"789",tr:"789",er:"b0c4de",rr:"ffffe0",ir:"0f0",ar:"32cd32",nr:"faf0e6",sr:"f0f",lr:"800000",hr:"66cdaa",dr:"0000cd",ur:"ba55d3",cr:"9370db",gr:"3cb371",kr:"7b68ee",pr:"00fa9a",br:"48d1cc",mr:"c71585",wr:"191970",vr:"f5fffa",Mr:"ffe4e1",yr:"ffe4b5",Sr:"ffdead",Dr:"000080",$r:"fdf5e6",Ar:"808000",Cr:"6b8e23",Or:"ffa500",Er:"ff4500",Br:"da70d6",Fr:"eee8aa",Ir:"98fb98",Rr:"afeeee",Tr:"db7093",jr:"ffefd5",Hr:"ffdab9",Nr:"cd853f",_r:"ffc0cb",Lr:"dda0dd",qr:"b0e0e6",Pr:"800080",Vr:"663399",red:"f00",Wr:"bc8f8f",zr:"4169e1",Ur:"8b4513",Gr:"fa8072",Jr:"f4a460",Kr:"2e8b57",Xr:"fff5ee",Qr:"a0522d",Yr:"c0c0c0",Zr:"87ceeb",ti:"6a5acd",ei:"708090",ri:"708090",ii:"fffafa",ai:"00ff7f",ni:"4682b4",tan:"d2b48c",si:"008080",oi:"d8bfd8",li:"ff6347",hi:"40e0d0",di:"ee82ee",ui:"f5deb3",ci:"fff",fi:"f5f5f5",gi:"ff0",ki:"9acd32"},M=d.pi=function(t){var e={};for(var r in t)t.hasOwnProperty(r)&&(e[t[r]]=r);return e}(v);function y(t){return t=parseFloat(t),(isNaN(t)||t<0||t>1)&&(t=1),t}function S(t,e){(function(t){return"string"==typeof t&&-1!=t.indexOf(".")&&1===parseFloat(t)})(t)&&(t="100%");var r=function(t){return"string"==typeof t&&-1!=t.indexOf("%")}(t);return t=Math.min(e,Math.max(0,parseFloat(t))),r&&(t=parseInt(t*e,10)/100),Math.abs(t-e)<1e-6?1:t%e/parseFloat(e)}function D(t){return Math.min(1,Math.max(0,t))}function $(t){return parseInt(t,16)}function A(t){return 1==t.length?"0"+t:""+t}function x(t){return t<=1&&(t=100*t+"%"),t}function C(t){return Math.round(255*parseFloat(t)).toString(16)}function O(t){return $(t)/255}var E,B,F,I=(B="[\\s|\\(]+("+(E="(?:[-\\+]?\\d*\\.\\d+%?)|(?:[-\\+]?\\d+%?)")+")[,|\\s]+("+E+")[,|\\s]+("+E+")\\s*\\)?",F="[\\s|\\(]+("+E+")[,|\\s]+("+E+")[,|\\s]+("+E+")[,|\\s]+("+E+")\\s*\\)?",{bi:new RegExp(E),i:new RegExp("rgb"+B),o:new RegExp("rgba"+F),l:new RegExp("hsl"+B),g:new RegExp("hsla"+F),k:new RegExp("hsv"+B),m:new RegExp("hsva"+F),D:/^#?([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,M:/^#?([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/,S:/^#?([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,v:/^#?([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/});function R(t){return!!I.bi.exec(t)}return d}();class t{constructor(){this.mi(),this.wi(),this.vi||this.Mi||(this.yi(),this.Si(),this.Di(),this.$i(),this.Ai(),this.xi?this.Ci():this.Oi()),this.Ei.style.display="block"}yi(){let t="html.darkluplite-dark-mode-enabled";this.xi&&(t="html.darkluplite-admin-dark-mode-enabled"),this.Bi=`\n      ${t}  *:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)){\n        color: var(--darkluplite-dynamic-color) !important;\n        border-color: var(--darkluplite-dynamic-border-color) !important;\n      }\n      ${t} *:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)):before,\n      ${t} *:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)):after {\n        color: var(--darkluplite-dynamic-sudo-color) !important;\n      }\n      ${t} a :not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)):before,\n      ${t} a *:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)):after,\n      ${t}  a *:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)),\n      ${t}  a:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)){\n        color: var(--darkluplite-dynamic-link-color) !important;\n      }\n      ${t} a:hover :not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)):before,\n      ${t} a:hover *:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)):after,\n      ${t}  a:hover *:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)),\n      ${t}  a:hover:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)){\n        color: var(--darkluplite-dynamic-link-hover-color) !important;\n      }\n      ${t}  button:not(:is(.darkluplite-dark-ignore, .darkluplite-dark-ignore *)){\n        color: var(--darkluplite-dynamic-btn-text-color) !important;\n      }\n    `}mi(){this.xi=!1,this.Fi=!1,this.Ei=document.querySelector("html"),this.Ii=document.querySelector("body"),this.Ii.classList.contains("wp-admin")&&(this.xi=!0),this.Ii.classList.contains("login")&&(this.Fi=!0),this.Ri=75,this.Ti=10,this.ji=`linear-gradient(rgba(0, 0, 0, ${DarklupJs.bg_image_dark_opacity}), rgba(0, 0, 0,${DarklupJs.bg_image_dark_opacity}))`,this.Hi="0px 5px 10px rgba(255, 255, 255, 0.04);",this.Ni=!1,"yes"==DarklupJs.apply_bg_overlay&&(this.Ni=!0),this._i=frontendObject.darklogo,this.Li=frontendObject.lightlogo,this.xi?this.qi=[".button.wp-color-result"]:this.qi=[],this.Fi?this.Pi=[".login h1 a"]:this.Pi=[]}wi(){this.Vi=[],this.Wi=[],this.zi=[],this.Ui=[],this.Gi=[],this.Ji=[],this.Ki=[],this.Xi=[],this.Qi=[],this.Yi=[],this.Zi=[],this.ta=[],this.ea=[],this.ra=!1,this.vi=!1,this.Mi=!1,this.ia=[],this.aa=[],this.na=[],this.sa=[],this.oa=[],this.la=[],this.ha=[],this.da=0,this.ua=0,this.ca=document.querySelector(".switch-trigger"),this.fa=document.querySelectorAll(".switch-trigger"),this.ga=".switch-trigger",this.ka=document.querySelector(".darkluplite-mode-switcher"),this.pa=document.querySelector("#wp-admin-bar-darkluplite-admin-switch"),this.ba=document.querySelector(".darkluplite-menu-switch"),this.ma=[this.ka,this.pa,this.ba],this.wa=this.ka?.querySelector(".switch-trigger"),this.va=this.pa?.querySelector(".switch-trigger"),this.Ma=this.ba?.querySelector(".switch-trigger"),this.ya=[this.wa,this.va,this.Ma],this.Sa="darkluplite-dark-mode-enabled",this.Da="darkluplite-admin-dark-mode-enabled",this.Ii.classList.contains("block-editor-page")&&(this.ra=!0),this.Ii.classList.contains("site-editor-php")&&(this.ra=!0),this.Ii.classList.contains("wp-customizer")&&(this.vi=!0),this.Ii.classList.contains("oxygen-builder-body")&&(this.Mi=!0);let t=this.$a(this.Ii),e=this.$a(this.Ei);t?this.Aa=t:e?this.Aa=e:(this.Aa="rgb(255, 255, 255)",this.Ii.classList.add("darklup_bg_0"))}$i(){let t,e;t=["head","meta","link","title","style","script",".darklup-mode-switcher",".darklup-mode-switcher *",".darklup-menu-switch",".darklup-menu-switch *",".darklup-switch-preview-inner",".darklup-switch-preview-inner *",".darklup-admin-settings-area .on-off-toggle",".darklup-admin-settings-area .on-off-toggle *",".wp-core-ui .darklup-section-title .button",".darklup-pro-ribbon","#adminmenuwrap","#adminmenuwrap *",".wpc-color-picker--input",".wpc-color-picker--input *",".darklup-single-popup-wrapper .darklup-single-popup",".darklup-main-area .darklup-menu-area ul li a",".darklup-dark-ignore",".darklup-switch-container",".darklup-switch-container *","video","mark","code","pre","ins","option","progress","iframe",".mejs-iframe-overlay","svg *","path","canvas","#wpadminbar","#wpadminbar *","#wpadminbar a","noscript"],this.qi.length>0&&(t=[...this.qi,...t],this.xa(this.qi),this.Ca(this.qi)),e=this.Oa(t,"html, html *"),this.Vi=document.querySelectorAll(e)}Ea(){for(let t of this.Vi)this.Ba(t),this.Fa(t);this.Ia()}Ra(t){let e=t.tagName?.toLowerCase();if("a"==e){this.$a(t)||t.classList.add("darklup--link")}else"button"==e?t.classList.add("darklup--btn"):"img"==e?t.classList.add("darklup--img"):"svg"==e?t.classList.add("darklup--inline-svg"):"input"==e||"textarea"==e||"select"==e?t.classList.add("darklup--input"):"del"==e?t.classList.add("darklup--text"):t.classList.add("darklup--observed");this.Ba(t)}Ta(t){let e=!1;const r=t.split(",");if(3!==r.length)return e;const[i,a,n]=r.map(t=>parseInt(t));return isNaN(i)||isNaN(a)||isNaN(n)||(e=`rgb(${i}, ${a}, ${n})`),e}ja(t){let e="",r=this.Ha(t).N();return e=`${r.r}, ${r.t}, ${r.b}`,e}Na(){let a,n,s="";for(const t of document.styleSheets)try{for(const o of t.cssRules)if(o.type===CSSRule.STYLE_RULE){let i="";for(const s of o.style)if(s.startsWith("--")){let t=o.style.getPropertyValue(s),e=this.Ta(t),r=u(c)(t.trim());a=this._a(s,"--darklup-bg"),r.V()&&!s.includes("darklup")&&""!==s?i+=`    ${a}: ${this.La(t.trim())};\n`:t.includes("url")?i+=`    ${a}: ${t};\n`:e?i+=`    ${a}: ${this.ja(e)};\n`:t.includes("var")&&(n=this._a(t,"--darklup-bg"),i+=`    ${a}: ${n};\n`)}i&&(s+=`${o.selectorText} {\n${i}}\n`)}}catch(t){}return s}Ai(){const t=this.Na();this.qa(t,"darklup-variables-css")}Ba(t){let e,r;e=this.Pa(t),e&&this.Zi.push(t),r=this.$a(t),r&&(this.ia.includes(r)?t.classList.add(`darklup_bg_${this.ia.indexOf(r)}`):(this.ia.push(r),t.classList.add(`darklup_bg_${this.da}`),this.da++),t.classList.add("darklup_bg"))}Va(){const r=document.styleSheets;let i="body{background-color:#242525;}";for(let t=0;t<r.length;t++){const h=r[t];if(null===h.href){let t=h?.ownerNode?.id;if(t.includes("darklup"))continue}try{const r=h.cssRules||h.rules;let e;if(r)for(let t=0;t<r.length;t++){const d=r[t];let o="",l=!0;if(this.Pi.length>0&&d.selectorText&&(e=document.querySelector(d.selectorText),e&&this.la.includes(e)&&(l=!1)),!(this.qi.length>0&&d.selectorText&&(e=document.querySelector(d.selectorText),e&&this.ha.includes(e)))){if(d.style){let t,e,r=!1,i=d.style.backgroundColor,a=d.style.backgroundImage,n=d.style.boxShadow;n&&"none"!==n&&(o+=`box-shadow: ${this.Hi};`);let s=d.style.background;if(s)if(s.includes("var"))t=this._a(s,"--darklup-bg"),o+=`background: ${t} !important;`;else{u(c)(s).V()&&(o+=`background-color: ${this.La(s)} !important;`)}if(i)if(i.includes("var"))t=this._a(i,"--darklup-bg"),o+=`background-color: ${t} !important;`;else{u(c)(i).V()&&(o+=`background-color: ${this.La(i)} !important;`)}if(a&&this.Wa(a)){if(a.includes("var"))e=this.za(a,"--darklup-bg");else{if(!a.includes("http"))if(a.startsWith("url(")){let t=a.slice(4,-1).replace(/["']/g,"");a=`url(${new URL(t,h.href).href})`}else if(a.includes("url")){let t=/url\(["']?(.*?)["']?\)/g;a=a.replace(t,this.Ua.bind({Ga:h.href}))}l&&(e=this.Ja(a))}l&&e&&(o+=`background-image: ${e} !important;`,r=!0)}}if(o.length>0)if(d.selectorText.includes(",")){const u=d.selectorText.split(", ");i+=`${u.map(t=>t+":not(.darkluplite-dark-ignore)").join(", ")} {${o}}\n`}else i+=`${d.selectorText}:not(.darkluplite-dark-ignore) {${o}}\n`}}}catch(t){}}return i+=this.Bi,i}Di(){this.Pi.length>0&&this.Pi.forEach(t=>{let e=document.querySelectorAll(t);this.la=[...e,...this.la]})}Si(){this.qi.length>0&&this.qi.forEach(t=>{let e=document.querySelectorAll(t);this.ha=[...e,...this.ha]}),this.ha.forEach(t=>{t.classList.add("darkluplite-dark-ignore")})}Ua(t,e,r,i){return`url(${new URL(e,this.Ga).href})`}Ka(t){return t[0].toUpperCase()+t.slice(1)}qa(t,e="darklup-global-css"){const r=document.createElement("style");r.setAttribute("id",e),r.textContent=t,document.head.appendChild(r)}Xa(t="darklup-global-css"){document.getElementById("darklup-global-css").remove()}_a(t,e){return t.replace("--",`${e}--`)}za(t,e){return t.replace(/(var\()\s*--/g,"$1--darklup-bg--")}Qa(e){if("rgba(0, 0, 0, 0)"!==e&&"transparent"!==e&&"inherit"!==e&&"initial"!==e){if(e.includes("rgba")){let t;if(t=this.Ya(e),t&&0==t)return!1}return e}return!1}Ia(){this.ia.forEach(t=>{this.sa.push(this.La(t)),this.sa.push(this.La(t))})}La(t){let e=u(c)(t);return e=10*e.J()>4?e.ut(this.Ri).rt():e.ut(this.Ti).rt(),e}Ha(t){let e=u(c)(t);return e=10*e.J()>4?e.ut(this.Ri):e.ut(this.Ti),e}Za(){const t=document.createElement("style");t.setAttribute("id","darklup-inline-css");let r="";this.sa.forEach((t,e)=>{r+=`.darklup_bg_${e}{background-color: ${t} !important;}`}),t.textContent=r,document.head.appendChild(t)}tn(){let t=document.getElementById("darklup-inline-css");t&&t.parentNode.removeChild(t)}Fa(t){if("none"!==getComputedStyle(t).boxShadow){this.ea.push(t),t.classList.add("wpc--darklup-box-shadow"),this.$a(t)||t.classList.add("darklup-non-bg-box-shadow")}}en(t){console.log(t),t.length>0&&t.forEach(t=>{document.querySelector(t)?.classList.add("darklup-dark-ignore")})}xa(t){t.length>0&&t.forEach(e=>{if(!e.includes("*")){let t=document.querySelectorAll(e);t&&t.forEach(e=>{if(!this.$a(e)){let t=this.rn(e);e.dataset.an=t}})}})}Ca(t){this.ha.forEach(e=>{if(this.nn(e)&&!this.sn(e)){let t=this.on(e);e.dataset.ln=t}})}hn(){document.querySelectorAll(".darkluplite-dark-ignore").forEach(t=>{t.style.backgroundColor=t.dataset.an,t.style.color=t.dataset.ln})}Ci(){this.dn(),this.un(),this.cn()}Oi(){"undefined"==typeof darklupPageExcluded&&(this.fn(),this.gn(),this.kn(),this.pn(),this.cn(),this.bn())}dn(){this.mn()&&(this.wn(),this.qa(this.Va()))}fn(){this.vn()&&(this.Mn(),this.qa(this.Va()))}vn(){let t=!1,e=localStorage.getItem("lightOnDefaultDarkMode"),r=localStorage.getItem("lightOnOSDarkChecked"),i=localStorage.getItem("lightOnTimeBasedDarkMode"),a=!1;"undefined"!=typeof isDefaultDarkModeEnabled&&(a=isDefaultDarkModeEnabled);let n=!1;return"undefined"!=typeof isOSDarkModeEnabled&&(n=isOSDarkModeEnabled),(this.yn()||a&&!e||n&&window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&!r||this.Sn()&&!i)&&(t=!0),t}Sn(){let i=!1;if("yes"==frontendObject.time_based_mode_active){let t=this.Dn(frontendObject.time_based_mode_start_time),e=this.Dn(frontendObject.time_based_mode_end_time),r=new Date;r=Date.parse(r)/1e3,t=Date.parse(t)/1e3,e=Date.parse(e)/1e3,t>e&&(r<=e&&(i=!0),e+=86400),r>=t&&r<=e&&(i=!0)}return i}Dn(t){var e=t.split(":"),r=parseInt(e[0]),i=parseInt(e[1]),a=new Date;return new Date(a.getFullYear(),a.getMonth(),a.getDate(),r,i)}un(){this.ma.forEach(t=>{t?.addEventListener("click",t=>{if(t.target.classList.contains("switch-trigger")){t.target.checked?(this.$n(),this.qa(this.Va())):(this.An(),this.Xa())}})})}gn(){this.ma.forEach(t=>{t?.addEventListener("click",e=>{if(e.target.classList.contains("switch-trigger")){let t=e.target;t.checked?(this.xn(),window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&localStorage.removeItem("lightOnOSDarkChecked"),this.ka.contains(t)?this.Ma&&(this.Ma.checked=!0):this.wa&&(this.wa.checked=!0)):(this.Cn(),window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&localStorage.setItem("lightOnOSDarkChecked",!0),isDefaultDarkModeEnabled&&localStorage.setItem("lightOnDefaultDarkMode",!0),frontendObject.time_based_mode_active&&localStorage.setItem("lightOnTimeBasedDarkMode",!0),this.ka.contains(t)?this.Ma&&(this.Ma.checked=!1):this.wa&&(this.wa.checked=!1))}})})}kn(){const t=document.querySelector(".switch-font-trigger");t?.addEventListener("click",()=>{this.Ei.classList.toggle("darklup-font-mode-enabled")})}bn(){if("undefined"!=typeof isOSDarkModeEnabled&&isOSDarkModeEnabled){let e=localStorage.getItem("lightOnOSDarkChecked");window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",t=>{"dark"===(t.matches?"dark":"light")?e||this.xn():this.Cn()})}}pn(){if("undefined"!=typeof isKeyShortDarkModeEnabled&&isKeyShortDarkModeEnabled){let e=!1;document.addEventListener("keydown",t=>{17===t.which&&(e=!0)}),document.addEventListener("keyup",t=>{17===t.which&&(e=!1)}),document.addEventListener("keydown",t=>{if(e&&t.altKey&&68===t.which){this.yn()?this.Cn():this.xn()}})}}xn(){this.On(),this.Mn(),this.qa(this.Va())}Cn(){this.En(),this.Bn(),this.Xa()}$n(){this.Fn(),this.wn()}An(){this.In(),this.Rn()}On(){localStorage.setItem("darklupModeEnabled",this.Sa),localStorage.setItem("triggerCheked","checked")}En(){localStorage.removeItem("darklupModeEnabled"),localStorage.removeItem("triggerCheked")}Fn(){localStorage.setItem("adminDarklupModeEnabled",this.Sa),localStorage.setItem("adminTriggerChecked","checked")}In(){localStorage.removeItem("adminDarklupModeEnabled"),localStorage.removeItem("adminTriggerChecked")}Tn(){if("undefined"==typeof frontendObject)return;const t=document.querySelector('[src="'+this._i+'"]');t&&(t.src=this.Li,t.srcset=this.Li),frontendObject.darkimages.forEach(function(t){const e=document.querySelector('[src="'+t[1]+'"]');e&&(e.src=t[0],e.srcset=t[0])})}jn(){if("undefined"!=typeof frontendObject){var t=document.querySelector('[src="'+this.Li+'"]');t&&(t.src=this._i,t.srcset=this._i),frontendObject.darkimages?.forEach(function(t){var e=document.querySelector('[src="'+t[0]+'"]');e&&(e.src=t[1],e.srcset=t[1])})}}Mn(){this.Ei.classList.add(this.Sa),this.Hn(),this.ya.forEach(t=>{t&&(t.checked=!0)})}Bn(){this.Ei.classList.remove(this.Sa),this.Nn(),this.ya.forEach(t=>{t&&(t.checked=!1)})}wn(){this.Ei.classList.add(this.Da),this.Hn(),this.ya.forEach(t=>{t&&(t.checked=!0)});let t=document.querySelectorAll(".admin-dark-icon"),e=document.querySelectorAll(".admin-light-icon");t.forEach(t=>{t.style.display="block"}),e.forEach(t=>{t.style.display="none"})}Rn(){this.Ei.classList.remove(this.Da),this.Nn(),this.ya.forEach(t=>{t&&(t.checked=!1)});let t=document.querySelectorAll(".admin-dark-icon"),e=document.querySelectorAll(".admin-light-icon");t.forEach(t=>{t.style.display="none"}),e.forEach(t=>{t.style.display="block"})}_n(){if(this.xi){this.mn()?this.Hn():this.Nn()}else{this.yn()?this.Hn():this.Nn()}}Ln(){console.log("Document Ready"),document.addEventListener("DOMContentLoaded",()=>{})}cn(){window.addEventListener("load",()=>{this.qn()})}Pn(t){let e=getComputedStyle(t).boxShadow,r=this.Vn(e);r&&(t.dataset.Wn=e,t.style.setProperty("box-shadow",r,"important"))}zn(){if(isOSDarkModeEnabled){localStorage.getItem("WpcFrontEndSwitcherClicked")||window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",t=>{"dark"===(t.matches?"dark":"light")?this.Hn():this.Nn()})}}Un(){if(this.xi){this.mn()&&this.ya.forEach(t=>{t&&(t.checked=!0)})}else this.vn()&&this.ya.forEach(t=>{t&&(t.checked=!0)})}Gn(t){let e="primary";const r=t.closest(".darklup--bg-applied");return r&&(r.classList.contains("darklup--bg")?e="primary":r.classList.contains("darklup--secondary-bg")?e="secondary":r.classList.contains("darklup--tertiary-bg")&&(e="tertiary")),e}rn(t){let e=t.parentNode,r=!1;for(;e;){let t=this.$a(e);if(t){r=t;break}e=e.parentNode}return r}on(t){let e=t.parentNode,r=!1;for(;e;){let t=this.sn(e);if(t){r=t;break}e=e.parentNode}return r}Jn(t){let e=!1,r=t.closest(".darklup--bg-applied");return r&&r.classList.contains("darklup--tertiary-bg")&&(e=!0),e}Kn(t){let e,r,i,a,n=window.getComputedStyle(t);return e=parseFloat(n.getPropertyValue("border-top-width")),r=parseFloat(n.getPropertyValue("border-right-width")),i=parseFloat(n.getPropertyValue("border-bottom-width")),a=parseFloat(n.getPropertyValue("border-left-width")),e>0||r>0||i>0||a>0}Xn(e){const r=window.getComputedStyle(e).backgroundColor;if("rgba(0, 0, 0, 0)"!==r&&"transparent"!==r){const t=e.parentElement,i=t?window.getComputedStyle(t):null;return r!==(i?i.backgroundColor:null)&&r}return!1}$a(t){let e=window.getComputedStyle(t).getPropertyValue("background-color");if("rgba(0, 0, 0, 0)"!==e&&"transparent"!==e&&"inherit"!==e){if(e.includes("rgba")){let t;if(t=this.Ya(e),t&&0==t)return!1}return e}return!1}Qn(t){let e=window.getComputedStyle(t).color;const r=t.parentElement,i=r?window.getComputedStyle(r):null;return e!=(i?i.color:null)&&("rgba(0, 0, 0, 0)"!==e&&"transparent"!==e&&e)}sn(e){const r=window.getComputedStyle(e).color;if("rgba(0, 0, 0, 0)"!==r&&"transparent"!==r){const t=e.parentElement,i=t?window.getComputedStyle(t):null;return r!==(i?i.color:null)&&r}return!1}nn(t){let e;return e=t.childNodes[0]?.nodeValue?.trim(),e||(e=t.childNodes[t.childNodes.length-1]?.nodeValue?.trim()),""!==e&&void 0!==e&&"inherit"!==e}Ya(t){let e=!1,r=t.match(/rgba?\((\d{1,3}), (\d{1,3}), (\d{1,3}),? ?([\d\.]*)?\)/);return r&&(e=!!r[4]&&r[4]),e}Yn(t){let e=window.getComputedStyle(t).getPropertyValue("background-color").match(/rgba?\((\d{1,3}), (\d{1,3}), (\d{1,3}),? ?([\d\.]*)?\)/),r=!1;return e&&(r=!!e[4]&&parseFloat(e[4])),r}Zn(t){return window.getComputedStyle(t).getPropertyValue("background-color")}ts(i){let a=this.Yn(i);if(a){let t=DarklupJs.secondary_bg,e=window.getComputedStyle(i).getPropertyValue("background-color");i.dataset.es=e;let r=t.replace(")",`, ${a})`).replace("rgb","rgba");i.style.backgroundColor=r}}Pa(t){let e=getComputedStyle(t).backgroundImage;return!("none"===e||!e.includes("linear-gradient")&&!e.includes("url"))&&e}Wa(t){return!("none"===t||!t.includes("linear-gradient")&&!t.includes("url"))&&t}rs(e){let r=this.Pa(e);if(r){if(r.includes("linear-gradient")&&r.includes("url"))this.ns(e,r),e.classList.add("darklup-bg-gradient--image");else if(r.includes("url")){if(e.classList.add("darklup-bg--image"),!this.ss(e))if(this.la.includes(e));else if(this.Ni){let t=`${this.ji}, ${r}`;e.style.setProperty("background-image",t)}this.os(e)}else r.includes("linear-gradient")&&(e.classList.add("darklup-bg-gradient"),this.ns(e,r),this.os(e));e.dataset.ls=r}}Ja(t){let e;if(t.includes("linear-gradient")&&t.includes("url"))e=this.hs(t);else if(t.includes("url")){if(this.Ni){e=`${this.ji}, ${t}`}}else t.includes("linear-gradient")&&(e=this.hs(t));return e}hs(a){let n;const s=a.match(/rgba?\((\s*\d{1,3}\s*,){2}\s*\d{1,3}\s*(,\s*[0-9\.]+)?\)/g);return s.forEach((t,e)=>{let r=this.Ha(t),i=r.G();i<.4&&(i=.4,r.setAlpha(i)),n=a?.replace(s[e],r.rt()),a=n}),n}ss(t){let r=!1;t.classList.contains("darklup-under-darken-bg")&&(r=!0);let i=t.querySelector(":scope > .elementor-background-overlay");if(i){let t=this.Pa(i),e=this.$a(i);(t||e)&&(r=!0)}return r}ns(t,n){if("none"!==n&&n.includes("linear-gradient")){let a;const e=/rgba?\((\s*\d{1,3}\s*,){2}\s*\d{1,3}\s*(,\s*[0-9\.]+)?\)/g,s=n.match(e);s.forEach((t,e)=>{let r=this.Ha(t),i=r.G();i<.4&&(i=.4,r.setAlpha(i)),a=n?.replace(s[e],r.rt()),n=a}),s&&a&&(t.style.backgroundImage=a)}}Vn(r){let i="";const a=r.match(/rgba?\((\s*\d{1,3}\s*,){2}\s*\d{1,3}\s*(,\s*[0-9\.]+)?\)/g);return a.forEach((t,e)=>{i=r?.replace(a[e],this.La(t)),r=i}),i}os(t){let e=t.querySelectorAll("*");e&&e.forEach(t=>{t.classList.add("darklup-under-darken-bg")})}ds(t){t.style.backgroundImage=t.dataset.ls}us(t){t.style.backgroundColor=t.dataset.es}cs(t){t.style.boxShadow=t.dataset.Wn}Oa(t=[],e="html *"){return e+=`:not(:is(${t.join(", ")}))`}yn(){let t=localStorage.getItem("darklupModeEnabled"),e=localStorage.getItem("triggerCheked");return!(!t||!e)}mn(){let t=localStorage.getItem("adminDarklupModeEnabled"),e=localStorage.getItem("adminTriggerChecked");return!(!t||!e)}Hn(){this.Zi?.forEach(t=>this.rs(t)),this.ea?.forEach(t=>this.Pn(t)),this.Za(),this.hn()}Nn(){this.Zi?.forEach(t=>this.ds(t)),this.ea?.forEach(t=>this.cs(t)),this.tn()}fs(t){return void 0!==t&&"function"==typeof t[Symbol.iterator]}gs(r){let i=[];return this.qi.length>0&&this.qi.forEach(t=>{let e=r.parentElement?.querySelectorAll(t);void 0!==e&&this.fs(e)&&(i=[...e,...i])}),i.forEach(t=>{t.classList.add("darkluplite-dark-ignore")}),i}qn(){const t=document.querySelector("body");new MutationObserver(t=>{t.forEach(t=>{t.addedNodes.forEach(t=>{if(!(t instanceof HTMLElement))return;t.classList?.add("darklup-observer--node");this.gs(t);this.Ra(t);t.querySelectorAll("*").forEach(t=>{if(t.nodeType===Node.ELEMENT_NODE){this.Ra(t);this.gs(t)}})})})}).observe(t.parentNode,{attributes:!0,childList:!0,characterData:!0,subtree:!0})}}document.addEventListener("DOMContentLoaded",function(){new t})})();