@extends('layouts.app')

@section('title', 'CMU')

@section('content')
    <div class="back-area mb-3">
        <a href="{{ route('cmu.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add CMU Details</h3>
        </div>
        <form action="{{ route('cmu.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <select name="user_id" class="form-control select2" id="user_list">
                        <option value="">Select Option</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                    <div class="validate-error">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input type="text" class="form-control" name="email" id="email" disabled>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#user_list').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'get-user-detail/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        user = response.data
								$("#name").val(user.name)
                        $("#email").val(user.email)
                    }
                })
            });
        });
    </script>

@endsection
