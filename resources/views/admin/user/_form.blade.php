<div class="form-group">
    <label class="col-md-2 control-label">Role</label>
    <div class="col-md-10">
        <select class="form-control" name="role" id="role">
            <option value="">Select</option>
            <option @if(old('role',isset($user->role)?$user->role:null) == \App\User::ROLE_ADMIN) selected @endif value="{{ \App\User::ROLE_ADMIN }}">Admin</option>
            <option @if(old('role',isset($user->role)?$user->role:null) == \App\User::ROLE_MANAGER) selected @endif value="{{ \App\User::ROLE_MANAGER }}">Manager</option>
        </select>
        @error('role')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input name="name" value="{{ old('name',isset($user->name)?$user->name:null) }}" type="text" class="form-control" placeholder="Name">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="example-email">Email</label>
    <div class="col-md-10">
        <input @isset($user) disabled @endisset type="email" value="{{ old('email',isset($user->email)?$user->email:null) }}" id="example-email" name="email" class="form-control" placeholder="Email">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
@if(!isset($user))
    <div class="form-group">
        <label class="col-md-2 control-label">Password</label>
        <div class="col-md-10">
            <input name="password" type="password" class="form-control" placeholder="Password">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Confirm Password</label>
        <div class="col-md-10">
            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
        </div>
    </div>
@endif
<div class="form-group">
    <label class="col-md-2 control-label">Image</label>
    <div class="col-md-10">
        <input type="file" class="form-control" name="image">
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        @if(isset($user) && $user->image != null)
            <img src="{{ asset($user->image) }}" width="20%">
        @endif
    </div>
</div>