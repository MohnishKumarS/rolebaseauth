<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $allProfile = 4;
        $contacts = 18;
        $activeProfile = 10;
        $users = 5;
        return view('admin/dashboard',compact('allProfile','activeProfile','users','contacts'));
    }

    public function viewProfile()
    {
        $pro = Profile::latest()->paginate(10);
        return view('admin/profile/index', compact('pro'));
    }

    public function create()
    {
        return view('admin/profile/create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|numeric'
        ]);




        $pro =  Profile::create($validatedData);

        if ($pro) {
            return redirect()->route('admin.profile.index')->with('status', 'success')->with('title', 'Profile created successfully!');
        } else {
            return redirect()->back()->with('status', 'error')->with('title', 'Failed to create profile!');
        }
    }

    public function view($id)
    {
        $pro = Profile::find($id);
        return view('admin/profile/view', compact('pro'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|numeric'
        ]);



        $profile = Profile::findOrFail($id);

 
        $data =  $profile->update($validatedData);
        if ($data) {
            return redirect()->route('admin.profile.index')->with('status', 'success')->with('title', 'Profile updated successfully!');
        } else {
            return redirect()->back()->with('status', 'error')->with('title', 'Profile not updated!');
        }
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin/profile/edit', compact('profile'));
    }

    public function destroy($id){
        $profile = Profile::findOrFail($id);

        $data = $profile->delete();
        if ($data) {
            return redirect()->route('admin.profile.index')->with('status','success')->with('title','Profile deleted successfully');
        } else {
            return redirect()->back()->with('status','error')->with('title','Failed to delete profile');
        }
    }
}
