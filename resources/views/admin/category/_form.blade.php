<div class="form-group">
    <label class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input name="name" value="{{ old('name',isset($category->name)?$category->name:null) }}" type="text" class="form-control" placeholder="Category Name">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="example-email">Description</label>
    <div class="col-md-10">
        <textarea  name="description" class="form-control" placeholder="Category Description" >{{old('description',isset($category->description)?$category->description:null)}}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Category Status</label>
    <div class="col-sm-10">
        <select name="status" class="form-control">
            <option @if(old('status',isset($category->status)?$category->status:null) == 'active') selected @endif value="active">Active</option>
            <option @if(old('status',isset($category->status)?$category->status:null) == 'inactive') selected @endif value="inactive">Inactive</option>
        </select>
    </div>
</div>
