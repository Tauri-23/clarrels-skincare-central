<?php

namespace App\Http\Controllers;

use App\Models\content_manage;
use App\Models\Doctors;
use Illuminate\Http\Request;

class AdminContentManagementController extends Controller
{
    public function index() {
        $content1 = content_manage::find(1);
        $content2_1 = content_manage::find(2);
        $content2_2 = content_manage::find(3);
        $content2_3 = content_manage::find(4);
        $doctors = Doctors::all();

        return view('Admin.ContentManagement.index',[
            'doctors' => $doctors,
            'content1' => $content1,
            'content2_1' => $content2_1,
            'content2_2' => $content2_2,
            'content2_3' => $content2_3,
        ]);
    }


    public function editContentPost(Request $request) {
        $content1 = content_manage::find(1);
        $message = '';
        if($request->editType == 'homeCont1') {
            $content1 = content_manage::find(1);
            $content1->title = $request->title;
            $content1->content = $request->content;

            $message = 'Home Content 1 successfully changed.';
        }

        elseif($request->editType == 'homeCont2_1') {
            $content1 = content_manage::find(2);
            $content1->title = $request->title;
            $content1->content = $request->content;

            $message = 'Home Content 2.1 successfully changed.';
        }

        elseif($request->editType == 'homeCont2_2') {
            $content1 = content_manage::find(3);
            $content1->title = $request->title;
            $content1->content = $request->content;

            $message = 'Home Content 2.2 successfully changed.';
        }

        elseif($request->editType == 'homeCont2_3') {
            $content1 = content_manage::find(4);
            $content1->title = $request->title;
            $content1->content = $request->content;

            $message = 'Home Content 2.3 successfully changed.';
        }

        if($content1->save()) {
            return response()->json([
                'status' => 200,
                'message' => $message
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
