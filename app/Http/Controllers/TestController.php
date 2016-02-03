<?php namespace App\Http\Controllers;

use App\User;
use App\Inbox;
use App\Message;
use App\Member;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TestController extends Controller {
    
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
            $id=  Auth::id();           
                        
            $unread=Inbox::where('mail_read','=','0')
                     ->where('member_id','=',$id)
                    ->get();
            
            echo $unread->count();
                   
            
            /*foreach ($inboxes as $inbox) {
               $count=$inbox->member_id;
               echo $count;
               
            }

	*/
            //echo $created_at;
            
            //echo $msgs;
            
            // HelperController::getInbox('subject');
            
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
	public function store()
	{
		//
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
