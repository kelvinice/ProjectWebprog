<?php

namespace App\Http\Controllers;

use App\Category;
use App\Thread;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request){
        $search = $request->search;
        $forums = Forum::with('category')->where('name','like','%'.$search.'%')->paginate(5);
        return view('home',compact('forums'));
    }

    public function index(Request $request)
    {
        $forums = Forum::with('user','category')->paginate(10);
        return view('masterForum',compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('addForum',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return Redirect::back()->withErrors(['login'=>'Unautorized!']);
        }

        $request->validate([
            'name' => 'required|unique:forums,name|max:255',
            'category' => 'required|integer',
            'description' => 'max:255'
        ]);

        $forum = new Forum();
        $forum->name = $request->name;
        $forum->category_id = $request->category;
        $forum->description = $request->description;
        $forum->status = "Open";
        $forum->user_id = Auth::user()->id;

        $forum->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $forum = Forum::with('category','user')->find($id);
        $threads = Thread::with('user')->where([['forum_id',$forum->id],['content','like','%'.$request->search.'%']])->paginate(5);

        return view('forumThread',compact('forum','threads'));
    }

    public function showMyForum(){
        $forums = Forum::where('user_id',Auth::user()->id)->paginate(5);
        return view('myForum',compact('forums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forum = Forum::find($id);
        $forum->status="Closed";
        $forum->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forum::find($id)->delete();
        return back();
    }
}
