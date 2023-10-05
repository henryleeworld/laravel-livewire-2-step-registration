<span class="ml-2 mr-2">
    <input type="checkbox" name="saved" @if (request('saved')) checked @endif /> {{ __('Saved') }} ({{ $savedAmount }})
</span>
