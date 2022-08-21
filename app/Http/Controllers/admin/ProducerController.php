<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producer;

class ProducerController extends Controller
{
    public function index()
    {
        $data = Producer::get();
        return view('admin.producer.index',compact('data'));
    }

    public function create()
    {
        $producers = Producer::get();
        return view('admin.producer.create', compact('producers'));
    }

    public function saveP(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
        ]);

        $producer = new Producer();
        $producer->producerID = $request->id;
        $producer->producerName = $request->name;
        $producer->save();
        return redirect()->back()->with('success', 'Producer added successfully!');
    }

    public function deleteP($id)
    {
        $data = Producer::where('producerID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Producer removed successfully!');
    }
    public function editP($id)
    {
        $producers= Producer::get();
        $data = Producer::where('producerID', '=', $id)->first();
        return view('admin/producer/editP', compact('data','producers'));
    }

    public function updateP(Request $request)
    {

        $producerID = $request->id;
        $producerName = $request->name;
        Producer::where('producerID', '=', $producerID)->update([
            'producerName'=>$producerName,
        ]);
        return redirect()->back()->with('success', 'Producer update successfully!');
    }
}
