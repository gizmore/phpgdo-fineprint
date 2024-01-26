<?php
namespace GDO\Fineprint;

use GDO\Core\GDO_Module;
use GDO\Core\Method;
use GDO\Fineprint\Method\Home;
use GDO\UI\GDT_Headline;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;

/**
 * Demo Site for GDOv7 / WeChall.
 * Render arbritrary Html as Pdf.
 * Uses phpgdo-dompdf to achieve this.
 *
 * @version 7.0.1
 * @since 7.0.1
 * @author gizmore
 */
final class Module_Fineprint extends GDO_Module
{

	public int $priority = 100;
	public string $license = 'Fineprint-3-Clause';

	public function getDependencies(): array
	{
		return [
			'Admin',
			'Classic',
			'Contact',
			'CSS',
			'DOMPDF',
			'Javascript',
			'JQueryAutocomplete',
			'Licenses',
//            'LoC',
			'Login',
			'Perf',
		];
	}

    public function defaultMethod(): Method
    {
        return Home::make();
    }

	public function onLoadLanguage(): void
	{
		$this->loadLanguage('lang/fineprint');
	}

	public function onInitSidebar(): void
    {
        $bar = GDT_Page::instance()->topBar();
        $bar->addFields(
            GDT_Link::make()->href(href('Fineprint', 'Home'))->textRaw(sitename()),
        );
		$bar = GDT_Page::instance()->rightBar();
		$bar->addFields(
			GDT_Link::make()->href(href('Fineprint', 'Home'))->text('mt_fineprint_home'),
			GDT_Link::make()->href(href('Fineprint', 'FromHTML'))->text('link_fineprint_from_html'),
		);
	}

}
