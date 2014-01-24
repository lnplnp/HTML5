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

  <div class="box">
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vulputate suscipit gravida. Aliquam scelerisque malesuada dui, id venenatis mi bibendum in. Maecenas et fringilla augue. Integer euismod lectus pretium, dictum odio ut, hendrerit ligula. Donec consequat velit sed felis fermentum, facilisis condimentum nibh blandit. In elementum eu justo pellentesque aliquet. Curabitur et risus fringilla, vestibulum diam nec, aliquet arcu. In non ligula quis justo mattis malesuada. Sed quis magna feugiat risus condimentum mollis. Sed ut luctus neque. Aliquam pellentesque ullamcorper neque eu dapibus. Nam metus purus, porttitor et mi nec, commodo accumsan dui. Morbi porta placerat quam, non tempor tellus congue ut. Vivamus dictum ante magna, pretium molestie purus blandit et. Donec tincidunt placerat urna, eget auctor eros.</p>
  <p>Phasellus tempor erat quis malesuada auctor. In hac habitasse platea dictumst. Aliquam tincidunt lectus nulla. Duis cursus volutpat leo quis sodales. Aliquam sed tristique mauris, sed ultrices eros. Morbi eleifend augue et molestie vehicula. Fusce posuere leo justo, ac suscipit justo ullamcorper sed. Donec quis aliquam felis. Nulla pellentesque mi id ipsum ornare, et viverra ligula condimentum. Ut posuere ornare purus, at dignissim nulla blandit ac. Donec tempor sagittis tellus. Curabitur erat nulla, ullamcorper quis rutrum eget, condimentum non justo. Etiam eros purus, fringilla a vestibulum id, pulvinar sit amet erat. Donec at mauris gravida, ultrices quam sit amet, dictum nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed rutrum ante et nulla auctor tempus.</p>
</div>
<div class="box"> B </div>
<div class="box"> C </div>
<div class="box"> D </div>
<form action="index.php">
<input type="text" id="search_field" />
</form>
<script>
/*  document.getElementById('search_field').onkeypress = function(e) {
        if (!e) e = window.event;
        var keyCode = e.keyCode || e.which;
        if (keyCode == '13') {
            window.location.href = 'index.php?s=' + document.getElementById('search_field').value;
            return false;
        }
      return true;
    };

    */

  $( "#search_field" ).keypress(function( e ) {
    if ( event.which == 13 ) {
      event.preventDefault();
      window.location.href = '/search/?s=' + $(this).val();
      return false;
    }
    return true;
  });

</script>

<table id="test-strtotime">
<?php

$array = array("now", "10 September 2000", "+1 day", "+1 week", "+1 week 2 days 4 hours 2 seconds", "next Thursday", "last Monday");

for ($i=0; $i < 4; $i++) {
  echo "<col></col>";
}

foreach ($array as $index => $value) {
  echo "<tr>";
  echo "  <td>$index</td>";
  echo "  <td>$value</td>";
  echo "  <td>" . strtotime("$value") . "</td>";
  echo "  <td>" . date( "d m Y \T H:i:s",strtotime("$value")) . "</td>";
  echo "</tr>";
}
?>
</table>

