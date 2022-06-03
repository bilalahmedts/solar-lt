@extends('layouts.app')

@section('title', 'Voice Evaluations')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="back-area mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Voice Evaluations</h3>
        </div>
        <form action="{{-- {{ route('voice-evaluations.store') }} --}}" method="post" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Agent Name</label>
                            <select name="user_id" class="form-control select2">
                                <option value="">Select Option</option>
                                {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="exampleInputEmail1">Reporting To</label>
                        <input type="text" class="form-control" name="reporting_to" placeholder="Enter Reporting To"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Campaign Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Campaign Name" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Record Id</label>
                        <input type="text" class="form-control" name="record_id" placeholder="Enter Record Id" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Call Date</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Call Date" required>
                    </div>

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

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Datapoints</h3>
            <div class="card-tools">
                <a href="{{ route('voice-evaluations.categories.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Create Category
                </a>
            </div>
        </div>

        <div class="card-body">


            @if (count($categories) > 0)

                @foreach ($categories as $category)
                    <div class="row">
                        <div class="col-md-11">
                            <h3>{{ $category->name ?? 'undefined' }}</h3>
                        </div>
                        <div class="col-md-1">
                            <table>
                                <tr>
                                    <td><a href="{{ route('voice-evaluations.datapoints.create', $category->id) }}"
                                            class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a></td>
                                    <td><a href="{{ route('voice-evaluations.categories.edit', $category->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a></td>
                                    <td><a href="{{ route('voice-evaluations.categories.destroy', $category->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <table class="table">
                        <tbody>
                            @foreach ($category->datapoints as $datapoint)
                                <tr>
                                    <td width="15%">{{ $datapoint->name }}</td>
                                    <td>{{ $datapoint->question }}</td>
                                    <td width="8%"><a
                                            href="{{ route('voice-evaluations.datapoints.edit', $datapoint->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('voice-evaluations.datapoints.destroy', $datapoint->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>



                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            @else
                <h4 class="text-center">No record found!</h4>
            @endif

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Evaluations</h3>
        </div>
        <form action="{{-- {{ route('voice-evaluations.store') }} --}}" method="post" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Percentage</label>
                        <input type="text" class="form-control" name="percentage" placeholder="Enter Percentage" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" placeholder="Enter Customer Name"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Customer Phone</label>
                        <input type="text" class="form-control" name="customer_phone" placeholder="Enter Customer Phone"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Record Duration</label>
                        <input type="text" class="form-control" name="recording_duartion"
                            placeholder="Enter Record Duartion" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Recording Link</label>
                        <input type="text" class="form-control" name="recording_link" placeholder="Enter Recording Link"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Reporting to</label>
                        <input type="text" class="form-control" name="reporting_to" placeholder="Enter Reporting to"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Agent Name</label>
                            <select name="outcome" class="form-control select2">
                                <option value="">Select Option</option>
                                {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Outcome</label>
                            <select name="outcome" class="form-control select2">
                                <option value="">Select Option</option>
                                {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea class="form-control" rows="3" name="notes"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-footer-->
        </form>
    </div>
@endsection
