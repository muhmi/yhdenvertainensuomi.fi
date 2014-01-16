window.processInitativeData = function (data) {
   var node = document.getElementById("initiativeStats");
   node.innerHTML = tmpl("support_tmpl", data);
}
