<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('frontend.listings.content.add_new_listing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('listings.store') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <x-jet-label for="title" value="{{ trans('frontend.listings.content.title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="description" value="{{ trans('frontend.listings.content.description') }}" />
                    <textarea id="price" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="mt-4">
                    <x-jet-label for="price" value="{{ trans('frontend.listings.content.price') }}" />
                    <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="photo1" value="{{ trans('frontend.listings.content.photo_1') }}" />
                    <input type="file" name="photo1" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="photo2" value="{{ trans('frontend.listings.content.photo_2') }}" />
                    <input type="file" name="photo2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="photo3" value="{{ trans('frontend.listings.content.photo_3') }}" />
                    <input type="file" name="photo3" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="categories" value="{{ trans('frontend.listings.content.categories.title') }}" />
                    @foreach($categories as $category)
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" />
                        {{ $category->name }}
                        <br />
                    @endforeach
                </div>

                <div class="mt-4">
                    <x-jet-label for="sizes" value="{{ trans('frontend.listings.content.sizes.title') }}" />
                    @foreach($sizes as $size)
                        <input type="checkbox" name="sizes[]" value="{{ $size->id }}" />
                        {{ $size->name }}
                        <br />
                    @endforeach
                </div>

                <div class="mt-4">
                    <x-jet-label for="colors" value="{{ trans('frontend.listings.content.colors.title') }}" />
                    @foreach($colors as $color)
                        <input type="checkbox" name="colors[]" value="{{ $color->id }}" />
                        {{ $color->name }}
                        <br />
                    @endforeach
                </div>

                <div class="flex items-center mt-6">
                    <x-jet-button>
                        {{ trans('frontend.listings.content.save_listing') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
