<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Faq;
use App\Models\FollowUp;
use App\Models\Property;
use App\Models\TopLocation;
use App\Models\UserActivity;
use App\Models\StatusDelete;

class PublicController extends Controller
{
    public function root(){
        // $role = Role::all();
        $property = Property::where('property_status', 'Live')->orderBy('updated_at', 'desc')->limit(6)->get();
        $top_locations = TopLocation::all();
        return view('welcome', ['top_locations'=>$top_locations, 'property'=>$property]);
    }

    public function dashboard(){
        $user = Auth::user();
        $role = $user->getRoleNames()[0];

        UserActivity::create([
            'do'    => 'Dashboard',
            'description'      => 'Mengakses '.$role.' Dashboard',
            'route'        => '/dashboard',
            'username'      =>auth()->user()->username
        ]);

        if($role=='Owner'){

            return view('dashboard.dashboard_owner');
            
        } else if($role=='Admin'){
            
            return view('dashboard.dashboard_admin');
            
        } else if($role=='Agen Independen' || $role=='Agen Perusahaan' || $role=='Developer' || $role=='Pemilik Properti'){
            $property_count = Property::where('username', $user->username)->count();
            $property_aktif_count = Property::where('username', $user->username)->where('property_status', 'Live')->count();
            
            return view('dashboard.dashboard_agen_developer', ['property_count'=>$property_count, 'property_aktif_count'=> $property_aktif_count]);
            
        } else if($role=='Sales'){
            $follup_all_count = FollowUp::where('admin_username', auth()->user()->username)->count();
            $follup_this_month_count = FollowUp::where('admin_username', auth()->user()->username)->where('updated_at','like', '%'.date('Y-m').'%')->count();
            $follup_success_count = FollowUp::where('admin_username', auth()->user()->username)->where('handphone_registered', 'yes')->count();
            $follup_success_this_month_count = FollowUp::where('admin_username', auth()->user()->username)->where('handphone_registered', 'yes')->where('updated_at','like', '%'.date('Y-m').'%')->count();
            $data = array(
                'follup_all_count' => $follup_all_count,
                'follup_this_month_count' => $follup_this_month_count,
                'follup_success_count' => $follup_success_count,
                'follup_success_this_month_count'=> $follup_success_this_month_count,
            );
            return view('dashboard.dashboard_sales', $data);
        }
    }

    public function tentangKami(){
        $user = Auth::user();
        if($user){
            UserActivity::create([
                'do'    => 'Lihat-Tentang-Kami',
                'description'      => 'Mengakses halaman tentang kami',
                'route'        => '/tentang_kami',
                'username'      =>auth()->user()->username
            ]);
        }
        return view('lainnya.tentang_kami');
    }

    public function hubungiKami(){
        $user = Auth::user();
        if($user){
            UserActivity::create([
                'do'    => 'Lihat-Hubungi-Kami',
                'description'      => 'Mengakses halaman hubungi kami',
                'route'        => '/hubungi_kami',
                'username'      =>auth()->user()->username
            ]);
        }
        $site = DB::table('site_setting')->where('id', 1)->first();
        return view('lainnya.hubungi_kami', ['site'=>$site]);
    }

    public function kebijakanPrivasi(){
        $user = Auth::user();
        if($user){
            UserActivity::create([
                'do'    => 'Lihat-Kebijakan-Privasi',
                'description'      => 'Mengakses halaman kebijakan privasi',
                'route'        => '/kebijakan_privasi',
                'username'      =>auth()->user()->username
            ]);
        }
        $site = DB::table('site_setting')->where('id', 1)->first();
        return view('lainnya.kebijakan_privasi', ['site'=>$site]);
    }

