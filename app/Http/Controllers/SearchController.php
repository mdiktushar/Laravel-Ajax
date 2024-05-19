<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchView() {
        
    }

    public function search(Request $request) {

        if($request->ajax()) {
            $data = Student::where('name', 'like', $request->name.'%')->get();
            $output = '';
            if(count($data)) {
                $output = '<ul>';
                foreach($data as $row) {
                    $output .= '<li>'.$row->name.'</li>';
                }
                $output .= '</ul>';

                return $output;
            } else {
                $output = '<li>No data found</li>';
            }
        }

        return view("search");
    }
}
