<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{

    public function AllTeam()
    {
        $teams = Team::latest()->get();
        return view('backend.team.all_team', compact('teams'));
    }

    public function AddTeam()
    {
        return view('backend.team.add_team');
    }
    public function StoreTeam(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/team/' . $name_gen);
        $save_url = 'upload/team/' . $name_gen;

        Team::insert([

            'name' => $request->name,
            'designation' => $request->designation,
            'link' => $request->link,
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);



        ////////// End Multiple Image Upload Start ///////////
        $notification = array(
            'message' => 'Team Added Successfull',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function EditTeam($id)
    {
        $team = Team::findOrFail($id);
        return view('backend.team.edit_team', compact('team'));
    }
    public function UpdateTeam(Request $request)
    {
        $id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/team/' . $name_gen);
            $save_url = 'upload/team/' . $name_gen;

            Team::findOrFail($id)->update([

                'name' => $request->name,
                'designation' => $request->designation,
                'link' => $request->link,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Team Updated with image Successfull',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notification);
        } else {
            Team::findOrFail($id)->update([

                'name' => $request->name,
                'designation' => $request->designation,
                'link' => $request->link,
          
                'created_at' => Carbon::now(),

            ]);



            $notification = array(
                'message' => 'Team Updated without image Successfull',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notification);
        }

    }
    public function DeleteTeam($id)
    {
        $post_image = Team::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        Team::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Team Deleted Successfully',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);
    }

}
