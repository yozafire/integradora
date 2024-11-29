<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ticket de Reclamo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Realizar un Reclamo') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Por favor, proporcione la información detallada para ayudarnos a resolver su reclamo de manera eficiente.') }}
                            </p>
                        </header>

                        <form action="{{ route('ticket.submit') }}" method="POST" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="ticket_title" :value="__('Título del Reclamo')" />
                                <x-text-input id="ticket_title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="ticket_description" :value="__('Descripción')" />
                                <textarea id="ticket_description" name="description" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300"></textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="ticket_priority" :value="__('Prioridad')" />
                                <select id="ticket_priority" name="priority" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                    <option value="baja">{{ __('Baja') }}</option>
                                    <option value="media">{{ __('Media') }}</option>
                                    <option value="alta">{{ __('Alta') }}</option>
                                </select>
                                <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Enviar Reclamo') }}</x-primary-button>

                                @if (session('status'))
                                    <x-action-message class="me-3" on="status">
                                        {{ session('status') }}
                                    </x-action-message>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