    public function syaratPenggunaan(){
        $user = Auth::user();
        if($user){
            UserActivity::create([
                'do'    => 'Lihat-Syarat-Penggunaan',
                'description'      => 'Mengakses halaman Syarat Penggunaan',
                'route'        => '/syarat_penggunaan',
                'username'      =>auth()->user()->username
            ]);
        }
        $site = DB::table('site_setting')->where('id', 1)->first();
        return view('lainnya.syarat_penggunaan', ['site'=>$site]);
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
        UserActivity::create([
            'do'    => 'Data-Contact-US',
            'description'      => 'Melihat daftar pesan yang dikirimkan oleh publik.',
            'route'        => '/dashboard/public/hubungi_kami',
            'username'      =>auth()->user()->username
        ]);
        $publicMessages = DB::table('contact_us')->orderByRaw('Status DESC')->get();
        return view('dashboard.lainnya.contact_us.index', ['publics'=>$publicMessages]);
    }

    public function publicMessageDetail($id) {
        UserActivity::create([
            'do'    => 'Detail-Contact-US',
            'description'      => 'Melihat detail pesan yang dikirimkan oleh publik dengan ID '.$id,
            'route'        => '/dashboard/public/hubungi_kami/'.$id,
            'username'      =>auth()->user()->username
        ]);

        DB::table('contact_us')->where('id', $id)->update(['status'=>'Read']);
        $publicMessage = DB::table('contact_us')->where('id', $id)->first();
        return view('dashboard.lainnya.contact_us.detail', ['public'=>$publicMessage]);
    }

    public function faq(){
        $user = Auth::user();

        if($user){
            UserActivity::create([
                'do'    => 'Lihat-Faq',
                'description'      => 'Melihat Faq',
                'route'        => '/faq',
                'username'      =>auth()->user()->username
            ]);
        }

        $faqs = Faq::all();
        return view('lainnya.faq', ['faqs'=>$faqs]);
    }

    public function indexFaq(){
        UserActivity::create([
            'do'    => 'List-Faq',
            'description'      => 'Melihat Daftar Faq',
            'route'        => '/dashboard/faq/index',
            'username'      =>auth()->user()->username
        ]);

        $faqs = Faq::all();
        return view('dashboard.lainnya.faq.index', ['faqs'=>$faqs]);
    }

    public function createFaq(){
        return view('dashboard.lainnya.faq.create');
    }

    public function storeFaq(Request $request){
        $request->validate([
            'question' => ['required', 'unique:faqs'],
            'answer' => ['required'],
        ]);

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        UserActivity::create([
            'do'    => 'Tambah-Faq',
            'description'      => 'Menambah Faq Baru',
            'route'        => '/dashboard/faq/create',
            'username'      =>auth()->user()->username
        ]);

        return redirect('dashboard/faq/index');
    }

    public function editFaq($id){
        $faq = Faq::findOrFail($id);
        return view('dashboard.lainnya.faq.edit', ['faq'=>$faq]);
    }

    public function updateFaq(Request $request){
        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);

        $faq = Faq::find($request->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        UserActivity::create([
            'do'    => 'Edit-Faq',
            'description'      => 'Meperbarui Faq dengan ID '.$request->id,
            'route'        => '/dashboard/faq/edit/'.$request->id,
            'username'      =>auth()->user()->username
        ]);

        return redirect('dashboard/faq/index');
    }

    public function deleteFaq($id){
        $faq = Faq::find($id);
        $StatusDelete = StatusDelete::create([
            'table_name'    => 'faqs',
            'table_id'      => $id,
            'status'        => 'deleted',
            'username'      =>auth()->user()->username
        ]);
        $faq->delete();

        UserActivity::create([
            'do'    => 'Delete-Faq',
            'description'      => 'Menghapus Faq dengan ID '.$id,
            'route'        => '/dashboard/faq/delete/'.$id,
            'username'      =>auth()->user()->username
        ]);

        return back();
    }

    public function simulasiKPR(){
        $user = Auth::user();

        if($user){
            UserActivity::create([
                'do'    => 'Simulasi-KPR',
                'description'      => 'Halaman Simulasi KPR',
                'route'        => '/simulasi_kredit',
                'username'      =>auth()->user()->username
            ]);
        }

        return view('lainnya.simulasi');
    }

