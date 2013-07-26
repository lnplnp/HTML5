function logme(data) {
  if (typeof console != 'undefined') {
    /* Commenter la ligne suivante pour faire taire tous les logme ;o) */
    console.log(data);
  }
}
$(function() {
  $(".window").draggable({
    containment : "#main-center-inner",
    scroll : true,
    start : function() {
      $(".window").css("z-index", "0");
      $(this).css("z-index", "500");
    }
  });

  var containment_draggable = $("div.window").draggable("option", "containment");
  var maxheight = $(containment_draggable).height() / 2;
  var maxwidth = $(containment_draggable).width() / 2;
  $("div.window").each(function(i, e) {
    if (maxheight < $(e).height()) {
      $(e).height(maxheight);
    }
    if (maxwidth < $(e).width()) {
      $(e).width(maxwidth);
    }
  });

  /* Splited window */
  $("div.window-splited").addClass("ui-widget");
  $("div.window-splited").each(function(index, element) {
    var e = $(element);
    e.css("border", "5px ridge grey");
    var part_el = $("div.part", e);
    part_el.addClass("ui-content");
    part_el.css("float", "left");
    part_el.css("border", "1px red solid");
    resizeMe(e);
  });

  $(".window-splited").resizable({
    resize : function(event, ui) {
      resizeMe(ui.element);
    },
    containment : "#main-center-inner"
  });
  $("div.window-splited div.part").resizable({
    containment : $(this).parent("div.window-splited")
  });

  function resizeMe(e) {
    var w = 0;
    var part_el = $("div.part", e);
    var nbpart = part_el.size();
    if (nbpart > 1) {
      w = (e.width() / nbpart) - (e.outerWidth(true) - e.width() + 1);
      w = w - (w / 100);
      part_el.width(w);
    }
    logme("resizeMe : " + w);
  }

  var containment_resizable = $("div.window-splited").resizable("option", "containment");
  maxheight = $(containment_resizable).height() / 2;
  maxwidth = $(containment_resizable).width() / 2;
  $("div.window-splited").each(function(i, e) {
    if (maxheight < $(e).height()) {
      $(e).height(maxheight);
      $(e).addClass("maxheighted");
    }
    if (maxwidth < $(e).width()) {
      $(e).width(maxwidth);
      $(e).addClass("maxwidthed");
    }
  });

  function resizetitleOfTable(table) {
    var t = $(table);
    var nbcolmax = 0;
    $("tr", t).each(function(i, e) {
      var nb_td = $("td", e).size();
      if (nb_td > nbcolmax) {
        nbcolmax = nb_td;
      }
    });
    $("tr", t).each(function(i, e) {
      var nb_td = $("td", e).size();
      if (nb_td < nbcolmax) {
        $("td:last", e).attr("colspan", nbcolmax - nb_td + 1);
        $("td:last", e).addClass("colspaned");
      }
    });
    $("tr th", t).attr("colspan", nbcolmax);
    t.addClass("resizetitleOfTable");
  }

  resizetitleOfTable($("table"));

});

(function($) {
  $.widget("ui.splitedwindow", {
    options : {
      color : "#fff",
      backgroundColor : "#000"
    },

    _create : function() {
    }
  })
})(jQuery);

/**
 * enables resizable data table columns. Script by Ingo Hofmann
 */
(function($) {

  /**
   * Widget makes columns of a table resizable.
   */
  $.widget("ih.resizableColumns", {

    /**
     * initializing columns
     */
    _create : function() {
      this._initResizable();
    },

    /**
     * init jQuery UI sortable
     */
    _initResizable : function() {

      var colElement, colWidth, originalSize;
      var table = this.element;

      this.element.find("th").resizable({
        // use existing DIV rather than creating new nodes
        handles : {
          "e" : " .resizeHelper"
        },
        // handles: "e",

        minWidth : 10, // default min width in case there is no label

        // set min-width to label size
        create : function(event, ui) {
          var minWidth = $(this).find(".columnLabel").width();
          if (minWidth) {
            $(this).resizable("option", "minWidth", minWidth);
          }
        },

        // set correct COL element and original size
        start : function(event, ui) {
          var colIndex = ui.helper.index() + 1;
          colElement = table.find("colgroup > col:nth-child(" + colIndex + ")");
          colWidth = parseInt(colElement.get(0).style.width, 10); // faster than
          // width
          originalSize = ui.size.width;
        },

        // set COL width
        resize : function(event, ui) {
          var resizeDelta = ui.size.width - originalSize;

          var newColWidth = colWidth + resizeDelta;
          colElement.width(newColWidth);

          // height must be set in order to prevent IE9 to set wrong height
          $(this).css("height", "auto");
        }
      });
    }

  });

  // init resizable
  $(".ui-resizable").resizableColumns();
})(jQuery);
