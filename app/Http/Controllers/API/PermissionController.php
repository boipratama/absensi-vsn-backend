<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //store
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'reason' => 'required',
            'is_approved' => 'required',
        ]);

        $permission = new Permission();
        $permission->user_id = $request->user()->id;
        $permission->date_permission = $request->date;
        $permission->reason = $request->reason;
        $permission->is_approved = 0;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/permissions', $image->hashName());
            $permission->image = $image->hashName();


        }
        $permission->save();

        return response()->json(['message' => 'Permission request submitted successfully'],201);
    }
}