<?php
function sendIcalEvent($to_name, $to_address, $startTime, $endTime, $subject, $description,  $location, $tzid="Europe/Paris") {
  $from_name = 'Project\'Or';
  $from_address = 'projector@ceritek.com';
  $domain = 'ceritek.com';
  //Create Email Headers
  $mime_boundary = "----Meeting Booking----" . MD5(TIME());
  $headers = "From: " . $from_name . " <" . $from_address . ">\n";
  $headers .= "Reply-To: " . $from_name . " <" . $from_address . ">\n";
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$mime_boundary\"\n";
  $headers .= "Content-class: urn:content-classes:calendarmessage\n";

  // Create Email Body (HTML)
  $message = "--$mime_boundary\r\n";
  $message .= "Content-Type: text/html; charset=UTF-8\n";
  $message .= "Content-Transfer-Encoding: 8bit\n\n";
  $message .= "<html>\n";
  $message .= "<body>\n";
  $message .= '<p>Cher ' . $to_name . ',</p>';
  $message .= '<div>' . $description . '</div>';
  $message .= "</body>\n";
  $message .= "</html>\n";
  $message .= "--$mime_boundary\r\n";

  $ical =
  'BEGIN:VCALENDAR' . "\r\n" .
    'PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN' . "\r\n" .
    'VERSION:2.0' . "\r\n" .
    'METHOD:REQUEST' . "\r\n" .
/*
    'BEGIN:VTIMEZONE' . "\r\n" .
      'TZID:' . $tzid . "\r\n" .

      'BEGIN:STANDARD' . "\r\n" .
      'DTSTART:' . date("Ymd\THis") . "\r\n" .
      'TZOFFSETFROM:-0400' . "\r\n" .
      'TZNAME:' . $tzid . "\r\n" .
      'END:STANDARD' . "\r\n" .

      'BEGIN:DAYLIGHT' . "\r\n" .
      'DTSTART:' . date("Ymd\THis") . "\r\n" .
      'TZOFFSETFROM:-0500' . "\r\n" .
      'TZNAME:' . $tzid . "\r\n" .
      'END:DAYLIGHT' . "\r\n" .

    'END:VTIMEZONE' . "\r\n" .
*/
    'BEGIN:VEVENT' . "\r\n" .

      'ORGANIZER;CN="' . $from_name . '":MAILTO:' . $from_address . "\r\n" .
      'ATTENDEE;CN="' . $to_name . '";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:' . $to_address . "\r\n" .
      'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
      'UID:' . date("Ymd\TGis", strtotime($startTime)).rand() . "@" . $domain . "\r\n" .
      'DTSTAMP:' . date("Ymd\TGis") . "\r\n" .
      'DTSTART;TZID="Europe/Paris":' . date("Ymd\THis", strtotime($startTime)) . "\r\n" .
      'DTEND;TZID="Europe/Paris":' . date("Ymd\THis", strtotime($endTime)) . "\r\n" .
      'TRANSP:OPAQUE' . "\r\n" .
      'SEQUENCE:1' . "\r\n" .
      'SUMMARY:' . $subject . "\r\n" .
      'LOCATION:' . $location . "\r\n" .
      'CLASS:PUBLIC' . "\r\n" .
      'PRIORITY:5' . "\r\n" .

      'BEGIN:VALARM' . "\r\n" .
      'TRIGGER:-PT15M' . "\r\n" .
      'ACTION:DISPLAY' . "\r\n" .
      'DESCRIPTION:Reminder' . "\r\n" .
      'END:VALARM' . "\r\n" .

    'END:VEVENT' . "\r\n" .

  'END:VCALENDAR' . "\r\n";
  $message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST\n';
  $message .= "Content-Transfer-Encoding: 8bit\n\n";
  $message .= $ical;

  $mailsent = mail($to_address, $subject, $message, $headers);

  if($mailsent){
    return true;
  } else {
    return false;
  }
}
?>
<div>
  <?php
  
  $timezone = "Europe/Paris";
  date_default_timezone_set($timezone);
  $to_name="Manuel";
  $to_address="manuelpayet@gmail.com";
  $startTime="+1week 14:30";
  $endTime="+1day +1week 15:00";
  $subject="Réunion d'équipe";
  $description="<p>Je viendrai accompagné <br>de " . date("r e I", strtotime($startTime)) . " <br>à " . date("r e I", strtotime($endTime)) . "<br> Le fuseau horaire : '" . date_default_timezone_get() . "'</p>";
  $location="Bureau";

  if (sendIcalEvent($to_name, $to_address, $startTime, $endTime, $subject, $description, $location, $timezone)) {
    ?>
    <p>Mail send</p>
    <?php
  } else {
    ?>
    <p>Mail not send</p>
    <?php
  }
  ?>
</div>
<div>
</div>

<div>
<?php

  $mailok="Votre message a bien été envoyé";
  $mailko="Votre message n'a pas pu être envoyé";
  
  $destinataire = 'manuelpayet@gmail.com';
  // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
  $expediteur = 'mpayet@ceritek.com';
  $copie = 'teamdev@ceritek.com';
  $copie_cachee = 'manuel.payet@gmail.com';
  $objet = 'Test'; // Objet du message

  $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
  $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
  $headers .= 'From: "Manuel PAYET (TEXT)"<' . $expediteur . '>'."\n"; // Expediteur
  $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
  $headers .= 'Cc: ' . $copie . "\n"; // Copie Cc
  $headers .= 'Bcc: ' . $copie_cachee . "\n\n"; // Copie cachée Bcc

  $message = 'Un Bonjour de Developpez.com !';
   // Envoi du message
  if (mail($destinataire, $objet, $message, $headers))  {
    echo "<p>[TEXTE] $mailok</p>";
  } else {
    // Non envoyé
    echo "<p>[TEXTE] $mailko</p>";
  }

  $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
  $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
  $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
  $headers .= 'From: "Manuel PAYET (HTML)"<' . $expediteur . '>'."\n"; // Expediteur
  $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
  $headers .= 'Cc: ' . $copie . "\n"; // Copie Cc
  $headers .= 'Bcc: ' . $copie_cachee . "\n\n"; // Copie cachée Bcc

  $message = '<div style="width: 100%; text-align: center; font-weight: bold">' . $message . '</div>';
  // Envoi du message
  if (mail($destinataire, $objet, $message, $headers)) {
    echo "<p>[HTML] $mailok</p>";
  } else {
    // Non envoyé
    echo "<p>[HTML] $mailko</p>";
  }
?>

</div>
<?php echo "<p>" . date("r e I", strtotime("10 september 2013 +100days")) . "</p>"; ?>
</body>
</html>
