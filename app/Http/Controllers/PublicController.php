<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

use App\Models\Faq;
use App\Models\Top_Location;
use App\Models\Status_Delete;

class PublicController extends Controller
{
    public function root(){
        // $role = Role::all();
        return view('welcome');
    }

    public function tentangKami(){
        return view('lainnya.tentang_kami');
    }

    public function hubungiKami(){
        return view('lainnya.hubungi_kami');
    }

    public function faq(){
        $faqs = Faq::all();
        return view('lainnya.faq', ['faqs'=>$faqs]);
    }

    public function indexFaq(){
        $faqs = Faq::all();
        return view('dashboard.lainnya.faq.index', ['faqs'=>$faqs]);
    }

    public function createFaq(){
        return view('dashboard.lainnya.faq.create');
    }

    public function storeFaq(Request $request){
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect('dashboard/faq/index');
    }

    public function editFaq($id){
        $faq = Faq::findOrFail($id);
        return view('dashboard.lainnya.faq.edit', ['faq'=>$faq]);
    }

    public function updateFaq(Request $request){
        $faq = Faq::find($request->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect('dashboard/faq/index');
    }

    public function deleteFaq($id){
        $faq = Faq::find($id);
        $faq->delete();
        return back();
    }

    public function simulasiKPR(){
        return view('lainnya.simulasi');
    }

    public function indexTop(){
        $tops = Top_Location::all();
        return view('dashboard.lainnya.top_location.index', ['tops'=>$tops]);
    }

    public function createTop(){
        return view('dashboard.lainnya.top_location.create');
    }

    public function storeTop(Request $request){

        $request->validate([
            'location' => ['required', 'unique:top_locations'],
        ]);

        $top = new Top_location;
        $top->location_name = $request->nama_lokasi;
        $top->location = $request->location;
        $top->save();

        return redirect('dashboard/top_location/index');
    }

    public function editTop($id){
        $top = Top_location::findOrFail($id);
        return view('dashboard.lainnya.top_location.edit', ['top'=>$top]);
    }

    public function updateTop(Request $request){
        $request->validate([
            'location' => ['required', 'unique:top_locations'],
        ]);

        $top = Top_location::find($request->id);
        $top->location_name = $request->nama_lokasi;
        $top->location = $request->location;
        $top->save();

        return redirect('dashboard/top_location/index');
    }

    public function deleteTop($id){
        $top = Top_location::find($id);
        $top->delete();
        return back();
    }
}
