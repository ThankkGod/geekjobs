<?php

namespace App\Http\Controllers;

use App\Models\SendAgentRequest;
use Illuminate\Http\Request;

class SendRequestController extends Controller
{
    function create() {
        return view('request.agent-create');
    }

    function store(Request $request) {
        $request->validate([
            'company_name' => ['required', 'string', 'max:100'],
            'company_email' => ['required', 'string', 'email', 'unique:send_agent_requests,company_email'],
            'company_phone' => ['required', 'numeric'],
            'company_message' => ['required', 'string', 'max:900'],
        ]);

        $agentRequest = SendAgentRequest::create([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_phone' => $request->company_phone,
            'company_message' => $request->company_message,
        ]);

        toastr()->success('Your request submitted successfully');
        return back();
    }

}
