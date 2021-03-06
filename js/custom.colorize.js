$(function() {
  // the widget definition, where "custom" is the namespace,
  // "colorize" the widget name
  $.widget("custom.colorize", {
    // default options
    options : {
      red : 255,
      green : 0,
      blue : 0,

      // callbacks
      change : null,
      random : null
    },

    // the constructor
    _create : function() {
      this.element
      // add a class for theming
      .addClass("custom-colorize")
      // prevent double click to select text
      .disableSelection();

      this.changer = $("<button>", {
        text : "change",
        "class" : "custom-colorize-changer"
      }).appendTo(this.element).button();

      // bind click events on the changer button to the random method
      // in 1.9 would use this._bind( this.changer, { click: "random" });
      var that = this;
      this.changer.bind("click.colorize", function() {
        // _bind would handle this check
        if (that.options.disabled) {
          return;
        }
        that.random.apply(that, arguments);
      });
      this._refresh();
    },

    // called when created, and later when changing options
    _refresh : function() {
      this.element.css("background-color", "rgb(" + this.options.red + "," + this.options.green + "," + this.options.blue + ")");

      // trigger a callback/event
      this._trigger("change");
    },

    // a public method to change the color to a random value
    // can be called directly via .colorize( "random" )
    random : function(event) {
      var colors = {
        red : Math.floor(Math.random() * 256),
        green : Math.floor(Math.random() * 256),
        blue : Math.floor(Math.random() * 256)
      };

      // trigger an event, check if it's canceled
      if (this._trigger("random", event, colors) !== false) {
        this.option(colors);
      }
    },

    // events bound via _bind are removed automatically
    // revert other modifications here
    _destroy : function() {
      // remove generated elements
      this.changer.remove();

      this.element.removeClass("custom-colorize").enableSelection().css("background-color", "transparent");
    },

    // _setOptions is called with a hash of all options that are changing
    // always refresh when changing options
    _setOptions : function() {
      // in 1.9 would use _superApply
      $.Widget.prototype._setOptions.apply(this, arguments);
      this._refresh();
    },

    // _setOption is called for each individual option that is changing
    _setOption : function(key, value) {
      // prevent invalid color values
      if (/red|green|blue/.test(key) && (value < 0 || value > 255)) {
        return;
      }
      // in 1.9 would use _super
      $.Widget.prototype._setOption.call(this, key, value);
    }
  });

  // initialize with default options
  $("#my-widget1").colorize();

  // initialize with two customized options
  $("#my-widget2").colorize({
    red : 60,
    blue : 60
  });

  // initialize with custom green value
  // and a random callback to allow only colors with enough green
  $("#my-widget3").colorize({
    green : 128,
    random : function(event, ui) {
      return ui.green > 128;
    }
  });

  // click to toggle enabled/disabled
  $("#disable").toggle(function() {
    // use the custom selector created for each widget to find all instances
    $(":custom-colorize").colorize("disable");
  }, function() {
    $(":custom-colorize").colorize("enable");
  });

  // click to set options after initalization
  $("#black").click(function() {
    $(":custom-colorize").colorize("option", {
      red : 0,
      green : 0,
      blue : 0
    });
  });
});
