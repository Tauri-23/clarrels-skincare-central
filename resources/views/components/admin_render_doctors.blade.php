@if ($doctors->count() < 1) 
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Patients</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <div class="form-data-col">
                <small class="text-m2">Doctor Name</small>
                <div class="table1-PFP-small-cont mar-end-1"></div>
            </div>
            <small class="text-m2 form-data-col">Doctor ID</small>
            <small class="text-m2 form-data-col">Email</small>
            <small class="text-m2 form-data-col">Actions</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($doctors as $doctor)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }}" id="{{$doctor->id}}">
                <div class="form-data-col">
                    <div class="table1-PFP-small mar-end-1">
                        <img class="emp-pfp" src="/assets/media/pfp/{{ $doctor->pfp }}" alt="">
                    </div>
                    <small class="text-m2 emp-name">Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</small>
                </div>
                <small class="form-data-col emp-id">{{ $doctor->id }}</small>
                <small class="form-data-col">{{ $doctor->email }}</small>
                <small class="form-data-col emp-dept d-flex gap3">
                    <a href="/DoctorViewPatient/{{$doctor->id}}" class="primary-btn-small-violet1">
                        Profile
                    </a>
                </small>
            </div>
        @endforeach
    </div>
@endif