<?php namespace App\Http\Controllers;
 use App\Message;
 use App\Member;
 use App\Inbox;
 use App\Author;
 use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller {
    
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $members= Member::all();//all data of member collection
            //
            //user id
            $id=Auth::id();
            $author=User::find($id);
		//mailbox view
            return view('vendor/flatAdmin/mailBox',  compact(array('members','author','id')));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function compose(Request $request)
	{
		//it will compose and save message in message collection.
           $message=new Message;
           $toMany=$request->messageTo;
           $message->subject=$request->subject;
           $message->message=$request->message;
           $message->save();
           //create inbox for each receiver of message
           foreach ($toMany as $to) {
            
           $inbox=new Inbox;
           $inbox->member_id=$to;
           $inbox->message()->associate($message);           
           $inbox->save();   
               
               
           }
           
           
           //create new author
           
           $author=new Author;
           $author_id=Auth::id();
           $author->mail_author=$author_id;
           $author->save();
           
           //attach message with receiver
           //$message->member()->attach($to);
           //attach message with inbox
           //$message->inbox()->attach($message);
           
           //attach message with  mail sender
           $message->author()->attach($author_id);
                   
           
           
            
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}