@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">{{$title}}</h1>
        </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <form role="form" action="/type/update" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{$data->id}}">
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <!-- <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Enter Name"> -->
                    <input type="text" class="form-control" value="{{ (old('name') == true) ? old('name') : $data->name }}" name="name" placeholder="Enter Name">
                    @if ($errors->has('name'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('name')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Code</label>
                    <!-- <input type="text" class="form-control"  value="{{$data->code}}" name="code" placeholder="Enter Code"> -->
                    <input type="text" class="form-control"  value="{{ (old('code') == true) ? old('code') : $data->code }}" name="code" placeholder="Enter Code">
                    @if ($errors->has('code'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('code')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
