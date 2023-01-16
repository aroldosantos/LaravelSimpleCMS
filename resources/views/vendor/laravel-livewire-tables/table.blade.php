<main>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight rounded">
            {{ __($header_title) }}
        </h2>

        <nav class="flex items-center text-sm font-medium mt-1">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                Início
            </a>
            <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="#" class="text-yellow-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                {{ $header_breadcrumb }}
            </a>
        </nav>
    </x-slot>

<div class="max-w-7xl mx-auto py-2 sm:px-6 mt-10">

@if (session()->has('status'))
    <div id="message" class="bg-green-100 text-green-900 p-2 mb-3 text-center">
        {{ session('status') }}
    </div>
@endif

    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-20">
        <div class="px-4 py-5 sm:px-6 grid grid-cols-2">
            <div class="">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ __($tb_title) }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{ __($tb_desc) }}
                </p>
            </div>

            <div class="text-right mt-3 ">
                <a href="{{ route(__($btn_create_href)) }}"
                    class="w-auto py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    {{ __($btn_create) }}
                </a>
            </div>

        </div>



        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <div x-data>
        <div class="row justify-content-between">
            <div class="col-auto order-last order-md-first">
                <div class="input-group mb-3">
                    <input type="search" class="rounded-md px-3 py-2 border border-gray-300 placeholder-gray-10 text-gray-900 rounded-t-md focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm m-5 mr-0" placeholder="{{ __('Busca') }}" wire:model="search">
                </div>
            </div>
            @if($header_view)
                <div class="">
                    @include($header_view)
                </div>
            @endif
        </div>

        <div class=" text-center">
            @if($models->isEmpty())
                <div class="text-red-600 font-bold  p-4 border-t border-b bg-yellow-50 border-yellow-300">
                    {{ __('Nenhum resultado encontrado.') }}
                </div>
            @else
                <div class="p-0">
                    <div class="">

                        <table class="table {{ $table_class }} min-w-full divide-y divide-gray-200 ">
                            <thead class="{{ $thead_class }} bg-gray-50 border-t border-b">
                            <tr>
                                @if($checkbox && $checkbox_side == 'left')
                                    @include('laravel-livewire-tables::checkbox-all')
                                @endif

                                @foreach($columns as $column)
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider {{ $this->thClass($column->attribute) }}">
                                        @if($column->sortable)
                                            <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                                                {{ $column->heading }}

                                                @if($sort_attribute == $column->attribute)
                                                    <i class="fas fa-sort-amount-{{ $sort_direction == 'asc' ? 'up-alt' : 'down' }}"></i>
                                                @else
                                                    <i class="fas fa-sort-amount-up-alt" style="opacity: .35;"></i>
                                                @endif
                                            </span>
                                        @else
                                            {{ $column->heading }}
                                        @endif
                                    </th>
                                @endforeach

                                @if($checkbox && $checkbox_side == 'right')
                                    @include('laravel-livewire-tables::checkbox-all')
                                @endif
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($models as $model)
                                <tr class="">
                                    @if($checkbox && $checkbox_side == 'left')
                                        @include('laravel-livewire-tables::checkbox-row')
                                    @endif

                                    @foreach($columns as $column)
                                        <td class="px-6 py-4 text-left text-sm text-gray-600 box-border   {{ $this->tdClass($column->attribute, $value = Arr::get($model->toArray(), $column->attribute)) }}">
                                            @if($column->view)
                                                @include($column->view)
                                            @else
                                                {!! $value !!}
                                            @endif
                                        </td>
                                    @endforeach

                                    @if($checkbox && $checkbox_side == 'right')
                                        @include('laravel-livewire-tables::checkbox-row')
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <div class="">
            <div class=" p-4">
                {{ $models->links('pagination::tailwind') }}
            </div>
            @if($footer_view)
                <div class="col-md-auto">
                    @include($footer_view)
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>

</main>
