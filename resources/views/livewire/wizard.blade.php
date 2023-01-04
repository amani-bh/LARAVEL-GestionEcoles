<div class=" justify-content-center">
    <div class="">
        <div class="contact-form bg-secondary rounded p-5 add-course">

   
            @if(!empty($successMessage))
            <div class="alert alert-success">
            {{ $successMessage }}
            </div>
            @endif
      
            <div class="text-center">
                <!-- progressbar -->
                <ul class="progressbar">
                    <li class="{{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button">Step 1</a></li>
                    <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button">Step 2</a></li>
                    <li class="{{ $currentStep != 3 ? '' : 'active' }}"><a href="#step-3" type="button" disabled="disabled">Step 3</a></li>
                </ul>
            </div>
            <div class=" setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3 text-centerclass=""> Course</h3>
                        <div class="form-group">
                            <label for="title">Course title:</label>
                            <input type="text" wire:model="title" class="form-control" id="taskTitle">
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" wire:model="category" class="form-control" id="taskTitle">
                            @error('category') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Course details:</label>
                            <input type="text" wire:model="details" class="form-control" id="taskTitle">
                            @error('details') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Course Duree:</label>
                            <input type="number" wire:model="duree" class="form-control" id="productAmount"/>
                            @error('duree') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description:</label>
                            <textarea type="text" wire:model="description" class="form-control" id="taskDescription">{{{ $description ?? '' }}}</textarea>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="courseImage">Product image:</label>
                            <input type="file" wire:model="courseImage" class="form-control" id="taskDescription"/>
                            @error('courseImage') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3> Sections </h3>
                        <div class="form-group">
                            <label for="title">Section name:</label>
                            <input type="text" wire:model="name" class="form-control" id="taskTitle">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Details:</label>
                            <input type="text" wire:model="details" class="form-control" id="taskTitle">
                            @error('details') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">File:</label>
                            <input type="file" wire:model="file" class="form-control" id="taskTitle">
                            @error('file') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
                    </div>
                </div>
            </div>
            <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3> Step 3</h3>
                        <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                        <button class="btn btn-danger nextBtn btn-lg pull-right" wire:click="addForm" type="button">Add more section</button>
                        {{-- <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button> --}}
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>