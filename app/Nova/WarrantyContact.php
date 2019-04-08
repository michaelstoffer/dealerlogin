<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class WarrantyContact extends Resource
{
	/**
	 * The model the resource corresponds to.
	 *
	 * @var string
	 */
	public static $model = 'App\WarrantyContact';

	/**
	 * The single value that should be used to represent the resource when being displayed.
	 *
	 * @var string
	 */
	public static $title = 'id';

	/**
	 * The columns that should be searched.
	 *
	 * @var array
	 */
	public static $search = [
		'id', 'phone', 'customer_service_phone', 'technical_support_phone', 'warranty_phone', 'customer_service_email', 'technical_support_email', 'warranty_email', 'website'
	];

	/**
	 * The relationship columns that should be searched.
	 *
	 * @var array
	 */
	public static $searchRelations = [
		'vendor' => ['name'],
	];

	/**
	 * Get the fields displayed by the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function fields(Request $request)
	{
		return [
			ID::make()->sortable(),

			BelongsTo::make('Vendor')->sortable(),

			Text::make('Phone')
				->sortable(),

			Text::make('Customer Service Phone')
				->sortable()
				->hideFromIndex(),

			Text::make('Technical Support Phone')
				->sortable()
				->hideFromIndex(),

			Text::make('Warranty Phone')
				->sortable()
				->hideFromIndex(),

			Text::make('Customer Service Email')
				->sortable()
				->hideFromIndex(),

			Text::make('Technical Support Email')
				->sortable()
				->hideFromIndex(),

			Text::make('Warranty Email')
				->sortable()
				->hideFromIndex(),

			Text::make('Website')
				->sortable(),

			File::make('PDF')
				->disk('public')
				->storeOriginalName('pdf_name')
				->storeSize('pdf_size'),

			Text::make('PDF Name')
				->exceptOnForms()
				->hideFromIndex(),

			Text::make('PDF Size')
				->exceptOnForms()
				->hideFromIndex()
				->displayUsing(function ($value) {
					return number_format($value / 1024, 2).'kb';
				}),
		];
	}

	/**
	 * Get the cards available for the request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function cards(Request $request)
	{
		return [];
	}

	/**
	 * Get the filters available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function filters(Request $request)
	{
		return [];
	}

	/**
	 * Get the lenses available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function lenses(Request $request)
	{
		return [];
	}

	/**
	 * Get the actions available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function actions(Request $request)
	{
		return [];
	}
}
