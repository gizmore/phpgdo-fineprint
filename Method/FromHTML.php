<?php
namespace GDO\Fineprint\Method;

use GDO\Core\Application;
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
 * @author gizmore
 */
final class FromHTML extends MethodForm
{

	public function isUserRequired(): bool
	{
		return false;
	}

	public function onMethodInit()
	{
		Module_DOMPDF::instance()->includeVendor();
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
// 		$form->targetBlank(); # @TODO: weird bug! Opens a blank PDF in fineprint/fromhtml
	}

	public function formValidated(GDT_Form $form)
	{
		$html = $this->getPDFHTML();
		$pdf = GDT_PDF::makeWithHTML($html);
		$pdf->size($this->getPDFSize());
		$pdf->orientation($this->getPDFFormat());
		if (Application::$INSTANCE->isUnitTests())
		{
			echo "Streaming PDF\n";
			return null;
		}
		$pdf->stream();
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
