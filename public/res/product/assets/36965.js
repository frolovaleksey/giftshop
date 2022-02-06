!function(t){"use strict";"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports&&"function"==typeof require?t(require("jquery")):t(jQuery)}(function(t){"use strict";var e={escapeRegExChars:function(t){return t.replace(/[|\\{}()[\]^$+*?.]/g,"\\$&")},createNode:function(t){var e=document.createElement("div");return e.className=t,e.style.position="absolute",e.style.display="none",e.setAttribute("unselectable","on"),e},highlight:function(t,s){if(dgwt_wcas.is_premium){var i,o=s.split(/ /),a=!1;if(o)for(o=o.sort(function(t,e){return e.length-t.length}),i=0;i<o.length;i++)if(o[i]&&o[i].length>1){var n=o[i].replace(/[\^\@]/g,"");if(n.length>0){var r="("+e.escapeRegExChars(n.trim())+")";t=t.replace(new RegExp(r,"gi"),"^^$1@@"),a=!0}}a&&(t=(t=t.replace(/\^\^/g,"<strong>")).replace(/@@/g,"</strong>"))}else r="("+e.escapeRegExChars(s)+")",t=t.replace(new RegExp(r,"gi"),"<strong>$1</strong>");return t},debounce:function(t,e){var i,o=(new Date).getUTCMilliseconds();if(0===s.id.length)return s.id=o,void t();s.id=o,i=setTimeout(function(){o===s.id?(t(),s.id=""):clearTimeout(i)},e)},mouseHoverDebounce:function(e,s,i){var o;o=setTimeout(function(){t(s+":hover").length>0?e():clearTimeout(o)},i)},getActiveInstance:function(){var e,s=t(".dgwt-wcas-search-wrapp.dgwt-wcas-active");return s.length>0&&s.each(function(){var s=t(this).find(".dgwt-wcas-search-input");if("object"==typeof s.data("autocomplete"))return e=s.data("autocomplete"),!1}),e}},s={id:"",callback:null,ajaxSettings:null,object:null},i=27,o=9,a=13,n=38,r=39,l=40,c=t.noop;function d(e,s){this.element=e,this.el=t(e),this.suggestions=[],this.badQueries=[],this.selectedIndex=-1,this.currentValue=this.element.value,this.timeoutId=null,this.cachedResponse={},this.cachedDetails={},this.cachedPrices={},this.detailsRequestsSent=[],this.onChangeTimeout=null,this.onChange=null,this.isLocal=!1,this.suggestionsContainer=null,this.detailsContainer=null,this.autoAligmentprocess=null,this.noSuggestionsContainer=null,this.latestActivateSource="",this.actionTriggerSource="",this.options=t.extend(!0,{},d.defaults,s),this.classes={selected:"dgwt-wcas-suggestion-selected",suggestion:"dgwt-wcas-suggestion",suggestionsContainerOrientTop:"dgwt-wcas-suggestions-wrapp--top"},this.hint=null,this.hintValue="",this.selection=null,this.overlayMobileState="off",this.initialize(),this.setOptions(s)}d.utils=e,t.DgwtWcasAutocompleteSearch=d,d.defaults={ajaxSettings:{},autoSelectFirst:!1,appendTo:"body",serviceUrl:null,lookup:null,onSelect:null,width:"auto",containerDetailsWidth:"auto",showDetailsPanel:!1,showImage:!1,showPrice:!1,showSKU:!1,showDescription:!1,showSaleBadge:!1,showFeaturedBadge:!1,dynamicPrices:!1,saleBadgeText:"sale",featuredBadgeText:"featured",minChars:3,maxHeight:600,deferRequestBy:0,params:{},formatResult:function(t,s,i,o){if(!s)return t;i&&(t=e.highlight(t,s));if(!o.convertHtml)return t;return t.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/&lt;sup/g,"<sup").replace(/&lt;\/sup/g,"</sup").replace(/sup&gt;/g,"sup>").replace(/&lt;(\/?(strong|b|br))&gt;/g,"<$1>")},delimiter:null,zIndex:999999999,type:"GET",noCache:!1,isRtl:!1,onSearchStart:c,onSearchComplete:c,onSearchError:c,preserveInput:!1,searchFormClass:"dgwt-wcas-search-wrapp",containerClass:"dgwt-wcas-suggestions-wrapp",containerDetailsClass:"dgwt-wcas-details-wrapp",searchInputClass:"dgwt-wcas-search-input",preloaderClass:"dgwt-wcas-preloader",closeTrigger:"dgwt-wcas-close",formClass:"dgwt-wcas-search-form",tabDisabled:!1,dataType:"text",currentRequest:null,triggerSelectOnValidInput:!0,isPremium:!1,overlayMobile:!1,preventBadQueries:!0,lookupFilter:function(t,e,s){return-1!==t.value.toLowerCase().indexOf(s)},paramName:"query",transformResult:function(e){return"string"==typeof e?t.parseJSON(e):e},noSuggestionNotice:"No results",orientation:"bottom",forceFixPosition:!1,positionFixed:!1,debounceWaitMs:400,sendGAEvents:!0,enableGASiteSearchModule:!1},d.prototype={initialize:function(){var s=this;s.element.setAttribute("autocomplete","off"),s.createContainers(),s.registerEventsSearchBar(),s.registerEventsSuggestions(),s.registerEventsDetailsPanel(),s.registerIconHandler(),s.registerEventsFixedMenu(),s.fixPositionCapture=function(){s.adjustContainerWidth(),s.visible&&s.fixPosition()},t(window).on("resize.autocomplete",function(){var t=e.getActiveInstance();void 0!==t&&t.fixPositionCapture()}),s.initMobileMode(),s.hideAfterClickOutsideListener(),s.suggestionsContainer.addClass("js-dgwt-wcas-initialized"),s.detailsContainer&&s.detailsContainer.length>0&&s.detailsContainer.addClass("js-dgwt-wcas-initialized")},createContainers:function(e){var s=this.options;0==t("."+s.containerClass).length?(this.suggestionsContainer=t(d.utils.createNode(s.containerClass)),this.suggestionsContainer.appendTo(s.appendTo||"body"),this.suggestionsContainer.addClass("woocommerce"),!0===s.showImage&&this.suggestionsContainer.addClass("dgwt-wcas-has-img"),!0===s.showPrice&&this.suggestionsContainer.addClass("dgwt-wcas-has-price"),!0===s.showDescription&&this.suggestionsContainer.addClass("dgwt-wcas-has-desc"),!0===s.showSKU&&this.suggestionsContainer.addClass("dgwt-wcas-has-sku"),!0===s.showHeadings&&this.suggestionsContainer.addClass("dgwt-wcas-has-headings"),"auto"!==s.width&&this.suggestionsContainer.width(s.width)):this.suggestionsContainer=t("."+this.options.containerClass),this.canShowDetailsBox()&&(0==t("."+s.containerDetailsClass).length?(this.detailsContainer=t(d.utils.createNode(s.containerDetailsClass)),this.detailsContainer.appendTo(s.appendTo||"body"),this.detailsContainer.addClass("woocommerce")):this.detailsContainer=t("."+s.containerDetailsClass))},registerEventsSearchBar:function(){var s=this;t(document).on("click.autocomplete","."+s.options.closeTrigger,function(){var s=e.getActiveInstance();s.hide(),s.clear(!1),s.hideCloseButton(),t(this).closest("."+s.options.searchFormClass).find("."+s.options.searchInputClass).val("").focus()}),s.el.closest("."+s.options.formClass).on("submit.autocomplete",function(e){s.suggestions.length>0&&t.each(s.suggestions,function(t,i){if(void 0!==i.type&&"product_variation"==i.type)return s.select(t),e.preventDefault(),!1})}),t(window).on("load",function(){s.positionPreloader()}),s.el.on("keydown.autocomplete",function(t){s.onKeyPress(t)}),s.el.on("keyup.autocomplete",function(t){s.onKeyUp(t)}),s.el.on("blur.autocomplete",function(){s.onBlur()}),s.el.on("focus.autocomplete",function(){s.onFocus()}),s.el.on("change.autocomplete",function(t){s.onKeyUp(t)}),s.el.on("input.autocomplete",function(t){s.onKeyUp(t)})},registerEventsSuggestions:function(){var s="."+this.classes.suggestion;if(!this.getSuggestionsContainer().hasClass("js-dgwt-wcas-initialized")){t(document).on("mouseenter.autocomplete",s,function(){var s=e.getActiveInstance();if(void 0!==s){var i=t(this).data("index"),o='.dgwt-wcas-suggestion[data-index="'+i+'"]',a=s.canShowDetailsBox()?100:1;s.selectedIndex!=i&&e.mouseHoverDebounce(function(){s.selectedIndex!==i&&(s.latestActivateSource="mouse",s.getDetails(s.suggestions[i]),s.activate(i))},o,a)}});var i=!1;t(document).on("click.autocomplete",s,function(){if(!i){var s=e.getActiveInstance();s.actionTriggerSource="click",i=!0,s.select(t(this).data("index"))}}),t(document).on("mousedown.autocomplete",s,function(e){"number"==typeof e.which&&1===e.which&&t(e.target)[0].click()}),t(document).on("click.autocomplete","."+this.options.containerClass,function(){var t=e.getActiveInstance();clearTimeout(t.blurTimeoutId)})}},registerEventsDetailsPanel:function(){var s=this.getDetailsContainer();this.canShowDetailsBox()&&!s.hasClass("js-dgwt-wcas-initialized")&&(t(document).on("click.autocomplete","."+this.options.containerDetailsClass,function(){var t=e.getActiveInstance();clearTimeout(t.blurTimeoutId)}),t(document).on("change",'[name="js-dgwt-wcas-quantity"]',function(e){t(this).closest(".js-dgwt-wcas-pd-addtc").find("[data-quantity]").attr("data-quantity",t(this).val())}))},registerIconHandler:function(){var s=this,i=s.getFormWrapper(),o=i.find("."+s.options.formClass);i.on("click",".js-dgwt-wcas-search-icon-handler",function(t){var e=i.find("."+s.options.searchInputClass);if(i.hasClass("dgwt-wcas-layout-icon-open"))s.hide(),o.hide(!0),i.removeClass("dgwt-wcas-layout-icon-open");else{var a=i.find(".dgwt-wcas-search-icon-arrow");o.hide(),a.hide(),i.addClass("dgwt-wcas-layout-icon-open"),s.positionIconSearchMode(i),o.fadeIn(200,function(){a.show(),s.positionPreloader(i),e.focus()})}}),0==t(".js-dgwt-wcas-initialized").length&&t(".js-dgwt-wcas-search-icon-handler").length>0&&t(document).click(function(i){if(t(".dgwt-wcas-layout-icon-open").length){var o=t(i.target);if(!(o.closest("."+s.options.searchFormClass).length>0||o.closest("."+s.options.containerClass).length>0||o.closest("."+s.options.containerDetailsClass).length>0)){var a=e.getActiveInstance();if(void 0!==a){var n=a.getFormWrapper().find("."+s.options.formClass);n.hide(),a.hide(!0),n.css({left:"0"})}s.hideIconModeSearch()}}}),t(window).on("resize.autocomplete",function(){s.applyFlexibleMode()}),t(window).on("load",function(){s.applyFlexibleMode()})},registerEventsFixedMenu:function(){var e=this;t(window).on("scroll",function(){if(e.suggestions.length>0&&e.elementOrParentIsFixed(e.getFormWrapper()))if(0===t(window).scrollTop()){[1,10,20,30,40,50,60,70,80,90,120,140,170,200,250,400,700,1e3,2e3].forEach(function(t){setTimeout(function(){e.fixHeight(),e.fixPositionCapture()},t)})}else e.fixHeight(),e.fixPositionCapture()})},initMobileMode:function(){var t=this,e=t.getFormWrapper();e.hasClass("js-dgwt-wcas-mobile-overlay-enabled")&&t.isMobileMode()&&(e.prepend('<div class="js-dgwt-wcas-enable-mobile-form dgwt-wcas-enable-mobile-form"></div>'),e.find(".js-dgwt-wcas-enable-mobile-form").on("click",function(e){t.enableOverlayMobile()}))},applyFlexibleMode:function(){var e=t(".js-dgwt-wcas-layout-icon-flexible");e.length&&(this.isMobileMode()?(e.addClass("js-dgwt-wcas-layout-icon"),e.addClass("dgwt-wcas-layout-icon")):(e.removeClass("js-dgwt-wcas-layout-icon"),e.removeClass("dgwt-wcas-layout-icon")),e.addClass("dgwt-wcas-layout-icon-flexible-loaded"))},onFocus:function(){t("."+this.options.searchFormClass).removeClass("dgwt-wcas-active"),this.getFormWrapper().addClass("dgwt-wcas-active"),this.fixPositionCapture(),this.el.val().length>=this.options.minChars&&this.onValueChange()},onBlur:function(){var e=this,s=e.options,i=e.el.val(),o=e.getQuery(i);e.isMobileMode()||(e.blurTimeoutId=setTimeout(function(){e.hide(),e.selection&&e.currentValue!==o&&(s.onInvalidateSelection||t.noop).call(e.element)},200))},abortAjax:function(){this.currentRequest&&(this.currentRequest.abort(),this.currentRequest=null)},setOptions:function(e){var s=this,i=s.getSuggestionsContainer(),o=t.extend({},s.options,e);(s.isLocal=Array.isArray(o.lookup),s.isLocal&&(o.lookup=s.verifySuggestionsFormat(o.lookup)),o.orientation=s.validateOrientation(o.orientation,"bottom"),i.css({"max-height":s.canShowDetailsBox()?"none":o.maxHeight+"px",width:o.width+"px","z-index":o.zIndex}),!0===o.showDetailsPanel)&&s.getDetailsContainer().css({"z-index":o.zIndex-1});o.onSearchComplete=function(){s.getFormWrapper().removeClass("dgwt-wcas-processing"),s.preloader("hide","form","dgwt-wcas-inner-preloader"),s.showCloseButton()},this.options=o},clearCache:function(){this.cachedResponse={},this.cachedDetails={},this.cachedPrices={},this.badQueries=[]},clear:function(t){t&&this.clearCache(),this.currentValue="",this.suggestions=[]},disable:function(){this.disabled=!0,clearTimeout(this.onChangeTimeout),this.abortAjax()},enable:function(){this.disabled=!1},fixPosition:function(){var t=this.getFormOffset();this.getSuggestionsContainer().css(t),this.canShowDetailsBox()&&this.fixPositionDetailsBox()},fixPositionDetailsBox:function(){var e=this.getFormWrapper(),s=this.getSuggestionsContainer(),i=this.getDetailsContainer(),o=this.getFormOffset(),a=o.left;if(0==i.length)return!1;var n=!0===this.options.isRtl?1:2,r=Math.round(o.left);if(o.left=r+Math.round(s.width()+n),i.css(o),e.width()>=550)return t("body").removeClass("dgwt-wcas-details-outside"),t("body").removeClass("dgwt-wcas-details-right"),t("body").removeClass("dgwt-wcas-details-left"),void(!0===this.options.isRtl&&(s.css("left",r+Math.round(i.width()+n)+"px"),i.css("left",a+"px")));var l=t(window).width(),c=i.width(),d=i.offset();t("body").addClass("dgwt-wcas-details-outside"),!0===this.options.isRtl&&(o.left=o.left+1);var g=!1,u=!1;l<d.left+c&&(g=!0,t("body").removeClass("dgwt-wcas-details-right"),t("body").addClass("dgwt-wcas-details-left"),i.css("left",Math.round(parseFloat(s.css("left").replace("px","")))-i.outerWidth()+"px")),(d=i.offset()).left<1&&(u=!0,t("body").removeClass("dgwt-wcas-details-left"),t("body").addClass("dgwt-wcas-details-right")),u&&g?(t("body").removeClass("dgwt-wcas-details-left"),t("body").removeClass("dgwt-wcas-details-right"),t("body").addClass("dgwt-wcas-details-notfit")):t("body").removeClass("dgwt-wcas-details-notfit")},fixHeight:function(){if(1!=this.options.showDetailsPanel)return!1;var t=this.getSuggestionsContainer(),e=this.getDetailsContainer();t.css("height","auto"),e.css("height","auto");var s=t.outerHeight(),i=e.outerHeight();return t.find(".dgwt-wcas-suggestion:last-child").removeClass("dgwt-wcas-suggestion-no-border-bottom"),!(s<=340&&i<=340)&&(t.find(".dgwt-wcas-suggestion:last-child").addClass("dgwt-wcas-suggestion-no-border-bottom"),i<s&&e.css("height",s+"px"),s<i&&t.css("height",i+"px"),!1)},automaticAlignment:function(){var t=this,e=t.getFormWrapper().find(".dgwt-wcas-search-input"),s=t.getSuggestionsContainer(),i=t.getDetailsContainer();if(null==t.autoAligmentprocess){var o=[e.width(),s.height()];t.options.showDetailsPanel&&(o[2]=i.height()),t.autoAligmentprocess=setInterval(function(){var a=[e.width(),s.height()];t.options.showDetailsPanel&&(a[2]=i.height());for(var n=0;n<o.length;n++)if(o[n]!=a[n]){t.fixHeight(),t.fixPositionCapture(),o=a;break}t.options.showDetailsPanel&&(i.find(".dgwt-wcas-details-inner").height()-i.height()>2&&t.fixHeight())},10)}},getFormOffset:function(){var e=this.getFormWrapper(),s=this.getSuggestionsContainer(),i=this.options.orientation,o=e.outerHeight(),a=this.el.outerHeight(),n=this.el.offset(),r={top:n.top,left:n.left};if("auto"===i){var l=t(window).height(),c=t(window).scrollTop(),d=-c+n.top-o,g=c+l-(n.top+a+o);i=Math.max(d,g)===d?"top":"bottom"}if("top"===i){s[0].getBoundingClientRect().top;var u=e[0].getBoundingClientRect().top;s.css("height","auto"),u<s.height()&&s.height(u-10),r.top+=-s.outerHeight()}else r.top+=a;return r},getFormWrapper:function(){return this.el.closest("."+this.options.searchFormClass)},getSuggestionsContainer:function(){return t("."+this.options.containerClass)},getDetailsContainer:function(){return t("."+this.options.containerDetailsClass)},scrollDownSuggestions:function(){var t=this.getSuggestionsContainer();t[0].scrollTop=t[0].scrollHeight},isCursorAtEnd:function(){var t,e=this.el.val().length,s=this.element.selectionStart;return"number"==typeof s?s===e:!document.selection||((t=document.selection.createRange()).moveStart("character",-e),e===t.text.length)},onKeyPress:function(t){if(this.disabled||this.visible||t.which!==l||!this.currentValue){if(!this.disabled&&this.visible){switch(t.which){case i:this.el.val(this.currentValue),this.hide();break;case r:if(this.hint&&this.options.onHint&&this.isCursorAtEnd()){this.selectHint();break}return;case o:if(this.hint&&this.options.onHint)return void this.selectHint();if(-1===this.selectedIndex)return void this.hide();if(this.select(this.selectedIndex),!1===this.options.tabDisabled)return;break;case a:if(-1===this.selectedIndex)return void this.hide();this.actionTriggerSource="enter",this.select(this.selectedIndex);break;case n:this.moveUp();break;case l:this.moveDown();break;default:return}t.stopImmediatePropagation(),t.preventDefault()}}else this.suggest()},onKeyUp:function(t){var e=this;if(!e.disabled){switch(t.which){case n:case l:return}clearTimeout(e.onChangeTimeout),e.currentValue!==e.el.val()&&(e.findBestHint(),e.options.deferRequestBy>0?e.onChangeTimeout=setTimeout(function(){e.onValueChange()},e.options.deferRequestBy):e.onValueChange())}},onValueChange:function(){if(this.ignoreValueChange)this.ignoreValueChange=!1;else{var e=this.options,s=this.el.val(),i=this.getQuery(s);this.selection&&this.currentValue!==i&&(this.selection=null,(e.onInvalidateSelection||t.noop).call(this.element)),clearTimeout(this.onChangeTimeout),this.currentValue=s,this.selectedIndex=-1,e.triggerSelectOnValidInput&&this.isExactMatch(i)?this.select(0):i.length<e.minChars?(this.hideCloseButton(),this.hide()):this.getSuggestions(i)}},isExactMatch:function(t){var e=this.suggestions;return 1===e.length&&e[0].value.toLowerCase()===t.toLowerCase()},canShowDetailsBox:function(){return 1==this.options.showDetailsPanel&&!this.isMobileMode()},isMobileMode:function(){return t(window).width()<this.options.mobileBreakpoint},getQuery:function(e){var s,i=this.options.delimiter;return i?(s=e.split(i),t.trim(s[s.length-1])):e},getSuggestionsLocal:function(e){var s,i=this.options,o=e.toLowerCase(),a=i.lookupFilter,n=parseInt(i.lookupLimit,10);return s={suggestions:t.grep(i.lookup,function(t){return a(t,e,o)})},n&&s.suggestions.length>n&&(s.suggestions=s.suggestions.slice(0,n)),s},getSuggestions:function(i){var o,a,n,r,l=this,c=l.options,d=c.serviceUrl,g=l.getFormWrapper();c.params[c.paramName]=i,void 0!==dgwt_wcas.current_lang&&(c.params.l=dgwt_wcas.current_lang),c.params=l.applyCustomParams(c.params),l.preloader("show","form","dgwt-wcas-inner-preloader"),g.addClass("dgwt-wcas-processing"),!1!==c.onSearchStart.call(l.element,c.params)&&(a=c.ignoreParams?null:c.params,t.isFunction(c.lookup)?c.lookup(i,function(t){l.suggestions=t.suggestions,l.suggest(),l.selectFirstSuggestion(t.suggestions),c.onSearchComplete.call(l.element,i,t.suggestions)}):(l.isLocal?o=l.getSuggestionsLocal(i):(t.isFunction(d)&&(d=d.call(l.element,i)),n=d+"?"+t.param(a||{}),o=l.cachedResponse[n]),o&&Array.isArray(o.suggestions)?(l.suggestions=o.suggestions,l.suggest(),l.selectFirstSuggestion(o.suggestions),c.onSearchComplete.call(l.element,i,o.suggestions)):l.isBadQuery(i)?c.onSearchComplete.call(l.element,i,[]):(l.abortAjax(),r={url:d,data:a,type:c.type,dataType:c.dataType},t.extend(r,c.ajaxSettings),s.object=l,s.ajaxSettings=r,e.debounce(function(){var e=s.object,o=s.ajaxSettings;e.currentRequest=t.ajax(o).done(function(t){var s;e.currentRequest=null,void 0!==(s=e.options.transformResult(t,i)).suggestions&&(e.processResponse(s,i,n),e.selectFirstSuggestion(s.suggestions),1===s.suggestions.length&&void 0!==s.suggestions[0].type&&"no-results"===s.suggestions[0].type?e.gaEvent(i,"Autocomplete Search without results"):e.gaEvent(i,"Autocomplete Search with results")),e.fixPositionCapture(),e.options.onSearchComplete.call(e.element,i,s.suggestions),e.updatePrices()}).fail(function(t,s,o){e.options.onSearchError.call(e.element,i,t,s,o)})},c.debounceWaitMs))))},getDetails:function(e){var s=this;if(!s.canShowDetailsBox())return!1;if(null!=e&&void 0!==e.type&&("string"!=typeof e.more_products||"more_products"!==e.more_products)){s.fixHeight();var i,o=s.getDetailsContainer(),a=s.prepareSuggestionObjectID(e);if(null!=(i=s.cachedDetails[a]))o.html(i.html),s.fixHeight(),s.fixPositionCapture();else{var n={action:dgwt_wcas.action_result_details,items:[]};if(t.each(s.suggestions,function(t,e){if(void 0!==e.type&&"more_products"!=e.type&&"headline"!=e.type){var i={objectID:s.prepareSuggestionObjectID(e),value:null!=e.value?e.value:""};n.items.push(i)}}),o.html(""),s.preloader("show","details","",!0),-1!=t.inArray(a,s.detailsRequestsSent))return;s.detailsRequestsSent.push(a),t.ajax({data:n,type:"post",url:dgwt_wcas.ajax_details_endpoint,success:function(t){var e="string"==typeof t?jQuery.parseJSON(t):t;if(void 0!==e.items)for(var i=0;i<e.items.length;i++){var a=e.items[i].objectID;if(s.cachedDetails[a]={html:e.items[i].html},void 0!==e.items[i].price&&e.items[i].price.length>0&&(s.cachedPrices[a]=e.items[i].price),void 0!==e.items[i].imageSrc&&e.items[i].imageSrc.length>0)(new Image).src=e.items[i].imageSrc}s.preloader("hide","details","",!0);var n=s.prepareSuggestionObjectID(s.suggestions[s.selectedIndex]);null!=s.cachedDetails[n]?o.html(s.cachedDetails[n].html):o.html(""),s.fixPositionCapture(),s.fixHeight(),s.updatePrices(!0)},error:function(t,e){s.preloader("hide","details","",!0),o.html(t),s.fixPositionCapture(),s.fixHeight()}})}t(document).trigger("dgwtWcasDetailsPanelLoaded",s)}},updatePrices:function(e){var s,i,o=this,a=[];if(o.options.showPrice&&o.options.dynamicPrices&&0!=o.suggestions.length){for(s=0;s<o.suggestions.length;s++)if(void 0!==o.suggestions[s].type&&("product"==o.suggestions[s].type||"product_variation"==o.suggestions[s].type)){var n="product__"+o.suggestions[s].post_id;void 0!==o.cachedPrices[n]?o.updatePrice(s,o.cachedPrices[n]):(o.applyPreloaderForPrice(s),a.push(o.suggestions[s].post_id))}if(!e&&a.length>0){var r={action:void 0===dgwt_wcas.action_get_prices?"dgwt_wcas_get_prices":dgwt_wcas.action_get_prices,items:a};t.ajax({data:r,type:"post",url:dgwt_wcas.ajax_prices_endpoint,success:function(t){if(void 0!==t.success&&t.success&&t.data.length>0)for(s=0;s<t.data.length;s++){var e=t.data[s].id,a=t.data[s].price;if(o.suggestions.length>0)for(i=0;i<o.suggestions.length;i++)if(void 0!==o.suggestions[i].type&&("product"==o.suggestions[i].type||"product_variation"==o.suggestions[i].type)&&o.suggestions[i].post_id==e){var n="product__"+e;o.cachedPrices[n]=a,o.updatePrice(i,a)}}},error:function(t,e){}})}}},updatePrice:function(e,s){if(void 0!==this.suggestions[e]){this.suggestions[e].price=s;var i=t(".dgwt-wcas-suggestions-wrapp").find('[data-index="'+e+'"] .dgwt-wcas-sp');i.length&&i.html(s)}},applyCustomParams:function(t){if("object"==typeof dgwt_wcas.custom_params){var e=dgwt_wcas.custom_params;for(var s in e)t[s]=e[s]}var i=this.el.data("custom-params");if("object"==typeof i)for(var s in i)t[s]=i[s];return t},applyPreloaderForPrice:function(e){if(void 0!==this.suggestions[e]){var s=t(".dgwt-wcas-suggestions-wrapp").find('[data-index="'+e+'"] .dgwt-wcas-sp');s.length&&s.html('<div class="dgwt-wcas-preloader-price"><div class="dgwt-wcas-preloader-price-inner"> <div></div><div></div><div></div></div></div>')}},prepareSuggestionObjectID:function(t){var e="";return void 0!==t&&void 0!==t.type&&(null!=t.post_id&&(e=t.type+"__"+t.post_id,"product_variation"===t.type&&(e+="__"+t.variation_id),void 0!==t.post_type&&(e=t.type+"__"+t.post_id+"__"+t.post_type)),null!=t.term_id&&null!=t.taxonomy&&(e=t.type+"__"+t.term_id+"__"+t.taxonomy)),e},selectFirstSuggestion:function(e){var s=0,i=!1;this.canShowDetailsBox()&&("undefined"!=e&&e.length>0&&t.each(this.suggestions,function(t,e){if(void 0!==e.type&&"more_products"!=e.type&&"headline"!=e.type&&"no-results"!=e.type)return s=t,!1;void 0!==e.type&&"no-results"!==e.type||(i=!0)}),i||(this.latestActivateSource="system",this.getDetails(e[s]),this.activate(s)))},isBadQuery:function(t){if(!this.options.preventBadQueries)return!1;for(var e=this.badQueries,s=e.length;s--;)if(0===t.indexOf(e[s]))return!0;return!1},hide:function(e){this.getFormWrapper();var s=this.getSuggestionsContainer(),i=this.getDetailsContainer();t.isFunction(this.options.onHide)&&this.visible&&this.options.onHide.call(this.element,container),this.visible=!1,this.selectedIndex=-1,clearTimeout(this.onChangeTimeout),s.hide(),s.removeClass(this.classes.suggestionsContainerOrientTop),i.hide(),t("body").removeClass("dgwt-wcas-open"),t("body").removeClass("dgwt-wcas-block-scroll"),t("body").removeClass("dgwt-wcas-is-details"),t("body").removeClass("dgwt-wcas-full-width"),t("body").removeClass("dgwt-wcas-nores"),t("body").removeClass("dgwt-wcas-details-outside"),t("body").removeClass("dgwt-wcas-details-right"),t("body").removeClass("dgwt-wcas-details-left"),null!=this.autoAligmentprocess&&(clearInterval(this.autoAligmentprocess),this.autoAligmentprocess=null),"boolean"==typeof e&&e&&(this.hideCloseButton(),this.currentValue="",this.suggestions=[]),this.signalHint(null)},positionIconSearchMode:function(e){var s,i=e.find("."+this.options.formClass),o=i.width(),a=t(window).width(),n=e[0].getBoundingClientRect().left;i[0].getBoundingClientRect().left;var r=(n+10)/a;s=Math.floor(o*r*-1),i.css({left:s+"px"})},hideIconModeSearch:function(){var e=t(".dgwt-wcas-layout-icon-open");e.length>0&&e.removeClass("dgwt-wcas-layout-icon-open")},hideAfterClickOutsideListener:function(){var e=this;e.isMobileMode()||t(document).mouseup(function(s){if(e.visible){e.getSuggestionsContainer(),e.getDetailsContainer();var i=!(t(s.target).closest("."+e.options.searchFormClass).length>0||t(s.target).hasClass(e.options.searchFormClass)),o=!(t(s.target).closest("."+e.options.containerClass).length>0||t(s.target).hasClass(e.options.containerClass));if(e.canShowDetailsBox()){var a=!(t(s.target).closest("."+e.options.containerDetailsClass).length>0||t(s.target).hasClass(e.options.containerDetailsClass));i&&o&&a&&e.hide()}else i&&o&&e.hide()}})},suggest:function(){if(this.suggestions.length){var e,s=this,i=s.options,o=i.groupBy,a=i.formatResult,n=s.getQuery(s.currentValue),r=s.classes.suggestion,l=s.classes.selected,c=s.getSuggestionsContainer(),d=s.getDetailsContainer(),g=t(s.noSuggestionsContainer),u=i.beforeRender,h="";i.triggerSelectOnValidInput&&s.isExactMatch(n)?s.select(0):(t("body").removeClass("dgwt-wcas-nores"),t.each(s.suggestions,function(s,l){var c="",g=!1;if(o&&(h+=function(t,s){var i=t.data[o];return e===i?"":'<div class="autocomplete-group"><strong>'+(e=i)+"</strong></div>"}(l,0)),void 0===l.type||"product"!=l.type&&"product_variation"!=l.type){var u=r,p="dgwt-wcas-st",w="",f="",m="",v=!0;"product_cat"===l.taxonomy?(u+=" dgwt-wcas-suggestion-tax dgwt-wcas-suggestion-cat",i.showHeadings||(w+='<span class="dgwt-wcas-st--direct-headline">'+dgwt_wcas.labels.category+"</span>"),void 0!==l.breadcrumbs&&l.breadcrumbs&&(m=l.breadcrumbs+" &gt; "+l.value,f+='<span class="dgwt-wcas-st-breadcrumbs">'+dgwt_wcas.labels.in+" "+l.breadcrumbs+"</span>")):"product_tag"===l.taxonomy?(u+=" dgwt-wcas-suggestion-tax dgwt-wcas-suggestion-tag",i.showHeadings||(w+='<span class="dgwt-wcas-st--direct-headline">'+dgwt_wcas.labels.tag+"</span>")):i.isPremium&&l.taxonomy===i.taxonomyBrands?(u+=" dgwt-wcas-suggestion-tax dgwt-wcas-suggestion-brand",i.showHeadings||(w+='<span class="dgwt-wcas-st--direct-headline">'+dgwt_wcas.labels.brand+"</span>")):i.isPremium&&"post"===l.type?(u+=" dgwt-wcas-suggestion-pt dgwt-wcas-suggestion-tp-post",i.showHeadings||(w+='<span class="dgwt-wcas-st--direct-headline">'+dgwt_wcas.labels.post+"</span>")):i.isPremium&&"page"===l.type?(u+=" dgwt-wcas-suggestion-pt dgwt-wcas-suggestion-pt-page",i.showHeadings||(w+='<span class="dgwt-wcas-st--direct-headline">'+dgwt_wcas.labels.page+"</span>")):"more_products"===l.type?(u+=" js-dgwt-wcas-suggestion-more dgwt-wcas-suggestion-more",p="dgwt-wcas-st-more",l.value=dgwt_wcas.labels.show_more+" ("+l.total+")",v=!1):i.showHeadings&&"headline"===l.type?(u+=" js-dgwt-wcas-suggestion-headline dgwt-wcas-suggestion-headline",void 0!==dgwt_wcas.labels[l.value+"_plu"]&&(l.value=dgwt_wcas.labels[l.value+"_plu"]),v=!1):(u+=" dgwt-wcas-suggestion-nores",l.value=dgwt_wcas.labels.no_results,v=!1,!0===i.showDetailsPanel&&d.html(""),t("body").addClass("dgwt-wcas-nores")),m=m.length>0?' title="'+m+'"':"",h+='<div class="'+u+'" data-index="'+s+'">',h+="<span"+m+' class="'+p+'">'+w+a(l.value,n,v,i)+f+"</span>",h+="</div>"}else{!0===i.showImage&&void 0!==l.thumb_html&&(g=!0);var C="product_variation"===l.type?" dgwt-wcas-suggestion-product-var":"";c+=void 0!==l.post_id?'data-post-id="'+l.post_id+'" ':"",c+=void 0!==l.taxonomy?'data-taxonomy="'+l.taxonomy+'" ':"",c+=void 0!==l.term_id?'data-term-id="'+l.term_id+'" ':"",h+='<div class="'+r+" dgwt-wcas-suggestion-product"+C+'" data-index="'+s+'" '+c+">",g&&(h+='<span class="dgwt-wcas-si">'+l.thumb_html+"</span>"),h+=g?'<div class="dgwt-wcas-content-wrapp">':"",h+='<span class="dgwt-wcas-st">',h+='<span class="dgwt-wcas-st-title">'+a(l.value,n,!0,i)+"</span>",!0===i.showSKU&&void 0!==l.sku&&l.sku.length>0&&(h+='<span class="dgwt-wcas-sku">('+dgwt_wcas.labels.sku_label+" "+a(l.sku,n,!0,i)+")</span>"),!0===i.showDescription&&void 0!==l.desc&&l.desc&&(h+='<span class="dgwt-wcas-sd">'+a(l.desc,n,!0,i)+"</span>"),h+="</span>",!0===i.showPrice&&void 0!==l.price&&(h+='<span class="dgwt-wcas-sp">'+l.price+"</span>"),!0===i.showFeaturedBadge&&!0===l.on_sale&&(h+='<span class="dgwt-wcas-badge dgwt-wcas-badge-os">'+i.saleBadgeText+"</span>"),!0===i.showFeaturedBadge&&!0===l.featured&&(h+='<span class="dgwt-wcas-badge dgwt-wcas-badge-f">'+i.featuredBadgeText+"</span>"),h+=g?"</div>":"",h+="</div>"}}),this.adjustContainerWidth(),g.detach(),c.html(h),t.isFunction(u)&&u.call(s.element,c,s.suggestions),c.show(),t("body").addClass("dgwt-wcas-open"),s.automaticAlignment(),!0===i.showDetailsPanel&&(t("body").addClass("dgwt-wcas-is-details"),d.show(),s.fixHeight()),i.autoSelectFirst&&(s.selectedIndex=0,c.scrollTop(0),c.children("."+r).first().addClass(l)),s.visible=!0,s.fixPositionCapture(),"top"===s.options.orientation&&(s.getSuggestionsContainer().addClass(s.classes.suggestionsContainerOrientTop),t("body").addClass("dgwt-wcas-block-scroll"),setTimeout(function(){s.scrollDownSuggestions()},300)),s.findBestHint())}else this.hide()},adjustContainerWidth:function(){var e,s=this.options,i=t("body"),o=this.getFormWrapper(),a=this.getSuggestionsContainer(),n=this.getDetailsContainer(),r=this.getFormOffset();if(o.length){var l=getComputedStyle(o[0]).width;if(l=Math.round(parseFloat(l.replace("px",""))),"auto"===s.width&&(e=this.el.outerWidth(),a.css("width",e+"px")),this.canShowDetailsBox()){if(o.width()>=550)return i.addClass("dgwt-wcas-full-width"),l%2==0?(a.css("width",Math.round(l/2)),n.css("width",Math.round(l/2))):(a.css("width",Math.floor(l/2)),n.css("width",Math.ceil(l/2))),i.removeClass("dgwt-wcas-details-left"),i.removeClass("dgwt-wcas-details-right"),void(!0===s.isRtl?n.css("left","0"):a.css("left",l/2+r.left+"px"));i.addClass("dgwt-wcas-details-right")}}},positionPreloader:function(e){var s="object"==typeof e?e.find(".dgwt-wcas-search-submit"):t(".dgwt-wcas-search-submit");s.length>0&&s.each(function(){var e=t(this).closest(".dgwt-wcas-search-wrapp").find(".dgwt-wcas-preloader");1==dgwt_wcas.is_rtl?e.css("left",6+t(this).outerWidth()+"px"):e.css("right",t(this).outerWidth()+"px")})},findBestHint:function(){var e=this.el.val().toLowerCase(),s=null;e&&(t.each(this.suggestions,function(t,i){var o=0===i.value.toLowerCase().indexOf(e);return o&&(s=i),!o}),this.signalHint(s))},signalHint:function(e){var s="";e&&(s=this.currentValue+e.value.substr(this.currentValue.length)),this.hintValue!==s&&(this.hintValue=s,this.hint=e,(this.options.onHint||t.noop)(s))},preloader:function(e,s,i,o){var a,n,r="dgwt-wcas-preloader-wrapp",l=null==i?r:r+" "+i;if("form"===s?n=this.getFormWrapper().find(".dgwt-wcas-preloader"):"details"===s&&(n=this.getDetailsContainer()),1==dgwt_wcas.show_preloader&&0!=n.length)if(!0===o)if("hide"!==e){if("show"===e){var c=this.options.isRtl?"-rtl":"";a='<div class="'+l+'"><img class="dgwt-wcas-placeholder-preloader" src="'+dgwt_wcas.img_url+"placeholder"+c+'.png" /></div>',n.html(a)}}else t(r).remove();else"hide"===e?(n.removeClass(i),n.html("")):(n.addClass(i),"string"==typeof dgwt_wcas.preloader_icon&&n.html(dgwt_wcas.preloader_icon))},verifySuggestionsFormat:function(e){return e.length&&"string"==typeof e[0]?t.map(e,function(t){return{value:t,data:null}}):e},validateOrientation:function(e,s){return e=t.trim(e||"").toLowerCase(),-1===t.inArray(e,["auto","bottom","top"])&&(e=s),e},processResponse:function(t,e,s){var i=this.options;t.suggestions=this.verifySuggestionsFormat(t.suggestions),i.noCache||(this.cachedResponse[s]=t,i.preventBadQueries&&!t.suggestions.length&&this.badQueries.push(e)),e===this.getQuery(this.currentValue)&&("top"===this.options.orientation&&t.suggestions.reverse(),this.suggestions=t.suggestions,this.suggest())},activate:function(e){var s,i=this.classes.selected,o=this.getSuggestionsContainer(),a=o.find("."+this.classes.suggestion);return o.find("."+i).removeClass(i),this.selectedIndex=e,-1!==this.selectedIndex&&a.length>this.selectedIndex?(s=a.get(this.selectedIndex),t(s).addClass(i),s):null},selectHint:function(){var e=t.inArray(this.hint,this.suggestions);this.select(e)},select:function(t){this.hide(),this.onSelect(t)},moveUp:function(){if(-1!==this.selectedIndex){if(this.latestActivateSource="key",0===this.selectedIndex)return this.getSuggestionsContainer().children("."+this.classes.suggestion).first().removeClass(this.classes.selected),this.selectedIndex=-1,this.ignoreValueChange=!1,this.el.val(this.currentValue),void this.findBestHint();this.adjustScroll(this.selectedIndex-1,"up")}},moveDown:function(){this.selectedIndex!==this.suggestions.length-1&&(this.latestActivateSource="key",this.adjustScroll(this.selectedIndex+1,"down"))},adjustScroll:function(e,s){if("headline"===this.suggestions[e].type&&(e="down"===s?e+1:e-1),void 0!==this.suggestions[e]){var i=this.activate(e);if(this.getDetails(this.suggestions[e]),"more_products"!==this.suggestions[e].type&&i&&!this.canShowDetailsBox()){var o,a,n,r=this.getSuggestionsContainer(),l=t(i).outerHeight();o=i.offsetTop,n=(a=r.scrollTop())+this.options.maxHeight-l,o<a?r.scrollTop(o):o>n&&r.scrollTop(o-this.options.maxHeight+l),this.options.preserveInput||(this.ignoreValueChange=!0),this.signalHint(null)}}},onSelect:function(e){var s=this.options.onSelect,i=this.suggestions[e];void 0===i.type||"more_products"!==i.type&&("enter"!==this.actionTriggerSource||"key"==this.latestActivateSource||"product_variation"==i.type)?(this.currentValue=this.getValue(i.value),this.currentValue===this.el.val()||this.options.preserveInput||this.el.val(this.currentValue),i.url.length>0&&(window.location.href=i.url),this.signalHint(null),this.suggestions=[],this.selection=i,t.isFunction(s)&&s.call(this.element,i)):this.el.closest("form").trigger("submit")},getValue:function(t){var e,s,i=this.options.delimiter;return i?1===(s=(e=this.currentValue).split(i)).length?t:e.substr(0,e.length-s[s.length-1].length)+t:t},dispose:function(){this.el.off(".autocomplete").removeData("autocomplete"),t(window).off("resize.autocomplete",this.fixPositionCapture),t("."+this.options.containerClass).remove(),t("."+this.options.containerDetailsClass).remove()},enableOverlayMobile:function(){var e=this;if("on"!==e.overlayMobileState){e.overlayMobileState="on";var s,i=e.getFormWrapper(),o=e.getSuggestionsContainer(),a="";t("html").addClass("dgwt-wcas-overlay-mobile-on"),a+='<div class="js-dgwt-wcas-overlay-mobile dgwt-wcas-overlay-mobile">',a+='<div class="dgwt-wcas-om-bar js-dgwt-wcas-om-bar">',a+='<span class="dgwt-wcas-om-return js-dgwt-wcas-om-return">',"string"==typeof dgwt_wcas.back_icon?a+=dgwt_wcas.back_icon:(a+='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" color="#FFF">',a+='<path fill="#FFF" d="M14 6.125H3.351l4.891-4.891L7 0 0 7l7 7 1.234-1.234L3.35 7.875H14z" fill-rule="evenodd"></path>',a+="</svg>"),a+="</span>",a+="</div>",a+="</div>",t(e.options.mobileOverlayWrapper).append(a),(s=t(".js-dgwt-wcas-overlay-mobile")).css("zIndex",99999999999),i.after('<span class="js-dgwt-wcas-om-hook"></span>'),i.appendTo(".js-dgwt-wcas-om-bar"),o.appendTo(".js-dgwt-wcas-om-bar"),i.addClass("dgwt-wcas-search-wrapp-mobile"),i.hasClass("dgwt-wcas-has-submit")&&(i.addClass("dgwt-wcas-has-submit-off"),i.removeClass("dgwt-wcas-has-submit")),i.find("."+e.options.searchInputClass).focus(),t(document).on("click",".js-dgwt-wcas-om-return",function(t){e.disableOverlayMobile(s)})}},disableOverlayMobile:function(e){var s=this,i=s.getSuggestionsContainer(),o=t(".js-dgwt-wcas-om-bar").find("."+s.options.searchFormClass);o.hasClass("dgwt-wcas-has-submit-off")&&(o.removeClass("dgwt-wcas-has-submit-off"),o.addClass("dgwt-wcas-has-submit")),o.removeClass("dgwt-wcas-search-wrapp-mobile"),t("html").removeClass("dgwt-wcas-overlay-mobile-on"),i.appendTo("body"),i.removeAttr("body-scroll-lock-ignore"),t(".js-dgwt-wcas-om-hook").after(o),t(".js-dgwt-wcas-overlay-mobile").remove(),t(".js-dgwt-wcas-om-hook").remove(),setTimeout(function(){o.find("."+s.options.searchInputClass).val("");var t=o.find(".dgwt-wcas-close");o.length>0&&t.removeClass("dgwt-wcas-close"),s.hide()},150),s.overlayMobileState="off"},showCloseButton:function(){var t=void 0!==dgwt_wcas.close_icon?dgwt_wcas.close_icon:"",e=this.getFormWrapper().find("."+this.options.preloaderClass);e.addClass(this.options.closeTrigger),e.html(t)},hideCloseButton:function(){var t=this.getFormWrapper().find("."+this.options.closeTrigger);t.length&&(t.removeClass(this.options.closeTrigger),t.html(""))},elementOrParentIsFixed:function(e){var s=e.add(e.parents()),i=!1;return s.each(function(){if("fixed"===t(this).css("position"))return i=!0,!1}),i},gaEvent:function(t,e){if(this.options.sendGAEvents)try{if("undefined"!=typeof gtag)gtag("event","autocomplete_search",{event_label:t,event_category:e});else if("undefined"!=typeof ga){var s=ga.getAll()[0];s&&s.send({hitType:"event",eventCategory:e,eventAction:"autocomplete_search",eventLabel:t})}}catch(t){}if(this.options.enableGASiteSearchModule)try{if("undefined"!=typeof gtag)gtag("event","page_view",{page_path:"/?s="+encodeURI(t)+"&post_type=product&dgwt_wcas=1"});else if("undefined"!=typeof ga){var i=ga.getAll()[0];i&&(i.set("page","/?s="+encodeURI(t)+"&post_type=product&dgwt_wcas=1"),i.send("pageview"))}}catch(t){}}},t.fn.dgwtWcasAutocomplete=function(e,s){return arguments.length?this.each(function(){var i=t(this),o=i.data("autocomplete");"string"==typeof e?o&&"function"==typeof o[e]&&o[e](s):(o&&o.dispose&&o.dispose(),o=new d(this,e),i.data("autocomplete",o))}):this.first().data("autocomplete")},t.fn.autocomplete||(t.fn.autocomplete=t.fn.dgwtWcasAutocomplete),function(){function e(){var e=t(".dgwt-wcas-search-input"),s=[];e.length>1&&e.each(function(){var e=t(this).attr("id");if(-1==t.inArray(e,s))s.push(e);else{var i=Math.random().toString(36).substring(2,6);i="dgwt-wcas-search-input-"+i,t(this).attr("id",i),t(this).closest("form").find("label").attr("for",i)}})}function s(){var e=t(".dgwt-wcas-search-input");e.length>0&&e.each(function(){"object"!=typeof t(this).data("autocomplete")&&t(this).dgwtWcasAutocomplete(window.dgwt_wcas.config)})}t(document).ready(function(){(["iPad Simulator","iPhone Simulator","iPod Simulator","iPad","iPhone","iPod"].includes(navigator.platform)||navigator.userAgent.includes("Mac")&&"ontouchend"in document)&&t("html").addClass("dgwt-wcas-is-ios");var e=1==dgwt_wcas.show_details_box,s=dgwt_wcas.mobile_breakpoint;(jQuery(window).width()<s||"ontouchend"in document)&&(e=!1),window.dgwt_wcas.config={minChars:dgwt_wcas.min_chars,width:dgwt_wcas.sug_width,autoSelectFirst:!1,triggerSelectOnValidInput:!1,serviceUrl:dgwt_wcas.ajax_search_endpoint,paramName:"s",showDetailsPanel:e,showImage:1==dgwt_wcas.show_images,showPrice:1==dgwt_wcas.show_price,showDescription:1==dgwt_wcas.show_desc,showSKU:1==dgwt_wcas.show_sku,showSaleBadge:1==dgwt_wcas.show_sale_badge,showFeaturedBadge:1==dgwt_wcas.show_featured_badge,dynamicPrices:!(void 0===dgwt_wcas.dynamic_prices||!dgwt_wcas.dynamic_prices),saleBadgeText:dgwt_wcas.labels.sale_badge,featuredBadgeText:dgwt_wcas.labels.featured_badge,isRtl:1==dgwt_wcas.is_rtl,showHeadings:1==dgwt_wcas.show_headings,isPremium:1==dgwt_wcas.is_premium,taxonomyBrands:dgwt_wcas.taxonomy_brands,mobileBreakpoint:s,mobileOverlayWrapper:dgwt_wcas.mobile_overlay_wrapper,debounceWaitMs:dgwt_wcas.debounce_wait_ms,sendGAEvents:dgwt_wcas.send_ga_events,convertHtml:dgwt_wcas.convert_html,enableGASiteSearchModule:dgwt_wcas.enable_ga_site_search_module},t(".dgwt-wcas-search-input").dgwtWcasAutocomplete(window.dgwt_wcas.config)}),t(document).ready(function(){setTimeout(function(){e(),s()},500)}),t(window).on("load",function(){setTimeout(function(){e(),s()},500),void 0!==window.elementorFrontend&&void 0!==window.elementorFrontend.documentsManager&&void 0!==window.elementorFrontend.documentsManager.documents&&t.each(elementorFrontend.documentsManager.documents,function(t,e){void 0!==e.getModal&&e.getModal&&e.getModal().on("show",function(){setTimeout(function(){s()},300)})})})}()});

