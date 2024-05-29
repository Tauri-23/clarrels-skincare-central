<?php

namespace App\Http\Controllers;

use App\Models\content_manage;
use App\Models\Doctors;
use App\Models\why_clarrel_content;
use Illuminate\Http\Request;

class AdminContentManagementController extends Controller
{
    public function index() {
        $content1 = content_manage::find(1);
        $content2_1 = content_manage::find(2);
        $content2_2 = content_manage::find(3);
        $content2_3 = content_manage::find(4);
        $whyClarrels = why_clarrel_content::all();
        $doctors = Doctors::all();

        return view('Admin.ContentManagement.index',[
            'doctors' => $doctors,
            'content1' => $content1,
            'content2_1' => $content2_1,
            'content2_2' => $content2_2,
            'content2_3' => $content2_3,
            'whyClarrels' => $whyClarrels,
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

        else {
            return response()->json([
                'status' => 200,
                'message' => 'Invalid Request.'
            ]);
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


    public function editWhyClarrels(Request $request) {
        $whyClarrel = why_clarrel_content::find($request->id);

        $whyClarrel->content = $request->content;

        if($whyClarrel->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Success'
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
