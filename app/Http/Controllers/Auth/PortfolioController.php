<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\portfolio;
use App\Models\Category;
use App\Models\Tag;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(5);
        
        return view('auth.portfolio.index',compact('portfolios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
         $tags=Tag::all();

        return view('auth.portfolio.create',compact('categories','tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'portfolio_category' => 'required',
            'portfolio_image' => 'required',
            'description' => 'required',
        ]);
        $id = Auth::user()->id;
 
// dd($request->all());
        // $portfolio=portfolio::create([
        //     'user_id'=>$id,
        //     'title'=>$request->title,
        //     'description'=> $request->description,
        //     'status'=>$request->status,
        //     'category_id'=>$request->category,
        // ]);

        $portfolio = new Portfolio;
        $portfolio->user_id =$id ;
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->portfolio_category = $request->portfolio_category;
        $portfolio->tags = implode(',',$request->tags);

        if($request->hasfile('portfolio_image'))
        {
            $file = $request->file('portfolio_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/portfolio/', $filename);
            $portfolio->portfolio_image = $filename;
        }
          $portfolio->save();

        // foreach( $request->tags as $tag){
        //     $portfolio->tags()->attach($tag);
        // }
       
        return redirect()->route('portfolio.index')
                        ->with('success','portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
       
        return view('auth.portfolio.show',compact('portfolio'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        
        $categories=Category::all();
         $tags=Tag::all();
        return view('auth.portfolio.edit',compact('portfolio','categories','tags'));

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
      
       $user_id = Auth::user()->id;

      $portfolio=Portfolio::find($id);
      $portfolio->user_id = $user_id;
      $portfolio->title = $request->input('title');
      $portfolio->description = $request->input('description');
      $portfolio->portfolio_category = $request->input('portfolio_category');
      $portfolio->tags = implode(',',$request->input('tags'));

      if($request->hasfile('portfolio_image'))
      {
        $file = $request->file('portfolio_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/portfolio/', $filename);
            $portfolio->portfolio_image = $filename; 
      }
      $portfolio->update();

        // $portfolio->update($request->all());

        return redirect()->route('portfolio.index')->with('success', 'portfolio has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
    
        return redirect()->route('portfolio.index')
                        ->with('success','portfolio deleted successfully');
    }
}
