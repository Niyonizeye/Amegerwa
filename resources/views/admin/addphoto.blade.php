@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
       <div class="content-div">
            <form method="POST" action="{{ route('addphoto') }}" enctype="multipart/form-data">
                @csrf
                <label class="mb-3" for="">Please select content for Upload</label>
                <div class="mb-3">
                    <input class="form-control" type="file" name="url" id="formFile">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Enter Figure Caption" name="caption" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary auth-btn">
                    {{ __('Add Photo') }}
                </button>
            </form>
       </div>
    </div>
</div>
@endsection
