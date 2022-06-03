@extends('layouts.app')

@section('title', 'Campaigns')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Campaigns List</h3>
            <div class="card-tools">
                <a href="{{ route('campaigns.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add Campaign
                </a>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>@sortablelink('hrms_id', 'HRMSID')</th>
                        <th>@sortablelink('name', 'Name')</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($campaign) > 0)

                        @foreach ($campaign as $camp)
                            <tr>
                                <td>{{ $camp->hrms_id ?? 'undefined' }}</td>
                                <td>{{ $camp->name ?? 'undefined' }}</td>
                                <td>
                                    @if ($camp->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('campaigns.edit', $camp) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('campaigns.destroy', $camp) }}" class="btn btn-primary btn-sm"><i
                                                class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No record found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if ($campaign->total() > 4)
            <div class="card-footer clearfix">
                {{ $campaign->appends(request()->input())->links() }}
            </div>
        @endif

    </div>



@endsection
