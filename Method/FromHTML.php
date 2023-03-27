<?php
declare(strict_types=1);
namespace GDO\Fineprint\Method;

use GDO\Core\Application;
use GDO\Core\GDT;
use GDO\Core\GDT_EnumNoI18n;
use GDO\DOMPDF\GDT_PDF;
use GDO\DOMPDF\Module_DOMPDF;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Form;
use GDO\Form\GDT_Submit;
use GDO\Form\MethodForm;
use GDO\UI\GDT_Message;

/**
 * Convert HTML to PDF.
 *
 * @version 7.0.3
 * @since 6.4.0
 * @author gizmore
 */
final class FromHTML extends MethodForm
{

	public function isUserRequired(): bool
	{
		return false;
	}

	public function onMethodInit(): ?GDT
	{
		Module_DOMPDF::instance()->includeVendor();
		return null;
	}

	public function createForm(GDT_Form $form): void
	{
		$form->addFields(
			GDT_EnumNoI18n::make('size')->enumValues('A4', 'A3')->initial('A4'),
			GDT_EnumNoI18n::make('format')->enumValues('portrait', 'landscape')->initial('portrait'),
			GDT_Message::make('input')->notNull()->label('html'),
			GDT_AntiCSRF::make(),
		);
		$form->actions()->addField(GDT_Submit::make());
	}

	public function formValidated(GDT_Form $form): GDT
	{
		$html = $this->getPDFHTML();
		$pdf = GDT_PDF::makeWithHTML($html);
		$pdf->size($this->getPDFSize());
		$pdf->orientation($this->getPDFFormat());
		if (Application::$INSTANCE->isUnitTests())
		{
			echo "Streaming PDF\n";
			flush();
			return $pdf;
		}
		$pdf->stream();
		return $pdf;
	}

	private function getPDFHTML(): string
	{
		return $this->gdoParameterVar('input');
	}

	private function getPDFSize(): string
	{
		return $this->gdoParameterVar('size');
	}

	private function getPDFFormat(): string
	{
		return $this->gdoParameterVar('format');
	}

}
