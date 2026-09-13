<?php

namespace App\Http\Controllers;

use App\Models\SendAgentRequest;
use Illuminate\Http\Request;

class IsAgentRequestController extends Controller
{
    function index(Request $request) {
            $acceptAgentRequests = SendAgentRequest::when($request->filled('search'), function($query)use($request){
                $query->where(function($query)use($request){
                $query->where('company_name', 'LIKE', "%$request->has('search')%");
                });
            })->latest()->get();
        return view('accept-request.index', compact('acceptAgentRequests'));
    }

    function destroy(Request $request, $id) {
        $deleteRequest = SendAgentRequest::findOrFail($id);
        $deleteRequest->delete();
        toastr()->success('Deleted successfully');
        return back();
    }



}
