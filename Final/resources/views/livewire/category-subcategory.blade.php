{{-- <div>
<select name="" id="" class="form-control" wire::model.live="selectedCategory">
<option value="">select category</option>
@foreach ($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>

@endforeach

</select></div> --}}
<div>
    <select class="form-control" wire:model.live="selectedCategory">
        <option value="">Select category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <div class="mt-2">
        Selected Category ID: {{ $selectedCategory }}
    </div>

<select class="form-control" wire:model.live="selectedCategory">
    <option value="">Select sub category</option>
    @foreach ($subcategories as $subcategory)
        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
    @endforeach
</select>


</div>

