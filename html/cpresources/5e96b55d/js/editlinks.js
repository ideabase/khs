"use strict";var ready=function(t){if("function"==typeof t)return"complete"===document.readyState||"interactive"===document.readyState?t():void document.addEventListener("DOMContentLoaded",t,!1)},adminBarEditLinks=[];ready(function(){var t=void 0;function e(t,e){t.classList?t.classList.add(e):t.className+=" "+e}function n(t,e){for(var n=0,i=t.length;n<i;n++)if(t[n]===e)return!0;return!1}function i(t,e){for(var i=document.querySelectorAll(e),r=t.parentNode;r&&!n(i,r);)r=r.parentNode;return r}for(var r=0;r<adminBarEditLinks.length;r++){if((t=document.querySelectorAll('.editlink[data-id="'+r+'"]'))[0].innerHTML=adminBarEditLinks[r],t[0].hasAttribute("data-container")){var a=i(t[0],t[0].getAttribute("data-container"));null!==a&&e(a,"editlink__container")}e(t[0],"editlink--embedded")}});