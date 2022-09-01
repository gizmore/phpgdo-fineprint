<?php
namespace GDO\Fineprint;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_Link;

/**
 * Demo Site for GDOv7 / WeChall.
 * Render arbritrary Html as Pdf.
 * Uses phpgdo-dompdf to achieve this.
 * 
 * @author gizmore
 * @version 7.0.1
 * @since 7.0.1
 */
final class Module_Fineprint extends GDO_Module
{
	public int $priority = 100;
	public string $license = 'Fineprint-3-Clause';
	
	public function getDependencies() : array
	{
		return [
			'Admin',
			'Classic',
			'DOMPDF',
			'JQueryAutocomplete',
			'Login',
			'Perf',
		];
	}
	
	public function onLoadLanguage() : void
	{
		$this->loadLanguage('lang/fineprint');
	}
	
	public function onInitSidebar() : void
	{
		$bar = GDT_Page::instance()->rightBar();
		$bar->addFields(
			GDT_Link::make()->href(href('Fineprint', 'Home'))->label('mt_fineprint_home'),
			GDT_Link::make()->href(href('Fineprint', 'FromHTML'))->label('link_fineprint_from_html'),
		);
	}
	
}
