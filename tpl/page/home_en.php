<?php
use GDO\UI\GDT_Link;

?>
<h3>Fineprint</h3>

<p>Hello and welcome to Fineprint, your HTML2PDF online converter.</p>
<p>We do not store any content you provide, but log activatity vastly.</p>
<p>In the end, this is a hacking challenge, so hack away!</p>
<p>&copy;gizmore</p>

<div>
 <p><?=GDT_Link::make()->href(href('Fineprint', 'FromHTML'))->render()?></p>
</div>
