<?php

namespace App\Http\Controllers;

use App\Models\content_manage;
use App\Models\Doctors;
use Illuminate\Http\Request;

class AdminContentManagementController extends Controller
{
    public function index() {
        $content1 = content_manage::find(1);
        $doctors = Doctors::all();

        return view('Admin.ContentManagement.index',[
            'doctors' => $doctors,
            'content1' => $content1
        ]);
    }


    public function editContentPost(Request $request) {
        if($request->editType == 'homeCont1') {
            $content1 = content_manage::find(1);
            $content1->title = $request->title;
            $content1->content = $request->content;

            if($content1->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Home Content 1 successfully changed.'
                ]);
            }
            else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Something went wrong please try again later.'
                ]);
            }
        }
    }
}
