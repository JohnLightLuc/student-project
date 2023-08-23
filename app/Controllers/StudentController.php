<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Entities\Student as StudentEntity;

class StudentController extends BaseController
{

    public function index()
    {
        return view('students/index');
    }

    public function get_students()
    {
        $model = new StudentModel();
        $students   = $model->findAll();

        return $this->response->setJSON([
            'success' => true,
            'data'  => $students,
            'message'=>"Students retrieve successfully"
        ]);
    }


    public function store()
    {
        $rules = [
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|valid_email"
        ];

        if (! $this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message'=>"inputs don't correctly fill",
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $model = new StudentModel();
        $student = $model->where('email', $_POST['email'])->first();
        if(!empty($student)){
            return $this->response->setJSON([
                'success' => false,
                'message'=>"Email already used",
                'errors' => ['email'=>'Email already used'],
            ]);
        }

        $input = $_POST;
        
        $file = $this->request->getFile('photo');
        if($file){
            if($file->isValid() && !$file->hasMoved()){
                $path =  $file->getRandomName();
                $file->move('upload/images', $path);
                $input['photo_url'] = '/upload/images/'.$path;
            }else{
                $input['photo_url'] ='/avatart.png';
            }
        }else{
            $input['photo_url'] ='/avatart.png';
        }

        // Save student code
        $student           = new StudentEntity();
        $student->first_name = $input['first_name'];
        $student->last_name = $input['last_name'];
        $student->email    = $input['email'];
        $student->photo_url    = $input['photo_url'];
        $model->save($student);

        // Retrieve data all students
        $students   = $model->findAll();

        // Return JSON data
        return $this->response->setJSON([
            'success' => true,
            'message'=>"Student saved successfully",
            'data' => $students
        ]);
    }

    public function show($id)
    {
        $model = new StudentModel();
        $student = $model->find($id);
        if(empty($student)){
            return redirect()->to('/students');
        }

        return view('students/show', ['student'=>$student]);
    }

    public function update($id)
    {
        $model = new StudentModel();
        $student = $model->find($id);

        if(empty($student)){
            return $this->response->setJSON( [
                'success' => false,
                'message'=>"Student don't found"
            ]);
        }
        $rules = [
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required"
        ];

        if (! $this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message'=>"inputs don't correctly fill",
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $data = $_POST;

        $file = $this->request->getFile('photo');
        if($file){
            if($file->isValid() && !$file->hasMoved()){
                $path =  $file->getRandomName();
                $file->move('upload/images', $path);
                $data['photo_url'] = 'upload/images/'.$path;
            }
        }

        $model->update($id, $data);

        // Retrieve data all students
        $students   = $model->findAll();

        return $this->response->setJSON([
            'success' => true,
            'message'=>"Student updated successfully",
            'data' => $students
        ]);
    }

    public function destroy($id)
    {
        $model = new StudentModel();
        $student = $model->find($id);

        if(empty($student)){
            return $this->response->setJSON([
                'success' => false,
                'message'=> "Student not fund",
            ]);
        }

        $model->delete($student->id);

        // Retrieve data all students
        $students   = $model->findAll();

        return $this->response->setJSON([
            'success' => true,
            'message'=>"Student deleted successfully",
            'data' => $students
        ]);
    }

}
