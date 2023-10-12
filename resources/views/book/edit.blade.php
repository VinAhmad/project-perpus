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
              <form role="form" action="/book/update" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="book_id" value="{{$book->id}}">
                    <input type="hidden" name="archive_id" value="{{$archive->id}}">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    {{-- <!-- <input type="text" class="form-control" value="{{$inventory->name}}" name="inventory_name" placeholder="Enter Inventory Name"> --> --}}
                    <input type="text" class="form-control" value="{{ (old('title') == true) ? old('title') : $book->title }}" name="title" placeholder="Enter Title">
                    @if ($errors->has('title'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('title')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Author</label>
                    {{-- <!-- <input type="text" class="form-control"  value="{{$inventory->inventory_number}}" name="inventory_number" placeholder="Enter Inventory Number"> --> --}}
                    <input type="text" class="form-control"  value="{{ (old('author') == true) ? old('author') : $book->author }}" name="author" placeholder="Enter Author">
                    @if ($errors->has('author'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('author')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Year</label>
                    {{-- <!-- <input type="text" class="form-control"  value="{{$inventory->inventory_number}}" name="inventory_number" placeholder="Enter Inventory Number"> --> --}}
                    <input type="text" class="form-control"  value="{{ (old('year') == true) ? old('year') : $book->year }}" name="year" placeholder="Enter Year">
                    @if ($errors->has('year'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('year')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Publisher</label>
                    {{-- <!-- <input type="text" class="form-control"  value="{{$inventory->inventory_number}}" name="inventory_number" placeholder="Enter Inventory Number"> --> --}}
                    <input type="text" class="form-control"  value="{{ (old('publisher') == true) ? old('publisher') : $book->publisher }}" name="publisher" placeholder="Enter publisher">
                    @if ($errors->has('publisher'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('publisher')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select name="type_id" class="custom-select">
                      @foreach($type as $ty)
                        <option value="{{$ty->id}}">{{$ty->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Archive Name</label>
                    <!-- <input type="text" class="form-control"  value="{{$archive->name}}" name="archive_name" placeholder="Enter Archive Name"> -->
                    <input type="text" class="form-control"  value="{{ (old('archive_name') == true) ? old('archive_name') : $book->archive_name }}" name="archive_name" placeholder="Enter Archive Name">
                    @if ($errors->has('archive_name'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('archive_name')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Archive Number</label>
                    <!-- <input type="text" class="form-control"  value="{{$archive->archive_number}}" name="archive_number" placeholder="Enter Archive Number"> -->
                    <input type="text" class="form-control"  value="{{ (old('archive_number') == true) ? old('archive_number') : $book->archive_number }}" name="archive_number" placeholder="Enter Archive Number">
                    @if ($errors->has('archive_number'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('archive_number')}}</li>
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
