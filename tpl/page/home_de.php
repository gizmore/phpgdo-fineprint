<?php
namespace GDO\Fineprint\tpl\page;

use GDO\UI\GDT_Link;

?>
<h3>Das Kleingedruckte</h3>
<br/>
<p>Hallo und Willkommen auf &quot;Fineprint&quot; dem Html2Pdf Konvertierungssoftwarewerkzeug.</p>
<p>Wir speichern keinerlei Daten, ja wir haben noch nichmal Cookies!</p>
<p>Letzten Endes, wie auch immer,... Dies ist eine Hacking-Challenge, also gib Gas!</p>
<br/>
<p><?=GDT_Link::make('mt_fineprint_fromhtml')->href(href('Fineprint', 'FromHTML'))->render()?></p>
<br/>
<p>&copy;2022 gizmore</p>
