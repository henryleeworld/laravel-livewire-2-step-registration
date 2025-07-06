<x-guest-layout>
    <form method="POST" action="{{ route('register-step2.post') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="phone" value="{{ __('Phone') }}" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" value="{{ __('Address') }}" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
        </div>

        <div class="mt-4">
            <x-input-label for="city_id" value="{{ __('City') }}" />
            <select name="city_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ __($city->name) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <x-input-label for="photo" value="{{ __('Profile photo') }}" />
            <x-text-input type="file" name="photo" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Finish Registration') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
