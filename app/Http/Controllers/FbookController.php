<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fbook;
use App\Category;
use App\Http\Requests\CreateFbookRequest;
use App\Http\Requests\UpdateFbookRequest;

use Illuminate\Support\Facades\Session;
class FbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('fbooks.index')->with('fbooks',Fbook::paginate(6));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fbooks.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFbookRequest $request)
    {
    $image=$request->image->store('freebooks');

     Fbook::create([
       'name'=>$request->name,
       'writer_name'=>$request->writer_name,
       'category_id'=>$request->category_id,
       'description'=>strip_tags($request->description),
       'image'=>$image,
       'user_id'=>auth()->user()->id
   ]);
   if ($request->has('en')) {
     session()->flash('succes','You added a new book successfully' );
}else {
  session()->flash('succes','لقد قمت بإضافة كتاب جديد بنجاح');

}
   return redirect(route('fbooks.index'));
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
    public function edit(Fbook $fbook)
    {
        return view('fbooks.create')->with('fbook',$fbook)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFbookRequest $request, Fbook $fbook)
    {
      if ($request->hasFile('image')) {
        $image=$request->image->store('freebooks');
      }else {
        $image=$fbook->image;
      }

      $fbook->update([
       'name'=>strip_tags($request->name),
       'writer_name'=>strip_tags($request->writer_name),
       'category_id'=>$request->category_id,
       'description'=>strip_tags($request->description),
       'image'=>$image,
       'user_id'=>auth()->user()->id
      ]);

      if(Session::has('locale')==='en')
   {
        session()->flash('success','You updateed the book successfully' );
   }else {
     session()->flash('success','لقد قمت بتحديث الكتاب بنجاح');

   }
      return redirect(route('fbooks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fbook $fbook)
    {

        $fbook->delete();
        if(Session::has('locale')==='en')
     {
          session()->flash('succes','You deleted the book successfully' );
     }else {
       session()->flash('succes','لقد قمت بحذف الكتاب بنجاح');

     }
        return redirect(route('fbooks.index'));
    }
    public function makeavailable(Fbook $fbook){

      $fbook->update([
        'available'=>'1'
      ]);
      return redirect(route('fbooks.index'));
    }
    public function makeunavailable(Fbook $fbook){

      $fbook->update([
        'available'=>'0'
      ]);
      return redirect(route('fbooks.index'));
    }
}
