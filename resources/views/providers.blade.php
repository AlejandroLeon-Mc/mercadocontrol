<x-guest-layout>
        <x-jet-validation-errors class="mb-4" />

<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Proovedores') }}
    </h2>
    <form method="POST" action="{{ route('registerprovider') }}">
        <div class="w-6/12 m-auto">
            <x-jet-label for="short_name" value="{{ __('Short_name') }}" />
            <x-jet-input id="short_name" class="block mt-1 w-full" type="text" name="short_name" required autofocus />
        </div>
        <div class="w-6/12 m-auto">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" required />
        </div>
        <div class="w-6/12 m-auto">
            <x-jet-label for="nosotros" value="{{ __('Nosotros') }}" />
            <x-jet-input id="nosotros" class="block mt-1 w-full" type="text" name="nosotros" required />
        </div>
        <div class="w-6/12 m-auto text-center pt-4">
            <x-jet-button>
                {{ __('Registrar proovedor') }}
            </x-jet-button>
        </div>
    </form>
</div>

</x-guest-layout>