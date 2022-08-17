<?php
namespace GDO\Fineprint;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_Link;

/**
 * Demo Site for GDOv7 / WeChall.
 * 
 * @author gizmore
 * @version 7.0.1
 * @since 7.0.1
 */
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
