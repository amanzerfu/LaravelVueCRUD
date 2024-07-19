@extends('layouts.master')
@section('content')
<h1>Edit Department</h1>
<form action="{{route('departmentsupdate',$department->id)}}"  method = "POST">
    @csrf
<div class="row">
    <div class="col-md-6">
       <div class="form-group">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name" value="{{$department->name}}">
    </div>
    </div>
    <div class="col-md-6">
       <div class="form-group">
        <label for="director_id">Director </label>
        <select name="director_id" class="form-control">
            <option value="0" selected>Select Department</option>
            <option value="1" @if($department->department_id =='1') selected @endif>IT Department</option>
            <option value="2" @if($department->department_id =='2') selected @endif>HR Department</option>
        </select>
    </div>

    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="form-froup">
                <button type="submit" class="btn btn-success float-right">Edit
                </button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection