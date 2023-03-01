<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //direct contact page
    public function contactPage(){
        $cartForNav = Cart::where('user_id' , Auth::user()->id)->get();
        return Inertia::render('User/Contact/Contact' , compact('cartForNav'));
    }

    //user contact
    public function contact(Request $request){
        $this->contactValidationCheck($request);

        Contact::create([
            'name' => $request->contactName,
            'email' => $request->contactEmail,
            'phone' => $request->contactNumber,
            'address' => $request->contactAddress,
            'content' => $request->contactMessage,
        ]);
        return back()->with(['contactSent' => 'success']);
    }

    //direct admin contact list page
    public function contactListPage(){
        $data = Contact::when(request('search'), function ($query, $search) {
            $query->where('email', 'like', '%' . $search . '%');
        })->paginate(5)->withQueryString();
        return Inertia::render('Admin/Contact/Contact',[
            'data' => $data,
            'filters' => request('search'),
        ]);
    }

    //contact delete
    public function contactDelete($id){
        Contact::where('id' , $id)->delete();
        return back();
    }

    //contact validation
    private function contactValidationCheck($request) {
        Validator::make($request->all(),[
            'contactName' => 'required',
            'contactEmail' => 'required',
            'contactNumber' => 'required',
            'contactAddress' => 'required',
            'contactMessage' => 'required',
        ])->validate();
    }
}
