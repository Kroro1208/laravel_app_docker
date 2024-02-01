<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormServices;
use App\Http\Requests\StoreContactRequest;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // DBから一覧情報を取得して表示させる
        // $contacts = ContactForm::select('id', 'name', 'title', 'created_at')->get();

        //  pagination対応
        // $contacts = ContactForm::select('id', 'name', 'title', 'created_at')->paginate(20);

        // 検索及びpagination対応
        $search = $request->search; // この段階では複数キーワードで検索した場合、複数のワードが入ってくる
        $query = ContactForm::search($search); // COntactForm Modelに記載したscopeSearchのscopeをとったメソッド名
        $contacts = $query->select('id', 'name', 'title', 'created_at')->paginate(20);

        return view('contacts.index', compact('contacts')); // $contactsじゃなくて'contacts'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);
        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = ContactForm::find($id);

        $gender = CheckFormServices::checkGender($contact);

        $age = CheckFormServices::checkAge($contact);

        return view('contacts.show', compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = ContactForm::find($id);


        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreContactRequest $request, string $id)
    {
        $contact = ContactForm::find($id);
        $contact->name = $request->name;
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->url = $request->url;
        $contact->gender = $request->gender;
        $contact->age = $request->age;
        $contact->contact = $request->contact;
        $contact->save();

        return to_route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();

        return to_route("contacts.index");
    }
}
