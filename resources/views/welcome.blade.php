@extends('layouts.app')

@section('title', 'Houzeo')

@section('navbar')
    @parent

@endsection

@section('content')
  

   <div class="row">
<div class="col-6 mx-auto p-4 m-5 border-light shadow-sm">
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div class="col-md-12" s>
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
     </div>
     </div>

      @elseif(session('error'))
     <div class="alert alert-warning" role="alert">
        {{ session('error') }}
     </div>
     @endif

<h3 class="pb-3">Sign Up </h3>
<div class="form-style">
<form action="{{Route('create-user')}}" method="post">
          @csrf
        <div class="form-group pb-3">
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
        </div>
        <div class="form-group pb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
        </div>
         <div class="form-group pb-3">
            <input type="number" name="phone" class="form-control" placeholder="Mobile" value="{{old('phone')}}">
        </div>
        <div class="form-group pb-3">
            <input type="text" name="address" class="form-control" placeholder="Address" value="{{old('address')}}">
        </div>
         <div class="form-group pb-3">
            <input type="text" name="city" class="form-control" placeholder="City"  value="{{old('city')}}">
        </div>
        <div class="form-group pb-3">
            <input type="text" name="state" class="form-control" placeholder="State" value="{{old('state')}}">
        </div>
         <div class="form-group pb-3">
            <input type="number" name="zip" class="form-control" placeholder="Zip Code" value="{{old('zip')}}">
        </div>
        <div class="form-group pb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
        </div>
       <div class="pb-2">
          <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Sign up</button>
       </div>
</form>


</div>

</div>
</div>
@endsection