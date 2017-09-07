<?php

namespace App\Http\Controllers;

use App\Message;
use App\Member;
use App\Inbox;
use App\Author;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
    public function index() {
        $members = Member::all(); //all data of member collection
        //
            //user id
        $id = Auth::id();
        $author = User::find($id);
        $inboxes = Inbox::where('member_id', '=', $id)->get(); //find data in Inbox collection
        $unread = Inbox::where('mail_read', '=', '0')
                        ->where('member_id', '=', $id)
                        ->get()->count();
        //mailbox view
        return view('vendor/flatAdmin/mailBox', compact(array('members', 'author', 'inboxes', 'unread', 'id')));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function compose(Request $request) {
        //it will compose and save message in message collection.
        $message = new Message;
        $toMany = $request->messageTo;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        //create inbox for each receiver of message
        foreach ($toMany as $to) {

            $inbox = new Inbox;
            $inbox->member_id = $to;
            $inbox->message()->associate($message);
            $inbox->save();         
        }


        //create new author

        $author = new Author;
        $author_id = Auth::id();
        $author->mail_author = $author_id;      
        $author->message()->associate($message);        
        $author->save();

        // re direct home page
         return redirect('file');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function read() {
        $members = Member::all(); //all data of member collection
        $inbox_id = HelperController::getPage();
        $id = Auth::id();
        $author = User::find($id);
        $inbox = Inbox::find($inbox_id); //find data in Inbox collection
        $mail_read = $inbox->mail_read;
        if (!$mail_read) {
            $inbox->mail_read = 1;
            $inbox->update();
        }

        $unread = Inbox::where('mail_read', '=', '0')
                        ->where('member_id', '=', $id)
                        ->get()->count();
        //mailbox view
        return view('vendor/flatAdmin/mailRead', compact(array('members', 'author', 'inbox', 'unread', 'id')));
    }

    /**
     * Show all send messages in a list 
     *
     * @param  int  $id
     * @return Response
     */
    public function mailSendAll() {
        $members = Member::all(); //all data of member collection
       
        $id = Auth::id();
        
        $author = User::find($id);
        //$author = User::find($id);
        $sends=Author::where('mail_send','=','1')
                      ->where('mail_author','=',$id)
                      ->get();        
        
        
        //retrieve data of unread message
        $unread = Inbox::where('mail_read', '=', '0')
                        ->where('member_id', '=', $id)
                        ->get()->count();
        
        return view('vendor/flatAdmin/mailSendAll', compact(array('members', 'author','unread','id','sends')));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function sendRead() {
        $members = Member::all(); //all data of member collection
        $inbox_id = HelperController::getPage();
        $id = Auth::id();
        $author = User::find($id);
        $inbox = Inbox::find($inbox_id); //find data in Inbox collection
        
        $unread = Inbox::where('mail_read', '=', '0')
                        ->where('member_id', '=', $id)
                        ->get()->count();
        //mailbox view
        return view('vendor/flatAdmin/mailRead', compact(array('members', 'author', 'inbox', 'unread', 'id')));
    }

    
    

}
