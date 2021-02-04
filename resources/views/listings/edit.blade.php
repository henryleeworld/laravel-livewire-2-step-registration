<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('frontend.listings.content.edit_listing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('listings.update', $listing) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-jet-label for="title" value="{{ trans('frontend.listings.content.title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$listing->title" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="description" value="{{ trans('frontend.listings.content.description') }}" />
                    <textarea id="price" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description">{{ $listing->description }}</textarea>
                </div>

                <div class="mt-4">
                    <x-jet-label for="price" value="{{ trans('frontend.listings.content.price') }}" />
                    <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price" :value="$listing->price" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="photo1" value="{{ trans('frontend.listings.content.photo_1') }}" />
                    @if (isset($media[0]))
                        <div class="mt-2 mb-4" >
                        <img src="{{ $media[0]->getUrl('thumb') }}" />
                        <a class="underline"
                           href="{{ route('listings.deletePhoto', [$listing->id, $media[0]->id]) }}"
                           onclick="return confirm('{{ trans('frontend.listings.content.are_you_sure') }}')">{{ trans('frontend.listings.content.delete_photo') }}</a>
                            <br />
                        </div>
                    @endif
                    <input type="file" name="photo1" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="photo2" value="{{ trans('frontend.listings.content.photo_2') }}" />
                    @if (isset($media[1]))
                        <div class="mt-2 mb-4" >
                            <img src="{{ $media[1]->getUrl('thumb') }}" />
                            <a class="underline"
                               href="{{ route('listings.deletePhoto', [$listing->id, $media[1]->id]) }}"
                               onclick="return confirm('{{ trans('frontend.listings.content.are_you_sure') }}')">{{ trans('frontend.listings.content.delete_photo') }}</a>
                            <br />
                        </div>
                    @endif
                    <input type="file" name="photo2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="photo3" value="{{ trans('frontend.listings.content.photo_3') }}" />
                    @if (isset($media[2]))
                        <div class="mt-2 mb-4" >
                            <img src="{{ $media[2]->getUrl('thumb') }}" />
                            <a class="underline"
                               href="{{ route('listings.deletePhoto', [$listing->id, $media[2]->id]) }}"
                               onclick="return confirm('{{ trans('frontend.listings.content.are_you_sure') }}')">{{ trans('frontend.listings.content.delete_photo') }}</a>
                            <br />
                        </div>
                    @endif
                    <input type="file" name="photo3" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="categories" value="{{ trans('frontend.listings.content.categories.title') }}" />
                    @foreach($categories as $category)
                        <input
                            type="checkbox"
                            name="categories[]"
                            value="{{ $category->id }}"
                            @if (in_array($category->id, $listing->categories->pluck('id')->toArray()))
                                checked
                            @endif />
                        {{ $category->name }}
                        <br />
                    @endforeach
                </div>

                <div class="mt-4">
                    <x-jet-label for="sizes" value="{{ trans('frontend.listings.content.sizes.title') }}" />
                    @foreach($sizes as $size)
                        <input
                            type="checkbox"
                            name="sizes[]"
                            value="{{ $size->id }}"
                            @if (in_array($size->id, $listing->sizes->pluck('id')->toArray()))
                            checked
                            @endif />
                        {{ $size->name }}
                        <br />
                    @endforeach
                </div>

                <div class="mt-4">
                    <x-jet-label for="colors" value="{{ trans('frontend.listings.content.colors.title') }}" />
                    @foreach($colors as $color)
                        <input
                            type="checkbox"
                            name="colors[]"
                            value="{{ $color->id }}"
                            @if (in_array($color->id, $listing->colors->pluck('id')->toArray()))
                            checked
                            @endif />
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
