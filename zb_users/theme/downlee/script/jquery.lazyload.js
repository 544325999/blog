/*! Lazy Load 1.9.3 - MIT license - Copyright 2010-2013 Mika Tuupola */
!function(aFaTeUe,gbCcTaG,dUbTcUd,dcPeMfa){var gVfGaNc=aFaTeUe(gbCcTaG);aFaTeUe.fn.lazyload=function(MgNdSed){function fTbfdFf(){var gbCcTaG=0;dE.each(function(){var dUbTcUd=aFaTeUe(this);if(!aFaTeUeaFaTeUe.skip_invisible||dUbTcUd.is(":visible"))if(aFaTeUe.abovethetop(this,aFaTeUeaFaTeUe)||aFaTeUe.leftofbegin(this,aFaTeUeaFaTeUe));else if(aFaTeUe.belowthefold(this,aFaTeUeaFaTeUe)||aFaTeUe.rightoffold(this,aFaTeUeaFaTeUe)){if(++gbCcTaG>aFaTeUeaFaTeUe.failure_limit)return!1}else dUbTcUd.trigger("appear"),gbCcTaG=0})}var LhbfUfb,dE=this,aFaTeUeaFaTeUe={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:gbCcTaG,data_attribute:"original",skip_invisible:!0,appear:null,load:null,placeholder:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};return MgNdSed&&(dcPeMfa!==MgNdSed.failurelimit&&(MgNdSed.failure_limit=MgNdSed.failurelimit,delete MgNdSed.failurelimit),dcPeMfa!==MgNdSed.effectspeed&&(MgNdSed.effect_speed=MgNdSed.effectspeed,delete MgNdSed.effectspeed),aFaTeUe.extend(aFaTeUeaFaTeUe,MgNdSed)),LhbfUfb=aFaTeUeaFaTeUe.container===dcPeMfa||aFaTeUeaFaTeUe.container===gbCcTaG?gVfGaNc:aFaTeUe(aFaTeUeaFaTeUe.container),0===aFaTeUeaFaTeUe.event.indexOf("scroll")&&LhbfUfb.bind(aFaTeUeaFaTeUe.event,function(){return fTbfdFf()}),this.each(function(){var gbCcTaG=this,dUbTcUd=aFaTeUe(gbCcTaG);gbCcTaG.loaded=!1,(dUbTcUd.attr("src")===dcPeMfa||dUbTcUd.attr("src")===!1)&&dUbTcUd.is("img")&&dUbTcUd.attr("src",aFaTeUeaFaTeUe.placeholder),dUbTcUd.one("appear",function(){if(!this.loaded){if(aFaTeUeaFaTeUe.appear){var dcPeMfa=dE.length;aFaTeUeaFaTeUe.appear.call(gbCcTaG,dcPeMfa,aFaTeUeaFaTeUe)}aFaTeUe("<img />").bind("load",function(){var dcPeMfa=dUbTcUd.attr("data-"+aFaTeUeaFaTeUe.data_attribute);dUbTcUd.hide(),dUbTcUd.is("img")?dUbTcUd.attr("src",dcPeMfa):dUbTcUd.css("background-image","url('"+dcPeMfa+"')"),dUbTcUd[aFaTeUeaFaTeUe.effect](aFaTeUeaFaTeUe.effect_speed),gbCcTaG.loaded=!0;var gVfGaNc=aFaTeUe.grep(dE,function(aFaTeUe){return!aFaTeUe.loaded});if(dE=aFaTeUe(gVfGaNc),aFaTeUeaFaTeUe.load){var MgNdSed=dE.length;aFaTeUeaFaTeUe.load.call(gbCcTaG,MgNdSed,aFaTeUeaFaTeUe)}}).attr("src",dUbTcUd.attr("data-"+aFaTeUeaFaTeUe.data_attribute))}}),0!==aFaTeUeaFaTeUe.event.indexOf("scroll")&&dUbTcUd.bind(aFaTeUeaFaTeUe.event,function(){gbCcTaG.loaded||dUbTcUd.trigger("appear")})}),gVfGaNc.bind("resize",function(){fTbfdFf()}),/(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion)&&gVfGaNc.bind("pageshow",function(gbCcTaG){gbCcTaG.originalEvent&&gbCcTaG.originalEvent.persisted&&dE.each(function(){aFaTeUe(this).trigger("appear")})}),aFaTeUe(dUbTcUd).ready(function(){fTbfdFf()}),this},aFaTeUe.belowthefold=function(dUbTcUd,MgNdSed){var fTbfdFf;return fTbfdFf=MgNdSed.container===dcPeMfa||MgNdSed.container===gbCcTaG?(gbCcTaG.innerHeight?gbCcTaG.innerHeight:gVfGaNc.height())+gVfGaNc.scrollTop():aFaTeUe(MgNdSed.container).offset().top+aFaTeUe(MgNdSed.container).height(),fTbfdFf<=aFaTeUe(dUbTcUd).offset().top-MgNdSed.threshold},aFaTeUe.rightoffold=function(dUbTcUd,MgNdSed){var fTbfdFf;return fTbfdFf=MgNdSed.container===dcPeMfa||MgNdSed.container===gbCcTaG?gVfGaNc.width()+gVfGaNc.scrollLeft():aFaTeUe(MgNdSed.container).offset().left+aFaTeUe(MgNdSed.container).width(),fTbfdFf<=aFaTeUe(dUbTcUd).offset().left-MgNdSed.threshold},aFaTeUe.abovethetop=function(dUbTcUd,MgNdSed){var fTbfdFf;return fTbfdFf=MgNdSed.container===dcPeMfa||MgNdSed.container===gbCcTaG?gVfGaNc.scrollTop():aFaTeUe(MgNdSed.container).offset().top,fTbfdFf>=aFaTeUe(dUbTcUd).offset().top+MgNdSed.threshold+aFaTeUe(dUbTcUd).height()},aFaTeUe.leftofbegin=function(dUbTcUd,MgNdSed){var fTbfdFf;return fTbfdFf=MgNdSed.container===dcPeMfa||MgNdSed.container===gbCcTaG?gVfGaNc.scrollLeft():aFaTeUe(MgNdSed.container).offset().left,fTbfdFf>=aFaTeUe(dUbTcUd).offset().left+MgNdSed.threshold+aFaTeUe(dUbTcUd).width()},aFaTeUe.inviewport=function(gbCcTaG,dUbTcUd){return!(aFaTeUe.rightoffold(gbCcTaG,dUbTcUd)||aFaTeUe.leftofbegin(gbCcTaG,dUbTcUd)||aFaTeUe.belowthefold(gbCcTaG,dUbTcUd)||aFaTeUe.abovethetop(gbCcTaG,dUbTcUd))},aFaTeUe.extend(aFaTeUe.expr[":"],{"below-the-fold":function(gbCcTaG){return aFaTeUe.belowthefold(gbCcTaG,{threshold:0})},"above-the-top":function(gbCcTaG){return!aFaTeUe.belowthefold(gbCcTaG,{threshold:0})},"right-of-screen":function(gbCcTaG){return aFaTeUe.rightoffold(gbCcTaG,{threshold:0})},"left-of-screen":function(gbCcTaG){return!aFaTeUe.rightoffold(gbCcTaG,{threshold:0})},"in-viewport":function(gbCcTaG){return aFaTeUe.inviewport(gbCcTaG,{threshold:0})},"above-the-fold":function(gbCcTaG){return!aFaTeUe.belowthefold(gbCcTaG,{threshold:0})},"right-of-fold":function(gbCcTaG){return aFaTeUe.rightoffold(gbCcTaG,{threshold:0})},"left-of-fold":function(gbCcTaG){return!aFaTeUe.rightoffold(gbCcTaG,{threshold:0})}})}(jQuery,window,document);$(document).ready(function(){$("img.lazy").lazyload({placeholder:bloghost+"zb_users/theme/downlee/style/images/lazyloading.gif",effect:"fadeIn",failurelimit:30})});