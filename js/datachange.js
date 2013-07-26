var data = {
  "Choice1" : [ "Choice1 1", "Choice1 2", "Choice1 3", "Choice1 4" ],
  "Choice2" : [ "Choice2 1", "Choice2 2", "Choice2 3", "Choice2 4", ],
  "Choice3" : [ "Choice3 1", "Choice3 2", "Choice3 3", "Choice3 4", ],
  "Choice4" : [ "Choice4 1", "Choice4 2", "Choice4 3", "Choice4 4", ]
};
function pushData(id, col) {
  $("#datachange table tbody td:nth-child(" + 2 + ")").each(function(i, v) {
    $(this).html(data[id][i])
  });
}
$(function() {
  $("#datachange td").click(function() {
    var idx = $(this).index() + 1;
    $("td:nth-child(" + idx + ")").removeClass("highlighted");
    $(this).addClass("highlighted");
    pushData($(".highlighted").html(), 2);
  });
});
