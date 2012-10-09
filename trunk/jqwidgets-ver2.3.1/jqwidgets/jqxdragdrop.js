/*
jQWidgets v2.3.1 (2012-July-23)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){a.jqx.jqxWidget("jqxDragDrop","",{});a.extend(a.jqx._jqxDragDrop.prototype,{defineInstance:function(){this.restricter="document";this.handle=false;this.feedback="clone";this.opacity=0.6;this.revert=false;this.revertDuration=400;this.distance=5;this.disabled=false;this.tolerance="intersect";this.data=null;this.dropAction="default";this.dragZIndex=99999;this.appendTo="parent";this.cursor="move";this.onDragEnd=null;this.onDrag=null;this.onDragStart=null;this.onTargetDrop=null;this.onDropTargetEnter=null;this.onDropTargetLeave=null;this.initFeedback=null;this._touchEvents={mousedown:"touchstart",click:"touchstart",mouseup:"touchend",mousemove:"touchmove",mouseenter:"mouseenter",mouseleave:"mouseleave"};this._restricter=null;this._zIndexBackup=0;this._targetEnterFired=false;this._oldOpacity=1;this._feedbackType;this._isTouchDevice=false;this._events=["dragStart","dragEnd","dragging","dropTargetEnter","dropTargetLeave"]},createInstance:function(){this._createDragDrop()},_createDragDrop:function(){var c=a.data(document.body,"jqx-draggables")||1;this.appendTo=this._getParent();this._isTouchDevice=a.jqx.mobile.isTouchDevice();if((/(static|relative)/).test(this.host.css("position"))){if(!this.feedback||this.feedback==="original"){var d=this._getRelativeOffset(this.host);var b=this.appendTo.offset();if(this.appendTo.css("position")!="static"){b={left:0,top:0}}this.element.style.position="absolute";this.element.style.left=b.left+d.left+"px";this.element.style.top=b.top+d.top+"px"}}this._validateProperties();this._idHandler(c);if(this.disabled){this.disable()}if(typeof this.dropTarget==="string"){this.dropTarget=a(this.dropTarget)}this._refresh();c+=1;a.data(document.body,"jqx-draggables",c);this.host.addClass("jqx-draggable");if(!this.disabled){this.host.css("cursor",this.cursor)}},_getParent:function(){var b=this.appendTo;if(typeof this.appendTo==="string"){switch(this.appendTo){case"parent":b=this.host.parent();break;case"document":b=a(document);break;case"body":b=a(document.body);break;default:b=a(this.appendTo);break}}return b},_idHandler:function(b){if(!this.element.id){var c="jqx-draggable-"+b;this.element.id=c}},_refresh:function(){this._removeEventHandlers();this._addEventHandlers()},_getEvent:function(b){if(this._isTouchDevice){return this._touchEvents[b]}else{return b}},_validateProperties:function(){if(this.feedback==="clone"){this._feedbackType="clone"}else{this._feedbackType="original"}if(this.dropAction!=="default"){this.dropAction="nothing"}},_removeEventHandlers:function(){this.removeHandler(this.host,"dragstart");this.removeHandler(this.host,this._getEvent("mousedown")+".draggable."+this.element.id,this._mouseDown);this.removeHandler(a(document),this._getEvent("mousemove")+".draggable."+this.element.id,this._mouseMove);this.removeHandler(a(document),this._getEvent("mouseup")+".draggable."+this.element.id,this._mouseUp)},_addEventHandlers:function(){var b=this;this.addHandler(this.host,"dragstart",function(d){d.preventDefault();return false});this.addHandler(this.host,this._getEvent("mousedown")+".draggable."+this.element.id,this._mouseDown,{self:this});this.addHandler(a(document),this._getEvent("mousemove")+".draggable."+this.element.id,this._mouseMove,{self:this});this.addHandler(a(document),this._getEvent("mouseup")+".draggable."+this.element.id,this._mouseUp,{self:this});if(window.frameElement){if(window.top!=null){var c=function(d){b._mouseUp(b)};if(window.top.document.addEventListener){window.top.document.addEventListener("mouseup",c,false)}else{if(window.top.document.attachEvent){window.top.document.attachEvent("onmouseup",c)}}}}},_mouseDown:function(e){var b=e.data.self,d=b._getMouseCoordinates(e),c=b._mouseCapture(e);b._originalPageX=d.left;b._originalPageY=d.top;if(!b._mouseStarted){b._mouseUp(e)}if(c){b._mouseDownEvent=e}if(e.which!==1||!c){return true}e.preventDefault()},_mouseMove:function(c){var b=c.data.self;if(b._mouseStarted){b._mouseDrag(c);return c.preventDefault()}if(b._mouseDownEvent&&b._isMovedDistance(c)){if(b._mouseStart(b._mouseDownEvent,c)){b._mouseStarted=true}else{b._mouseStarted=false}if(b._mouseStarted){b._mouseDrag(c)}else{b._mouseUp(c)}}return !b._mouseStarted},_mouseUp:function(c){var b;if(c.data&&c.data.self){b=c.data.self}else{b=this}b._mouseDownEvent=false;b._movedDistance=false;if(b._mouseStarted){b._mouseStarted=false;b._mouseStop(c)}if(b.feedback&&b.feedback[0]&&b._feedbackType!=="original"&&typeof b.feedback.remove==="function"&&!b.revert){b.feedback.remove()}return false},cancelDrag:function(){var b=this.revertDuration;this.revertDuration=0;this._mouseDownEvent=false;this._movedDistance=false;this._mouseStarted=false;this._mouseStop();this.feedback.remove();this.revertDuration=b},_isMovedDistance:function(b){var c=this._getMouseCoordinates(b);if(this._movedDistance){return true}if(c.left>=this._originalPageX+this.distance||c.left<=this._originalPageX-this.distance||c.top>=this._originalPageY+this.distance||c.top<=this._originalPageY-this.distance){this._movedDistance=true;return true}return false},_getMouseCoordinates:function(b){if(this._isTouchDevice){return{left:b.originalEvent.touches[0].pageX,top:b.originalEvent.touches[0].pageY}}else{return{left:b.pageX,top:b.pageY}}},destroy:function(){this.host.removeData("draggable").unbind(".draggable").removeClass("jqx-draggable jqx-draggable-dragging jqx-draggable-disabled");this._removeEventHandlers();this.isDestroyed=true;return this},_disableSelection:function(b){b.each(function(){a(this).attr("unselectable","on").css({"-ms-user-select":"none","-moz-user-select":"none","-webkit-user-select":"none","user-select":"none"}).each(function(){this.onselectstart=function(){return false}})})},_enableSelection:function(b){b.each(function(){a(this).attr("unselectable","off").css({"-ms-user-select":"text","-moz-user-select":"text","-webkit-user-select":"text","user-select":"text"}).each(function(){this.onselectstart=null})})},_mouseCapture:function(b){if(this.disabled){return false}if(!this._getHandle(b)){return false}this._disableSelection(this.host);return true},_getScrollParent:function(b){var c;if((a.browser.msie&&(/(static|relative)/).test(b.css("position")))||(/absolute/).test(b.css("position"))){c=b.parents().filter(function(){return(/(relative|absolute|fixed)/).test(a.curCSS(this,"position",1))&&(/(auto|scroll)/).test(a.curCSS(this,"overflow",1)+a.curCSS(this,"overflow-y",1)+a.curCSS(this,"overflow-x",1))}).eq(0)}else{c=b.parents().filter(function(){return(/(auto|scroll)/).test(a.curCSS(this,"overflow",1)+a.curCSS(this,"overflow-y",1)+a.curCSS(this,"overflow-x",1))}).eq(0)}return(/fixed/).test(b.css("position"))||!c.length?a(document):c},_mouseStart:function(d){var c=this._getMouseCoordinates(d),b=this._getParentOffset(this.host);this.feedback=this._createFeedback(d);this._zIndexBackup=this.feedback.css("z-index");this.feedback[0].style.zIndex=this.dragZIndex;this._backupFeedbackProportions();this._backupeMargins();this._positionType=this.feedback.css("position");this._scrollParent=this._getScrollParent(this.feedback);this._offset=this.positionAbs=this.host.offset();this._offset={top:this._offset.top-this.margins.top,left:this._offset.left-this.margins.left};a.extend(this._offset,{click:{left:c.left-this._offset.left,top:c.top-this._offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset(),hostRelative:this._getRelativeOffset(this.host)});this.position=this._generatePosition(d);this.originalPosition=this._fixPosition();if(this.restricter){this._setRestricter()}this.feedback.addClass(this.toThemeProperty("jqx-draggable-dragging"));this._raiseEvent(0,d);if(this.onDragStart&&typeof this.onDragStart==="function"){this.onDragStart(this.position)}this._mouseDrag(d,true);return true},_fixPosition:function(){var c=this._getRelativeOffset(this.host),b=this.position;b={left:this.position.left+c.left,top:this.position.top+c.top};return b},_mouseDrag:function(b,c){this.position=this._generatePosition(b);this.positionAbs=this._convertPositionTo("absolute");this.feedback[0].style.left=this.position.left+"px";this.feedback[0].style.top=this.position.top+"px";this._raiseEvent(2,b);if(this.onDrag&&typeof this.onDrag==="function"){this.onDrag(this.data,this.position)}this._handleTarget();return false},_over:function(b,d,e){if(this.dropTarget){var f=false,c=this;a.each(this.dropTarget,function(g,h){f=c._overItem(h,b,d,e);if(f.over){return false}})}return f},_overItem:function(i,c,e,g){i=a(i);var b=i.offset(),f=i.outerHeight(),d=i.outerWidth(),h;if(!i||i[0]===this.element){return}switch(this.tolerance){case"intersect":if(c.left+e>b.left&&c.left<b.left+d&&c.top+g>b.top&&c.top<b.top+f){h=true}break;case"fit":if(e+c.left<=b.left+d&&c.left>=b.left&&g+c.top<=b.top+f&&c.top>=b.top){h=true}break}return{over:h,target:i}},_handleTarget:function(){if(this.dropTarget){var b=this.feedback.offset(),c=this.feedback.outerWidth(),d=this.feedback.outerWidth(),e=this._over(b,c,d);if(e.over){if(!this._targetEnterFired){this._targetEnterFired=true;this._raiseEvent(3,{target:e.target});if(this.onDropTargetEnter&&typeof this.onDropTargetEnter==="function"){this.onDropTargetEnter()}}}else{if(this._targetEnterFired){this._targetEnterFired=false;this._raiseEvent(4,{target:e.target});if(this.onDropTargetLeave&&typeof this.onDropTargetLeave==="function"){this.onDropTargetLeave()}}}}},_mouseStop:function(d){var e=false,b=this._fixPosition(),c={width:this.host.outerWidth(),height:this.host.outerHeight()};this.feedback[0].style.opacity=this._oldOpacity;if(!this.revert){this.feedback[0].style.zIndex=this._zIndexBackup}this._enableSelection(this.host);if(this.dropped){e=this.dropped;this.dropped=false}if((!this.element||!this.element.parentNode)&&this.feedback==="original"){return false}this._dropElement(b);this.feedback.removeClass(this.toThemeProperty("jqx-draggable-dragging"));this._raiseEvent(1,d);if(this.onDragEnd&&typeof this.onDragEnd==="function"){this.onDragEnd(this.data)}if(this.onTargetDrop&&typeof this.onTargetDrop==="function"&&this._over(b,c.width,c.height).over){this.onTargetDrop(this.data)}this._revertHandler();return false},_dropElement:function(b){if(this.dropAction==="default"&&this.feedback&&this.feedback[0]!==this.element&&this.feedback!=="original"){if(!this.revert){if(!(/(fixed|absolute)/).test(this.host.css("position"))){this.host.css("position","relative");var c=this._getRelativeOffset(this.host);b=this.position;b.left-=c.left;b.top-=c.top;this.element.style.left=b.left+"px";this.element.style.top=b.top+"px"}}}},_revertHandler:function(){if(this.revert||(a.isFunction(this.revert)&&this.revert())){var b=this;if(this._feedbackType!="original"){if(this.feedback!=null){if(this.dropAction!="none"){a(this.feedback).animate({left:b.originalPosition.left-b._offset.hostRelative.left,top:b.originalPosition.top-b._offset.hostRelative.top},parseInt(this.revertDuration,10),function(){if(b.feedback&&b.feedback[0]&&b._feedbackType!=="original"&&typeof b.feedback.remove==="function"){b.feedback.remove()}})}else{if(b.feedback&&b.feedback[0]&&b._feedbackType!=="original"&&typeof b.feedback.remove==="function"){b.feedback.remove()}}}}else{this.element.style.zIndex=this.dragZIndex;a(this.host).animate({left:b.originalPosition.left-b._offset.hostRelative.left,top:b.originalPosition.top-b._offset.hostRelative.top},parseInt(this.revertDuration,10),function(){b.element.style.zIndex=b._zIndexBackup})}}},_getHandle:function(b){var c;if(!this.handle){c=true}else{a(this.handle,this.host).find("*").andSelf().each(function(){if(this==b.target){c=true}})}return c},_createFeedback:function(c){var b;if(typeof this._feedbackType==="function"){b=this._feedbackType()}else{if(this._feedbackType==="clone"){b=this.host.clone().removeAttr("id")}else{b=this.host}}if(!(/(absolute|fixed)/).test(b.css("position"))){b.css("position","absolute")}if(this.appendTo[0]!==this.host.parent()[0]||b[0]!==this.element){var d={};b.css({left:this.host.offset().left-this._getParentOffset(this.host).left+this._getParentOffset(b).left,top:this.host.offset().top-this._getParentOffset(this.host).top+this._getParentOffset(b).top});b.appendTo(this.appendTo)}if(typeof this.initFeedback==="function"){this.initFeedback(b)}return b},_getParentOffset:function(c){var c=c||this.feedback;this._offsetParent=c.offsetParent();var b=this._offsetParent.offset();if(this._positionType=="absolute"&&this._scrollParent[0]!==document&&a.contains(this._scrollParent[0],this._offsetParent[0])){b.left+=this._scrollParent.scrollLeft();b.top+=this._scrollParent.scrollTop()}if((this._offsetParent[0]==document.body)||(this._offsetParent[0].tagName&&this._offsetParent[0].tagName.toLowerCase()=="html"&&a.browser.msie)){b={top:0,left:0}}return{top:b.top+(parseInt(this._offsetParent.css("border-top-width"),10)||0),left:b.left+(parseInt(this._offsetParent.css("border-left-width"),10)||0)}},_getRelativeOffset:function(c){var d=this._scrollParent||c.parent();c=c||this.feedback;if(c.css("position")==="relative"){var b=this.host.position();return{top:b.top-(parseInt(c.css("top"),10)||0)+d.scrollTop(),left:b.left-(parseInt(c.css("left"),10)||0)+d.scrollLeft()}}else{return{top:0,left:0}}},_backupeMargins:function(){this.margins={left:(parseInt(this.host.css("margin-left"),10)||0),top:(parseInt(this.host.css("margin-top"),10)||0),right:(parseInt(this.host.css("margin-right"),10)||0),bottom:(parseInt(this.host.css("margin-bottom"),10)||0)}},_backupFeedbackProportions:function(){this.feedback[0].style.opacity=this.opacity;this._feedbackProportions={width:this.feedback.outerWidth(),height:this.feedback.outerHeight()}},_setRestricter:function(){if(this.restricter=="parent"){this.restricter=this.feedback[0].parentNode}if(this.restricter=="document"||this.restricter=="window"){this._handleNativeRestricter()}if(typeof this.restricter.left!=="undefined"&&typeof this.restricter.top!=="undefined"&&typeof this.restricter.height!=="undefined"&&typeof this.restricter.width!=="undefined"){this._restricter=[this.restricter.left,this.restricter.top,this.restricter.width,this.restricter.height]}else{if(!(/^(document|window|parent)$/).test(this.restricter)&&this.restricter.constructor!=Array){this._handleDOMParentRestricter()}else{if(this.restricter.constructor==Array){this._restricter=this.restricter}}}},_handleNativeRestricter:function(){this._restricter=[this.restricter==="document"?0:a(window).scrollLeft()-this._offset.relative.left-this._offset.parent.left,this.restricter==="document"?0:a(window).scrollTop()-this._offset.relative.top-this._offset.parent.top,(this.restricter==="document"?0:a(window).scrollLeft())+a(this.restricter==="document"?document:window).width()-this._feedbackProportions.width-this.margins.left,(this.restricter==="document"?0:a(window).scrollTop())+(a(this.restricter==="document"?document:window).height()||document.body.parentNode.scrollHeight)-this._feedbackProportions.height-this.margins.top]},_handleDOMParentRestricter:function(){var d=a(this.restricter),b=d[0];if(!b){return}var c=(a(b).css("overflow")!=="hidden");this._restricter=[(parseInt(a(b).css("borderLeftWidth"),10)||0)+(parseInt(a(b).css("paddingLeft"),10)||0),(parseInt(a(b).css("borderTopWidth"),10)||0)+(parseInt(a(b).css("paddingTop"),10)||0),(c?Math.max(b.scrollWidth,b.offsetWidth):b.offsetWidth)-(parseInt(a(b).css("borderLeftWidth"),10)||0)-(parseInt(a(b).css("paddingRight"),10)||0)-this._feedbackProportions.width-this.margins.left-this.margins.right,(c?Math.max(b.scrollHeight,b.offsetHeight):b.offsetHeight)-(parseInt(a(b).css("borderTopWidth"),10)||0)-(parseInt(a(b).css("paddingBottom"),10)||0)-this._feedbackProportions.height-this.margins.top-this.margins.bottom];this._restrictiveContainer=d},_convertPositionTo:function(f,c){if(!c){c=this.position}var e,b,g;if(f==="absolute"){e=1}else{e=-1}if(this._positionType==="absolute"&&!(this._scrollParent[0]!=document&&a.contains(this._scrollParent[0],this._offsetParent[0]))){b=this._offsetParent}else{b=this._scrollParent}g=(/(html|body)/i).test(b[0].tagName);return this._getPosition(c,e,g,b)},_getPosition:function(c,d,e,b){return{top:(c.top+this._offset.relative.top*d+this._offset.parent.top*d-(a.browser.safari&&a.browser.version<526&&this._positionType=="fixed"?0:(this._positionType=="fixed"?-this._scrollParent.scrollTop():(e?0:b.scrollTop()))*d)),left:(c.left+this._offset.relative.left*d+this._offset.parent.left*d-(a.browser.safari&&a.browser.version<526&&this._positionType=="fixed"?0:(this._positionType=="fixed"?-this._scrollParent.scrollLeft():e?0:b.scrollLeft())*d))}},_generatePosition:function(f){var b=this._positionType=="absolute"&&!(this._scrollParent[0]!=document&&a.contains(this._scrollParent[0],this._offsetParent[0]))?this._offsetParent:this._scrollParent,i=(/(html|body)/i).test(b[0].tagName);var e=this._getMouseCoordinates(f),d=e.left,c=e.top;if(this.originalPosition){var h;if(this.restricter){if(this._restrictiveContainer){var g=this._restrictiveContainer.offset();h=[this._restricter[0]+g.left,this._restricter[1]+g.top,this._restricter[2]+g.left,this._restricter[3]+g.top]}else{h=this._restricter}if(e.left-this._offset.click.left<h[0]){d=h[0]+this._offset.click.left}if(e.top-this._offset.click.top<h[1]){c=h[1]+this._offset.click.top}if(e.left-this._offset.click.left>h[2]){d=h[2]+this._offset.click.left}if(e.top-this._offset.click.top>h[3]){c=h[3]+this._offset.click.top}}}return{top:(c-this._offset.click.top-this._offset.relative.top-this._offset.parent.top+(a.browser.safari&&a.browser.version<526&&this._positionType=="fixed"?0:(this._positionType=="fixed"?-this._scrollParent.scrollTop():(i?0:b.scrollTop())))),left:(d-this._offset.click.left-this._offset.relative.left-this._offset.parent.left+(a.browser.safari&&a.browser.version<526&&this._positionType=="fixed"?0:(this._positionType=="fixed"?-this._scrollParent.scrollLeft():i?0:b.scrollLeft())))}},_raiseEvent:function(c,e){if(this.triggerEvents!=undefined&&this.triggerEvents==false){return}var b=this._events[c],d=a.Event(b),e=e||{};e.position=this.position;e.element=this.element;this.data=this.data;a.extend(e,this.data);d.args=e;return this.host.trigger(d)},disable:function(){this.disabled=true;this.host.addClass(this.toThemeProperty("jqx-draggable-disabled"))},enable:function(){this.disabled=false;this.host.removeClass(this.toThemeProperty("jqx-draggable-disabled"))},propertyChangedHandler:function(b,c,e,d){if(c==="dropTarget"){if(typeof d==="string"){b.dropTarget=a(d)}}else{if(c=="cursor"){b.host.css("cursor",b.cursor)}}}})})(jQuery);jqxListBoxDragDrop=function(){$.extend($.jqx._jqxListBox.prototype,{_hitTestBounds:function(a,b,d){var e=a.host.offset();var f=d-parseInt(e.top);var h=b-parseInt(e.left);var j=a._hitTest(h,f);if(f<0){return null}if(a.items&&a.items.length>0){var g=a.items[a.items.length-1]}if(j!=null){var c=parseInt(e.left);var i=c+a.host.width();if(c<=b+j.width/2&&b<=i){return j}return null}return null},_handleDragStart:function(c,b){var a=$.jqx.mobile.isTouchDevice();if(a){if(b.allowDrag){c.bind("touchstart",function(){$.jqx.mobile.setTouchScroll(false,b.element.id)})}}c.unbind("dragStart");c.bind("dragStart",function(h){if(b.allowDrag&&!b.disabled){b.feedbackElement=$("<div style='z-index: 99999; position: absolute;'></div>");b.feedbackElement.addClass(b.toThemeProperty("jqx-listbox-feedback"));b.feedbackElement.appendTo($(document.body));b.feedbackElement.hide();b.isDragging=true;b._dragCancel=false;var e=h.args.position;var g=b._hitTestBounds(b,e.left,e.top);var i=$.find(".jqx-listbox");b._listBoxes=i;$.each(b._listBoxes,function(){var j=$.data(this,"jqxListBox").instance;j._enableHover=j.enableHover;j.enableHover=false;$.jqx.mobile.setTouchScroll(false,b.element.id)});if(g!=null&&!g.isGroup){b._dragItem=g;var f=function(){b._dragCancel=true;$(h.args.element).jqxDragDrop({triggerEvents:false});$(h.args.element).jqxDragDrop("cancelDrag");clearInterval(b._autoScrollTimer);$(h.args.element).jqxDragDrop({triggerEvents:true});$.each(b._listBoxes,function(){var j=$.data(this,"jqxListBox").instance;if(j._enableHover!=undefined){j.enableHover=j._enableHover;$.jqx.mobile.setTouchScroll(true,b.element.id)}})};if(b.dragStart){var d=b.dragStart(g);if(d==false){f();return false}}if(g.disabled){f()}b._raiseEvent(4,{label:g.label,value:g.value,originalEvent:h.args})}}return false})},_handleDragging:function(b,a){b.unbind("dragging");b.bind("dragging",function(e){var d=e.args;var c=d.position;if(a._dragCancel){return}var f=a._getMouseCoordinates(e);a._dragOverItem=null;a.feedbackElement.hide();$.each(a._listBoxes,function(){var k=$(this).offset();var m=k.top+20;var g=$(this).height()+m-40;var i=k.left;var h=$(this).width();var n=i+h;var l=$.data(this,"jqxListBox").instance;var o=l._hitTestBounds(l,c.left,c.top);var j=l.vScrollInstance;if(o!=null){if(l.allowDrop&&!l.disabled){a._dragOverItem=o;if(o.element){a.feedbackElement.show();var p=$(o.element).offset().top+1;if(c.top>p+o.height/2){p=p+o.height}a.feedbackElement.css("top",p);a.feedbackElement.css("left",i);if(l.vScrollBar.css("visibility")!="visible"){a.feedbackElement.width($(this).width())}else{a.feedbackElement.width($(this).width()-20)}}}}if(f.left>=i&&f.left<n){if(d.position.top<m&&d.position.top>=m-30){clearInterval(l._autoScrollTimer);if(j.value!=0){a.feedbackElement.hide()}l._autoScrollTimer=setInterval(function(){var q=l.scrollUp();if(!q){clearInterval(l._autoScrollTimer)}},100)}else{if(d.position.top>g&&d.position.top<g+30){clearInterval(l._autoScrollTimer);if((l.vScrollBar.css("visibility")!="hidden")&&j.value!=j.max){a.feedbackElement.hide()}l._autoScrollTimer=setInterval(function(){var q=l.scrollDown();if(!q){clearInterval(l._autoScrollTimer)}},100)}else{clearInterval(l._autoScrollTimer)}}}else{if(a._dragOverItem==null){a.feedbackElement.hide()}clearInterval(l._autoScrollTimer)}})})},_handleDragEnd:function(b,a){var c=$.find(".jqx-listbox");b.unbind("dragEnd");b.bind("dragEnd",function(e){clearInterval(a._autoScrollTimer);var j=e.args.position;var f=$.find(".jqx-listbox");var g=null;a.feedbackElement.remove();if(a._dragCancel){return}$.each(f,function(){var u=parseInt($(this).offset().left);var s=u+$(this).width();var v=$.data(this,"jqxListBox").instance;clearInterval(v._autoScrollTimer);if(v._enableHover!=undefined){v.enableHover=v._enableHover;$.jqx.mobile.setTouchScroll(true,a.element.id)}if(a._dragItem!=null){if(j.left+a._dragItem.width/2>=u&&j.left<s){var t=parseInt($(this).offset().top);var r=t+$(this).height();if(j.top>=t&&j.top<=r){g=$(this)}}}});var q=a._dragItem;if(g!=null&&g.length>0){var m=$.data(g[0],"jqxListBox").instance;var k=m.allowDrop;if(k&&!m.disabled){var m=$.data(g[0],"jqxListBox").instance;var n=m._hitTestBounds(m,j.left,j.top);n=a._dragOverItem;if(n!=null&&!n.isGroup){var p=true;if(a.dragEnd){p=a.dragEnd(q,n,e.args);if(p==false){$(e.args.element).jqxDragDrop({triggerEvents:false});$(e.args.element).jqxDragDrop("cancelDrag");clearInterval(a._autoScrollTimer);$(e.args.element).jqxDragDrop({triggerEvents:true});if(e.preventDefault){e.preventDefault()}if(e.stopPropagation){e.stopPropagation()}return false}if(p==undefined){p=true}}if(p){var d=n.index;var i=function(){var s=n.index;for(var r=s-2;r<=s+2;r++){if(m.items&&m.items.length>r){var t=m.items[r];if(t!=null){if(t.label==q.label&&t.value==q.value){return r}}}}return s};if(m.dropAction!="none"){var o=$(n.element).offset().top+1;m.content.find(".draggable").jqxDragDrop("destroy");if(j.top>o+n.height/2){m.insertAt(a._dragItem,n.index+1)}else{m.insertAt(a._dragItem,n.index)}if(a.dropAction=="default"){if(q.index>0){a.selectIndex(q.index-1)}a.removeItem(q)}var l=i();m.selectIndex(l)}}}else{if(m.dropAction!="none"){m.content.find(".draggable").jqxDragDrop("destroy");m.addItem(a._dragItem);if(m.dropAction=="default"){if(q.index>0){a.selectIndex(q.index-1)}a.removeItem(q)}m.selectIndex(0)}}}}else{if(a.dragEnd){var h=a.dragEnd(q,e.args);if(false==h){if(e.preventDefault){e.preventDefault()}if(e.stopPropagation){e.stopPropagation()}return false}}}if(q!=null){a._raiseEvent(5,{label:q.label,value:q.value,originalEvent:e.args})}return false})},_enableDragDrop:function(){if(this.allowDrag&&this.host.jqxDragDrop){var b=this.content.find(".draggable");if(b.length>0){b.jqxDragDrop({cursor:"arrow",revertDuration:0,appendTo:"body",dragZIndex:99999,revert:true});this._autoScrollTimer=null;var a=this;a._dragItem=null;a._handleDragStart(b,a);a._handleDragging(b,a);a._handleDragEnd(b,a)}}},_getMouseCoordinates:function(a){this._isTouchDevice=$.jqx.mobile.isTouchDevice();if(this._isTouchDevice){return{left:a.args.originalEvent.touches[0].pageX,top:a.args.originalEvent.touches[0].pageY}}else{return{left:a.args.pageX,top:a.args.pageY}}}})};jqxTreeDragDrop=function(){$.extend($.jqx._jqxTree.prototype,{_syncItems:function(b){this._visibleItems=new Array();var a=this;$.each(b,function(){var d=$(this);if(d.css("display")!="none"){var c=d.outerHeight();if(d.height()>0){var e=parseInt(d.offset().top);a._visibleItems[a._visibleItems.length]={element:this,top:e,height:c,bottom:e+c}}}})},_hitTestBounds:function(a,f,e){var c=this;var d=null;if(a._visibleItems){var b=parseInt(a.host.offset().left);var g=a.host.outerWidth();$.each(a._visibleItems,function(i){if(f>=b&&f<b+g){if(this.top+5<e&&e<this.top+this.height){var h=$(this.element).parents("li:first");if(h.length>0){d=a.getItem(h[0]);if(d!=null){d.height=this.height;d.top=this.top;return false}}}}})}return d},_handleDragStart:function(c,b){if(b._dragOverItem){b._dragOverItem.titleElement.removeClass(b.toThemeProperty("jqx-fill-state-hover"))}var a=$.jqx.mobile.isTouchDevice();if(a){if(b.allowDrag){c.bind("touchstart",function(){$.jqx.mobile.setTouchScroll(false,"panel"+b.element.id)})}}c.unbind("dragStart");c.bind("dragStart",function(f){b.feedbackElement=$("<div style='z-index: 99999; position: absolute;'></div>");b.feedbackElement.addClass(b.toThemeProperty("jqx-listbox-feedback"));b.feedbackElement.appendTo($(document.body));b.feedbackElement.hide();b._dragCancel=false;var d=f.args.position;var e=$.find(".jqx-tree");b._trees=e;$.each(e,function(){var i=$.data(this,"jqxTree").instance;var k=i.host.find(".draggable");i._syncItems(k);if(i.allowDrag&&!i.disabled){var h=$(f.target).parents("li:first");if(h.length>0){var j=i.getItem(h[0]);if(j){b._dragItem=j;if(i.dragStart){var g=i.dragStart(j);if(g==false){b._dragCancel=true;$(f.args.element).jqxDragDrop({triggerEvents:false});$(f.args.element).jqxDragDrop("cancelDrag");clearInterval(b._autoScrollTimer);$(f.args.element).jqxDragDrop({triggerEvents:i});return false}}i._raiseEvent(8,{label:j.label,value:j.value,originalEvent:f.args})}}}});return false})},_getMouseCoordinates:function(a){this._isTouchDevice=$.jqx.mobile.isTouchDevice();if(this._isTouchDevice){return{left:a.args.originalEvent.touches[0].pageX,top:a.args.originalEvent.touches[0].pageY}}else{return{left:a.args.pageX,top:a.args.pageY}}},_handleDragging:function(b,a){var b=this.host.find(".draggable");b.unbind("dragging");b.bind("dragging",function(g){var e=g.args;var c=e.position;var d=a._trees;if(a._dragCancel){return}if(a._dragOverItem){a._dragOverItem.titleElement.removeClass(a.toThemeProperty("jqx-fill-state-hover"))}var h=true;var f=a._getMouseCoordinates(g);a._lastDraggingPosition=f;$.each(d,function(){var l=$(this).offset();var p=l.top+20;var i=$(this).height()+p-40;var k=l.left;var j=$(this).width();var q=k+j;var o=$.data(this,"jqxTree").instance;if(o.disabled||!o.allowDrop){return}var m=o.vScrollInstance;var r=o._hitTestBounds(o,f.left,f.top);if(r!=null){if(a._dragOverItem){a._dragOverItem.titleElement.removeClass(o.toThemeProperty("jqx-fill-state-hover"))}a._dragOverItem=r;if(r.element){a.feedbackElement.show();var s=r.top;var n=f.top;a._dropPosition="before";if(n>s+r.height/3){s=r.top+r.height/2;a._dragOverItem.titleElement.addClass(a.toThemeProperty("jqx-fill-state-hover"));a.feedbackElement.hide();a._dropPosition="inside"}if(n>(r.top+r.height)-r.height/3){s=r.top+r.height;a._dragOverItem.titleElement.removeClass(a.toThemeProperty("jqx-fill-state-hover"));a.feedbackElement.show();a._dropPosition="after"}a.feedbackElement.css("top",s);var k=-2+parseInt(r.titleElement.offset().left);a.feedbackElement.css("left",k);a.feedbackElement.width($(r.titleElement).width()+12)}}if(f.left>=k&&f.left<q){if(f.top+20>=p&&f.top<=p+o.host.height()){h=false}if(f.top<p&&f.top>=p-30){clearInterval(o._autoScrollTimer);if(m.value!=0){a.feedbackElement.hide()}o._autoScrollTimer=setInterval(function(){var u=o.panelInstance.scrollUp();var t=o.host.find(".draggable");o._syncItems(t);if(!u){clearInterval(o._autoScrollTimer)}},100)}else{if(f.top>i&&f.top<i+30){clearInterval(o._autoScrollTimer);if(m.value!=m.max){a.feedbackElement.hide()}o._autoScrollTimer=setInterval(function(){var u=o.panelInstance.scrollDown();var t=o.host.find(".draggable");o._syncItems(t);if(!u){clearInterval(o._autoScrollTimer)}},100)}else{clearInterval(o._autoScrollTimer)}}}else{clearInterval(o._autoScrollTimer)}});if(h){if(a.feedbackElement){a.feedbackElement.hide()}}})},_handleDragEnd:function(b,a){b.unbind("dragEnd");b.bind("dragEnd",function(e){var c=a.host.find(".draggable");clearInterval(a._autoScrollTimer);var j=e.args.position;var r=a._trees;var s=null;var m=$.jqx.mobile.isTouchDevice();var f=m?a._lastDraggingPosition:a._getMouseCoordinates(e);a.feedbackElement.remove();if(a._dragCancel){return false}if(a._dragOverItem){a._dragOverItem.titleElement.removeClass(a.toThemeProperty("jqx-fill-state-hover"))}$.each(r,function(){var x=parseInt($(this).offset().left);var v=x+$(this).width();var u=$.data(this,"jqxTree").instance;clearInterval(u._autoScrollTimer);if(a._dragItem!=null){if(f.left>=x&&f.left<v){var w=parseInt($(this).offset().top);var t=w+$(this).height();if(f.top>=w&&f.top<=t){s=$(this)}}}});var q=a._dragItem;if(s!=null&&s.length>0){var k=s.jqxTree("allowDrop");if(k){var l=$.data(s[0],"jqxTree").instance;var n=a._dragOverItem;if(n!=null&&a._dragOverItem.treeInstance.element.id==l.element.id){var p=true;if(a.dragEnd){p=a.dragEnd(q,n,e.args);if(p==false){$(e.args.element).jqxDragDrop({triggerEvents:false});$(e.args.element).jqxDragDrop("cancelDrag");clearInterval(a._autoScrollTimer);$(e.args.element).jqxDragDrop({triggerEvents:true})}if(undefined==p){p=true}}if(p){var d=function(){var t=a._dragItem.treeInstance;t._refreshMapping();t._updateItemsNavigation();t._render();if(t.checkboxes){t._updateCheckStates()}a._dragItem.treeInstance=l;a._syncItems(a._dragItem.treeInstance.host.find(".draggable"))};if(l.dropAction!="none"){if(a._dragItem.id!=a._dragOverItem.id){if(a._dropPosition=="inside"){l._drop(a._dragItem.element,a._dragOverItem.element,-1,l);d()}else{var h=0;if(a._dropPosition=="after"){h++}l._drop(a._dragItem.element,a._dragOverItem.parentElement,h+$(a._dragOverItem.element).index(),l);d()}}}l._render();var o=l.host.find(".draggable");a._syncItems(o);a._dragOverItem=null;a._dragItem=null;l._refreshMapping();l._updateItemsNavigation();l.selectedItem=null;l.selectItem(q.element);if(l.checkboxes){l._updateCheckStates()}}}else{if(l.dropAction!="none"){if(l.allowDrop){a._dragItem.parentElement=null;l._drop(a._dragItem.element,null,-1,l);var g=a._dragItem.treeInstance;g._refreshMapping();g._updateItemsNavigation();if(g.checkboxes){g._updateCheckStates()}var o=g.host.find(".draggable");a._syncItems(o);a._dragItem.treeInstance=l;l.items[l.items.length]=a._dragItem;l._render();l.selectItem(q.element);l._refreshMapping();l._updateItemsNavigation();var o=l.host.find(".draggable");l._syncItems(o);if(l.checkboxes){l._updateCheckStates()}a._dragOverItem=null;a._dragItem=null}}}}}else{if(a.dragEnd){var i=a.dragEnd(q,e.args);if(false==i){return false}}}if(q!=null){a._raiseEvent(7,{label:q.label,value:q.value,originalEvent:e.args})}return false})},_drop:function(e,a,d,b){if($(a).parents("#"+e.id).length>0){return}if(a!=null){if(a.id==e.id){return}}var g=this;if(b.element.innerHTML.indexOf("UL")){var h=b.host.find("ul:first")}if(a==undefined&&a==null){if(d==undefined||d==-1){h.append(e)}else{if(h.children("li").eq(d).length==0){h.children("li").eq(d-1).after(e)}else{if(h.children("li").eq(d)[0].id!=e.id){h.children("li").eq(d).before(e)}}}}else{if(d==undefined||d==-1){a=$(a);var c=a.find("ul:first");if(c.length==0){ulElement=$("<ul></ul>");$(a).append(ulElement);c=a.find("ul:first");var f=b.itemMapping["id"+a[0].id].item;f.subtreeElement=c[0];f.hasItems=true;c.addClass(b.toThemeProperty("jqx-tree-dropdown"));c.append(e);e=c.find("li:first");f.parentElement=e}else{c.append(e)}}else{a=$(a);var c=a.find("ul:first");if(c.length==0){ulElement=$("<ul></ul>");$(a).append(ulElement);c=a.find("ul:first");if(a){var f=b.itemMapping["id"+a[0].id].item;f.subtreeElement=c[0];f.hasItems=true}c.addClass(b.toThemeProperty("jqx-tree-dropdown"));c.append(e);e=c.find("li:first");f.parentElement=e}else{if(c.children("li").eq(d).length==0){c.children("li").eq(d-1).after(e)}else{if(c.children("li").eq(d)[0].id!=e.id){c.children("li").eq(d).before(e)}}}}}},_enableDragDrop:function(){if(this.allowDrag&&this.host.jqxDragDrop){var c=this.host.find(".draggable");var b=this;if(c.length>0){c.jqxDragDrop({cursor:"arrow",revertDuration:0,appendTo:"body",dragZIndex:99999,revert:true,initFeedback:function(d){var f=$('<span style="white-space: nowrap;" class="'+b.toThemeProperty("jqx-fill-state-normal")+'">'+d.text()+"</span>");$(document.body).append(f);var e=f.width();f.remove();d.width(e+5);d.addClass(b.toThemeProperty("jqx-fill-state-pressed"))}});var a=c.jqxDragDrop("isDestroyed");if(a){c.jqxDragDrop("_createDragDrop")}this._autoScrollTimer=null;b._dragItem=null;b._handleDragStart(c,b);b._handleDragging(c,b);b._handleDragEnd(c,b)}}}})};