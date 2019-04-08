<?php

namespace App\Nova\Actions;

use Spatie\PdfToImage\Pdf;
use Illuminate\Bus\Queueable;
use App\TroubleShootingManual;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateImageFromPDF extends Action
{
	use InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * The name of the connection the job should be sent to.
	 *
	 * @var string|null
	 */
	// public $connection = 'database';

	/**
	 * The name of the queue the job should be sent to.
	 *
	 * @var string|null
	 */
	// public $queue = 'pdfimages';

	/**
	 * Perform the action on the given models.
	 *
	 * @param  \Laravel\Nova\Fields\ActionFields  $fields
	 * @param  \Illuminate\Support\Collection  $models
	 * @return mixed
	 */
	public function handle(ActionFields $fields, Collection $models)
	{
		foreach ($models as $model) {
			if (class_exists('Imagick') || extension_loaded('imagick')) {
				$pdfImage = str_replace('.pdf', '.jpg', $model->pdf);

				$pdf = new Pdf('storage/'.$model->pdf);
				$pdf->saveImage('storage/pdf_images/'.$pdfImage);

				$manual = TroubleShootingManual::find($model->id);
				$manual->pdf_image = $pdfImage;
				$manual->save();
			} else {
				return Action::danger("Imagick doesn't seem to be installed.");
			}
		}
	}

	/**
	 * Get the fields available on the action.
	 *
	 * @return array
	 */
	public function fields()
	{
		return [];
	}
}
