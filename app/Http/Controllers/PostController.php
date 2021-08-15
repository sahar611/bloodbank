<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Post::paginate(20);
        return view('posts.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();

        return view('posts.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ];
        $message = [
            'name.required'           => 'name is required',
            'category_id.required' => ' Governorate is required',
            'body.required' => ' content is required',


        ];
        $this->validate($request, $rules, $message);
        $post = new Post;
        $post->name= $request->input('name');
        $post->body= $request->input('body');
        $post->category_id= $request->input('category_id');
        if($request->hasFile('image')){
            $file = $request->file('image');   
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $file->move($destinationPath, $fileName);
            $post->image = $fileName;

        };


        $post->save();

        flash()->success('post added successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Post::findOrFail($id);
        return view('posts.edit', compact('model'));
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
        $record = Post::findOrFail($id);
        $record->update($request->all());
     
        if($request->hasFile('image')){
            $file = $request->file('image');   
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $file->move($destinationPath, $fileName);
            $record->image = $fileName;
            $record->save();


        };


        flash()->success('Post updated successfully');
        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Post::findOrFail($id);
        $record->delete();
        flash()
            ->success("Post deleted successfully");
        return redirect(route('posts.index'));
    }
}
