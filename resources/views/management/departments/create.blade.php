@extends('layouts.master')
@section('content')
<h1>Create New Department</h1>
<form action="{{route('departmentsStore')}}"  method = "POST">
    @csrf
<div class="row">
    <div class="col-md-6">
       <div class="form-group">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name">
    </div>
    </div>
    <div class="col-md-6">
       <div class="form-group">
        <label for="department_id">Director </label>
        <select name="department_id" class="form-control">
            <option value="" selected>Select Department</option>
            <option value="1">IT Department</option>
            <option value="2">HR Department</option>
        </select>
    </div>

    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="form-froup">
                <button type="submit" class="btn btn-success float-right">Save
                </button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection