<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    //

    public function index()
    {
        $data = array(
            'list' => DB::table('task_table')->get(),
        );

        return view('index', $data);
    }

    public function addtask(Request $request)
    {
        $request->validate(['task_name' => 'required',]);

        $query = DB::table('task_table')->insert([
            'taskName' => $request->input('task_name'),
        ]);

        if ($query) {
            return back()->with('success', ' task saved');
        } else {
            return back()->with('error', 'Task failed to upload &times; ');
        }
    }

    public function delete($id)
    {
        $delete = DB::table('task_table')
            ->where('id', $id)
            ->delete();
        return redirect('/');
    }
}
