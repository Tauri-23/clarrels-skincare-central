@if ($appointments->count() < 1) 
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Appointments</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <div class="form-data-col">
                <small class="text-m2">Patient Name</small>
                <div class="table1-PFP-small-cont mar-end-1"></div>
            </div>
            <small class="text-m2 form-data-col">Patient ID</small>
            <small class="text-m2 form-data-col">Appointment ID</small>
            <small class="text-m2 form-data-col">Phone Number</small>
            <small class="text-m2 form-data-col">Service</small>
            <small class="text-m2 form-data-col">Appointment Date</small>
            <small class="text-m2 form-data-col">Appointment Type</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($appointments as $appointment)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} appointment-column" id="{{$appointment->id}}">
                <input class="d-none" type="text" value="{{$appointment->patient}}" id="pat-id">
                <div class="form-data-col">
                    <div class="table1-PFP-small mar-end-1">
                        <img class="emp-pfp" src="/assets/media/pfp/{{ $appointment->patients()->first()->pfp }}" alt="">
                    </div>
                    <small class="text-m2 emp-name">{{ $appointment->patients()->first()->firstname }}</small>
                </div>
                <small class="form-data-col patient-id">{{ $appointment->patient }}</small>
                <small class="form-data-col">{{ $appointment->id }}</small>
                <small class="form-data-col">{{ $appointment->patient_phone }}</small>
                <small class="form-data-col">{{ $appointment->services()->first()->service }}</small>
                <small class="form-data-col">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }} at {{\Carbon\Carbon::parse($appointment->appointment_time)->format('g:i a')}}</small>
                <small class="form-data-col">{{$appointment->is_follow_up ? 'Follow-up' : 'Regular'}}</small>
            </div>
        @endforeach
    </div>
@endif