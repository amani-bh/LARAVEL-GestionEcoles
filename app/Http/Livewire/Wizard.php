<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cours;
use App\Models\Section;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Wizard extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $title, $details, $description, $duree = 1, $category, $courseImage, $name, $file, $course,$upload;
    public $successMessage = '';
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.wizard');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'details' => 'required',
            'category' => 'required',
            'courseImage' => 'required|image|max:1024',
            'duree' => 'required|numeric',
        ]);
        // $request->file->store('product', 'public');

        //  if ($request->hasFile('file')) {

        //     $request->validate([
        //         'image' => 'mimes:jpeg,bmp,png' 
        //     ]);

        //     $request->file->store('product', 'public');

           
        // }
        $this->courseImage->store('courseImage');
        $this->course= Cours::create([
            
            'title' => $this->title,
            'details' => $this->details,
            'description' => $this->description,
            'category' => $this->category,
            'courseImage' => $this->courseImage->hashName(),
            'duree' => $this->duree,
            'user_id'=>Auth::user()->id
        ]);
        $this->details='';
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'details' => 'required',
            'file' => 'required|file|mimes:pdf|max:102400',
        ]);
        $this->upload=$this->file->store('section_file');
  
        $this->currentStep = 3;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        Section::create([
            
            'name' => $this->name,
            'details' => $this->details,
            'file' => $this->upload,
            'cours_id'=> $this->course->getKey()
        ]);
  
        $this->successMessage = ' Created Successfully.';
  
        $this->clearForm();
  
        $this->currentStep = 1;
    }

    public function addForm()
    {
        Section::create([
            
            'name' => $this->name,
            'details' => $this->details,
            'file' => $this->upload,
            'cours_id'=> $this->course->getKey()
        ]);
  
        $this->successMessage = ' Created Successfully.';
  
        $this->clearForm();
  
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->title = '';
        $this->details = '';
        $this->description = '';
        $this->category = '';
        $this->courseImage = '';
        $this->duree = 1;
    }
}
