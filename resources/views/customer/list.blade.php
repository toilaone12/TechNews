@extends('dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card-header ">
            <h4 class="card-title">{{$title}}</h4>
        </div>
        <table class="table table-striped w-100 mt-3">
            <thead>
                <tr>
                    <th width="100">STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $key => $customer)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$customer->fullname_user}}</td>
                    <td>{{$customer->email_user}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection