@extends('admin.topics.layouts')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class=" flex justify-center text-2xl"> Show Topics</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.topics.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
              <a href="{{ $topics->title }}"></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
               <a href=" {{ $topics->Description }}"></a>
            </div>
        </div>
    </div>
@endsection
 