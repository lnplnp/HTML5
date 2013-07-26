$(document).ready(function() {

  // init
  var containerWidth = $("#container").width();
  var nbpanels = $(".panel").size();
  var padding = 2.5;
  
  $(".panel").width( (containerWidth / nbpanels) - (nbpanels * padding - 2 * padding));

  $(".panel").resizable({
    handles: 'e',
    maxWidth: 450,
    minWidth: 120,
    resize: function(event, ui){
      var currentWidth = ui.size.width;
      // set the content panel width
      $(".panel").width( ( (containerWidth - currentWidth + padding ) / (nbpanels - 1) ) - ((nbpanels - 1) * padding) );
      $(this).width(currentWidth);
    }
  });

});
