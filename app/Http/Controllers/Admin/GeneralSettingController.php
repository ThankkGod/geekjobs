<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GeneralSettingController extends Controller
{
            //Admin Application General setting
    function generalSettings(Request $request) {
        $request->validate([
            'name'=>['required', 'string', 'max:100'],
            'description'=>['nullable', 'string', 'max:150'],
            'logo'=>['required', 'image', 'mimes:jpg,jpeg,png','max:2048'],
        ]);

        $applicationSetting = new General();

       if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = $file->store('uploads', 'dir_public');
            $filePath = '/uploads/'.$fileName;
            $applicationSetting->logo = $filePath;
        }
        $applicationSetting->name = $request->name;
        $applicationSetting->description = $request->description;
        $applicationSetting->slug = Str::slug($request->name).'-'.Str::uuid();
        $applicationSetting->save();
        toastr()->success('Application settings created successfully');
        return back();
    
    } 


    function generalSettingsEdit($id){
        $generalSettingEdit  = General::findOrFail($id);
        return view('admin.general.edit', compact('generalSettingEdit'));
    }

    function generalSettingsUpdate(Request $request,$id ) {
          $request->validate([
            'name'=>['nullable', 'string', 'max:100'],
            'description'=>['nullable', 'string', 'max:150'],
            'logo'=>['nullable', 'image', 'mimes:jpg,jpeg,png','max:2048'],
        ]);

        $updateGeneralSetting =General::findOrFail($id)->first();
          if($request->hasFile('logo')){
            if(File::exists($updateGeneralSetting->logo)){
                File::delete(public_path($updateGeneralSetting->logo));
                $updateGeneralSetting->delete();
            }
            $file = $request->file('logo');
            $fileName = $file->store('uploads', 'dir_public');
            $filePath = '/uploads/'.$fileName;
            $updateGeneralSetting->logo = $filePath;
        }
        $updateGeneralSetting->name = $request->name;
        $updateGeneralSetting->description = $request->description;
        $updateGeneralSetting->slug = Str::slug($request->name).'-'.Str::uuid();
        $updateGeneralSetting->save();
        toastr()->success('Application settings updated successfully');
        return back();
    }

    function generalSettingsDestroy($id) {
        // dd($id);
        $delGeneralSetting = General::findOrFail($id);
        File::delete(public_path($delGeneralSetting->logo));
        $delGeneralSetting->delete();
        toastr()->success('Deleted successfully');
        return back();
    }
}
