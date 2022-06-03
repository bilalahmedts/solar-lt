<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
class CampaignController extends Controller
{
    public function index()
    {
        $campaign = Campaign::sortable()->paginate(10);
        return view('campaigns.index', (compact('campaign')));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(CampaignRequest $request)
    {
        Campaign::create($request->all());
        Session::flash('success', 'Campaign created successfully!');
        return redirect()->route('campaigns.index');
    }

    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(CampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());
        Session::flash('success', 'campaign updated successfully!');
        return redirect()->route('campaigns.index');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        Session::flash('success', 'Campaign deleted successfully!');
        return back();
    }
}
