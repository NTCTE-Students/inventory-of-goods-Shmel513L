<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

class SupplieEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'SupplieEditScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            \Orchid\Screen\Actions\Button::make('Создать товар')
            ->icon('bs.save')
            ->method('saveSupply'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            \Orchid\Support\Facades\Layout::rows([
                \Orchid\Screen\Fields\Input::make('supply.name')
                    ->title('Название')
                    ->required(),
                \Orchid\Screen\Fields\TextArea::make('supply.descriptoin')
                    ->title('Описание')
                    ->required()
                    ->rows(5),
                \Orchid\Screen\Fields\Input::make('supply.price')
                    ->title('Цена (в копейках)')
                    ->required()
                    ->type('number'),
                \Orchid\Screen\Fields\Input::make('supply.amount')
                    ->title('Количество')
                    ->required()
                    ->type('number'),
            ]),
        ];
    }

    public function saveSupply()
    {
        \App\Models\Supply::create(request() -> input('supply'));

        \Orchid\Support\Facades\Toast::success('Товар создан');
    }

}
