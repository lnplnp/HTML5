$(document).ready(function() {

  $("div#container").resizable();

  $("td").resizable({
    containment : "div#container",
    handles : "e"
  });

});
