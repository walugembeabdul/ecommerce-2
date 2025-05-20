{{-- <div>
<select name="" id="" class="form-control" wire::model.live="selectedCategory">
<option value="">select category</option>
@foreach ($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>

@endforeach

</select></div> --}}
<div>
    <label for="category_id" class="fw-bold mb-2"> select category id for your product</label>
    <select class="form-control mb-2 p-2" wire:model.live="selectedCategory" name="category_id">
        <option value="">Select category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <label for="subcategory_id" class="fw-bold mb-2"> select subcategory id for your product</label>
<select class="form-control" wire:model="sub_category_id" name="sub_category_id">
    <option value="">Select sub category</option>
    @foreach ($subcategories as $subcategory)
        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
    @endforeach
</select>


</div>

