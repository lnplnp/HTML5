$(function() {
  var valeurs = new Array();
  $("select#liste_valeurs option").each(function(index, element) {
    valeurs.push($(element).val());    
  });
  $("#q").autocomplete({
    source : valeurs
  });
});
