<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\User;
use App\Models\Students;
use DB;
use App\Rules\ValidateBadWords;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Students::latest()->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('photo', function($row){
                        $actionBtn = '<img class="card-img-top" src="'.$row->photo.'">';
                        return $actionBtn;
                    })
                    ->addColumn('action', function($row){
                        $route = url('students/'.$row->id.'/edit');
                        $actionBtn = '<a href="'.$route.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-url="'.route('students.destroy', [$row->id]).'" id="'.$row->id.'" onclick="return confirm(`Are you sure want to delete?`)">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action', 'photo'])
                    ->make(true);
            }
            
            return view('students.index');
        } catch (\Exception $th) {
            \Log::error($th->getMessage());
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = ['A'=> 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'];
        return view('students.create', compact('grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'studentName' => ['required', 'max:255', new ValidateBadWords],
            'grade' => 'required',
            'photo' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            'dateOfBirth' => 'required',
            'address' => ['required', 'max:255', new ValidateBadWords],
            'city' => ['required', 'max:255', new ValidateBadWords],
            'country' => ['required', 'max:255', new ValidateBadWords],
        ]);
        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                \Storage::disk('public')->put($fileName,  \File::get($photo));
            }
            Students::create([
                'studentName' => $request->studentName,
                'grade' => $request->grade,
                'photo' => $fileName,
                'dateOfBirth' => $request->dateOfBirth,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
            ]);
        } catch (\Exception $th) {
            \Log::error($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage())->withInput();
            //throw $th;
        }
        return redirect()->to('students')->withSuccess('Record has been inserted successfully.');
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
    public function edit($id)
    {
        try {
            $grade = ['A'=> 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'];
            $studentDetails = Students::find($id);
            return view('students.create', compact('grade', 'studentDetails'));
            
        } catch (\Exception $th) {
            //throw $th;
            \Log::error($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'studentName' => ['required', 'max:255', new ValidateBadWords],
            'grade' => 'required',
            // 'photo' => 'required',
            'dateOfBirth' => 'required',
            'address' => ['required', 'max:255', new ValidateBadWords],
            'city' => ['required', 'max:255', new ValidateBadWords],
            'country' => ['required', 'max:255', new ValidateBadWords],
        ]);
        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                \Storage::disk('public')->put($fileName,  \File::get($photo));
            }
            $data = [
                'studentName' => $request->studentName,
                'grade' => $request->grade,
                // 'photo' => $fileName,
                'dateOfBirth' => $request->dateOfBirth,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
            ];
            if ($request->hasFile('photo') && isset($fileName) && !empty($fileName)) {
                $data['photo'] = $fileName;
            }
            Students::whereId($id)->update($data);
        } catch (\Exception $th) {
            \Log::error($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage())->withInput();
            //throw $th;
        }
        return redirect()->to('students')->withSuccess('Record has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Students::whereId($id)->delete();
        } catch (\Exception $th) {
            //throw $th;
            \Log::error($th->getMessage());
            return false;
        }
        return false;
    }
}