;/*! tooltipster v4.2.7 */!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],function(a){return b(a)}):"object"==typeof exports?module.exports=b(require("jquery")):b(jQuery)}(this,function(a){function b(a){this.$container,this.constraints=null,this.__$tooltip,this.__init(a)}function c(b,c){var d=!0;return a.each(b,function(a,e){return void 0===c[a]||b[a]!==c[a]?(d=!1,!1):void 0}),d}function d(b){var c=b.attr("id"),d=c?h.window.document.getElementById(c):null;return d?d===b[0]:a.contains(h.window.document.body,b[0])}function e(){if(!g)return!1;var a=g.document.body||g.document.documentElement,b=a.style,c="transition",d=["Moz","Webkit","Khtml","O","ms"];if("string"==typeof b[c])return!0;c=c.charAt(0).toUpperCase()+c.substr(1);for(var e=0;e<d.length;e++)if("string"==typeof b[d[e]+c])return!0;return!1}var f={animation:"fade",animationDuration:350,content:null,contentAsHTML:!1,contentCloning:!1,debug:!0,delay:300,delayTouch:[300,500],functionInit:null,functionBefore:null,functionReady:null,functionAfter:null,functionFormat:null,IEmin:6,interactive:!1,multiple:!1,parent:null,plugins:["sideTip"],repositionOnScroll:!1,restoration:"none",selfDestruction:!0,theme:[],timer:0,trackerInterval:500,trackOrigin:!1,trackTooltip:!1,trigger:"hover",triggerClose:{click:!1,mouseleave:!1,originClick:!1,scroll:!1,tap:!1,touchleave:!1},triggerOpen:{click:!1,mouseenter:!1,tap:!1,touchstart:!1},updateAnimation:"rotate",zIndex:9999999},g="undefined"!=typeof window?window:null,h={hasTouchCapability:!(!g||!("ontouchstart"in g||g.DocumentTouch&&g.document instanceof g.DocumentTouch||g.navigator.maxTouchPoints)),hasTransitions:e(),IE:!1,semVer:"4.2.7",window:g},i=function(){this.__$emitterPrivate=a({}),this.__$emitterPublic=a({}),this.__instancesLatestArr=[],this.__plugins={},this._env=h};i.prototype={__bridge:function(b,c,d){if(!c[d]){var e=function(){};e.prototype=b;var g=new e;g.__init&&g.__init(c),a.each(b,function(a,b){0!=a.indexOf("__")&&(c[a]?f.debug&&console.log("The "+a+" method of the "+d+" plugin conflicts with another plugin or native methods"):(c[a]=function(){return g[a].apply(g,Array.prototype.slice.apply(arguments))},c[a].bridged=g))}),c[d]=g}return this},__setWindow:function(a){return h.window=a,this},_getRuler:function(a){return new b(a)},_off:function(){return this.__$emitterPrivate.off.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_on:function(){return this.__$emitterPrivate.on.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_one:function(){return this.__$emitterPrivate.one.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_plugin:function(b){var c=this;if("string"==typeof b){var d=b,e=null;return d.indexOf(".")>0?e=c.__plugins[d]:a.each(c.__plugins,function(a,b){return b.name.substring(b.name.length-d.length-1)=="."+d?(e=b,!1):void 0}),e}if(b.name.indexOf(".")<0)throw new Error("Plugins must be namespaced");return c.__plugins[b.name]=b,b.core&&c.__bridge(b.core,c,b.name),this},_trigger:function(){var a=Array.prototype.slice.apply(arguments);return"string"==typeof a[0]&&(a[0]={type:a[0]}),this.__$emitterPrivate.trigger.apply(this.__$emitterPrivate,a),this.__$emitterPublic.trigger.apply(this.__$emitterPublic,a),this},instances:function(b){var c=[],d=b||".tooltipstered";return a(d).each(function(){var b=a(this),d=b.data("tooltipster-ns");d&&a.each(d,function(a,d){c.push(b.data(d))})}),c},instancesLatest:function(){return this.__instancesLatestArr},off:function(){return this.__$emitterPublic.off.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},on:function(){return this.__$emitterPublic.on.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},one:function(){return this.__$emitterPublic.one.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},origins:function(b){var c=b?b+" ":"";return a(c+".tooltipstered").toArray()},setDefaults:function(b){return a.extend(f,b),this},triggerHandler:function(){return this.__$emitterPublic.triggerHandler.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this}},a.tooltipster=new i,a.Tooltipster=function(b,c){this.__callbacks={close:[],open:[]},this.__closingTime,this.__Content,this.__contentBcr,this.__destroyed=!1,this.__$emitterPrivate=a({}),this.__$emitterPublic=a({}),this.__enabled=!0,this.__garbageCollector,this.__Geometry,this.__lastPosition,this.__namespace="tooltipster-"+Math.round(1e6*Math.random()),this.__options,this.__$originParents,this.__pointerIsOverOrigin=!1,this.__previousThemes=[],this.__state="closed",this.__timeouts={close:[],open:null},this.__touchEvents=[],this.__tracker=null,this._$origin,this._$tooltip,this.__init(b,c)},a.Tooltipster.prototype={__init:function(b,c){var d=this;if(d._$origin=a(b),d.__options=a.extend(!0,{},f,c),d.__optionsFormat(),!h.IE||h.IE>=d.__options.IEmin){var e=null;if(void 0===d._$origin.data("tooltipster-initialTitle")&&(e=d._$origin.attr("title"),void 0===e&&(e=null),d._$origin.data("tooltipster-initialTitle",e)),null!==d.__options.content)d.__contentSet(d.__options.content);else{var g,i=d._$origin.attr("data-tooltip-content");i&&(g=a(i)),g&&g[0]?d.__contentSet(g.first()):d.__contentSet(e)}d._$origin.removeAttr("title").addClass("tooltipstered"),d.__prepareOrigin(),d.__prepareGC(),a.each(d.__options.plugins,function(a,b){d._plug(b)}),h.hasTouchCapability&&a(h.window.document.body).on("touchmove."+d.__namespace+"-triggerOpen",function(a){d._touchRecordEvent(a)}),d._on("created",function(){d.__prepareTooltip()})._on("repositioned",function(a){d.__lastPosition=a.position})}else d.__options.disabled=!0},__contentInsert:function(){var a=this,b=a._$tooltip.find(".tooltipster-content"),c=a.__Content,d=function(a){c=a};return a._trigger({type:"format",content:a.__Content,format:d}),a.__options.functionFormat&&(c=a.__options.functionFormat.call(a,a,{origin:a._$origin[0]},a.__Content)),"string"!=typeof c||a.__options.contentAsHTML?b.empty().append(c):b.text(c),a},__contentSet:function(b){return b instanceof a&&this.__options.contentCloning&&(b=b.clone(!0)),this.__Content=b,this._trigger({type:"updated",content:b}),this},__destroyError:function(){throw new Error("This tooltip has been destroyed and cannot execute your method call.")},__geometry:function(){var b=this,c=b._$origin,d=b._$origin.is("area");if(d){var e=b._$origin.parent().attr("name");c=a('img[usemap="#'+e+'"]')}var f=c[0].getBoundingClientRect(),g=a(h.window.document),i=a(h.window),j=c,k={available:{document:null,window:null},document:{size:{height:g.height(),width:g.width()}},window:{scroll:{left:h.window.scrollX||h.window.document.documentElement.scrollLeft,top:h.window.scrollY||h.window.document.documentElement.scrollTop},size:{height:i.height(),width:i.width()}},origin:{fixedLineage:!1,offset:{},size:{height:f.bottom-f.top,width:f.right-f.left},usemapImage:d?c[0]:null,windowOffset:{bottom:f.bottom,left:f.left,right:f.right,top:f.top}}};if(d){var l=b._$origin.attr("shape"),m=b._$origin.attr("coords");if(m&&(m=m.split(","),a.map(m,function(a,b){m[b]=parseInt(a)})),"default"!=l)switch(l){case"circle":var n=m[0],o=m[1],p=m[2],q=o-p,r=n-p;k.origin.size.height=2*p,k.origin.size.width=k.origin.size.height,k.origin.windowOffset.left+=r,k.origin.windowOffset.top+=q;break;case"rect":var s=m[0],t=m[1],u=m[2],v=m[3];k.origin.size.height=v-t,k.origin.size.width=u-s,k.origin.windowOffset.left+=s,k.origin.windowOffset.top+=t;break;case"poly":for(var w=0,x=0,y=0,z=0,A="even",B=0;B<m.length;B++){var C=m[B];"even"==A?(C>y&&(y=C,0===B&&(w=y)),w>C&&(w=C),A="odd"):(C>z&&(z=C,1==B&&(x=z)),x>C&&(x=C),A="even")}k.origin.size.height=z-x,k.origin.size.width=y-w,k.origin.windowOffset.left+=w,k.origin.windowOffset.top+=x}}var D=function(a){k.origin.size.height=a.height,k.origin.windowOffset.left=a.left,k.origin.windowOffset.top=a.top,k.origin.size.width=a.width};for(b._trigger({type:"geometry",edit:D,geometry:{height:k.origin.size.height,left:k.origin.windowOffset.left,top:k.origin.windowOffset.top,width:k.origin.size.width}}),k.origin.windowOffset.right=k.origin.windowOffset.left+k.origin.size.width,k.origin.windowOffset.bottom=k.origin.windowOffset.top+k.origin.size.height,k.origin.offset.left=k.origin.windowOffset.left+k.window.scroll.left,k.origin.offset.top=k.origin.windowOffset.top+k.window.scroll.top,k.origin.offset.bottom=k.origin.offset.top+k.origin.size.height,k.origin.offset.right=k.origin.offset.left+k.origin.size.width,k.available.document={bottom:{height:k.document.size.height-k.origin.offset.bottom,width:k.document.size.width},left:{height:k.document.size.height,width:k.origin.offset.left},right:{height:k.document.size.height,width:k.document.size.width-k.origin.offset.right},top:{height:k.origin.offset.top,width:k.document.size.width}},k.available.window={bottom:{height:Math.max(k.window.size.height-Math.max(k.origin.windowOffset.bottom,0),0),width:k.window.size.width},left:{height:k.window.size.height,width:Math.max(k.origin.windowOffset.left,0)},right:{height:k.window.size.height,width:Math.max(k.window.size.width-Math.max(k.origin.windowOffset.right,0),0)},top:{height:Math.max(k.origin.windowOffset.top,0),width:k.window.size.width}};"html"!=j[0].tagName.toLowerCase();){if("fixed"==j.css("position")){k.origin.fixedLineage=!0;break}j=j.parent()}return k},__optionsFormat:function(){return"number"==typeof this.__options.animationDuration&&(this.__options.animationDuration=[this.__options.animationDuration,this.__options.animationDuration]),"number"==typeof this.__options.delay&&(this.__options.delay=[this.__options.delay,this.__options.delay]),"number"==typeof this.__options.delayTouch&&(this.__options.delayTouch=[this.__options.delayTouch,this.__options.delayTouch]),"string"==typeof this.__options.theme&&(this.__options.theme=[this.__options.theme]),null===this.__options.parent?this.__options.parent=a(h.window.document.body):"string"==typeof this.__options.parent&&(this.__options.parent=a(this.__options.parent)),"hover"==this.__options.trigger?(this.__options.triggerOpen={mouseenter:!0,touchstart:!0},this.__options.triggerClose={mouseleave:!0,originClick:!0,touchleave:!0}):"click"==this.__options.trigger&&(this.__options.triggerOpen={click:!0,tap:!0},this.__options.triggerClose={click:!0,tap:!0}),this._trigger("options"),this},__prepareGC:function(){var b=this;return b.__options.selfDestruction?b.__garbageCollector=setInterval(function(){var c=(new Date).getTime();b.__touchEvents=a.grep(b.__touchEvents,function(a,b){return c-a.time>6e4}),d(b._$origin)||b.close(function(){b.destroy()})},2e4):clearInterval(b.__garbageCollector),b},__prepareOrigin:function(){var a=this;if(a._$origin.off("."+a.__namespace+"-triggerOpen"),h.hasTouchCapability&&a._$origin.on("touchstart."+a.__namespace+"-triggerOpen touchend."+a.__namespace+"-triggerOpen touchcancel."+a.__namespace+"-triggerOpen",function(b){a._touchRecordEvent(b)}),a.__options.triggerOpen.click||a.__options.triggerOpen.tap&&h.hasTouchCapability){var b="";a.__options.triggerOpen.click&&(b+="click."+a.__namespace+"-triggerOpen "),a.__options.triggerOpen.tap&&h.hasTouchCapability&&(b+="touchend."+a.__namespace+"-triggerOpen"),a._$origin.on(b,function(b){a._touchIsMeaningfulEvent(b)&&a._open(b)})}if(a.__options.triggerOpen.mouseenter||a.__options.triggerOpen.touchstart&&h.hasTouchCapability){var b="";a.__options.triggerOpen.mouseenter&&(b+="mouseenter."+a.__namespace+"-triggerOpen "),a.__options.triggerOpen.touchstart&&h.hasTouchCapability&&(b+="touchstart."+a.__namespace+"-triggerOpen"),a._$origin.on(b,function(b){!a._touchIsTouchEvent(b)&&a._touchIsEmulatedEvent(b)||(a.__pointerIsOverOrigin=!0,a._openShortly(b))})}if(a.__options.triggerClose.mouseleave||a.__options.triggerClose.touchleave&&h.hasTouchCapability){var b="";a.__options.triggerClose.mouseleave&&(b+="mouseleave."+a.__namespace+"-triggerOpen "),a.__options.triggerClose.touchleave&&h.hasTouchCapability&&(b+="touchend."+a.__namespace+"-triggerOpen touchcancel."+a.__namespace+"-triggerOpen"),a._$origin.on(b,function(b){a._touchIsMeaningfulEvent(b)&&(a.__pointerIsOverOrigin=!1)})}return a},__prepareTooltip:function(){var b=this,c=b.__options.interactive?"auto":"";return b._$tooltip.attr("id",b.__namespace).css({"pointer-events":c,zIndex:b.__options.zIndex}),a.each(b.__previousThemes,function(a,c){b._$tooltip.removeClass(c)}),a.each(b.__options.theme,function(a,c){b._$tooltip.addClass(c)}),b.__previousThemes=a.merge([],b.__options.theme),b},__scrollHandler:function(b){var c=this;if(c.__options.triggerClose.scroll)c._close(b);else if(d(c._$origin)&&d(c._$tooltip)){var e=null;if(b.target===h.window.document)c.__Geometry.origin.fixedLineage||c.__options.repositionOnScroll&&c.reposition(b);else{e=c.__geometry();var f=!1;if("fixed"!=c._$origin.css("position")&&c.__$originParents.each(function(b,c){var d=a(c),g=d.css("overflow-x"),h=d.css("overflow-y");if("visible"!=g||"visible"!=h){var i=c.getBoundingClientRect();if("visible"!=g&&(e.origin.windowOffset.left<i.left||e.origin.windowOffset.right>i.right))return f=!0,!1;if("visible"!=h&&(e.origin.windowOffset.top<i.top||e.origin.windowOffset.bottom>i.bottom))return f=!0,!1}return"fixed"==d.css("position")?!1:void 0}),f)c._$tooltip.css("visibility","hidden");else if(c._$tooltip.css("visibility","visible"),c.__options.repositionOnScroll)c.reposition(b);else{var g=e.origin.offset.left-c.__Geometry.origin.offset.left,i=e.origin.offset.top-c.__Geometry.origin.offset.top;c._$tooltip.css({left:c.__lastPosition.coord.left+g,top:c.__lastPosition.coord.top+i})}}c._trigger({type:"scroll",event:b,geo:e})}return c},__stateSet:function(a){return this.__state=a,this._trigger({type:"state",state:a}),this},__timeoutsClear:function(){return clearTimeout(this.__timeouts.open),this.__timeouts.open=null,a.each(this.__timeouts.close,function(a,b){clearTimeout(b)}),this.__timeouts.close=[],this},__trackerStart:function(){var a=this,b=a._$tooltip.find(".tooltipster-content");return a.__options.trackTooltip&&(a.__contentBcr=b[0].getBoundingClientRect()),a.__tracker=setInterval(function(){if(d(a._$origin)&&d(a._$tooltip)){if(a.__options.trackOrigin){var e=a.__geometry(),f=!1;c(e.origin.size,a.__Geometry.origin.size)&&(a.__Geometry.origin.fixedLineage?c(e.origin.windowOffset,a.__Geometry.origin.windowOffset)&&(f=!0):c(e.origin.offset,a.__Geometry.origin.offset)&&(f=!0)),f||(a.__options.triggerClose.mouseleave?a._close():a.reposition())}if(a.__options.trackTooltip){var g=b[0].getBoundingClientRect();g.height===a.__contentBcr.height&&g.width===a.__contentBcr.width||(a.reposition(),a.__contentBcr=g)}}else a._close()},a.__options.trackerInterval),a},_close:function(b,c,d){var e=this,f=!0;if(e._trigger({type:"close",event:b,stop:function(){f=!1}}),f||d){c&&e.__callbacks.close.push(c),e.__callbacks.open=[],e.__timeoutsClear();var g=function(){a.each(e.__callbacks.close,function(a,c){c.call(e,e,{event:b,origin:e._$origin[0]})}),e.__callbacks.close=[]};if("closed"!=e.__state){var i=!0,j=new Date,k=j.getTime(),l=k+e.__options.animationDuration[1];if("disappearing"==e.__state&&l>e.__closingTime&&e.__options.animationDuration[1]>0&&(i=!1),i){e.__closingTime=l,"disappearing"!=e.__state&&e.__stateSet("disappearing");var m=function(){clearInterval(e.__tracker),e._trigger({type:"closing",event:b}),e._$tooltip.off("."+e.__namespace+"-triggerClose").removeClass("tooltipster-dying"),a(h.window).off("."+e.__namespace+"-triggerClose"),e.__$originParents.each(function(b,c){a(c).off("scroll."+e.__namespace+"-triggerClose")}),e.__$originParents=null,a(h.window.document.body).off("."+e.__namespace+"-triggerClose"),e._$origin.off("."+e.__namespace+"-triggerClose"),e._off("dismissable"),e.__stateSet("closed"),e._trigger({type:"after",event:b}),e.__options.functionAfter&&e.__options.functionAfter.call(e,e,{event:b,origin:e._$origin[0]}),g()};h.hasTransitions?(e._$tooltip.css({"-moz-animation-duration":e.__options.animationDuration[1]+"ms","-ms-animation-duration":e.__options.animationDuration[1]+"ms","-o-animation-duration":e.__options.animationDuration[1]+"ms","-webkit-animation-duration":e.__options.animationDuration[1]+"ms","animation-duration":e.__options.animationDuration[1]+"ms","transition-duration":e.__options.animationDuration[1]+"ms"}),e._$tooltip.clearQueue().removeClass("tooltipster-show").addClass("tooltipster-dying"),e.__options.animationDuration[1]>0&&e._$tooltip.delay(e.__options.animationDuration[1]),e._$tooltip.queue(m)):e._$tooltip.stop().fadeOut(e.__options.animationDuration[1],m)}}else g()}return e},_off:function(){return this.__$emitterPrivate.off.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_on:function(){return this.__$emitterPrivate.on.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_one:function(){return this.__$emitterPrivate.one.apply(this.__$emitterPrivate,Array.prototype.slice.apply(arguments)),this},_open:function(b,c){var e=this;if(!e.__destroying&&d(e._$origin)&&e.__enabled){var f=!0;if("closed"==e.__state&&(e._trigger({type:"before",event:b,stop:function(){f=!1}}),f&&e.__options.functionBefore&&(f=e.__options.functionBefore.call(e,e,{event:b,origin:e._$origin[0]}))),f!==!1&&null!==e.__Content){c&&e.__callbacks.open.push(c),e.__callbacks.close=[],e.__timeoutsClear();var g,i=function(){"stable"!=e.__state&&e.__stateSet("stable"),a.each(e.__callbacks.open,function(a,b){b.call(e,e,{origin:e._$origin[0],tooltip:e._$tooltip[0]})}),e.__callbacks.open=[]};if("closed"!==e.__state)g=0,"disappearing"===e.__state?(e.__stateSet("appearing"),h.hasTransitions?(e._$tooltip.clearQueue().removeClass("tooltipster-dying").addClass("tooltipster-show"),e.__options.animationDuration[0]>0&&e._$tooltip.delay(e.__options.animationDuration[0]),e._$tooltip.queue(i)):e._$tooltip.stop().fadeIn(i)):"stable"==e.__state&&i();else{if(e.__stateSet("appearing"),g=e.__options.animationDuration[0],e.__contentInsert(),e.reposition(b,!0),h.hasTransitions?(e._$tooltip.addClass("tooltipster-"+e.__options.animation).addClass("tooltipster-initial").css({"-moz-animation-duration":e.__options.animationDuration[0]+"ms","-ms-animation-duration":e.__options.animationDuration[0]+"ms","-o-animation-duration":e.__options.animationDuration[0]+"ms","-webkit-animation-duration":e.__options.animationDuration[0]+"ms","animation-duration":e.__options.animationDuration[0]+"ms","transition-duration":e.__options.animationDuration[0]+"ms"}),setTimeout(function(){"closed"!=e.__state&&(e._$tooltip.addClass("tooltipster-show").removeClass("tooltipster-initial"),e.__options.animationDuration[0]>0&&e._$tooltip.delay(e.__options.animationDuration[0]),e._$tooltip.queue(i))},0)):e._$tooltip.css("display","none").fadeIn(e.__options.animationDuration[0],i),e.__trackerStart(),a(h.window).on("resize."+e.__namespace+"-triggerClose",function(b){var c=a(document.activeElement);(c.is("input")||c.is("textarea"))&&a.contains(e._$tooltip[0],c[0])||e.reposition(b)}).on("scroll."+e.__namespace+"-triggerClose",function(a){e.__scrollHandler(a)}),e.__$originParents=e._$origin.parents(),e.__$originParents.each(function(b,c){a(c).on("scroll."+e.__namespace+"-triggerClose",function(a){e.__scrollHandler(a)})}),e.__options.triggerClose.mouseleave||e.__options.triggerClose.touchleave&&h.hasTouchCapability){e._on("dismissable",function(a){a.dismissable?a.delay?(m=setTimeout(function(){e._close(a.event)},a.delay),e.__timeouts.close.push(m)):e._close(a):clearTimeout(m)});var j=e._$origin,k="",l="",m=null;e.__options.interactive&&(j=j.add(e._$tooltip)),e.__options.triggerClose.mouseleave&&(k+="mouseenter."+e.__namespace+"-triggerClose ",l+="mouseleave."+e.__namespace+"-triggerClose "),e.__options.triggerClose.touchleave&&h.hasTouchCapability&&(k+="touchstart."+e.__namespace+"-triggerClose",l+="touchend."+e.__namespace+"-triggerClose touchcancel."+e.__namespace+"-triggerClose"),j.on(l,function(a){if(e._touchIsTouchEvent(a)||!e._touchIsEmulatedEvent(a)){var b="mouseleave"==a.type?e.__options.delay:e.__options.delayTouch;e._trigger({delay:b[1],dismissable:!0,event:a,type:"dismissable"})}}).on(k,function(a){!e._touchIsTouchEvent(a)&&e._touchIsEmulatedEvent(a)||e._trigger({dismissable:!1,event:a,type:"dismissable"})})}e.__options.triggerClose.originClick&&e._$origin.on("click."+e.__namespace+"-triggerClose",function(a){e._touchIsTouchEvent(a)||e._touchIsEmulatedEvent(a)||e._close(a)}),(e.__options.triggerClose.click||e.__options.triggerClose.tap&&h.hasTouchCapability)&&setTimeout(function(){if("closed"!=e.__state){var b="",c=a(h.window.document.body);e.__options.triggerClose.click&&(b+="click."+e.__namespace+"-triggerClose "),e.__options.triggerClose.tap&&h.hasTouchCapability&&(b+="touchend."+e.__namespace+"-triggerClose"),c.on(b,function(b){e._touchIsMeaningfulEvent(b)&&(e._touchRecordEvent(b),e.__options.interactive&&a.contains(e._$tooltip[0],b.target)||e._close(b))}),e.__options.triggerClose.tap&&h.hasTouchCapability&&c.on("touchstart."+e.__namespace+"-triggerClose",function(a){e._touchRecordEvent(a)})}},0),e._trigger("ready"),e.__options.functionReady&&e.__options.functionReady.call(e,e,{origin:e._$origin[0],tooltip:e._$tooltip[0]})}if(e.__options.timer>0){var m=setTimeout(function(){e._close()},e.__options.timer+g);e.__timeouts.close.push(m)}}}return e},_openShortly:function(a){var b=this,c=!0;if("stable"!=b.__state&&"appearing"!=b.__state&&!b.__timeouts.open&&(b._trigger({type:"start",event:a,stop:function(){c=!1}}),c)){var d=0==a.type.indexOf("touch")?b.__options.delayTouch:b.__options.delay;d[0]?b.__timeouts.open=setTimeout(function(){b.__timeouts.open=null,b.__pointerIsOverOrigin&&b._touchIsMeaningfulEvent(a)?(b._trigger("startend"),b._open(a)):b._trigger("startcancel")},d[0]):(b._trigger("startend"),b._open(a))}return b},_optionsExtract:function(b,c){var d=this,e=a.extend(!0,{},c),f=d.__options[b];return f||(f={},a.each(c,function(a,b){var c=d.__options[a];void 0!==c&&(f[a]=c)})),a.each(e,function(b,c){void 0!==f[b]&&("object"!=typeof c||c instanceof Array||null==c||"object"!=typeof f[b]||f[b]instanceof Array||null==f[b]?e[b]=f[b]:a.extend(e[b],f[b]))}),e},_plug:function(b){var c=a.tooltipster._plugin(b);if(!c)throw new Error('The "'+b+'" plugin is not defined');return c.instance&&a.tooltipster.__bridge(c.instance,this,c.name),this},_touchIsEmulatedEvent:function(a){for(var b=!1,c=(new Date).getTime(),d=this.__touchEvents.length-1;d>=0;d--){var e=this.__touchEvents[d];if(!(c-e.time<500))break;e.target===a.target&&(b=!0)}return b},_touchIsMeaningfulEvent:function(a){return this._touchIsTouchEvent(a)&&!this._touchSwiped(a.target)||!this._touchIsTouchEvent(a)&&!this._touchIsEmulatedEvent(a)},_touchIsTouchEvent:function(a){return 0==a.type.indexOf("touch")},_touchRecordEvent:function(a){return this._touchIsTouchEvent(a)&&(a.time=(new Date).getTime(),this.__touchEvents.push(a)),this},_touchSwiped:function(a){for(var b=!1,c=this.__touchEvents.length-1;c>=0;c--){var d=this.__touchEvents[c];if("touchmove"==d.type){b=!0;break}if("touchstart"==d.type&&a===d.target)break}return b},_trigger:function(){var b=Array.prototype.slice.apply(arguments);return"string"==typeof b[0]&&(b[0]={type:b[0]}),b[0].instance=this,b[0].origin=this._$origin?this._$origin[0]:null,b[0].tooltip=this._$tooltip?this._$tooltip[0]:null,this.__$emitterPrivate.trigger.apply(this.__$emitterPrivate,b),a.tooltipster._trigger.apply(a.tooltipster,b),this.__$emitterPublic.trigger.apply(this.__$emitterPublic,b),this},_unplug:function(b){var c=this;if(c[b]){var d=a.tooltipster._plugin(b);d.instance&&a.each(d.instance,function(a,d){c[a]&&c[a].bridged===c[b]&&delete c[a]}),c[b].__destroy&&c[b].__destroy(),delete c[b]}return c},close:function(a){return this.__destroyed?this.__destroyError():this._close(null,a),this},content:function(a){var b=this;if(void 0===a)return b.__Content;if(b.__destroyed)b.__destroyError();else if(b.__contentSet(a),null!==b.__Content){if("closed"!==b.__state&&(b.__contentInsert(),b.reposition(),b.__options.updateAnimation))if(h.hasTransitions){var c=b.__options.updateAnimation;b._$tooltip.addClass("tooltipster-update-"+c),setTimeout(function(){"closed"!=b.__state&&b._$tooltip.removeClass("tooltipster-update-"+c)},1e3)}else b._$tooltip.fadeTo(200,.5,function(){"closed"!=b.__state&&b._$tooltip.fadeTo(200,1)})}else b._close();return b},destroy:function(){var b=this;if(b.__destroyed)b.__destroyError();else{"closed"!=b.__state?b.option("animationDuration",0)._close(null,null,!0):b.__timeoutsClear(),b._trigger("destroy"),b.__destroyed=!0,b._$origin.removeData(b.__namespace).off("."+b.__namespace+"-triggerOpen"),a(h.window.document.body).off("."+b.__namespace+"-triggerOpen");var c=b._$origin.data("tooltipster-ns");if(c)if(1===c.length){var d=null;"previous"==b.__options.restoration?d=b._$origin.data("tooltipster-initialTitle"):"current"==b.__options.restoration&&(d="string"==typeof b.__Content?b.__Content:a("<div></div>").append(b.__Content).html()),d&&b._$origin.attr("title",d),b._$origin.removeClass("tooltipstered"),b._$origin.removeData("tooltipster-ns").removeData("tooltipster-initialTitle")}else c=a.grep(c,function(a,c){return a!==b.__namespace}),b._$origin.data("tooltipster-ns",c);b._trigger("destroyed"),b._off(),b.off(),b.__Content=null,b.__$emitterPrivate=null,b.__$emitterPublic=null,b.__options.parent=null,b._$origin=null,b._$tooltip=null,a.tooltipster.__instancesLatestArr=a.grep(a.tooltipster.__instancesLatestArr,function(a,c){return b!==a}),clearInterval(b.__garbageCollector)}return b},disable:function(){return this.__destroyed?(this.__destroyError(),this):(this._close(),this.__enabled=!1,this)},elementOrigin:function(){return this.__destroyed?void this.__destroyError():this._$origin[0]},elementTooltip:function(){return this._$tooltip?this._$tooltip[0]:null},enable:function(){return this.__enabled=!0,this},hide:function(a){return this.close(a)},instance:function(){return this},off:function(){return this.__destroyed||this.__$emitterPublic.off.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},on:function(){return this.__destroyed?this.__destroyError():this.__$emitterPublic.on.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},one:function(){return this.__destroyed?this.__destroyError():this.__$emitterPublic.one.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this},open:function(a){return this.__destroyed?this.__destroyError():this._open(null,a),this},option:function(b,c){return void 0===c?this.__options[b]:(this.__destroyed?this.__destroyError():(this.__options[b]=c,this.__optionsFormat(),a.inArray(b,["trigger","triggerClose","triggerOpen"])>=0&&this.__prepareOrigin(),"selfDestruction"===b&&this.__prepareGC()),this)},reposition:function(a,b){var c=this;return c.__destroyed?c.__destroyError():"closed"!=c.__state&&d(c._$origin)&&(b||d(c._$tooltip))&&(b||c._$tooltip.detach(),c.__Geometry=c.__geometry(),c._trigger({type:"reposition",event:a,helper:{geo:c.__Geometry}})),c},show:function(a){return this.open(a)},status:function(){return{destroyed:this.__destroyed,enabled:this.__enabled,open:"closed"!==this.__state,state:this.__state}},triggerHandler:function(){return this.__destroyed?this.__destroyError():this.__$emitterPublic.triggerHandler.apply(this.__$emitterPublic,Array.prototype.slice.apply(arguments)),this}},a.fn.tooltipster=function(){var b=Array.prototype.slice.apply(arguments),c="You are using a single HTML element as content for several tooltips. You probably want to set the contentCloning option to TRUE.";if(0===this.length)return this;if("string"==typeof b[0]){var d="#*$~&";return this.each(function(){var e=a(this).data("tooltipster-ns"),f=e?a(this).data(e[0]):null;if(!f)throw new Error("You called Tooltipster's \""+b[0]+'" method on an uninitialized element');if("function"!=typeof f[b[0]])throw new Error('Unknown method "'+b[0]+'"');this.length>1&&"content"==b[0]&&(b[1]instanceof a||"object"==typeof b[1]&&null!=b[1]&&b[1].tagName)&&!f.__options.contentCloning&&f.__options.debug&&console.log(c);var g=f[b[0]](b[1],b[2]);return g!==f||"instance"===b[0]?(d=g,!1):void 0}),"#*$~&"!==d?d:this}a.tooltipster.__instancesLatestArr=[];var e=b[0]&&void 0!==b[0].multiple,g=e&&b[0].multiple||!e&&f.multiple,h=b[0]&&void 0!==b[0].content,i=h&&b[0].content||!h&&f.content,j=b[0]&&void 0!==b[0].contentCloning,k=j&&b[0].contentCloning||!j&&f.contentCloning,l=b[0]&&void 0!==b[0].debug,m=l&&b[0].debug||!l&&f.debug;return this.length>1&&(i instanceof a||"object"==typeof i&&null!=i&&i.tagName)&&!k&&m&&console.log(c),this.each(function(){var c=!1,d=a(this),e=d.data("tooltipster-ns"),f=null;e?g?c=!0:m&&false:c=!0,c&&(f=new a.Tooltipster(this,b[0]),e||(e=[]),e.push(f.__namespace),d.data("tooltipster-ns",e),d.data(f.__namespace,f),f.__options.functionInit&&f.__options.functionInit.call(f,f,{origin:this}),f._trigger("init")),a.tooltipster.__instancesLatestArr.push(f)}),this},b.prototype={__init:function(b){this.__$tooltip=b,this.__$tooltip.css({left:0,overflow:"hidden",position:"absolute",top:0}).find(".tooltipster-content").css("overflow","auto"),this.$container=a('<div class="tooltipster-ruler"></div>').append(this.__$tooltip).appendTo(h.window.document.body)},__forceRedraw:function(){var a=this.__$tooltip.parent();this.__$tooltip.detach(),this.__$tooltip.appendTo(a)},constrain:function(a,b){return this.constraints={width:a,height:b},this.__$tooltip.css({display:"block",height:"",overflow:"auto",width:a}),this},destroy:function(){this.__$tooltip.detach().find(".tooltipster-content").css({display:"",overflow:""}),this.$container.remove()},free:function(){return this.constraints=null,this.__$tooltip.css({display:"",height:"",overflow:"visible",width:""}),this},measure:function(){this.__forceRedraw();var a=this.__$tooltip[0].getBoundingClientRect(),b={size:{height:a.height||a.bottom-a.top,width:a.width||a.right-a.left}};if(this.constraints){var c=this.__$tooltip.find(".tooltipster-content"),d=this.__$tooltip.outerHeight(),e=c[0].getBoundingClientRect(),f={height:d<=this.constraints.height,width:a.width<=this.constraints.width&&e.width>=c[0].scrollWidth-1};b.fits=f.height&&f.width}return h.IE&&h.IE<=11&&b.size.width!==h.window.document.documentElement.clientWidth&&(b.size.width=Math.ceil(b.size.width)+1),b}};var j=navigator.userAgent.toLowerCase();-1!=j.indexOf("msie")?h.IE=parseInt(j.split("msie")[1]):-1!==j.toLowerCase().indexOf("trident")&&-1!==j.indexOf(" rv:11")?h.IE=11:-1!=j.toLowerCase().indexOf("edge/")&&(h.IE=parseInt(j.toLowerCase().split("edge/")[1]));var k="tooltipster.sideTip";return a.tooltipster._plugin({name:k,instance:{__defaults:function(){return{arrow:!0,distance:6,functionPosition:null,maxWidth:null,minIntersection:16,minWidth:0,position:null,side:"top",viewportAware:!0}},__init:function(a){var b=this;b.__instance=a,b.__namespace="tooltipster-sideTip-"+Math.round(1e6*Math.random()),b.__previousState="closed",b.__options,b.__optionsFormat(),b.__instance._on("state."+b.__namespace,function(a){"closed"==a.state?b.__close():"appearing"==a.state&&"closed"==b.__previousState&&b.__create(),b.__previousState=a.state}),b.__instance._on("options."+b.__namespace,function(){b.__optionsFormat()}),b.__instance._on("reposition."+b.__namespace,function(a){b.__reposition(a.event,a.helper)})},__close:function(){this.__instance.content()instanceof a&&this.__instance.content().detach(),this.__instance._$tooltip.remove(),this.__instance._$tooltip=null},__create:function(){var b=a('<div class="tooltipster-base tooltipster-sidetip"><div class="tooltipster-box"><div class="tooltipster-content"></div></div><div class="tooltipster-arrow"><div class="tooltipster-arrow-uncropped"><div class="tooltipster-arrow-border"></div><div class="tooltipster-arrow-background"></div></div></div></div>');this.__options.arrow||b.find(".tooltipster-box").css("margin",0).end().find(".tooltipster-arrow").hide(),this.__options.minWidth&&b.css("min-width",this.__options.minWidth+"px"),this.__options.maxWidth&&b.css("max-width",this.__options.maxWidth+"px"),
this.__instance._$tooltip=b,this.__instance._trigger("created")},__destroy:function(){this.__instance._off("."+self.__namespace)},__optionsFormat:function(){var b=this;if(b.__options=b.__instance._optionsExtract(k,b.__defaults()),b.__options.position&&(b.__options.side=b.__options.position),"object"!=typeof b.__options.distance&&(b.__options.distance=[b.__options.distance]),b.__options.distance.length<4&&(void 0===b.__options.distance[1]&&(b.__options.distance[1]=b.__options.distance[0]),void 0===b.__options.distance[2]&&(b.__options.distance[2]=b.__options.distance[0]),void 0===b.__options.distance[3]&&(b.__options.distance[3]=b.__options.distance[1]),b.__options.distance={top:b.__options.distance[0],right:b.__options.distance[1],bottom:b.__options.distance[2],left:b.__options.distance[3]}),"string"==typeof b.__options.side){var c={top:"bottom",right:"left",bottom:"top",left:"right"};b.__options.side=[b.__options.side,c[b.__options.side]],"left"==b.__options.side[0]||"right"==b.__options.side[0]?b.__options.side.push("top","bottom"):b.__options.side.push("right","left")}6===a.tooltipster._env.IE&&b.__options.arrow!==!0&&(b.__options.arrow=!1)},__reposition:function(b,c){var d,e=this,f=e.__targetFind(c),g=[];e.__instance._$tooltip.detach();var h=e.__instance._$tooltip.clone(),i=a.tooltipster._getRuler(h),j=!1,k=e.__instance.option("animation");switch(k&&h.removeClass("tooltipster-"+k),a.each(["window","document"],function(d,k){var l=null;if(e.__instance._trigger({container:k,helper:c,satisfied:j,takeTest:function(a){l=a},results:g,type:"positionTest"}),1==l||0!=l&&0==j&&("window"!=k||e.__options.viewportAware))for(var d=0;d<e.__options.side.length;d++){var m={horizontal:0,vertical:0},n=e.__options.side[d];"top"==n||"bottom"==n?m.vertical=e.__options.distance[n]:m.horizontal=e.__options.distance[n],e.__sideChange(h,n),a.each(["natural","constrained"],function(a,d){if(l=null,e.__instance._trigger({container:k,event:b,helper:c,mode:d,results:g,satisfied:j,side:n,takeTest:function(a){l=a},type:"positionTest"}),1==l||0!=l&&0==j){var h={container:k,distance:m,fits:null,mode:d,outerSize:null,side:n,size:null,target:f[n],whole:null},o="natural"==d?i.free():i.constrain(c.geo.available[k][n].width-m.horizontal,c.geo.available[k][n].height-m.vertical),p=o.measure();if(h.size=p.size,h.outerSize={height:p.size.height+m.vertical,width:p.size.width+m.horizontal},"natural"==d?c.geo.available[k][n].width>=h.outerSize.width&&c.geo.available[k][n].height>=h.outerSize.height?h.fits=!0:h.fits=!1:h.fits=p.fits,"window"==k&&(h.fits?"top"==n||"bottom"==n?h.whole=c.geo.origin.windowOffset.right>=e.__options.minIntersection&&c.geo.window.size.width-c.geo.origin.windowOffset.left>=e.__options.minIntersection:h.whole=c.geo.origin.windowOffset.bottom>=e.__options.minIntersection&&c.geo.window.size.height-c.geo.origin.windowOffset.top>=e.__options.minIntersection:h.whole=!1),g.push(h),h.whole)j=!0;else if("natural"==h.mode&&(h.fits||h.size.width<=c.geo.available[k][n].width))return!1}})}}),e.__instance._trigger({edit:function(a){g=a},event:b,helper:c,results:g,type:"positionTested"}),g.sort(function(a,b){if(a.whole&&!b.whole)return-1;if(!a.whole&&b.whole)return 1;if(a.whole&&b.whole){var c=e.__options.side.indexOf(a.side),d=e.__options.side.indexOf(b.side);return d>c?-1:c>d?1:"natural"==a.mode?-1:1}if(a.fits&&!b.fits)return-1;if(!a.fits&&b.fits)return 1;if(a.fits&&b.fits){var c=e.__options.side.indexOf(a.side),d=e.__options.side.indexOf(b.side);return d>c?-1:c>d?1:"natural"==a.mode?-1:1}return"document"==a.container&&"bottom"==a.side&&"natural"==a.mode?-1:1}),d=g[0],d.coord={},d.side){case"left":case"right":d.coord.top=Math.floor(d.target-d.size.height/2);break;case"bottom":case"top":d.coord.left=Math.floor(d.target-d.size.width/2)}switch(d.side){case"left":d.coord.left=c.geo.origin.windowOffset.left-d.outerSize.width;break;case"right":d.coord.left=c.geo.origin.windowOffset.right+d.distance.horizontal;break;case"top":d.coord.top=c.geo.origin.windowOffset.top-d.outerSize.height;break;case"bottom":d.coord.top=c.geo.origin.windowOffset.bottom+d.distance.vertical}"window"==d.container?"top"==d.side||"bottom"==d.side?d.coord.left<0?c.geo.origin.windowOffset.right-this.__options.minIntersection>=0?d.coord.left=0:d.coord.left=c.geo.origin.windowOffset.right-this.__options.minIntersection-1:d.coord.left>c.geo.window.size.width-d.size.width&&(c.geo.origin.windowOffset.left+this.__options.minIntersection<=c.geo.window.size.width?d.coord.left=c.geo.window.size.width-d.size.width:d.coord.left=c.geo.origin.windowOffset.left+this.__options.minIntersection+1-d.size.width):d.coord.top<0?c.geo.origin.windowOffset.bottom-this.__options.minIntersection>=0?d.coord.top=0:d.coord.top=c.geo.origin.windowOffset.bottom-this.__options.minIntersection-1:d.coord.top>c.geo.window.size.height-d.size.height&&(c.geo.origin.windowOffset.top+this.__options.minIntersection<=c.geo.window.size.height?d.coord.top=c.geo.window.size.height-d.size.height:d.coord.top=c.geo.origin.windowOffset.top+this.__options.minIntersection+1-d.size.height):(d.coord.left>c.geo.window.size.width-d.size.width&&(d.coord.left=c.geo.window.size.width-d.size.width),d.coord.left<0&&(d.coord.left=0)),e.__sideChange(h,d.side),c.tooltipClone=h[0],c.tooltipParent=e.__instance.option("parent").parent[0],c.mode=d.mode,c.whole=d.whole,c.origin=e.__instance._$origin[0],c.tooltip=e.__instance._$tooltip[0],delete d.container,delete d.fits,delete d.mode,delete d.outerSize,delete d.whole,d.distance=d.distance.horizontal||d.distance.vertical;var l=a.extend(!0,{},d);if(e.__instance._trigger({edit:function(a){d=a},event:b,helper:c,position:l,type:"position"}),e.__options.functionPosition){var m=e.__options.functionPosition.call(e,e.__instance,c,l);m&&(d=m)}i.destroy();var n,o;"top"==d.side||"bottom"==d.side?(n={prop:"left",val:d.target-d.coord.left},o=d.size.width-this.__options.minIntersection):(n={prop:"top",val:d.target-d.coord.top},o=d.size.height-this.__options.minIntersection),n.val<this.__options.minIntersection?n.val=this.__options.minIntersection:n.val>o&&(n.val=o);var p;p=c.geo.origin.fixedLineage?c.geo.origin.windowOffset:{left:c.geo.origin.windowOffset.left+c.geo.window.scroll.left,top:c.geo.origin.windowOffset.top+c.geo.window.scroll.top},d.coord={left:p.left+(d.coord.left-c.geo.origin.windowOffset.left),top:p.top+(d.coord.top-c.geo.origin.windowOffset.top)},e.__sideChange(e.__instance._$tooltip,d.side),c.geo.origin.fixedLineage?e.__instance._$tooltip.css("position","fixed"):e.__instance._$tooltip.css("position",""),e.__instance._$tooltip.css({left:d.coord.left,top:d.coord.top,height:d.size.height,width:d.size.width}).find(".tooltipster-arrow").css({left:"",top:""}).css(n.prop,n.val),e.__instance._$tooltip.appendTo(e.__instance.option("parent")),e.__instance._trigger({type:"repositioned",event:b,position:d})},__sideChange:function(a,b){a.removeClass("tooltipster-bottom").removeClass("tooltipster-left").removeClass("tooltipster-right").removeClass("tooltipster-top").addClass("tooltipster-"+b)},__targetFind:function(a){var b={},c=this.__instance._$origin[0].getClientRects();if(c.length>1){var d=this.__instance._$origin.css("opacity");1==d&&(this.__instance._$origin.css("opacity",.99),c=this.__instance._$origin[0].getClientRects(),this.__instance._$origin.css("opacity",1))}if(c.length<2)b.top=Math.floor(a.geo.origin.windowOffset.left+a.geo.origin.size.width/2),b.bottom=b.top,b.left=Math.floor(a.geo.origin.windowOffset.top+a.geo.origin.size.height/2),b.right=b.left;else{var e=c[0];b.top=Math.floor(e.left+(e.right-e.left)/2),e=c.length>2?c[Math.ceil(c.length/2)-1]:c[0],b.right=Math.floor(e.top+(e.bottom-e.top)/2),e=c[c.length-1],b.bottom=Math.floor(e.left+(e.right-e.left)/2),e=c.length>2?c[Math.ceil((c.length+1)/2)-1]:c[c.length-1],b.left=Math.floor(e.top+(e.bottom-e.top)/2)}return b}}}),a});
;function woof_init_checkboxes(){"none"!=icheck_skin?(jQuery(".woof_checkbox_term").iCheck("destroy"),jQuery(".woof_checkbox_term").iCheck({checkboxClass:"icheckbox_"+icheck_skin.skin+"-"+icheck_skin.color}),jQuery(".woof_checkbox_term").unbind("ifChecked"),jQuery(".woof_checkbox_term").on("ifChecked",function(e){jQuery(this).attr("checked",!0),jQuery(".woof_select_radio_check input").attr("disabled","disabled"),woof_checkbox_process_data(this,!0)}),jQuery(".woof_checkbox_term").unbind("ifUnchecked"),jQuery(".woof_checkbox_term").on("ifUnchecked",function(e){jQuery(this).attr("checked",!1),woof_checkbox_process_data(this,!1)}),jQuery(".woof_checkbox_label").unbind(),jQuery("label.woof_checkbox_label").click(function(){return!jQuery(this).prev().find(".woof_checkbox_term").is(":disabled")&&void(jQuery(this).prev().find(".woof_checkbox_term").is(":checked")?(jQuery(this).prev().find(".woof_checkbox_term").trigger("ifUnchecked"),jQuery(this).prev().removeClass("checked")):(jQuery(this).prev().find(".woof_checkbox_term").trigger("ifChecked"),jQuery(this).prev().addClass("checked")))})):jQuery(".woof_checkbox_term").on("change",function(e){jQuery(this).is(":checked")?(jQuery(this).attr("checked",!0),woof_checkbox_process_data(this,!0)):(jQuery(this).attr("checked",!1),woof_checkbox_process_data(this,!1))})}function woof_checkbox_process_data(e,o){var r=jQuery(e).data("tax"),t=jQuery(e).attr("name");woof_checkbox_direct_search(jQuery(e).data("term-id"),t,r,o)}function woof_checkbox_direct_search(e,r,o,t){var _,i="",n=!0,n=t?(o in woof_current_values?woof_current_values[o]=woof_current_values[o]+","+r:woof_current_values[o]=r,!0):(i=(i=woof_current_values[o]).split(","),_=[],jQuery.each(i,function(e,o){o!=r&&_.push(o)}),(i=_).length?woof_current_values[o]=i.join(","):delete woof_current_values[o],!1);jQuery(".woof_checkbox_term_"+e).attr("checked",n),woof_ajax_page_num=1,woof_autosubmit&&woof_submit_link(woof_get_submit_link())}function woof_init_mselects(){try{jQuery("select.woof_mselect").chosen()}catch(e){}jQuery(".woof_mselect").change(function(e){var t,o=jQuery(this).val(),r=jQuery(this).attr("name");return is_woof_use_chosen&&(t=jQuery(this).chosen().val(),jQuery(".woof_mselect[name="+r+"] option:selected").removeAttr("selected"),jQuery(".woof_mselect[name="+r+"] option").each(function(e,o){var r=jQuery(this).val();-1!==jQuery.inArray(r,t)&&jQuery(this).prop("selected",!0)})),woof_mselect_direct_search(r,o),!0})}function woof_mselect_direct_search(e,o){var r=[];jQuery(".woof_mselect[name="+e+"] option:selected").each(function(e,o){r.push(jQuery(this).val())}),(r=(r=r.filter(function(e,o){return r.indexOf(e)==o})).join(",")).length?woof_current_values[e]=r:delete woof_current_values[e],woof_ajax_page_num=1,woof_autosubmit&&woof_submit_link(woof_get_submit_link())}function woof_init_radios(){"none"!=icheck_skin?(jQuery(".woof_radio_term").iCheck("destroy"),jQuery(".woof_radio_term").iCheck({radioClass:"iradio_"+icheck_skin.skin+"-"+icheck_skin.color}),jQuery(".woof_radio_term").unbind("ifChecked"),jQuery(".woof_radio_term").on("ifChecked",function(e){jQuery(this).attr("checked",!0),jQuery(this).parents(".woof_list").find(".woof_radio_term_reset").removeClass("woof_radio_term_reset_visible"),jQuery(this).parents(".woof_list").find(".woof_radio_term_reset").hide(),jQuery(this).parents("li").eq(0).find(".woof_radio_term_reset").eq(0).addClass("woof_radio_term_reset_visible");var o=jQuery(this).data("slug"),r=jQuery(this).attr("name");woof_radio_direct_search(jQuery(this).data("term-id"),r,o)})):jQuery(".woof_radio_term").on("change",function(e){jQuery(this).attr("checked",!0);var o=jQuery(this).data("slug"),r=jQuery(this).attr("name"),t=jQuery(this).data("term-id");jQuery(this).parents(".woof_list").find(".woof_radio_term_reset").removeClass("woof_radio_term_reset_visible"),jQuery(this).parents(".woof_list").find(".woof_radio_term_reset").hide(),jQuery(this).parents("li").eq(0).find(".woof_radio_term_reset").eq(0).addClass("woof_radio_term_reset_visible"),woof_radio_direct_search(t,r,o)}),jQuery(".woof_radio_term_reset").click(function(){return woof_radio_direct_search(jQuery(this).data("term-id"),jQuery(this).attr("data-name"),0),jQuery(this).parents(".woof_list").find(".checked").removeClass("checked"),jQuery(this).parents(".woof_list").find("input[type=radio]").removeAttr("checked"),jQuery(this).removeClass("woof_radio_term_reset_visible"),!1})}function woof_radio_direct_search(e,r,o){jQuery.each(woof_current_values,function(e,o){e!=r||delete woof_current_values[r]}),0!=o?(woof_current_values[r]=o,jQuery("a.woof_radio_term_reset_"+e).hide(),jQuery("woof_radio_term_"+e).filter(":checked").parents("li").find("a.woof_radio_term_reset").show(),jQuery("woof_radio_term_"+e).parents("ul.woof_list").find("label").css({fontWeight:"normal"}),jQuery("woof_radio_term_"+e).filter(":checked").parents("li").find("label.woof_radio_label_"+o).css({fontWeight:"bold"})):(jQuery("a.woof_radio_term_reset_"+e).hide(),jQuery("woof_radio_term_"+e).attr("checked",!1),jQuery("woof_radio_term_"+e).parent().removeClass("checked"),jQuery("woof_radio_term_"+e).parents("ul.woof_list").find("label").css({fontWeight:"normal"})),woof_ajax_page_num=1,woof_autosubmit&&woof_submit_link(woof_get_submit_link())}function woof_init_selects(){if(is_woof_use_chosen)try{jQuery("select.woof_select, select.woof_price_filter_dropdown").chosen()}catch(e){}jQuery(".woof_select").change(function(){var e=jQuery(this).val();woof_select_direct_search(this,jQuery(this).attr("name"),e)})}function woof_select_direct_search(e,r,o){jQuery.each(woof_current_values,function(e,o){e!=r||delete woof_current_values[r]}),0!=o&&(woof_current_values[r]=o),woof_ajax_page_num=1,!woof_autosubmit&&0!=jQuery(e).within(".woof").length||woof_submit_link(woof_get_submit_link())}var woof_redirect="",woof_reset_btn_action=!1;function woof_redirect_init(){try{if(jQuery(".woof").length&&void 0!==jQuery(".woof").val())return 0<(woof_redirect=jQuery(".woof").eq(0).data("redirect")).length&&(woof_shop_page=woof_current_page_link=woof_redirect),woof_redirect}catch(e){console.log(e)}}function woof_init_orderby(){jQuery("body").on("submit","form.woocommerce-ordering",function(){if(!jQuery("#is_woo_shortcode").length)return!1}),jQuery("body").on("change","form.woocommerce-ordering select.orderby",function(){if(!jQuery("#is_woo_shortcode").length)return woof_current_values.orderby=jQuery(this).val(),woof_ajax_page_num=1,woof_submit_link(woof_get_submit_link(),0),!1})}function woof_init_reset_button(){jQuery("body").on("click",".woof_reset_search_form",function(){var e;return woof_ajax_page_num=1,woof_ajax_redraw=0,woof_reset_btn_action=!0,woof_is_permalink?(woof_current_values={},woof_submit_link(woof_get_submit_link().split("page/")[0])):(e=woof_shop_page,woof_current_values.hasOwnProperty("page_id")&&(e=location.protocol+"//"+location.host+"/?page_id="+woof_current_values.page_id,woof_current_values={page_id:woof_current_values.page_id},woof_get_submit_link()),woof_submit_link(e),woof_is_ajax&&(history.pushState({},"",e),woof_current_values=woof_current_values.hasOwnProperty("page_id")?{page_id:woof_current_values.page_id}:{})),!1})}function woof_init_pagination(){1===woof_is_ajax&&jQuery("body").on("click","a.page-numbers",function(){var e,o,r=jQuery(this).attr("href");return woof_ajax_page_num=void 0!==(e=woof_ajax_first_done?r.split("paged="):r.split("page/"))[1]?parseInt(e[1]):1,void 0!==(o=r.split("product-page="))[1]&&(woof_ajax_page_num=parseInt(o[1])),woof_submit_link(woof_get_submit_link(),0),!1})}function woof_init_search_form(){woof_init_checkboxes(),woof_init_mselects(),woof_init_radios(),woof_price_filter_radio_init(),woof_init_selects(),null!==woof_ext_init_functions&&jQuery.each(woof_ext_init_functions,function(type,func){eval(func+"()")}),jQuery(".woof_submit_search_form").click(function(){return woof_ajax_redraw&&(woof_ajax_redraw=0,woof_is_ajax=0),woof_submit_link(woof_get_submit_link()),!1}),jQuery("ul.woof_childs_list").parent("li").addClass("woof_childs_list_li"),woof_remove_class_widget(),woof_checkboxes_slide()}jQuery(function(e){jQuery("body").append('<div id="woof_html_buffer" class="woof_info_popup" style="display: none;"></div>'),jQuery.fn.life=function(e,o,r){return jQuery(this.context).on(e,this.selector,o,r),this},jQuery.extend(jQuery.fn,{within:function(e){return this.filter(function(){return jQuery(this).closest(e).length})}}),0<jQuery("#woof_results_by_ajax").length&&(woof_is_ajax=1),woof_autosubmit=parseInt(jQuery(".woof").eq(0).data("autosubmit"),10),woof_ajax_redraw=parseInt(jQuery(".woof").eq(0).data("ajax-redraw"),10),woof_ext_init_functions=jQuery.parseJSON(woof_ext_init_functions),woof_init_native_woo_price_filter(),jQuery("body").bind("price_slider_change",function(e,o,r){var t,_;woof_autosubmit&&!woof_show_price_search_button&&jQuery(".price_slider_wrapper").length<3?jQuery(".woof .widget_price_filter form").trigger("submit"):(t=jQuery(this).find(".price_slider_amount #min_price").val(),_=jQuery(this).find(".price_slider_amount #max_price").val(),woof_current_values.min_price=t,woof_current_values.max_price=_)}),jQuery("body").on("change",".woof_price_filter_dropdown",function(){var e=jQuery(this).val();-1==parseInt(e,10)?(delete woof_current_values.min_price,delete woof_current_values.max_price):(e=e.split("-"),woof_current_values.min_price=e[0],woof_current_values.max_price=e[1]),!woof_autosubmit&&0!=jQuery(this).within(".woof").length||woof_submit_link(woof_get_submit_link())}),woof_recount_text_price_filter(),jQuery("body").on("change",".woof_price_filter_txt",function(){var e=parseInt(jQuery(this).parent().find(".woof_price_filter_txt_from").val(),10),o=parseInt(jQuery(this).parent().find(".woof_price_filter_txt_to").val(),10);o<e||e<0?(delete woof_current_values.min_price,delete woof_current_values.max_price):("undefined"!=typeof woocs_current_currency&&(e=Math.ceil(e/parseFloat(woocs_current_currency.rate)),o=Math.ceil(o/parseFloat(woocs_current_currency.rate))),woof_current_values.min_price=e,woof_current_values.max_price=o),!woof_autosubmit&&0!=jQuery(this).within(".woof").length||woof_submit_link(woof_get_submit_link())}),jQuery("body").on("click",".woof_open_hidden_li_btn",function(){var e=jQuery(this).data("state"),o=jQuery(this).data("type");return"closed"==e?(jQuery(this).parents(".woof_list").find(".woof_hidden_term").addClass("woof_hidden_term2"),jQuery(this).parents(".woof_list").find(".woof_hidden_term").removeClass("woof_hidden_term"),"image"==o?jQuery(this).find("img").attr("src",jQuery(this).data("opened")):jQuery(this).html(jQuery(this).data("opened")),jQuery(this).data("state","opened")):(jQuery(this).parents(".woof_list").find(".woof_hidden_term2").addClass("woof_hidden_term"),jQuery(this).parents(".woof_list").find(".woof_hidden_term2").removeClass("woof_hidden_term2"),"image"==o?jQuery(this).find("img").attr("src",jQuery(this).data("closed")):jQuery(this).text(jQuery(this).data("closed")),jQuery(this).data("state","closed")),!1}),woof_open_hidden_li(),jQuery(".widget_rating_filter li.wc-layered-nav-rating a").click(function(){var e,o=jQuery(this).parent().hasClass("chosen"),r=woof_parse_url(jQuery(this).attr("href")),t=0;return void 0!==r.query&&-1!==r.query.indexOf("min_rating")&&(e=r.query.split("min_rating="),t=parseInt(e[1],10)),jQuery(this).parents("ul").find("li").removeClass("chosen"),o?delete woof_current_values.min_rating:(woof_current_values.min_rating=t,jQuery(this).parent().addClass("chosen")),woof_submit_link(woof_get_submit_link()),!1}),jQuery("body").on("click",".woof_start_filtering_btn",function(){var e=jQuery(this).parents(".woof").data("shortcode");jQuery(this).html(woof_lang_loading),jQuery(this).addClass("woof_start_filtering_btn2"),jQuery(this).removeClass("woof_start_filtering_btn");var o={action:"woof_draw_products",page:1,shortcode:"woof_nothing",woof_shortcode:e};return jQuery.post(woof_ajaxurl,o,function(e){e=jQuery.parseJSON(e),jQuery("div.woof_redraw_zone").replaceWith(jQuery(e.form).find(".woof_redraw_zone")),woof_mass_reinit()}),!1});var _=window.location.href;window.onpopstate=function(e){try{if(console.log(woof_current_values),Object.keys(woof_current_values).length){var o=_.split("?"),r="";null!=o[1]&&(r=o[1].split("#"));var t=window.location.href.split("?");return(null==t[1]?{0:"",1:""}:t[1].split("#"))[0]!=r[0]&&(woof_show_info_popup(woof_lang_loading),window.location.reload()),!1}}catch(e){console.log(e)}},woof_init_ion_sliders(),woof_init_show_auto_form(),woof_init_hide_auto_form(),woof_remove_empty_elements(),woof_init_search_form(),woof_init_pagination(),woof_init_orderby(),woof_init_reset_button(),woof_init_beauty_scroll(),woof_draw_products_top_panel(),woof_shortcode_observer(),woof_init_tooltip(),woof_is_ajax||woof_redirect_init(),woof_init_toggles()});var woof_submit_link_locked=!1;function woof_submit_link(o,e){var r;woof_submit_link_locked||("undefined"==typeof WoofTurboMode?(void 0===e&&(e=woof_ajax_redraw),woof_submit_link_locked=!0,woof_show_info_popup(woof_lang_loading),1!==woof_is_ajax||e?e?(r={action:"woof_draw_products",link:o,page:1,shortcode:"woof_nothing",woof_shortcode:jQuery("div.woof").eq(0).data("shortcode")},jQuery.post(woof_ajaxurl,r,function(e){e=jQuery.parseJSON(e),jQuery("div.woof_redraw_zone").replaceWith(jQuery(e.form).find(".woof_redraw_zone")),woof_mass_reinit(),woof_submit_link_locked=!1,woof_init_tooltip(),document.dispatchEvent(new CustomEvent("woof-ajax-form-redrawing",{detail:{link:o}}))})):(window.location=o,woof_show_info_popup(woof_lang_loading)):(woof_ajax_first_done=!0,r={action:"woof_draw_products",link:o,page:woof_ajax_page_num,shortcode:jQuery("#woof_results_by_ajax").data("shortcode"),woof_shortcode:jQuery("div.woof").data("shortcode")},jQuery.post(woof_ajaxurl,r,function(e){e=jQuery.parseJSON(e),jQuery(".woof_results_by_ajax_shortcode").length?void 0!==e.products&&jQuery("#woof_results_by_ajax").replaceWith(e.products):void 0!==e.products&&jQuery(".woof_shortcode_output").replaceWith(e.products),void 0!==e.additional_fields&&jQuery.each(e.additional_fields,function(e,o){jQuery(e).replaceWith(o)}),jQuery("div.woof_redraw_zone").replaceWith(jQuery(e.form).find(".woof_redraw_zone")),woof_draw_products_top_panel(),woof_mass_reinit(),woof_submit_link_locked=!1,jQuery.each(jQuery("#woof_results_by_ajax"),function(e,o){0!=e&&jQuery(o).removeAttr("id")}),woof_infinite(),woof_js_after_ajax_done(),woof_change_link_addtocart(),woof_init_tooltip(),document.dispatchEvent(new CustomEvent("woof-ajax-form-redrawing",{detail:{link:o}}))}))):WoofTurboMode.woof_submit_link(o))}function woof_remove_empty_elements(){jQuery.each(jQuery(".woof_container select"),function(e,o){0===jQuery(o).find("option").length&&jQuery(o).parents(".woof_container").remove()}),jQuery.each(jQuery("ul.woof_list"),function(e,o){0===jQuery(o).find("li").length&&jQuery(o).parents(".woof_container").remove()})}function woof_get_submit_link(){if(woof_is_ajax&&(woof_current_values.page=woof_ajax_page_num),0<Object.keys(woof_current_values).length&&jQuery.each(woof_current_values,function(e,o){e==swoof_search_slug&&delete woof_current_values[e],"s"==e&&delete woof_current_values[e],"product"==e&&delete woof_current_values[e],"really_curr_tax"==e&&delete woof_current_values[e]}),2===Object.keys(woof_current_values).length&&"min_price"in woof_current_values&&"max_price"in woof_current_values){woof_current_page_link=woof_current_page_link.replace(new RegExp(/page\/(\d+)\//),"");var e=woof_current_page_link+"?min_price="+woof_current_values.min_price+"&max_price="+woof_current_values.max_price;return woof_is_ajax&&history.pushState({},"",e),e}if(0===Object.keys(woof_current_values).length)return woof_is_ajax&&history.pushState({},"",woof_current_page_link),woof_current_page_link;0<Object.keys(woof_really_curr_tax).length&&(woof_current_values.really_curr_tax=woof_really_curr_tax.term_id+"-"+woof_really_curr_tax.taxonomy);var r=woof_current_page_link+"?"+swoof_search_slug+"=1";woof_is_permalink||(0<woof_redirect.length?(r=woof_redirect+"?"+swoof_search_slug+"=1",woof_current_values.hasOwnProperty("page_id")&&delete woof_current_values.page_id):r=location.protocol+"//"+location.host+"?"+swoof_search_slug+"=1");var t=["path"];return 0<Object.keys(woof_current_values).length&&jQuery.each(woof_current_values,function(e,o){"page"==e&&woof_is_ajax&&(e="paged"),void 0!==o&&(0<o.length||"number"==typeof o)&&-1==jQuery.inArray(e,t)&&(r=r+"&"+e+"="+o)}),r=r.replace(new RegExp(/page\/(\d+)\//),""),woof_is_ajax&&history.pushState({},"",r),r}function woof_show_info_popup(e){if("default"==woof_overlay_skin)jQuery("#woof_html_buffer").text(e),jQuery("#woof_html_buffer").fadeTo(200,.9);else switch(woof_overlay_skin){case"loading-balls":case"loading-bars":case"loading-bubbles":case"loading-cubes":case"loading-cylon":case"loading-spin":case"loading-spinning-bubbles":case"loading-spokes":jQuery("body").plainOverlay("show",{progress:function(){return jQuery('<div id="woof_svg_load_container"><img style="height: 100%;width: 100%" src="'+woof_link+"img/loading-master/"+woof_overlay_skin+'.svg" alt=""></div>')}});break;default:jQuery("body").plainOverlay("show",{duration:-1})}}function woof_hide_info_popup(){"default"==woof_overlay_skin?window.setTimeout(function(){jQuery("#woof_html_buffer").fadeOut(400)},200):jQuery("body").plainOverlay("hide")}function woof_draw_products_top_panel(){woof_is_ajax&&jQuery("#woof_results_by_ajax").prev(".woof_products_top_panel").remove();var o,n=jQuery(".woof_products_top_panel");n.html(""),0<Object.keys(woof_current_values).length&&(n.show(),n.html("<ul></ul>"),o=!1,jQuery.each(woof_current_values,function(i,e){-1==jQuery.inArray(i,woof_accept_array)&&-1==jQuery.inArray(i.replace("rev_",""),woof_accept_array)||("min_price"==i||"max_price"==i)&&o||("min_price"!=i&&"max_price"!=i||o||(o=!0,i="price",e=woof_lang_pricerange),(e=e.toString().trim()).search(",")&&(e=e.split(",")),jQuery.each(e,function(e,r){if("page"!=i&&"post_type"!=i){var t=r;if("orderby"==i)t=void 0!==woof_lang[r]?woof_lang.orderby+": "+woof_lang[r]:woof_lang.orderby+": "+r;else if("perpage"==i)t=woof_lang.perpage;else if("price"==i)t=woof_lang.pricerange;else{var _=!1;if(0<Object.keys(woof_lang_custom).length&&jQuery.each(woof_lang_custom,function(e,o){e==i&&(_=!0,t=o,"woof_sku"==i&&(t+=" "+r))}),!_){try{t=jQuery("input[data-anchor='woof_n_"+i+"_"+r+"']").val()}catch(e){console.log(e)}void 0===t&&(t=r)}}n.find("ul").append(jQuery("<li>").append(jQuery("<a>").attr("href","").attr("data-tax",i).attr("data-slug",r).append(jQuery("<span>").attr("class","woof_remove_ppi").append(t))))}}))})),0!=jQuery(n).find("li").length&&jQuery(".woof_products_top_panel").length||n.hide(),jQuery(".woof_remove_ppi").parent().click(function(){var r,e=jQuery(this).data("tax"),t=jQuery(this).data("slug");return"price"!=e?(values=woof_current_values[e],values=values.split(","),r=[],jQuery.each(values,function(e,o){o!=t&&r.push(o)}),values=r,values.length?woof_current_values[e]=values.join(","):delete woof_current_values[e]):(delete woof_current_values.min_price,delete woof_current_values.max_price),woof_ajax_page_num=1,woof_reset_btn_action=!0,woof_submit_link(woof_get_submit_link()),jQuery(".woof_products_top_panel").find("[data-tax='"+e+"'][href='"+t+"']").hide(333),!1})}function woof_shortcode_observer(){var e=!0;(jQuery(".woof_shortcode_output").length||jQuery(".woocommerce .products").length&&!jQuery(".single-product").length)&&(e=!1),jQuery(".woocommerce .woocommerce-info").length&&(e=!1),"undefined"!=typeof woof_not_redirect&&1==woof_not_redirect&&(e=!1),jQuery(".woopt-data-table").length&&(e=!1),e||(woof_current_page_link=location.protocol+"//"+location.host+location.pathname),jQuery("#woof_results_by_ajax").length&&(woof_is_ajax=1)}function woof_init_beauty_scroll(){if(woof_use_beauty_scroll)try{var e=".woof_section_scrolled, .woof_sid_auto_shortcode .woof_container_radio .woof_block_html_items, .woof_sid_auto_shortcode .woof_container_checkbox .woof_block_html_items, .woof_sid_auto_shortcode .woof_container_label .woof_block_html_items";jQuery(e).mCustomScrollbar("destroy"),jQuery(e).mCustomScrollbar({scrollButtons:{enable:!0},advanced:{updateOnContentResize:!0,updateOnBrowserResize:!0},theme:"dark-2",horizontalScroll:!1,mouseWheel:!0,scrollType:"pixels",contentTouchScroll:!0})}catch(e){console.log(e)}}function woof_remove_class_widget(){jQuery(".woof_container_inner").find(".widget").removeClass("widget")}function woof_init_show_auto_form(){jQuery(".woof_show_auto_form").unbind("click"),jQuery(".woof_show_auto_form").click(function(){return jQuery(this).addClass("woof_hide_auto_form").removeClass("woof_show_auto_form"),jQuery(".woof_auto_show").show().animate({height:jQuery(".woof_auto_show_indent").height()+20+"px",opacity:1},377,function(){woof_init_hide_auto_form(),jQuery(".woof_auto_show").removeClass("woof_overflow_hidden"),jQuery(".woof_auto_show_indent").removeClass("woof_overflow_hidden"),jQuery(".woof_auto_show").height("auto")}),!1})}function woof_init_hide_auto_form(){jQuery(".woof_hide_auto_form").unbind("click"),jQuery(".woof_hide_auto_form").click(function(){return jQuery(this).addClass("woof_show_auto_form").removeClass("woof_hide_auto_form"),jQuery(".woof_auto_show").show().animate({height:"1px",opacity:0},377,function(){jQuery(".woof_auto_show").addClass("woof_overflow_hidden"),jQuery(".woof_auto_show_indent").addClass("woof_overflow_hidden"),woof_init_show_auto_form()}),!1})}function woof_checkboxes_slide(){var e;1!=woof_checkboxes_slide_flag||(e=jQuery("ul.woof_childs_list")).length&&(jQuery.each(e,function(e,o){var r,t;jQuery(o).parents(".woof_no_close_childs").length||(t="woof_is_closed",woof_supports_html5_storage()?(r=localStorage.getItem(jQuery(o).closest("li").attr("class")))&&"woof_is_opened"==r&&(t="woof_is_opened",jQuery(o).show()):jQuery(o).find("input[type=checkbox],input[type=radio]").is(":checked")&&(jQuery(o).show(),t="woof_is_opened"),jQuery(o).before('<a href="javascript:void(0);" class="woof_childs_list_opener"><span class="'+t+'"></span></a>'))}),jQuery.each(jQuery("a.woof_childs_list_opener span"),function(e,o){jQuery(o).click(function(){var e,o,r=jQuery(this),t=jQuery(this).parent(".woof_childs_list_opener");return r.hasClass("woof_is_closed")?(jQuery(t).parent().find("ul.woof_childs_list").first().show(333),r.removeClass("woof_is_closed"),r.addClass("woof_is_opened")):(jQuery(t).parent().find("ul.woof_childs_list").first().hide(333),r.removeClass("woof_is_opened"),r.addClass("woof_is_closed")),woof_supports_html5_storage()&&(e=jQuery(t).closest("li").attr("class"),o=jQuery(t).children("span").attr("class"),localStorage.setItem(e,o)),!1})}))}function woof_init_ion_sliders(){jQuery.each(jQuery(".woof_range_slider"),function(e,r){try{jQuery(r).ionRangeSlider({min:jQuery(r).data("min"),max:jQuery(r).data("max"),from:jQuery(r).data("min-now"),to:jQuery(r).data("max-now"),type:"double",prefix:jQuery(r).data("slider-prefix"),postfix:jQuery(r).data("slider-postfix"),prettify:!0,hideMinMax:!1,hideFromTo:!1,grid:!0,step:jQuery(r).data("step"),onFinish:function(e){var o=jQuery(r).data("taxes");return woof_current_values.min_price=parseInt(e.from,10)/o,woof_current_values.max_price=parseInt(e.to,10)/o,"undefined"!=typeof woocs_current_currency&&(woof_current_values.min_price=Math.ceil(woof_current_values.min_price/parseFloat(woocs_current_currency.rate)),woof_current_values.max_price=Math.ceil(woof_current_values.max_price/parseFloat(woocs_current_currency.rate))),woof_ajax_page_num=1,!woof_autosubmit&&0!=jQuery(r).within(".woof").length||woof_submit_link(woof_get_submit_link()),!1}})}catch(e){}})}function woof_init_native_woo_price_filter(){jQuery(".widget_price_filter form").unbind("submit"),jQuery(".widget_price_filter form").submit(function(){var e=jQuery(this).find(".price_slider_amount #min_price").val(),o=jQuery(this).find(".price_slider_amount #max_price").val();return woof_current_values.min_price=e,woof_current_values.max_price=o,woof_ajax_page_num=1,woof_autosubmit&&woof_submit_link(woof_get_submit_link(),0),!1})}function woof_reinit_native_woo_price_filter(){if("undefined"==typeof woocommerce_price_slider_params)return!1;jQuery("input#min_price, input#max_price").hide(),jQuery(".price_slider, .price_label").show();var e=jQuery(".price_slider_amount #min_price").data("min"),o=jQuery(".price_slider_amount #max_price").data("max"),r=parseInt(e,10),t=parseInt(o,10);woof_current_values.hasOwnProperty("min_price")?(r=parseInt(woof_current_values.min_price,10),t=parseInt(woof_current_values.max_price,10)):(woocommerce_price_slider_params.min_price&&(r=parseInt(woocommerce_price_slider_params.min_price,10)),woocommerce_price_slider_params.max_price&&(t=parseInt(woocommerce_price_slider_params.max_price,10)));var i=woocommerce_price_slider_params.currency_symbol;void 0===i&&(i=woocommerce_price_slider_params.currency_format_symbol),jQuery(document.body).bind("price_slider_create price_slider_slide",function(e,o,r){var t,_;"undefined"!=typeof woocs_current_currency?(t=o,_=r,void 0===i&&(i=woocs_current_currency.symbol),1!==woocs_current_currency.rate&&(t=Math.ceil(t*parseFloat(woocs_current_currency.rate)),_=Math.ceil(_*parseFloat(woocs_current_currency.rate))),t=woof_front_number_format(t,2,".",","),_=woof_front_number_format(_,2,".",","),!jQuery.inArray(woocs_current_currency.name,woocs_array_no_cents)&&1!=woocs_current_currency.hide_cents||(t=t.replace(".00",""),_=_.replace(".00","")),"left"===woocs_current_currency.position?(jQuery(".price_slider_amount span.from").html(i+t),jQuery(".price_slider_amount span.to").html(i+_)):"left_space"===woocs_current_currency.position?(jQuery(".price_slider_amount span.from").html(i+" "+t),jQuery(".price_slider_amount span.to").html(i+" "+_)):"right"===woocs_current_currency.position?(jQuery(".price_slider_amount span.from").html(t+i),jQuery(".price_slider_amount span.to").html(_+i)):"right_space"===woocs_current_currency.position&&(jQuery(".price_slider_amount span.from").html(t+" "+i),jQuery(".price_slider_amount span.to").html(_+" "+i))):"left"===woocommerce_price_slider_params.currency_pos?(jQuery(".price_slider_amount span.from").html(i+o),jQuery(".price_slider_amount span.to").html(i+r)):"left_space"===woocommerce_price_slider_params.currency_pos?(jQuery(".price_slider_amount span.from").html(i+" "+o),jQuery(".price_slider_amount span.to").html(i+" "+r)):"right"===woocommerce_price_slider_params.currency_pos?(jQuery(".price_slider_amount span.from").html(o+i),jQuery(".price_slider_amount span.to").html(r+i)):"right_space"===woocommerce_price_slider_params.currency_pos&&(jQuery(".price_slider_amount span.from").html(o+" "+i),jQuery(".price_slider_amount span.to").html(r+" "+i)),jQuery(document.body).trigger("price_slider_updated",[o,r])}),jQuery(".price_slider").slider({range:!0,animate:!0,min:e,max:o,values:[r,t],create:function(){jQuery(".price_slider_amount #min_price").val(r),jQuery(".price_slider_amount #max_price").val(t),jQuery(document.body).trigger("price_slider_create",[r,t])},slide:function(e,o){jQuery("input#min_price").val(o.values[0]),jQuery("input#max_price").val(o.values[1]),jQuery(document.body).trigger("price_slider_slide",[o.values[0],o.values[1]])},change:function(e,o){jQuery(document.body).trigger("price_slider_change",[o.values[0],o.values[1]])}}),woof_init_native_woo_price_filter()}function woof_mass_reinit(){woof_remove_empty_elements(),woof_open_hidden_li(),woof_init_search_form(),woof_hide_info_popup(),woof_init_beauty_scroll(),woof_init_ion_sliders(),woof_reinit_native_woo_price_filter(),woof_recount_text_price_filter(),woof_draw_products_top_panel()}function woof_recount_text_price_filter(){"undefined"!=typeof woocs_current_currency&&jQuery.each(jQuery(".woof_price_filter_txt_from, .woof_price_filter_txt_to"),function(e,o){jQuery(this).val(Math.ceil(jQuery(this).data("value")))})}function woof_init_toggles(){jQuery("body").on("click",".woof_front_toggle",function(){return"opened"==jQuery(this).data("condition")?(jQuery(this).removeClass("woof_front_toggle_opened"),jQuery(this).addClass("woof_front_toggle_closed"),jQuery(this).data("condition","closed"),"text"==woof_toggle_type?jQuery(this).text(woof_toggle_closed_text):jQuery(this).find("img").prop("src",woof_toggle_closed_image)):(jQuery(this).addClass("woof_front_toggle_opened"),jQuery(this).removeClass("woof_front_toggle_closed"),jQuery(this).data("condition","opened"),"text"==woof_toggle_type?jQuery(this).text(woof_toggle_opened_text):jQuery(this).find("img").prop("src",woof_toggle_opened_image)),jQuery(this).parents(".woof_container_inner").find(".woof_block_html_items").toggle(500),!1})}function woof_open_hidden_li(){0<jQuery(".woof_open_hidden_li_btn").length&&jQuery.each(jQuery(".woof_open_hidden_li_btn"),function(e,o){jQuery(o).parents("ul").find("li.woof_hidden_term input[type=checkbox],li.woof_hidden_term input[type=radio]").is(":checked")&&jQuery(o).trigger("click")})}function $_woof_GET(e,o){o=o||window.location.search;var r=new RegExp("&"+e+"=([^&]*)","i");return o=(o=o.replace(/^\?/,"&").match(r))?o[1]:""}function woof_parse_url(e){var o=RegExp("^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\\?([^#]*))?(#(.*))?"),r=e.match(o);return{scheme:r[2],authority:r[4],path:r[5],query:r[7],fragment:r[9]}}function woof_price_filter_radio_init(){"none"!=icheck_skin?(jQuery(".woof_price_filter_radio").iCheck("destroy"),jQuery(".woof_price_filter_radio").iCheck({radioClass:"iradio_"+icheck_skin.skin+"-"+icheck_skin.color}),jQuery(".woof_price_filter_radio").siblings("div").removeClass("checked"),jQuery(".woof_price_filter_radio").unbind("ifChecked"),jQuery(".woof_price_filter_radio").on("ifChecked",function(e){jQuery(this).attr("checked",!0),jQuery(".woof_radio_price_reset").removeClass("woof_radio_term_reset_visible"),jQuery(this).parents(".woof_list").find(".woof_radio_price_reset").removeClass("woof_radio_term_reset_visible"),jQuery(this).parents(".woof_list").find(".woof_radio_price_reset").hide(),jQuery(this).parents("li").eq(0).find(".woof_radio_price_reset").eq(0).addClass("woof_radio_term_reset_visible");var o=jQuery(this).val();-1==parseInt(o,10)?(delete woof_current_values.min_price,delete woof_current_values.max_price,jQuery(this).removeAttr("checked"),jQuery(this).siblings(".woof_radio_price_reset").removeClass("woof_radio_term_reset_visible")):(o=o.split("-"),woof_current_values.min_price=o[0],woof_current_values.max_price=o[1],jQuery(this).siblings(".woof_radio_price_reset").addClass("woof_radio_term_reset_visible"),jQuery(this).attr("checked",!0)),!woof_autosubmit&&0!=jQuery(this).within(".woof").length||woof_submit_link(woof_get_submit_link())})):jQuery("body").on("change",".woof_price_filter_radio",function(){var e=jQuery(this).val();jQuery(".woof_radio_price_reset").removeClass("woof_radio_term_reset_visible"),-1==parseInt(e,10)?(delete woof_current_values.min_price,delete woof_current_values.max_price,jQuery(this).removeAttr("checked"),jQuery(this).siblings(".woof_radio_price_reset").removeClass("woof_radio_term_reset_visible")):(e=e.split("-"),woof_current_values.min_price=e[0],woof_current_values.max_price=e[1],jQuery(this).siblings(".woof_radio_price_reset").addClass("woof_radio_term_reset_visible"),jQuery(this).attr("checked",!0)),!woof_autosubmit&&0!=jQuery(this).within(".woof").length||woof_submit_link(woof_get_submit_link())}),jQuery(".woof_radio_price_reset").click(function(){return delete woof_current_values.min_price,delete woof_current_values.max_price,jQuery(this).siblings("div").removeClass("checked"),jQuery(this).parents(".woof_list").find("input[type=radio]").removeAttr("checked"),jQuery(this).removeClass("woof_radio_term_reset_visible"),woof_autosubmit&&woof_submit_link(woof_get_submit_link()),!1})}function woof_serialize(e){for(var o,r,t,_=decodeURI(e).split("&"),i={},n=0,a=_.length;n<a;n++){(t=(r=_[n].split("="))[0]).indexOf("[]")==t.length-2?(void 0===i[o=t.substring(0,t.length-2)]&&(i[o]=[]),i[o].push(r[1])):i[t]=r[1]}return i}function woof_infinite(){var e,o,r,t,_,i,n,a;"undefined"!=typeof yith_infs&&(e={nextSelector:".woocommerce-pagination li .next",navSelector:yith_infs.navSelector,itemSelector:yith_infs.itemSelector,contentSelector:yith_infs.contentSelector,loader:'<img src="'+yith_infs.loader+'">',is_shop:yith_infs.shop},r="",null!=(o=window.location.href.split("?"))[1]&&(delete(t=woof_serialize(o[1])).paged,r=decodeURIComponent(jQuery.param(t))),null==(_=jQuery(".woocommerce-pagination li .next").attr("href"))&&(_=o+"page/1/"),n="",null==(i=_.split("?"))[1]||null!=(a=woof_serialize(i[1])).paged&&(n="page/"+a.paged+"/"),_=o[0]+n+"?"+r,jQuery(".woocommerce-pagination li .next").attr("href",_),jQuery(window).unbind("yith_infs_start"),jQuery(yith_infs.contentSelector).yit_infinitescroll(e))}function woof_change_link_addtocart(){woof_is_ajax&&jQuery(".add_to_cart_button").each(function(e,o){var r=jQuery(o).attr("href"),t=r.split("?"),_=window.location.href.split("?");null!=t[1]&&(r=_[0]+"?"+t[1],jQuery(o).attr("href",r))})}function woof_front_number_format(e,o,r,t){e=(e+"").replace(/[^0-9+\-Ee.]/g,"");var _,i,n,a=isFinite(+e)?+e:0,s=isFinite(+o)?Math.abs(o):0,c=void 0===t?",":t,u=void 0===r?".":r,f="";return 3<(f=(s?(_=a,i=s,n=Math.pow(10,i),""+(Math.round(_*n)/n).toFixed(i)):""+Math.round(a)).split("."))[0].length&&(f[0]=f[0].replace(/\B(?=(?:\d{3})+(?!\d))/g,c)),(f[1]||"").length<s&&(f[1]=f[1]||"",f[1]+=new Array(s-f[1].length+1).join("0")),f.join(u)}function woof_supports_html5_storage(){try{return"localStorage"in window&&null!==window.localStorage}catch(e){return!1}}function woof_init_tooltip(){var e=jQuery(".woof_tooltip_header");e.length&&jQuery(e).tooltipster({theme:"tooltipster-noir",side:"right"})}
;/*!
 Chosen, a Select Box Enhancer for jQuery and Prototype
 by Patrick Filler for Harvest, http://getharvest.com
 
 Version 1.1.0
 Full source at https://github.com/harvesthq/chosen
 Copyright (c) 2011 Harvest http://getharvest.com
 
 MIT License, https://github.com/harvesthq/chosen/blob/master/LICENSE.md
 This file is generated by `grunt build`, do not edit it by hand.
 */

(function () {
    var $, AbstractChosen, Chosen, SelectParser, _ref,
            __hasProp = {}.hasOwnProperty,
            __extends = function (child, parent) {
                for (var key in parent) {
                    if (__hasProp.call(parent, key))
                        child[key] = parent[key];
                }
                function ctor() {
                    this.constructor = child;
                }
                ctor.prototype = parent.prototype;
                child.prototype = new ctor();
                child.__super__ = parent.prototype;
                return child;
            };

    SelectParser = (function () {
        function SelectParser() {
            this.options_index = 0;
            this.parsed = [];
        }

        SelectParser.prototype.add_node = function (child) {
            if (child.nodeName.toUpperCase() === "OPTGROUP") {
                return this.add_group(child);
            } else {
                return this.add_option(child);
            }
        };

        SelectParser.prototype.add_group = function (group) {
            var group_position, option, _i, _len, _ref, _results;
            group_position = this.parsed.length;
            this.parsed.push({
                array_index: group_position,
                group: true,
                label: this.escapeExpression(group.label),
                children: 0,
                disabled: group.disabled
            });
            _ref = group.childNodes;
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                option = _ref[_i];
                _results.push(this.add_option(option, group_position, group.disabled));
            }
            return _results;
        };

        SelectParser.prototype.add_option = function (option, group_position, group_disabled) {
            if (option.nodeName.toUpperCase() === "OPTION") {
                if (option.text !== "") {
                    if (group_position != null) {
                        this.parsed[group_position].children += 1;
                    }
                    this.parsed.push({
                        array_index: this.parsed.length,
                        options_index: this.options_index,
                        value: option.value,
                        text: option.text,
                        html: option.innerHTML,
                        selected: option.selected,
                        disabled: group_disabled === true ? group_disabled : option.disabled,
                        group_array_index: group_position,
                        classes: option.className,
                        style: option.style.cssText
                    });
                } else {
                    this.parsed.push({
                        array_index: this.parsed.length,
                        options_index: this.options_index,
                        empty: true
                    });
                }
                return this.options_index += 1;
            }
        };

        SelectParser.prototype.escapeExpression = function (text) {
            var map, unsafe_chars;
            if ((text == null) || text === false) {
                return "";
            }
            if (!/[\&\<\>\"\'\`]/.test(text)) {
                return text;
            }
            map = {
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#x27;",
                "`": "&#x60;"
            };
            unsafe_chars = /&(?!\w+;)|[\<\>\"\'\`]/g;
            return text.replace(unsafe_chars, function (chr) {
                return map[chr] || "&amp;";
            });
        };

        return SelectParser;

    })();

    SelectParser.select_to_array = function (select) {
        var child, parser, _i, _len, _ref;
        parser = new SelectParser();
        _ref = select.childNodes;
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            child = _ref[_i];
            parser.add_node(child);
        }
        return parser.parsed;
    };

    AbstractChosen = (function () {
        function AbstractChosen(form_field, options) {
            this.form_field = form_field;
            this.options = options != null ? options : {};
            if (!AbstractChosen.browser_is_supported()) {
                return;
            }
            this.is_multiple = this.form_field.multiple;
            this.set_default_text();
            this.set_default_values();
            this.setup();
            this.set_up_html();
            this.register_observers();
        }

        AbstractChosen.prototype.set_default_values = function () {
            var _this = this;
            this.click_test_action = function (evt) {
                return _this.test_active_click(evt);
            };
            this.activate_action = function (evt) {
                return _this.activate_field(evt);
            };
            this.active_field = false;
            this.mouse_on_container = false;
            this.results_showing = false;
            this.result_highlighted = null;
            this.allow_single_deselect = (this.options.allow_single_deselect != null) && (this.form_field.options[0] != null) && this.form_field.options[0].text === "" ? this.options.allow_single_deselect : false;
            this.disable_search_threshold = this.options.disable_search_threshold || 0;
            this.disable_search = this.options.disable_search || false;
            this.enable_split_word_search = this.options.enable_split_word_search != null ? this.options.enable_split_word_search : true;
            this.group_search = this.options.group_search != null ? this.options.group_search : true;
            this.search_contains = this.options.search_contains || false;
            this.single_backstroke_delete = this.options.single_backstroke_delete != null ? this.options.single_backstroke_delete : true;
            this.max_selected_options = this.options.max_selected_options || Infinity;
            this.inherit_select_classes = this.options.inherit_select_classes || false;
            this.display_selected_options = this.options.display_selected_options != null ? this.options.display_selected_options : true;
            return this.display_disabled_options = this.options.display_disabled_options != null ? this.options.display_disabled_options : true;
        };

        AbstractChosen.prototype.set_default_text = function () {
            if (this.form_field.getAttribute("data-placeholder")) {
                this.default_text = this.form_field.getAttribute("data-placeholder");
            } else if (this.is_multiple) {
                this.default_text = this.options.placeholder_text_multiple || this.options.placeholder_text || AbstractChosen.default_multiple_text;
            } else {
                this.default_text = this.options.placeholder_text_single || this.options.placeholder_text || AbstractChosen.default_single_text;
            }
            return this.results_none_found = this.form_field.getAttribute("data-no_results_text") || this.options.no_results_text || AbstractChosen.default_no_result_text;
        };

        AbstractChosen.prototype.mouse_enter = function () {
            return this.mouse_on_container = true;
        };

        AbstractChosen.prototype.mouse_leave = function () {
            return this.mouse_on_container = false;
        };

        AbstractChosen.prototype.input_focus = function (evt) {
            var _this = this;
            if (this.is_multiple) {
                if (!this.active_field) {
                    return setTimeout((function () {
                        return _this.container_mousedown();
                    }), 50);
                }
            } else {
                if (!this.active_field) {
                    return this.activate_field();
                }
            }
        };

        AbstractChosen.prototype.input_blur = function (evt) {
            var _this = this;
            if (!this.mouse_on_container) {
                this.active_field = false;
                return setTimeout((function () {
                    return _this.blur_test();
                }), 100);
            }
        };

        AbstractChosen.prototype.results_option_build = function (options) {
            var content, data, _i, _len, _ref;
            content = '';
            _ref = this.results_data;
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                data = _ref[_i];
                if (data.group) {
                    content += this.result_add_group(data);
                } else {
                    content += this.result_add_option(data);
                }
                if (options != null ? options.first : void 0) {
                    if (data.selected && this.is_multiple) {
                        this.choice_build(data);
                    } else if (data.selected && !this.is_multiple) {
                        this.single_set_selected_text(data.text);
                    }
                }
            }
            return content;
        };

        AbstractChosen.prototype.result_add_option = function (option) {
            var classes, option_el;
            if (!option.search_match) {
                return '';
            }
            if (!this.include_option_in_results(option)) {
                return '';
            }
            classes = [];
            if (!option.disabled && !(option.selected && this.is_multiple)) {
                classes.push("active-result");
            }
            if (option.disabled && !(option.selected && this.is_multiple)) {
                classes.push("disabled-result");
            }
            if (option.selected) {
                classes.push("result-selected");
            }
            if (option.group_array_index != null) {
                classes.push("group-option");
            }
            if (option.classes !== "") {
                classes.push(option.classes);
            }
            option_el = document.createElement("li");
            option_el.className = classes.join(" ");
            option_el.style.cssText = option.style;
            option_el.setAttribute("data-option-array-index", option.array_index);
            option_el.innerHTML = option.search_text;
            return this.outerHTML(option_el);
        };

        AbstractChosen.prototype.result_add_group = function (group) {
            var group_el;
            if (!(group.search_match || group.group_match)) {
                return '';
            }
            if (!(group.active_options > 0)) {
                return '';
            }
            group_el = document.createElement("li");
            group_el.className = "group-result";
            group_el.innerHTML = group.search_text;
            return this.outerHTML(group_el);
        };

        AbstractChosen.prototype.results_update_field = function () {
            this.set_default_text();
            if (!this.is_multiple) {
                this.results_reset_cleanup();
            }
            this.result_clear_highlight();
            this.results_build();
            if (this.results_showing) {
                return this.winnow_results();
            }
        };

        AbstractChosen.prototype.reset_single_select_options = function () {
            var result, _i, _len, _ref, _results;
            _ref = this.results_data;
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                result = _ref[_i];
                if (result.selected) {
                    _results.push(result.selected = false);
                } else {
                    _results.push(void 0);
                }
            }
            return _results;
        };

        AbstractChosen.prototype.results_toggle = function () {
            if (this.results_showing) {
                return this.results_hide();
            } else {
                return this.results_show();
            }
        };

        AbstractChosen.prototype.results_search = function (evt) {
            if (this.results_showing) {
                return this.winnow_results();
            } else {
                return this.results_show();
            }
        };

        AbstractChosen.prototype.winnow_results = function () {
            var escapedSearchText, option, regex, regexAnchor, results, results_group, searchText, startpos, text, zregex, _i, _len, _ref;
            this.no_results_clear();
            results = 0;
            searchText = this.get_search_text();
            escapedSearchText = searchText.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
            regexAnchor = this.search_contains ? "" : "^";
            regex = new RegExp(regexAnchor + escapedSearchText, 'i');
            zregex = new RegExp(escapedSearchText, 'i');
            _ref = this.results_data;
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                option = _ref[_i];
                option.search_match = false;
                results_group = null;
                if (this.include_option_in_results(option)) {
                    if (option.group) {
                        option.group_match = false;
                        option.active_options = 0;
                    }
                    if ((option.group_array_index != null) && this.results_data[option.group_array_index]) {
                        results_group = this.results_data[option.group_array_index];
                        if (results_group.active_options === 0 && results_group.search_match) {
                            results += 1;
                        }
                        results_group.active_options += 1;
                    }
                    if (!(option.group && !this.group_search)) {
                        option.search_text = option.group ? option.label : option.html;
                        option.search_match = this.search_string_match(option.search_text, regex);
                        if (option.search_match && !option.group) {
                            results += 1;
                        }
                        if (option.search_match) {
                            if (searchText.length) {
                                startpos = option.search_text.search(zregex);
                                text = option.search_text.substr(0, startpos + searchText.length) + '</em>' + option.search_text.substr(startpos + searchText.length);
                                option.search_text = text.substr(0, startpos) + '<em>' + text.substr(startpos);
                            }
                            if (results_group != null) {
                                results_group.group_match = true;
                            }
                        } else if ((option.group_array_index != null) && this.results_data[option.group_array_index].search_match) {
                            option.search_match = true;
                        }
                    }
                }
            }
            this.result_clear_highlight();
            if (results < 1 && searchText.length) {
                this.update_results_content("");
                return this.no_results(searchText);
            } else {
                this.update_results_content(this.results_option_build());
                return this.winnow_results_set_highlight();
            }
        };

        AbstractChosen.prototype.search_string_match = function (search_string, regex) {
            var part, parts, _i, _len;
            if (regex.test(search_string)) {
                return true;
            } else if (this.enable_split_word_search && (search_string.indexOf(" ") >= 0 || search_string.indexOf("[") === 0)) {
                parts = search_string.replace(/\[|\]/g, "").split(" ");
                if (parts.length) {
                    for (_i = 0, _len = parts.length; _i < _len; _i++) {
                        part = parts[_i];
                        if (regex.test(part)) {
                            return true;
                        }
                    }
                }
            }
        };

        AbstractChosen.prototype.choices_count = function () {
            var option, _i, _len, _ref;
            if (this.selected_option_count != null) {
                return this.selected_option_count;
            }
            this.selected_option_count = 0;
            _ref = this.form_field.options;
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                option = _ref[_i];
                if (option.selected) {
                    this.selected_option_count += 1;
                }
            }
            return this.selected_option_count;
        };

        AbstractChosen.prototype.choices_click = function (evt) {
            evt.preventDefault();
            if (!(this.results_showing || this.is_disabled)) {
                return this.results_show();
            }
        };

        AbstractChosen.prototype.keyup_checker = function (evt) {
            var stroke, _ref;
            stroke = (_ref = evt.which) != null ? _ref : evt.keyCode;
            this.search_field_scale();
            switch (stroke) {
                case 8:
                    if (this.is_multiple && this.backstroke_length < 1 && this.choices_count() > 0) {
                        return this.keydown_backstroke();
                    } else if (!this.pending_backstroke) {
                        this.result_clear_highlight();
                        return this.results_search();
                    }
                    break;
                case 13:
                    evt.preventDefault();
                    if (this.results_showing) {
                        return this.result_select(evt);
                    }
                    break;
                case 27:
                    if (this.results_showing) {
                        this.results_hide();
                    }
                    return true;
                case 9:
                case 38:
                case 40:
                case 16:
                case 91:
                case 17:
                    break;
                default:
                    return this.results_search();
            }
        };

        AbstractChosen.prototype.clipboard_event_checker = function (evt) {
            var _this = this;
            return setTimeout((function () {
                return _this.results_search();
            }), 50);
        };

        AbstractChosen.prototype.container_width = function () {
            if (this.options.width != null) {
                return this.options.width;
            } else {
                return "" + this.form_field.offsetWidth + "px";
            }
        };

        AbstractChosen.prototype.include_option_in_results = function (option) {
            if (this.is_multiple && (!this.display_selected_options && option.selected)) {
                return false;
            }
            if (!this.display_disabled_options && option.disabled) {
                return false;
            }
            if (option.empty) {
                return false;
            }
            return true;
        };

        AbstractChosen.prototype.search_results_touchstart = function (evt) {
            this.touch_started = true;
            return this.search_results_mouseover(evt);
        };

        AbstractChosen.prototype.search_results_touchmove = function (evt) {
            this.touch_started = false;
            return this.search_results_mouseout(evt);
        };

        AbstractChosen.prototype.search_results_touchend = function (evt) {
            if (this.touch_started) {
                return this.search_results_mouseup(evt);
            }
        };

        AbstractChosen.prototype.outerHTML = function (element) {
            var tmp;
            if (element.outerHTML) {
                return element.outerHTML;
            }
            tmp = document.createElement("div");
            tmp.appendChild(element);
            return tmp.innerHTML;
        };

        AbstractChosen.browser_is_supported = function () {
            //fixed 05-10-2016
            //https://github.com/harvesthq/chosen/pull/1388
            //http://clip2net.com/s/3CYjCR5
            return true;
            //***
            if (window.navigator.appName === "Microsoft Internet Explorer") {
                return document.documentMode >= 8;
            }
            if (/iP(od|hone)/i.test(window.navigator.userAgent)) {
                return false;
            }
            if (/Android/i.test(window.navigator.userAgent)) {
                if (/Mobile/i.test(window.navigator.userAgent)) {
                    return false;
                }
            }
            return true;
        };

        AbstractChosen.default_multiple_text = "Select Some Options";

        AbstractChosen.default_single_text = "Select an Option";

        AbstractChosen.default_no_result_text = "No results match";

        return AbstractChosen;

    })();

    $ = jQuery;

    $.fn.extend({
        chosen: function (options) {
            if (!AbstractChosen.browser_is_supported()) {
                return this;
            }
            return this.each(function (input_field) {
                var $this, chosen;
                $this = $(this);
                chosen = $this.data('chosen');
                if (options === 'destroy' && chosen) {
                    chosen.destroy();
                } else if (!chosen) {
                    $this.data('chosen', new Chosen(this, options));
                }
            });
        }
    });

    Chosen = (function (_super) {
        __extends(Chosen, _super);

        function Chosen() {
            _ref = Chosen.__super__.constructor.apply(this, arguments);
            return _ref;
        }

        Chosen.prototype.setup = function () {
            this.form_field_jq = $(this.form_field);
            this.current_selectedIndex = this.form_field.selectedIndex;
            return this.is_rtl = this.form_field_jq.hasClass("chosen-rtl");
        };

        Chosen.prototype.set_up_html = function () {
            var container_classes, container_props;
            container_classes = ["chosen-container"];
            container_classes.push("chosen-container-" + (this.is_multiple ? "multi" : "single"));
            if (this.inherit_select_classes && this.form_field.className) {
                container_classes.push(this.form_field.className);
            }
            if (this.is_rtl) {
                container_classes.push("chosen-rtl");
            }
            container_props = {
                'class': container_classes.join(' '),
                'style': "width: " + (this.container_width()) + ";",
                'title': this.form_field.title
            };
            if (this.form_field.id.length) {
                container_props.id = this.form_field.id.replace(/[^\w]/g, '_') + "_chosen";
            }
            this.container = $("<div />", container_props);
            if (this.is_multiple) {
                this.container.html('<ul class="chosen-choices"><li class="search-field"><input type="text" value="' + this.default_text + '" class="default" autocomplete="off" style="width:25px;" /></li></ul><div class="chosen-drop"><ul class="chosen-results"></ul></div>');
            } else {
                this.container.html('<a class="chosen-single chosen-default" tabindex="-1"><span>' + this.default_text + '</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" /></div><ul class="chosen-results"></ul></div>');
            }
            this.form_field_jq.hide().after(this.container);
            this.dropdown = this.container.find('div.chosen-drop').first();
            this.search_field = this.container.find('input').first();
            this.search_results = this.container.find('ul.chosen-results').first();
            this.search_field_scale();
            this.search_no_results = this.container.find('li.no-results').first();
            if (this.is_multiple) {
                this.search_choices = this.container.find('ul.chosen-choices').first();
                this.search_container = this.container.find('li.search-field').first();
            } else {
                this.search_container = this.container.find('div.chosen-search').first();
                this.selected_item = this.container.find('.chosen-single').first();
            }
            this.results_build();
            this.set_tab_index();
            this.set_label_behavior();
            return this.form_field_jq.trigger("chosen:ready", {
                chosen: this
            });
        };

        Chosen.prototype.register_observers = function () {
            var _this = this;
            this.container.bind('mousedown.chosen', function (evt) {
                _this.container_mousedown(evt);
            });
            this.container.bind('mouseup.chosen', function (evt) {
                _this.container_mouseup(evt);
            });
            this.container.bind('mouseenter.chosen', function (evt) {
                _this.mouse_enter(evt);
            });
            this.container.bind('mouseleave.chosen', function (evt) {
                _this.mouse_leave(evt);
            });
            this.search_results.bind('mouseup.chosen', function (evt) {
                _this.search_results_mouseup(evt);
            });
            this.search_results.bind('mouseover.chosen', function (evt) {
                _this.search_results_mouseover(evt);
            });
            this.search_results.bind('mouseout.chosen', function (evt) {
                _this.search_results_mouseout(evt);
            });
            this.search_results.bind('mousewheel.chosen DOMMouseScroll.chosen', function (evt) {
                _this.search_results_mousewheel(evt);
            });
            this.search_results.bind('touchstart.chosen', function (evt) {
                _this.search_results_touchstart(evt);
            });
            this.search_results.bind('touchmove.chosen', function (evt) {
                _this.search_results_touchmove(evt);
            });
            this.search_results.bind('touchend.chosen', function (evt) {
                _this.search_results_touchend(evt);
            });
            this.form_field_jq.bind("chosen:updated.chosen", function (evt) {
                _this.results_update_field(evt);
            });
            this.form_field_jq.bind("chosen:activate.chosen", function (evt) {
                _this.activate_field(evt);
            });
            this.form_field_jq.bind("chosen:open.chosen", function (evt) {
                _this.container_mousedown(evt);
            });
            this.form_field_jq.bind("chosen:close.chosen", function (evt) {
                _this.input_blur(evt);
            });
            this.search_field.bind('blur.chosen', function (evt) {
                _this.input_blur(evt);
            });
            this.search_field.bind('keyup.chosen', function (evt) {
                _this.keyup_checker(evt);
            });
            this.search_field.bind('keydown.chosen', function (evt) {
                _this.keydown_checker(evt);
            });
            this.search_field.bind('focus.chosen', function (evt) {
                _this.input_focus(evt);
            });
            this.search_field.bind('cut.chosen', function (evt) {
                _this.clipboard_event_checker(evt);
            });
            this.search_field.bind('paste.chosen', function (evt) {
                _this.clipboard_event_checker(evt);
            });
            if (this.is_multiple) {
                return this.search_choices.bind('click.chosen', function (evt) {
                    _this.choices_click(evt);
                });
            } else {
                return this.container.bind('click.chosen', function (evt) {
                    evt.preventDefault();
                });
            }
        };

        Chosen.prototype.destroy = function () {
            $(this.container[0].ownerDocument).unbind("click.chosen", this.click_test_action);
            if (this.search_field[0].tabIndex) {
                this.form_field_jq[0].tabIndex = this.search_field[0].tabIndex;
            }
            this.container.remove();
            this.form_field_jq.removeData('chosen');
            return this.form_field_jq.show();
        };

        Chosen.prototype.search_field_disabled = function () {
            this.is_disabled = this.form_field_jq[0].disabled;
            if (this.is_disabled) {
                this.container.addClass('chosen-disabled');
                this.search_field[0].disabled = true;
                if (!this.is_multiple) {
                    this.selected_item.unbind("focus.chosen", this.activate_action);
                }
                return this.close_field();
            } else {
                this.container.removeClass('chosen-disabled');
                this.search_field[0].disabled = false;
                if (!this.is_multiple) {
                    return this.selected_item.bind("focus.chosen", this.activate_action);
                }
            }
        };

        Chosen.prototype.container_mousedown = function (evt) {
            if (!this.is_disabled) {
                if (evt && evt.type === "mousedown" && !this.results_showing) {
                    evt.preventDefault();
                }
                if (!((evt != null) && ($(evt.target)).hasClass("search-choice-close"))) {
                    if (!this.active_field) {
                        if (this.is_multiple) {
                            this.search_field.val("");
                        }
                        $(this.container[0].ownerDocument).bind('click.chosen', this.click_test_action);
                        this.results_show();
                    } else if (!this.is_multiple && evt && (($(evt.target)[0] === this.selected_item[0]) || $(evt.target).parents("a.chosen-single").length)) {
                        evt.preventDefault();
                        this.results_toggle();
                    }
                    return this.activate_field();
                }
            }
        };

        Chosen.prototype.container_mouseup = function (evt) {
            if (evt.target.nodeName === "ABBR" && !this.is_disabled) {
                return this.results_reset(evt);
            }
        };

        Chosen.prototype.search_results_mousewheel = function (evt) {
            var delta;
            if (evt.originalEvent) {
                delta = -evt.originalEvent.wheelDelta || evt.originalEvent.detail;
            }
            if (delta != null) {
                evt.preventDefault();
                if (evt.type === 'DOMMouseScroll') {
                    delta = delta * 40;
                }
                return this.search_results.scrollTop(delta + this.search_results.scrollTop());
            }
        };

        Chosen.prototype.blur_test = function (evt) {
            if (!this.active_field && this.container.hasClass("chosen-container-active")) {
                return this.close_field();
            }
        };

        Chosen.prototype.close_field = function () {
            $(this.container[0].ownerDocument).unbind("click.chosen", this.click_test_action);
            this.active_field = false;
            this.results_hide();
            this.container.removeClass("chosen-container-active");
            this.clear_backstroke();
            this.show_search_field_default();
            return this.search_field_scale();
        };

        Chosen.prototype.activate_field = function () {
            this.container.addClass("chosen-container-active");
            this.active_field = true;
            this.search_field.val(this.search_field.val());
            return this.search_field.focus();
        };

        Chosen.prototype.test_active_click = function (evt) {
            var active_container;
            active_container = $(evt.target).closest('.chosen-container');
            if (active_container.length && this.container[0] === active_container[0]) {
                return this.active_field = true;
            } else {
                return this.close_field();
            }
        };

        Chosen.prototype.results_build = function () {
            this.parsing = true;
            this.selected_option_count = null;
            this.results_data = SelectParser.select_to_array(this.form_field);
            if (this.is_multiple) {
                this.search_choices.find("li.search-choice").remove();
            } else if (!this.is_multiple) {
                this.single_set_selected_text();
                if (this.disable_search || this.form_field.options.length <= this.disable_search_threshold) {
                    this.search_field[0].readOnly = true;
                    this.container.addClass("chosen-container-single-nosearch");
                } else {
                    this.search_field[0].readOnly = false;
                    this.container.removeClass("chosen-container-single-nosearch");
                }
            }
            this.update_results_content(this.results_option_build({
                first: true
            }));
            this.search_field_disabled();
            this.show_search_field_default();
            this.search_field_scale();
            return this.parsing = false;
        };

        Chosen.prototype.result_do_highlight = function (el) {
            var high_bottom, high_top, maxHeight, visible_bottom, visible_top;
            if (el.length) {
                this.result_clear_highlight();
                this.result_highlight = el;
                this.result_highlight.addClass("highlighted");
                maxHeight = parseInt(this.search_results.css("maxHeight"), 10);
                visible_top = this.search_results.scrollTop();
                visible_bottom = maxHeight + visible_top;
                high_top = this.result_highlight.position().top + this.search_results.scrollTop();
                high_bottom = high_top + this.result_highlight.outerHeight();
                if (high_bottom >= visible_bottom) {
                    return this.search_results.scrollTop((high_bottom - maxHeight) > 0 ? high_bottom - maxHeight : 0);
                } else if (high_top < visible_top) {
                    return this.search_results.scrollTop(high_top);
                }
            }
        };

        Chosen.prototype.result_clear_highlight = function () {
            if (this.result_highlight) {
                this.result_highlight.removeClass("highlighted");
            }
            return this.result_highlight = null;
        };

        Chosen.prototype.results_show = function () {
            if (this.is_multiple && this.max_selected_options <= this.choices_count()) {
                this.form_field_jq.trigger("chosen:maxselected", {
                    chosen: this
                });
                return false;
            }
            this.container.addClass("chosen-with-drop");
            this.results_showing = true;
            this.search_field.focus();
            this.search_field.val(this.search_field.val());
            this.winnow_results();
            return this.form_field_jq.trigger("chosen:showing_dropdown", {
                chosen: this
            });
        };

        Chosen.prototype.update_results_content = function (content) {
            return this.search_results.html(content);
        };

        Chosen.prototype.results_hide = function () {
            if (this.results_showing) {
                this.result_clear_highlight();
                this.container.removeClass("chosen-with-drop");
                this.form_field_jq.trigger("chosen:hiding_dropdown", {
                    chosen: this
                });
            }
            return this.results_showing = false;
        };

        Chosen.prototype.set_tab_index = function (el) {
            var ti;
            if (this.form_field.tabIndex) {
                ti = this.form_field.tabIndex;
                this.form_field.tabIndex = -1;
                return this.search_field[0].tabIndex = ti;
            }
        };

        Chosen.prototype.set_label_behavior = function () {
            var _this = this;
            this.form_field_label = this.form_field_jq.parents("label");
            if (!this.form_field_label.length && this.form_field.id.length) {
                this.form_field_label = $("label[for='" + this.form_field.id + "']");
            }
            if (this.form_field_label.length > 0) {
                return this.form_field_label.bind('click.chosen', function (evt) {
                    if (_this.is_multiple) {
                        return _this.container_mousedown(evt);
                    } else {
                        return _this.activate_field();
                    }
                });
            }
        };

        Chosen.prototype.show_search_field_default = function () {
            if (this.is_multiple && this.choices_count() < 1 && !this.active_field) {
                this.search_field.val(this.default_text);
                return this.search_field.addClass("default");
            } else {
                this.search_field.val("");
                return this.search_field.removeClass("default");
            }
        };

        Chosen.prototype.search_results_mouseup = function (evt) {
            var target;
            target = $(evt.target).hasClass("active-result") ? $(evt.target) : $(evt.target).parents(".active-result").first();
            if (target.length) {
                this.result_highlight = target;
                this.result_select(evt);
                return this.search_field.focus();
            }
        };

        Chosen.prototype.search_results_mouseover = function (evt) {
            var target;
            target = $(evt.target).hasClass("active-result") ? $(evt.target) : $(evt.target).parents(".active-result").first();
            if (target) {
                return this.result_do_highlight(target);
            }
        };

        Chosen.prototype.search_results_mouseout = function (evt) {
            if ($(evt.target).hasClass("active-result" || $(evt.target).parents('.active-result').first())) {
                return this.result_clear_highlight();
            }
        };

        Chosen.prototype.choice_build = function (item) {
            var choice, close_link,
                    _this = this;
            choice = $('<li />', {
                "class": "search-choice"
            }).html("<span>" + item.html + "</span>");
            if (item.disabled) {
                choice.addClass('search-choice-disabled');
            } else {
                close_link = $('<a />', {
                    "class": 'search-choice-close',
                    'data-option-array-index': item.array_index
                });
                close_link.bind('click.chosen', function (evt) {
                    return _this.choice_destroy_link_click(evt);
                });
                choice.append(close_link);
            }
            return this.search_container.before(choice);
        };

        Chosen.prototype.choice_destroy_link_click = function (evt) {
            evt.preventDefault();
            evt.stopPropagation();
            if (!this.is_disabled) {
                return this.choice_destroy($(evt.target));
            }
        };

        Chosen.prototype.choice_destroy = function (link) {
            if (this.result_deselect(link[0].getAttribute("data-option-array-index"))) {
                this.show_search_field_default();
                if (this.is_multiple && this.choices_count() > 0 && this.search_field.val().length < 1) {
                    this.results_hide();
                }
                link.parents('li').first().remove();
                return this.search_field_scale();
            }
        };

        Chosen.prototype.results_reset = function () {
            this.reset_single_select_options();
            this.form_field.options[0].selected = true;
            this.single_set_selected_text();
            this.show_search_field_default();
            this.results_reset_cleanup();
            this.form_field_jq.trigger("change");
            if (this.active_field) {
                return this.results_hide();
            }
        };

        Chosen.prototype.results_reset_cleanup = function () {
            this.current_selectedIndex = this.form_field.selectedIndex;
            return this.selected_item.find("abbr").remove();
        };

        Chosen.prototype.result_select = function (evt) {
            var high, item;
            if (this.result_highlight) {
                high = this.result_highlight;
                this.result_clear_highlight();
                if (this.is_multiple && this.max_selected_options <= this.choices_count()) {
                    this.form_field_jq.trigger("chosen:maxselected", {
                        chosen: this
                    });
                    return false;
                }
                if (this.is_multiple) {
                    high.removeClass("active-result");
                } else {
                    this.reset_single_select_options();
                }
                item = this.results_data[high[0].getAttribute("data-option-array-index")];
                item.selected = true;
                this.form_field.options[item.options_index].selected = true;
                this.selected_option_count = null;
                if (this.is_multiple) {
                    this.choice_build(item);
                } else {
                    this.single_set_selected_text(item.text);
                }
                if (!((evt.metaKey || evt.ctrlKey) && this.is_multiple)) {
                    this.results_hide();
                }
                this.search_field.val("");
                if (this.is_multiple || this.form_field.selectedIndex !== this.current_selectedIndex) {
                    this.form_field_jq.trigger("change", {
                        'selected': this.form_field.options[item.options_index].value
                    });
                }
                this.current_selectedIndex = this.form_field.selectedIndex;
                evt.preventDefault();
                evt.stopPropagation();
                return this.search_field_scale();
            }
        };

        Chosen.prototype.single_set_selected_text = function (text) {
            if (text == null) {
                text = this.default_text;
            }
            if (text === this.default_text) {
                this.selected_item.addClass("chosen-default");
            } else {
                this.single_deselect_control_build();
                this.selected_item.removeClass("chosen-default");
            }
            return this.selected_item.find("span").text(text);
        };

        Chosen.prototype.result_deselect = function (pos) {
            var result_data;
            result_data = this.results_data[pos];
            if (!this.form_field.options[result_data.options_index].disabled) {
                result_data.selected = false;
                this.form_field.options[result_data.options_index].selected = false;
                this.selected_option_count = null;
                this.result_clear_highlight();
                if (this.results_showing) {
                    this.winnow_results();
                }
                this.form_field_jq.trigger("change", {
                    deselected: this.form_field.options[result_data.options_index].value
                });
                this.search_field_scale();
                return true;
            } else {
                return false;
            }
        };

        Chosen.prototype.single_deselect_control_build = function () {
            if (!this.allow_single_deselect) {
                return;
            }
            if (!this.selected_item.find("abbr").length) {
                this.selected_item.find("span").first().after("<abbr class=\"search-choice-close\"></abbr>");
            }
            return this.selected_item.addClass("chosen-single-with-deselect");
        };

        Chosen.prototype.get_search_text = function () {
            if (this.search_field.val() === this.default_text) {
                return "";
            } else {
                return $('<div/>').text($.trim(this.search_field.val())).html();
            }
        };

        Chosen.prototype.winnow_results_set_highlight = function () {
            var do_high, selected_results;
            selected_results = !this.is_multiple ? this.search_results.find(".result-selected.active-result") : [];
            do_high = selected_results.length ? selected_results.first() : this.search_results.find(".active-result").first();
            if (do_high != null) {
                return this.result_do_highlight(do_high);
            }
        };

        Chosen.prototype.no_results = function (terms) {
            var no_results_html;
            no_results_html = $('<li class="no-results">' + this.results_none_found + ' "<span></span>"</li>');
            no_results_html.find("span").first().html(terms);
            this.search_results.append(no_results_html);
            return this.form_field_jq.trigger("chosen:no_results", {
                chosen: this
            });
        };

        Chosen.prototype.no_results_clear = function () {
            return this.search_results.find(".no-results").remove();
        };

        Chosen.prototype.keydown_arrow = function () {
            var next_sib;
            if (this.results_showing && this.result_highlight) {
                next_sib = this.result_highlight.nextAll("li.active-result").first();
                if (next_sib) {
                    return this.result_do_highlight(next_sib);
                }
            } else {
                return this.results_show();
            }
        };

        Chosen.prototype.keyup_arrow = function () {
            var prev_sibs;
            if (!this.results_showing && !this.is_multiple) {
                return this.results_show();
            } else if (this.result_highlight) {
                prev_sibs = this.result_highlight.prevAll("li.active-result");
                if (prev_sibs.length) {
                    return this.result_do_highlight(prev_sibs.first());
                } else {
                    if (this.choices_count() > 0) {
                        this.results_hide();
                    }
                    return this.result_clear_highlight();
                }
            }
        };

        Chosen.prototype.keydown_backstroke = function () {
            var next_available_destroy;
            if (this.pending_backstroke) {
                this.choice_destroy(this.pending_backstroke.find("a").first());
                return this.clear_backstroke();
            } else {
                next_available_destroy = this.search_container.siblings("li.search-choice").last();
                if (next_available_destroy.length && !next_available_destroy.hasClass("search-choice-disabled")) {
                    this.pending_backstroke = next_available_destroy;
                    if (this.single_backstroke_delete) {
                        return this.keydown_backstroke();
                    } else {
                        return this.pending_backstroke.addClass("search-choice-focus");
                    }
                }
            }
        };

        Chosen.prototype.clear_backstroke = function () {
            if (this.pending_backstroke) {
                this.pending_backstroke.removeClass("search-choice-focus");
            }
            return this.pending_backstroke = null;
        };

        Chosen.prototype.keydown_checker = function (evt) {
            var stroke, _ref1;
            stroke = (_ref1 = evt.which) != null ? _ref1 : evt.keyCode;
            this.search_field_scale();
            if (stroke !== 8 && this.pending_backstroke) {
                this.clear_backstroke();
            }
            switch (stroke) {
                case 8:
                    this.backstroke_length = this.search_field.val().length;
                    break;
                case 9:
                    if (this.results_showing && !this.is_multiple) {
                        this.result_select(evt);
                    }
                    this.mouse_on_container = false;
                    break;
                case 13:
                    evt.preventDefault();
                    break;
                case 38:
                    evt.preventDefault();
                    this.keyup_arrow();
                    break;
                case 40:
                    evt.preventDefault();
                    this.keydown_arrow();
                    break;
            }
        };

        Chosen.prototype.search_field_scale = function () {
            var div, f_width, h, style, style_block, styles, w, _i, _len;
            if (this.is_multiple) {
                h = 0;
                w = 0;
                style_block = "position:absolute; left: -1000px; top: -1000px; display:none;";
                styles = ['font-size', 'font-style', 'font-weight', 'font-family', 'line-height', 'text-transform', 'letter-spacing'];
                for (_i = 0, _len = styles.length; _i < _len; _i++) {
                    style = styles[_i];
                    style_block += style + ":" + this.search_field.css(style) + ";";
                }
                div = $('<div />', {
                    'style': style_block
                });
                div.text(this.search_field.val());
                $('body').append(div);
                w = div.width() + 25;
                div.remove();
                f_width = this.container.outerWidth();
                if (w > f_width - 10) {
                    w = f_width - 10;
                }
                return this.search_field.css({
                    'width': w + 'px'
                });
            }
        };

        return Chosen;

    })(AbstractChosen);

}).call(this);

;!function(t,r){"use strict";function i(i,e,o){var s=this,n=i.get(0);s.duration=e.duration,s.opacity=e.opacity,s.isShown=!1,s.jqTargetOrg=i,t.isWindow(n)||9===n.nodeType?s.jqTarget=t("body"):"iframe"===n.nodeName.toLowerCase()||"frame"===n.nodeName.toLowerCase()?(s.jqWin=t(n.contentWindow),s.elmDoc=n.contentWindow.document,s.jqTarget=t("body",s.elmDoc),s.isFrame=!0):s.jqTarget=i,s.jqWin=s.jqWin||t(window),s.elmDoc=s.elmDoc||document,s.isBody="body"===s.jqTarget.get(0).nodeName.toLowerCase(),o&&(o.jqProgress&&(o.timer&&clearTimeout(o.timer),o.jqProgress.remove(),delete o.jqProgress),o.reset(!0),o.jqOverlay.stop()),s.jqOverlay=(o&&o.jqOverlay||t('<div class="'+d+'" />').css({position:s.isBody?"fixed":"absolute",left:0,top:0,display:"none",cursor:"wait"}).appendTo(s.jqTarget).on("touchmove",function(){return!1})).css({backgroundColor:e.fillColor,zIndex:e.zIndex}),(s.jqProgress=e.progress===!1?r:"function"==typeof e.progress?e.progress.call(s.jqTarget,e):h(s))&&s.jqProgress.css({position:s.isBody?"fixed":"absolute",display:"none",zIndex:e.zIndex+1,cursor:"wait"}).appendTo(s.jqTarget).on("touchmove",function(){return!1}),s.callAdjust=function(t){return t.adjustProgress?function(){t.adjustProgress(),t.adjust()}:function(){t.adjust()}}(s),s.avoidFocus=function(r){return function(i){return t(r.elmDoc.activeElement).blur(),i.preventDefault(),!1}}(s),s.avoidScroll=function(t){return function(r){return function(r){r.scrollLeft(t.scrLeft).scrollTop(t.scrTop)}(t.isBody?t.jqWin:t.jqTarget),r.preventDefault(),!1}}(s),o&&(o.timer&&clearTimeout(o.timer),o=r)}function e(r,e){var o=t.extend({duration:200,opacity:.6,zIndex:9e3},e);return o.fillColor=o.fillColor||o.color||"#888",r.each(function(){var r=t(this);r.data(a,new i(r,o,r.data(a))),"function"==typeof o.show&&r.off(g,o.show).on(g,o.show),"function"==typeof o.hide&&r.off(c,o.hide).on(c,o.hide)})}function o(r,i){return r.each(function(){var r,o=t(this);(i||!(r=o.data(a)))&&(r=e(o,i).data(a)),r.show()})}function s(r){return r.each(function(){var r=t(this).data(a);r&&r.hide()})}function n(t,i,o){var s,n=t.length?t.eq(0):r;if(n&&(s=n.data(a)||e(n).data(a),s.hasOwnProperty(i)))return null!=o&&(s[i]=o),s[i]}var a="plainOverlay",d=a.toLowerCase(),g=d+"show",c=d+"hide",h=function(){function i(i,e,o,s){return s=s===r?";":s,t.map(i,function(r){return t.map(e,function(t){return(o||"")+t+r}).join(s)}).join(s)}var e,o="jQuery-"+a,s=["-webkit-","-moz-","-ms-","-o-",""],n=o+"-progress",d="."+n+"{"+i(["box-sizing:border-box"],["-webkit-","-moz-",""])+";width:100%;height:100%;border-top:3px solid #17f29b;"+i(["border-radius:50%"],s)+";-webkit-tap-highlight-color:rgba(0,0,0,0);transform:translateZ(0);box-shadow:0 0 1px rgba(0,0,0,0);"+i(["animation-name:"+o+"-spin","animation-duration:1s","animation-timing-function:linear","animation-iteration-count:infinite"],s)+"}"+i(["keyframes "+o+"-spin{from{"+i(["transform:rotate(0deg)"],s)+"}to{"+i(["transform:rotate(360deg)"],s)+"}}"],s,"@","")+"."+n+"-legacy{width:100%;height:50%;padding-top:25%;text-align:center;white-space:nowrap;*zoom:1}."+n+"-legacy:after,."+n+'-legacy:before{content:" ";display:table}.'+n+"-legacy:after{clear:both}."+n+"-legacy div{width:18%;height:100%;margin:0 1%;background-color:#17f29b;float:left;visibility:hidden}."+n+"-1 div."+n+"-1,."+n+"-2 div."+n+"-1,."+n+"-2 div."+n+"-2,."+n+"-3 div."+n+"-1,."+n+"-3 div."+n+"-2,."+n+"-3 div."+n+"-3{visibility:visible}",g=function(){var t=Math.min(300,.9*(this.isBody?Math.min(this.jqWin.width(),this.jqWin.height()):Math.min(this.jqTarget.innerWidth(),this.jqTarget.innerHeight())));this.jqProgress.width(t).height(t),this.showProgress||this.jqProgress.children("."+n).css("borderTopWidth",Math.max(3,t/30))},c=function(t){var r=this;r.timer&&clearTimeout(r.timer),r.progressCnt&&r.jqProgress.removeClass(n+"-"+r.progressCnt),r.isShown&&(r.progressCnt=!t&&r.progressCnt<3?r.progressCnt+1:0,r.progressCnt&&r.jqProgress.addClass(n+"-"+r.progressCnt),r.timer=setTimeout(function(){r.showProgress()},500))};return function(i){var s,a;return"boolean"!=typeof e&&(e=function(){function t(t,r){return!!~(""+t).indexOf(r)}function i(i){var e;for(e in i)if(!t(i[e],"-")&&a[i[e]]!==r)return!0;return!1}function e(t){var r=t.charAt(0).toUpperCase()+t.slice(1),e=(t+" "+g.join(r+" ")+r).split(" ");return i(e)}var o,s,n=document.createElement("modernizr"),a=n.style,d="Webkit Moz O ms",g=d.split(" "),c={},h={}.hasOwnProperty,l=h!==r&&h.call!==r?function(t,r){return h.call(t,r)}:function(t,i){return i in t&&t.constructor.prototype[i]===r};c.borderradius=function(){return e("borderRadius")},c.cssanimations=function(){return e("animationName")},c.csstransforms=function(){return!!e("transform")},o=!1;for(s in c)if(l(c,s)&&!c[s]()){o=!0;break}return a.cssText="",n=null,o}()),i.elmDoc.getElementById(o)||(i.elmDoc.createStyleSheet?(a=i.elmDoc.createStyleSheet(),a.owningElement.id=o,a.cssText=d):(a=(i.elmDoc.getElementsByTagName("head")[0]||i.elmDoc.documentElement).appendChild(i.elmDoc.createElement("style")),a.type="text/css",a.id=o,a.textContent=d)),e?(s=t('<div><div class="'+n+'-legacy"><div class="'+n+'-3" /><div class="'+n+'-2" /><div class="'+n+'-1" /><div class="'+n+'-2" /><div class="'+n+'-3" /></div></div>'),i.showProgress=c):s=t('<div><div class="'+n+'" /></div>'),i.adjustProgress=g,s}}();i.prototype.show=function(){var i,e,o,s,n,a=this;a.reset(!0),i=a.jqTarget.get(0).style,a.orgPosition=i.position,e=a.jqTarget.css("position"),"relative"!==e&&"absolute"!==e&&"fixed"!==e&&a.jqTarget.css("position","relative"),a.orgOverflow=i.overflow,o=a.jqTarget.prop("clientWidth"),s=a.jqTarget.prop("clientHeight"),a.jqTarget.css("overflow","hidden"),o-=a.jqTarget.prop("clientWidth"),s-=a.jqTarget.prop("clientHeight"),a.addMarginR=a.addMarginB=0,0>o&&(a.addMarginR=-o),0>s&&(a.addMarginB=-s),a.isBody?(a.addMarginR&&(a.orgMarginR=i.marginRight,a.jqTarget.css("marginRight","+="+a.addMarginR)),a.addMarginB&&(a.orgMarginB=i.marginBottom,a.jqTarget.css("marginBottom","+="+a.addMarginB))):(a.addMarginR&&(a.orgMarginR=i.paddingRight,a.orgWidth=i.width),a.addMarginB&&(a.orgMarginB=i.paddingBottom,a.orgHeight=i.height)),a.jqActive=r,n=t(a.elmDoc.activeElement),a.isBody&&!a.isFrame?a.jqActive=n.blur():a.jqTarget.has(n.get(0)).length&&n.blur(),a.jqTarget.focusin(a.avoidFocus),function(t){a.scrLeft=t.scrollLeft(),a.scrTop=t.scrollTop(),t.scroll(a.avoidScroll)}(a.isBody?a.jqWin:a.jqTarget),a.jqWin.resize(a.callAdjust),a.callAdjust(),a.isShown=!0,a.jqOverlay.stop().fadeTo(a.duration,a.opacity,function(){a.jqTargetOrg.trigger(g)}),a.jqProgress&&(a.showProgress&&a.showProgress(!0),a.jqProgress.fadeIn(a.duration))},i.prototype.hide=function(){var t=this;t.isShown&&(t.jqOverlay.stop().fadeOut(t.duration,function(){t.reset(),t.jqTargetOrg.trigger(c)}),t.jqProgress&&t.jqProgress.fadeOut(t.duration))},i.prototype.adjust=function(){var t,r;this.isBody?(t=this.jqWin.width(),r=this.jqWin.height(),this.jqOverlay.width(t).height(r),this.jqProgress&&this.jqProgress.css({left:(t-this.jqProgress.outerWidth())/2,top:(r-this.jqProgress.outerHeight())/2})):(this.addMarginR&&(t=this.jqTarget.css({paddingRight:this.orgMarginR,width:this.orgWidth}).width(),this.jqTarget.css("paddingRight","+="+this.addMarginR).width(t-this.addMarginR)),this.addMarginB&&(r=this.jqTarget.css({paddingBottom:this.orgMarginB,height:this.orgHeight}).height(),this.jqTarget.css("paddingBottom","+="+this.addMarginB).height(r-this.addMarginB)),t=Math.max(this.jqTarget.prop("scrollWidth"),this.jqTarget.innerWidth()),r=Math.max(this.jqTarget.prop("scrollHeight"),this.jqTarget.innerHeight()),this.jqOverlay.width(t).height(r),this.jqProgress&&(t=this.jqTarget.innerWidth(),r=this.jqTarget.innerHeight(),this.jqProgress.css({left:(t-this.jqProgress.outerWidth())/2+this.scrLeft,top:(r-this.jqProgress.outerHeight())/2+this.scrTop})))},i.prototype.reset=function(t){var r=this;t&&(r.jqOverlay.css("display","none"),r.jqProgress&&r.jqProgress.css("display","none")),r.isShown&&(r.jqTarget.css({position:r.orgPosition,overflow:r.orgOverflow}),r.isBody?(r.addMarginR&&r.jqTarget.css("marginRight",r.orgMarginR),r.addMarginB&&r.jqTarget.css("marginBottom",r.orgMarginB)):(r.addMarginR&&r.jqTarget.css({paddingRight:r.orgMarginR,width:r.orgWidth}),r.addMarginB&&r.jqTarget.css({paddingBottom:r.orgMarginB,height:r.orgHeight})),r.jqTarget.off("focusin",r.avoidFocus),r.jqActive&&r.jqActive.length&&r.jqActive.focus(),function(t){t.off("scroll",r.avoidScroll).scrollLeft(r.scrLeft).scrollTop(r.scrTop)}(r.isBody?r.jqWin:r.jqTarget),r.jqWin.off("resize",r.callAdjust),r.isShown=!1)},t.fn[a]=function(t,r,i){return"show"===t?o(this,r):"hide"===t?s(this):"option"===t?n(this,r,i):e(this,t)}}(jQuery);