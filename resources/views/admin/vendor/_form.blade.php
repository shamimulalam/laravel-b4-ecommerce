
<div class="form-group">
    <label class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input name="name" value="{{ old('name',isset($vendor->name)?$vendor->name:null) }}" type="text" class="form-control" placeholder="Name">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input name="email" value="{{ old('email',isset($vendor->email)?$vendor->email:null) }}" type="email" class="form-control" placeholder="Email">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="example-email">Address</label>
    <div class="col-md-10">
        <textarea  name="address" class="form-control" placeholder="vendor address" >{{old('address',isset($vendor->address)?$vendor->address:null)}}</textarea>
        @error('address')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label">Vendor Status</label>
    <div class="col-sm-10">
        <select name="status" class="form-control">
            <option @if(old('status',isset($vendor->status)?$vendor->status:null) == 'active') selected @endif value="active">Active</option>
            <option @if(old('status',isset($vendor->status)?$vendor->status:null) == 'inactive') selected @endif value="inactive">Inactive</option>
        </select>
    </div>
</div>

