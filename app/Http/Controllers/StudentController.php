<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Classroom;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $students=Students::with('classroom')->paginate(5);
    //     return view('students.index',compact('students'));
    // }
    public function index(Request $request)
{
    $search = $request->input('search');

    $students = \App\Models\Students::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->orWhere('age', 'like', "%{$search}%");
    })->paginate(5);

    return view('students.index', compact('students', 'search'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $classnames = Classroom::all();
        return view("students.create",compact('classnames'));
        

    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:students,email',
            'age'=>'required:int',
            'class'=>'required',
            'profile'=>'required',
        ]);
        Students::create([
    'name' => $request->name,
    'email' => $request->email,
    'age' => $request->age,
    'classroom_id' => $request->class, // ✅ add this line
    'profile' => $request->profile,
]);
return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $varname=Students::find($id);
        $varname11=Classroom::All();
            if (is_null($varname)){
                return redirect ('/');
            }
            return view('students.edit',compact('varname','varname11'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $varname2=Students::findOrFail($id);
        if(is_null($varname2)){
            return redirect ('/');
        }
        
        
    
    $varname2->update([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'classroom_id' => $request->class,
        'profile' => $request->profile,
    ]);
    return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Students::find($id)->delete();
        return redirect('/');
    }

}
