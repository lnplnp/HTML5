<!DOCTYPE HTML>
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<title>HTML5 demonstration</title>

<link href="./css/index.css" rel="stylesheet" type="text/css">
<link href="./css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css">

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script src="./js/index.js"></script>

</head>
<body>
  <div>
    <a href="./datachange.html" title="Data Change">Data Change</a>&nbsp; <a href="./draganddrop.html" title="Drag and Drop">Drag and Drop</a>&nbsp; <a href="./splitedwindow.html"
      title="Splited Window">Splited Window</a>&nbsp;
  </div>

  <input name="q" id="q" type="text" list="liste_valeurs" class="ui-widget">
  <!--[If IE]>
    <select id="liste_valeurs">
  <![endif]-->
  <!--[if !IE]>-->
  <datalist id="liste_valeurs">
    <!--<![endif]-->
    <option label="suggestion 1" value="suggestion 1" />
    <option label="suggestion 2" value="suggestion 2" />
    <option label="suggestion 3" value="suggestion 3" />
    <option label="suggestion 4" value="suggestion 4" />
    <option label="suggestion 5" value="suggestion 5" />
    <option label="suggestion 6" value="suggestion 6" />
    <option label="suggestion 7" value="suggestion 7" />
    <option label="suggestion 8" value="suggestion 8" />
    <option label="suggestion 9" value="suggestion 9" />
    <!--[if !IE]>-->
  </datalist>
  <!--<![endif]-->
  <!--[If IE]>
    </select>
  <![endif]-->

</body>
</html>
