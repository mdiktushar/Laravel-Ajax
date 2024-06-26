<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('student.index');
    }

    public function students()
    {
        $students = Student::all();
        return response()->json([
            'success' => true,
            'message' => 'All Students',
            'students' => $students,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new student record
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->save();

        // Return a response indicating success
        return response()->json([
            'success' => true,
            'message' => 'Student created successfully.',
        ]);
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
    public function edit(Student $student)
    {
        //
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        try {
            $student->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Updated'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Student update failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => "failed to update studnet",
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        try {
            $student->delete();
            return response()->json([
                'success' => true,
                'message' => 'Deleted'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Student delete failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => "failed to delete studnet",
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
