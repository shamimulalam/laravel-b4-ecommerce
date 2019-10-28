<div class="form-group">
    <label class="col-sm-2 control-label">Product Category</label>
    <div class="col-sm-10">
        <select name="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option @if(old('category_id',isset($product->category_id)?$product->category_id:null) == $category->id) selected @endif value="{{ $category->id }}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Vendor</label>
    <div class="col-sm-10">
        <select name="vendor_id" class="form-control">
            <option value="">Select Vendor</option>
            @foreach($vendors as $vendor)
                <option @if(old('vendor_id',isset($product->vendor_id)?$product->vendor_id:null) == $vendor->id) selected @endif value="{{ $vendor->id }}">{{$vendor->name}}</option>
            @endforeach
        </select>
        @error('vendor_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror</div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input name="name" value="{{ old('name',isset($product->name)?$product->name:null) }}" type="text" class="form-control" placeholder="Name">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Brand Name</label>
    <div class="col-md-10">
        <input name="brand" value="{{ old('brand',isset($product->brand)?$product->brand:null) }}" type="text" class="form-control" placeholder="Brand name">
        @error('brand')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="example-email">Description</label>
    <div class="col-md-10">
        <textarea  name="description" class="form-control" placeholder="Product Description" >{{old('description',isset($product->description)?$product->description:null)}}</textarea>
        @error('description')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

    <div class="form-group">
        <label class="col-md-2 control-label">Unit Price</label>
        <div class="col-md-10">
            <input value="{{ old('unit_price',isset($product->unit_price)?$product->unit_price:null) }}" name="unit_price" min="1" step="0.1" type="number" class="form-control" placeholder="Unit Price">
            @error('unit_price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
    <label class="col-md-2 control-label">Stock</label>
    <div class="col-md-10">
        <input value="{{ old('stock',isset($product->stock)?$product->stock:null) }}" name="stock" type="number" min="1" class="form-control" placeholder="Stock">
        @error('stock')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Product Status</label>
    <div class="col-sm-10">
        <select name="status" class="form-control">
            <option  @if(old('status',isset($product->status)?$product->status:null) == 'active') selected @endif value="active">Active</option>
            <option  @if(old('status',isset($product->status)?$product->status:null) == 'inactive') selected @endif value="inactive">Inactive</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Featured</label>
    <div class="col-sm-10">
        <label class="form-check-label">
            <input @if(old('is_featured',isset($product->is_featured)?$product->is_featured:null) == 1) checked @endif value="1" type="radio" class="form-radio-input" name="is_featured" id="is_featured">
            Yes
            <input @if(old('is_featured',isset($product->is_featured)?$product->is_featured:null) == 0) checked @endif value="0" type="radio" class="form-radio-input" name="is_featured" id="is_featured">
            No
        </label>
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

@if(!isset($product))
    <div class="form-group">
        <label class="col-md-2 control-label">Image</label>
        <div class="col-md-10">
            <input type="file" class="form-control" multiple name="image[]">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endif



