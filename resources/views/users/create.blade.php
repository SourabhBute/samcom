@extends('layouts.app')

@section("content")

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                       <form action="{{route("users.store")}}" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">

                                @error("name")
                                  <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" name="email">

                                @error("email")
                                  <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select class="form-control" id="role" name="role">
                                  <option value="">Select Role</option>
                                  <option value="supplier">Supplier</option>
                                  <option value="reseller">Reseller</option>
                                </select>
                                @error("role")
                                  <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="profile_image">Profile Image:</label>
                                <input type="file" class="form-control-file" id="profile_image" name="profile_image" accept="image/png,image/jpg,image/jpeg">
                                @error("profile_image")
                                  <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                @error("address")
                                <p class="text-danger"> {{$message}}</p>
                              @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contact_no" class="form-label">Contact Number :</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no">
                                @error("contact_no")
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
