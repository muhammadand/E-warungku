<?php
  
namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $query = $request->input('query');

        if ($query) {
            $registrations = Registration::where('name', 'LIKE', "%{$query}%")
                                         ->orWhere('email', 'LIKE', "%{$query}%")
                                         ->get();
        } else {
            $registrations = Registration::latest()->paginate(5);
        }

        $totalRegistrations = Registration::count();
        $username = Auth::user()->name;

        return view('registrations.index', compact('registrations', 'totalRegistrations', 'username'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $username = Auth::user()->name;
        $gpa = 2.99; 
        return view('registrations.create', compact('username','gpa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'semester' => 'required|integer|between:1,8',
            'scholarship_type' => 'nullable|string',
            'document' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        // Determine IPK based on semester
        if ($input['semester'] == 7) {
            $input['gpa'] = 3.18;
        } else {
            $input['gpa'] = number_format(mt_rand(200, 299) / 100, 2); // Random IPK < 3
        }

        if ($document = $request->file('document')) {
            $destinationPath = 'uploads/documents/';
            $documentName = date('YmdHis') . "." . $document->getClientOriginalExtension();
            $document->move($destinationPath, $documentName);
            $input['document'] = $documentName;
        }

        Registration::create($input);

        return redirect()->route('registrations.index')
                         ->with('success', 'Registration created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration): View
    {
        $username = Auth::user()->name;

        return view('registrations.show', compact('registration', 'username'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration): View
    {
        $username = Auth::user()->name;
        return view('registrations.edit', compact('registration','username'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:registrations,email,' . $registration->id,
            'phone_number' => 'required',
            'semester' => 'required|in:1,2,3,4,5,6,7,8',
            'gpa' => 'required|numeric|min:0|max:4',
            'scholarship_type' => 'nullable|in:academic,non_academic',
            'document' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $input = $request->all();

        if ($document = $request->file('document')) {
            $destinationPath = 'uploads/documents/';
            $documentName = date('YmdHis') . "." . $document->getClientOriginalExtension();
            $document->move($destinationPath, $documentName);
            $input['document'] = "$documentName";
        } else {
            unset($input['document']);
        }

        $registration->update($input);

        return redirect()->route('registrations.index')
                         ->with('success', 'Registration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration): RedirectResponse
    {
        $registration->delete();

        return redirect()->route('registrations.index')
                         ->with('success', 'Registration deleted successfully.');
    }
}
