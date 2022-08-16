<?php
namespace GDO\Fineprint;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_Link;

final class Module_Fineprint extends GDO_Module
{
	public function getDependencies() : array
	{
		return [
			'Classic',
			'DOMPDF',
			'JQueryAutocomplete',
		];
		
	}
	
	public function onLoadLanguage() : void
	{
		$this->loadLanguage('lang/fineprint');
	}
	
	public function onInitSidebar() : void
	{
		$link = GDT_Link::make()->href(href('Fineprint', 'FromHTML'))->label('link_fineprint_from_html');
		GDT_Page::instance()->rightBar()->addField($link);
	}
	
}