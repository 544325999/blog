/*! Respond.js v1.4.2: min/max-width media query polyfill * Copyright 2013 Scott Jehl
 * Licensed under https://github.com/scottjehl/Respond/blob/master/LICENSE-MIT
 *  */
!function(de){"use strict";de.matchMedia=de.matchMedia||function(de){var dA,dQ=de.documentElement,gd=dQ.firstElementChild||dQ.firstChild,fd=de.createElement("body"),eT=de.createElement("div");return eT.id="mq-test-1",eT.style.cssText="position:absolute;top:-100em",fd.style.background="none",fd.appendChild(eT),function(de){return eT.innerHTML='&shy;<style media="'+de+'"> #mq-test-1 { width: 42px; }</style>',dQ.insertBefore(fd,gd),dA=42===eT.offsetWidth,dQ.removeChild(fd),{matches:dA,media:de}}}(de.document)}(this),function(de){"use strict";function dA(){aa(!0)}var dQ={};de.respond=dQ,dQ.update=function(){};var gd=[],fd=function(){var dA=!1;try{dA=new de.XMLHttpRequest}catch(dQ){dA=new de.ActiveXObject("Microsoft.XMLHTTP")}return function(){return dA}}(),eT=function(de,dA){var dQ=fd();dQ&&(dQ.open("GET",de,!0),dQ.onreadystatechange=function(){4!==dQ.readyState||200!==dQ.status&&304!==dQ.status||dA(dQ.responseText)},4!==dQ.readyState&&dQ.send(null))};if(dQ.ajax=eT,dQ.queue=gd,dQ.regex={media:/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi,keyframes:/@(?:\-(?:o|moz|webkit)\-)?keyframes[^\{]+\{(?:[^\{\}]*\{[^\}\{]*\})+[^\}]*\}/gi,urls:/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,findStyles:/@media *([^\{]+)\{([\S\s]+?)$/,only:/(only\s+)?([a-zA-Z]+)\s?/,minw:/\([\s]*min\-width\s*:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/,maxw:/\([\s]*max\-width\s*:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/},dQ.mediaQueriesSupported=de.matchMedia&&null!==de.matchMedia("only all")&&de.matchMedia("only all").matches,!dQ.mediaQueriesSupported){var fH,dU,hb,aT=de.document,cZ=aT.documentElement,cP=[],aK=[],fg=[],dY={},eO=30,fc=aT.getElementsByTagName("head")[0]||cZ,bX=aT.getElementsByTagName("base")[0],dL=fc.getElementsByTagName("link"),gH=function(){var de,dA=aT.createElement("div"),dQ=aT.body,gd=cZ.style.fontSize,fd=dQ&&dQ.style.fontSize,eT=!1;return dA.style.cssText="position:absolute;font-size:1em;width:1em",dQ||(dQ=eT=aT.createElement("body"),dQ.style.background="none"),cZ.style.fontSize="100%",dQ.style.fontSize="100%",dQ.appendChild(dA),eT&&cZ.insertBefore(dQ,cZ.firstChild),de=dA.offsetWidth,eT?cZ.removeChild(dQ):dQ.removeChild(dA),cZ.style.fontSize=gd,fd&&(dQ.style.fontSize=fd),de=hb=parseFloat(de)},aa=function(dA){var dQ="clientWidth",gd=cZ[dQ],fd="CSS1Compat"===aT.compatMode&&gd||aT.body[dQ]||gd,eT={},dY=dL[dL.length-1],bX=(new Date).getTime();if(dA&&fH&&eO>bX-fH)return de.clearTimeout(dU),dU=de.setTimeout(aa,eO),void 0;fH=bX;for(var ei in cP)if(cP.hasOwnProperty(ei)){var gV=cP[ei],dO=gV.minw,hc=gV.maxw,dG=null===dO,dede=null===hc,dAde="em";dO&&(dO=parseFloat(dO)*(dO.indexOf(dAde)>-1?hb||gH():1)),hc&&(hc=parseFloat(hc)*(hc.indexOf(dAde)>-1?hb||gH():1)),gV.hasquery&&(dG&&dede||!(dG||fd>=dO)||!(dede||hc>=fd))||(eT[gV.media]||(eT[gV.media]=[]),eT[gV.media].push(aK[gV.rules]))}for(var dQde in fg)fg.hasOwnProperty(dQde)&&fg[dQde]&&fg[dQde].parentNode===fc&&fc.removeChild(fg[dQde]);fg.length=0;for(var gdde in eT)if(eT.hasOwnProperty(gdde)){var fdde=aT.createElement("style"),eTde=eT[gdde].join("\n");fdde.type="text/css",fdde.media=gdde,fc.insertBefore(fdde,dY.nextSibling),fdde.styleSheet?fdde.styleSheet.cssText=eTde:fdde.appendChild(aT.createTextNode(eTde)),fg.push(fdde)}},ei=function(de,dA,gd){var fd=de.replace(dQ.regex.keyframes,"").match(dQ.regex.media),eT=fd&&fd.length||0;dA=dA.substring(0,dA.lastIndexOf("/"));var fH=function(de){return de.replace(dQ.regex.urls,"$1"+dA+"$2$3")},dU=!eT&&gd;dA.length&&(dA+="/"),dU&&(eT=1);for(var hb=0;eT>hb;hb++){var aT,cZ,fg,dY;dU?(aT=gd,aK.push(fH(de))):(aT=fd[hb].match(dQ.regex.findStyles)&&RegExp.$1,aK.push(RegExp.$2&&fH(RegExp.$2))),fg=aT.split(","),dY=fg.length;for(var eO=0;dY>eO;eO++)cZ=fg[eO],cP.push({media:cZ.split("(")[0].match(dQ.regex.only)&&RegExp.$2||"all",rules:aK.length-1,hasquery:cZ.indexOf("(")>-1,minw:cZ.match(dQ.regex.minw)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:cZ.match(dQ.regex.maxw)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}aa()},gV=function(){if(gd.length){var dA=gd.shift();eT(dA.href,function(dQ){ei(dQ,dA.href,dA.media),dY[dA.href]=!0,de.setTimeout(function(){gV()},0)})}},dO=function(){for(var dA=0;dA<dL.length;dA++){var dQ=dL[dA],fd=dQ.href,eT=dQ.media,fH=dQ.rel&&"stylesheet"===dQ.rel.toLowerCase();fd&&fH&&!dY[fd]&&(dQ.styleSheet&&dQ.styleSheet.rawCssText?(ei(dQ.styleSheet.rawCssText,fd,eT),dY[fd]=!0):(!/^([a-zA-Z:]*\/\/)/.test(fd)&&!bX||fd.replace(RegExp.$1,"").split("/")[0]===de.location.host)&&("//"===fd.substring(0,2)&&(fd=de.location.protocol+fd),gd.push({href:fd,media:eT})))}gV()};dO(),dQ.update=dO,dQ.getEmValue=gH,de.addEventListener?de.addEventListener("resize",dA,!1):de.attachEvent&&de.attachEvent("onresize",dA)}}(this);