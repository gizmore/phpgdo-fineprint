<?php
namespace GDO\Fineprint\tpl\page;
use GDO\UI\GDT_Link;

?>
<h3>Fineprint</h3>
<br/>
<p>Hello and welcome to Fineprint, your Html2Pdf online converter.</p>
<p>We do not store any content you provide, but log activity vastly.</p>
<p>In the end, this is a hacking challenge, so hack away!</p>
<br/>
<p><?=GDT_Link::make('mt_fineprint_fromhtml')->href(href('Fineprint', 'FromHTML'))->render()?></p>
<br/>
<p>&copy;2022 gizmore</p>
