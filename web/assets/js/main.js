(function(){var b=document.getElementById("data-table-head"),a=b.offsetTop;document.getElementById("sticky-legend-icons").innerHTML=document.getElementById("legend-icons").innerHTML;window.addEventListener("scroll",function(){window.scrollY>=a?b.classList.add("sticky"):b.classList.remove("sticky")})})(); (function(){var b=document.getElementById("questions-timestamp"),a=new Date(1E3*Number(b.getAttribute("data-timestamp"))),c=a.getHours(),d=a.getMinutes(),a=a.getSeconds();b.textContent=(10>c?"0"+c:c)+":"+(10>d?"0"+d:d)+":"+(10>a?"0"+a:a)})();