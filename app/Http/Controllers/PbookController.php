<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pbook;
use App\Category;
use App\Http\Requests\CreatePbookRequest;
use App\Http\Requests\UpdatePbookRequest;

class PbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pbooks.index')->with('pbooks',Pbook::paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pbooks.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePbookRequest $request)
    {
      $image=$request->image->store('paidbooks');

       Pbook::create([
         'name'=>$request->name,
         'writer_name'=>$request->writer_name,
         'category_id'=>$request->category_id,
         'price'=>$request->price,
         'description'=>strip_tags($request->description),
         'image'=>$image,
         'user_id'=>auth()->user()->id
     ]);
     if ($request->has('en')) {
       session()->flash('succes','You added a new book successfully' );
  }else {
    session()->flash('succes','لقد قمت بإضافة كتاب جديد بنجاح');

  }
     return redirect(route('pbooks.index'));
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
    public function edit(Pbook $pbook)
    {
          return view('pbooks.create')->with('pbook',$pbook)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePbookRequest $request, Pbook $pbook)
    {

        if ($request->hasFile('image')) {
          $image=$request->image->store('freebooks');
        }else {
          $image=$pbook->image;
        }

        $fbook->update([
         'name'=>strip_tags($request->name),
         'writer_name'=>strip_tags($request->writer_name),
         'category_id'=>$request->category_id,
         'price'=>$request->price,
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
        return redirect(route('pbooks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pbook $pbook)
    {

              $pbook->delete();
              if(Session::has('locale')==='en')
           {
                session()->flash('succes','You deleted the book successfully' );
           }else {
             session()->flash('succes','لقد قمت بحذف الكتاب بنجاح');

           }
              return redirect(route('pbooks.index'));
    }
    public function makeavailable(Pbook $pbook){

      $pbook->update([
        'available'=>'1'
      ]);
      return redirect(route('pbooks.index'));
    }
    public function makeunavailable(Pbook $pbook){

      $pbook->update([
        'available'=>'0'
      ]);
      return redirect(route('pbooks.index'));
    }


}
