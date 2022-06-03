@extends('layouts.app')

@section('title', 'Campaigns')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('campaigns.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Campaign</h3>
    </div>

    <form action="{{ route('campaigns.update', $campaign) }}" method="post" autocomplete="off">
        @csrf
        @method("put")
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Campaign Name</label>
                <input type="text" class="form-control" name="name" value="{{ $campaign->name }}" placeholder="Enter Campaign Name" required>
            </div>
            @error('name')
                <div class="validate-error">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Select Status</label>
                <select name="status" class="form-control select2" required>
                    <option value="1" @if($campaign->status == 1) selected @endif>Active</option>
                    <option value="0" @if($campaign->status == 0) selected @endif>Inactive</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-footer-->

    </form>
</div>
<!-- /.card -->

@endsection
