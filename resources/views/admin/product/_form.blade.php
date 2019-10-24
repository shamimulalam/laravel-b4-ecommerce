<div class="form-group">
    <label class="col-sm-2 control-label">Product Category</label>
    <div class="col-sm-10">
        <select name="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{$category->name}}</option>
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
                <option value="{{ $vendor->id }}">{{$vendor->name}}</option>
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
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Image</label>
    <div class="col-md-10">
        <input type="file" class="form-control" multiple name="image[]">
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        @if(isset($product) && $product->image != null)
            <img src="{{ asset($product->image) }}" width="20%">
        @endif
    </div>
</div>
