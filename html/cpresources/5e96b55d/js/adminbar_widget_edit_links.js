"use strict";var ready=function(t){if("function"==typeof t)return"complete"===document.readyState||"interactive"===document.readyState?t():void document.addEventListener("DOMContentLoaded",t,!1)};ready(function(){for(var t=document.getElementsByClassName("editlink"),e=document.getElementById("adminbar_widget_edit_links__container"),n=0;n<t.length;n++){var a=t[n].querySelector(".editlink__meta"),i=t[n].querySelector(".editlink__entry_note")||"";if(a){var d=a.getAttribute("data-type"),r='\n<a href="'+a.getAttribute("data-url")+'" class="editlink__link">'+("entry"===d?'Edit<span class="adminbar__icon"><svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 228.93 228.72"><path d="M227.35 48.35a14.64 14.64 0 0 0-2.79-17L197.84 4.58a15.47 15.47 0 0 0-17.42-3.17l-5.95 4.74L14.29 166.33 0 228.72l62.39-14.29L222.57 54.26zM32.59 210.92a30 30 0 0 0-14.84-14.58l5.53-24.15 14.14 6.91 13.06 13.06 6.86 13z" fill="#fff"></path></svg></span>':"Go")+"</a>\n<div>"+a.getAttribute("data-title")+'</div>\n<div class="adminbar_widget_edit_links__note">'+(i.innerHTML||"")+"</div>";e.innerHTML+=r}}});