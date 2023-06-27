@extends('layouts.app')

@section('content')

<div class="container py-5">

    @if(Session::has('message'))
       <h5 class="alert alert-success">{{Session::get('message') }}</h5>
    @endif
    <h1>
        <a href="{{route('users.create')}}" class="btn btn-primary float-right mb-2" > Add User </a>
    </h1>


    <table class="table table-bordered data-table">
        <thead>
            <tr>

                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Contact Number</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


@push("script")

<script type="text/javascript">
    $(function () {

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('users.index') }}",
          columns: [

              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'role_type', name: 'role_type'},
              {data: 'role.contact_no', name: 'contact_no',searchable:false},
              {data: 'role.address', name: 'address', searchable:false},

          ]
      });

    });
  </script>


@endpush

@endsection
