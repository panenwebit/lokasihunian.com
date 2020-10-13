<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

use App\Models\Faq;
use App\Models\TopLocation;
use App\Models\StatusDelete;

class PublicController extends Controller
{
    public function root(){
        // $role = Role::all();
        $top_locations = TopLocation::all();
        return view('welcome', ['top_locations'=>$top_locations]);
    }

    public function tentangKami(){
        return view('lainnya.tentang_kami');
    }

    public function hubungiKami(){
        return view('lainnya.hubungi_kami');
    }

    public function newPublicMessage(Request $request){
        DB::table('contact_us')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'question' =>$request->question,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return back()->with(['status' => 'Pesan telah terkirim.']);;
    }

    public function indexPublicMessage(){
        $publicMessages = DB::table('contact_us')->orderByRaw('Status DESC')->get();
        return view('dashboard.lainnya.contact_us.index', ['public'=>$publicMessages]);
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
        $tops = TopLocation::all();
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
