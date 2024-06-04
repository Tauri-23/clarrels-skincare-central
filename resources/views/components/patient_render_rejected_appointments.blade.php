@if ($appointments->count() < 1) 
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Records</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <div class="form-data-col">
                <small class="text-m2">Doctor Name</small>
                <div class="table1-PFP-small-cont mar-end-1"></div>
            </div>
            <small class="text-m2 form-data-col">Appointment ID</small>
            <small class="text-m2 form-data-col">Service</small>
            <small class="text-m2 form-data-col">Appointment Date</small>
            <small class="text-m2 form-data-col">Appointment Time</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($appointments as $appointment)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} rejected-appointment-column" id="{{$appointment->id}}">
                <input type="hidden" value="{{$appointment->id}}" id="appointment-id">
                <div class="form-data-col">
                    <div class="table1-PFP-small mar-end-1">
                        <img class="emp-pfp" src="/assets/media/pfp/{{ $appointment->doctors()->first()->pfp }}" alt="">
                    </div>
                    <small class="text-m2 emp-name">Dr. {{ $appointment->doctors()->first()->firstname }} {{ $appointment->doctors()->first()->lastname }}</small>
                </div>
                <small class="form-data-col emp-id">{{ $appointment->id }}</small>
                <small class="form-data-col emp-id">{{ $appointment->services()->first()->service }}</small>
                <small class="form-data-col">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</small>
                <small class="form-data-col">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i a') }}</small>
            </div>
        @endforeach
    </div>
@endif