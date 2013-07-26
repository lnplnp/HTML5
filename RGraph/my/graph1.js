function randOrd() {
  return (Math.round(Math.random()) - 0.5);
}

function rand100() {
  return Math.round(((Math.random() * 100) - (Math.random() * 100)) * 100) / 100;
}

window.onload = function() {
  var name_labels = new Array('Luis', 'Kevin', 'John', 'Gregory');
  name_labels.sort(randOrd);
  var name_tooltips = new Array();
  var values = new Array();
  for ( var index in name_labels) {
    var value = new Array();
    for ( var i = 0; i < 2; i++) {
      var r = rand100();
      name_tooltips.push(name_labels[index] + " " + r);
      value.push(r);
    }
    values.push(value);
  }
  var bar = new RGraph.Bar('cvs_bar', values);
  bar.Set('chart.colors', [ 'rgba(255, 176, 176, 0.5)', 'rgba(153, 208, 249,0.5)' ]);
  bar.Set('chart.labels', name_labels);
  bar.Set('chart.tooltips', name_tooltips);
  bar.Set('chart.tooltips.event', 'onmousemove');
  bar.Set('chart.ymax', 100);
  bar.Set('chart.strokestyle', '#ccc');
  bar.Set('chart.hmargin.grouped', 2);
  bar.Set('chart.units.post', '  € ');
  bar.Set('chart.gutter.left', 40);
  bar.Set('chart.gutter.right', 15);
  bar.Set('chart.xaxispos', 'center');
  RGraph.Effects.Fade.In(bar, {
    'duration' : 500
  });
  RGraph.Effects.Bar.Wave(bar);
}