    public function indexTop(){
        UserActivity::create([
            'do'    => 'List-Lokasi-Strategis',
            'description'      => 'Melihat daftar lokasi strategis',
            'route'        => '/dashboard/top_location/index',
            'username'      => auth()->user()->username
        ]);

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

        $top = new TopLocation;
        $top->location_name = $request->nama_lokasi;
        $top->location = $request->location;
        $top->save();

        UserActivity::create([
            'do'    => 'Tambah-Lokasi-Strategis',
            'description'      => 'Menambahkan lokasi strategis baru',
            'route'        => '/dashboard/top_location/create',
            'username'      => auth()->user()->username
        ]);

        return redirect('dashboard/top_location/index');
    }

    public function editTop($id){
        $top = TopLocation::findOrFail($id);
        return view('dashboard.lainnya.top_location.edit', ['top'=>$top]);
    }

    public function updateTop(Request $request){
        $request->validate([
            'location' => ['required', 'unique:top_locations'],
        ]);

        $top = TopLocation::find($request->id);
        $top->location_name = $request->nama_lokasi;
        $top->location = $request->location;
        $top->save();

        UserActivity::create([
            'do'    => 'Edit-Lokasi-Strategis',
            'description'      => 'Memperbarui lokasi strategis dengan ID '.$request->id,
            'route'        => '/dashboard/top_location/edit/'.$request->id,
            'username'      => auth()->user()->username
        ]);

        return redirect('dashboard/top_location/index');
    }

    public function deleteTop($id){
        $top = TopLocation::find($id);

        $StatusDelete = StatusDelete::create([
            'table_name'    => 'top_locations',
            'table_id'      => $id,
            'status'        => 'deleted',
            'username'      =>auth()->user()->username
        ]);

        $top->delete();

        UserActivity::create([
            'do'    => 'Delete-Lokasi-Strategis',
            'description'      => 'Menghapus lokasi strategis dengan ID '.$id,
            'route'        => '/dashboard/top_location/edit/'.$id,
            'username'      => auth()->user()->username
        ]);

        return back();
    }

    public function umumForm(){

        UserActivity::create([
            'do'    => 'Setting-Umum',
            'description'      => 'Mengakses halaman setting umum',
            'route'        => '/dashboard/setting/umum',
            'username'      => auth()->user()->username
        ]);

        $site = DB::table('site_setting')->where('id', 1)->first();
        return view('dashboard.lainnya.umum.form', ['site'=>$site]);
    }

    public function updateSiteDetail(Request $request){
        $request->validate([
            'alamat_kantor' => ['required'],
            'phone_number' => ['required'],
            'wa_number' => ['required'],
            'about_us' => ['required'],
        ]);

        $data = array(
            'address' => $request->alamat_kantor,
            'phone_number' => $request->phone_number,
            'wa_number' => $request->wa_number,
            'about_us' => $request->about_us,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $site = DB::table('site_setting')->where('id', 1)->update($data);

        UserActivity::create([
            'do'    => 'Update-Site-Detail',
            'description'      => 'Memperbarui Detail situs lokasihunian.com ',
            'route'        => '/dashboard/setting/umum',
            'username'      => auth()->user()->username
        ]);

        return back();
    }

    public function updatePrivacyPolicy(Request $request){
        $request->validate([
            'privacy_policy' => ['required'],
        ]);

        $data = array(
            'privacy_policy' => $request->privacy_policy,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        
        $site = DB::table('site_setting')->where('id', 1)->update($data);

        UserActivity::create([
            'do'    => 'Update-Privacy-Policy',
            'description'      => 'Memperbarui Kebijakan Privasi situs lokasihunian.com ',
            'route'        => '/dashboard/setting/umum',
            'username'      => auth()->user()->username
        ]);

        return back();
    }

    public function updateTnc(Request $request){
        $request->validate([
            'tnc' => ['required'],
        ]);

        $data = array(
            'tnc' => $request->tnc,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        
        $site = DB::table('site_setting')->where('id', 1)->update($data);

        UserActivity::create([
            'do'    => 'Update-Privacy-Policy',
            'description'      => 'Memperbarui Syarat dan Ketentuan Penggunaan situs lokasihunian.com ',
            'route'        => '/dashboard/setting/umum',
            'username'      => auth()->user()->username
        ]);

        return back();
    }
}
