!function(){"use strict";!function(){if(document.querySelectorAll(".testimonial-slider").length>0)tns({container:".testimonial-slider",items:1,axis:"horizontal",controlsContainer:"#testimonial-nav",swipeAngle:!1,speed:700,nav:!0,controls:!0,autoplay:!0,autoplayHoverPause:!0,autoplayTimeout:3500,autoplayButtonOutput:!1})}();!function(){var e,t=document.getElementsByClassName("quantity-container");function n(t){var n=t.getElementsByClassName("quantity-amount")[0],a=t.getElementsByClassName("increase")[0],i=t.getElementsByClassName("decrease")[0];a.addEventListener("click",(function(t){!function(t,n){e=parseInt(n.value,10),console.log(n,n.value),e=isNaN(e)?0:e,e++,n.value=e}(0,n)})),i.addEventListener("click",(function(t){!function(t,n){e=parseInt(n.value,10),(e=isNaN(e)?0:e)>0&&e--;n.value=e}(0,n)}))}!function(){for(var e=0;e<t.length;e++)n(t[e])}()}()}();