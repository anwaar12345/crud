<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $posts  = post::latest()->paginate(5);
        return view('posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'post' => 'required',
            'createdby' => 'required',
            'images' => 'required'
            ]);
            $i = 0;
            if ($request->hasFile('images')) {
                foreach($request->file('images') as $image)
                {
                    
                    $img_name = str_replace(' ','_',$request->post).$i++.".".$image->getClientOriginalExtension();
                    
                    $image->move(public_path().'/images/', $img_name);  
                    $data[] = $img_name;  
                    
                    
                    //   print_r($img_name);exit;
    
                }
            }  
            $img = json_encode($data);
            
    // dd($request->all());

          // to use save
// $post = new post;
// $post->post = $request->post;
// $post->createdby = $request->createdby;
// $post->save();

//to use create
    
$data = [
        'post' => $request->post, 
        'createdby' => $request->createdby,
        'images' => $img        
    ];




     post::create($data);    
      return redirect(route('home'))->with("message","Post Created Successfully");
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
        $post = post::find($id);
        return view('show',compact('post'));

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
        $post = post::find($id);
        return view('edit',compact('post'));

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
        //

        $request->validate([
            'post' => 'required',
            'createdby' => 'required',
            ]);
        

            $i = 0;
            if ($request->hasFile('images')) {
                foreach($request->file('images') as $image)
                {
                    
                    $img_name = str_replace(' ','_',$request->post).$i++.".".$image->getClientOriginalExtension();
                    
                    $image->move(public_path().'/images/', $img_name);  
                    $data[] = $img_name;  
                    
                    
                    //   print_r($img_name);exit;
    
                }
                $img = json_encode($data);
                $data = [
                    'post' => $request->post, 
                    'createdby' => $request->createdby,
                    'images' => $img        
                ];
            $post = post::find($id);
            $post->update($data);
            
            }else{
                $data = [
        
                    'post' => $request->post, 
                    'createdby' => $request->createdby,
                   
              
                ];
        
                       $post = Post::find($id);
            //dd($post);
           $post->update($data);  
            }  
            
        
        return redirect()->route('home')->with("message","Post updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // dd($id);
         $post = post::find($id);
        $post->delete();

        return redirect()->route('home')
                            ->with('message', 'post Deleted Successfully!');
    }
}
