@extends('admin.layouts.auth-template')
@section('title')
  Cancel Requests
@endsection
@section('content')
  <div class="row mt-5 mb-3">
    <div class="col">
      <h2>{{ __('Cancel Requests List') }}</h2>
    </div>
  </div>
  <table class="table table-hover">
    <tr>
      <th>#</th>
      <th>Full Name</th>
      <th>Email Address</th>
      <th>Actions</th>
    </tr>
    @foreach($requests as $key => $request)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $request->name }}</td>
        <td>{{ $request->email }}</td>
        <td>
          <form action="{{ route('admin.subscriptions.cancel', ['userId' => $request->id]) }}" method="POST"
                class="d-inline-block">
            @csrf
            <button class="btn btn-sm btn-danger border-0"><i class="fa fa-trash"></i> Cancel Subscription</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
@endsection