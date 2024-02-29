<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class OrderItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\OrderItem>
     */
    public static $model = \App\Models\OrderItem::class;

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
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [
            Action::using('Test sole action', function (ActionFields $fields, Collection $models) {
                // It does not matter if it is a closure action or the regular one.
            })
                ->sole() // <--- NOTE TO MAINTAINERS: This is to test.
        ];
    }

    public function authorizedToDelete(Request $request): bool
    {
        // Some logic to determine if the user can delete this resource.

        // !!!!!
        // NOTE FOR MAINTAINERS: This is the reason why by using `sole()` action we don't have select checkboxes anymore.
        // If you make it `true` then the checkboxes will appear and the "Test sole action" can be executed.
        // !!!!!
        return true;
    }
}
