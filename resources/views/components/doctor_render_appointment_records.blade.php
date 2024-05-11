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
            <small class="text-m2 form-data-col">Appointment ID</small>
            <small class="text-m2 form-data-col">Phone Number</small>
            <small class="text-m2 form-data-col">Service</small>
            <small class="text-m2 form-data-col">Appointment Date</small>
            <small class="text-m2 form-data-col">Appointment Time</small>
            <small class="text-m2 form-data-col">Status</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($appointments as $appointment)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} appointment-column" id="{{$appointment->id}}">
                <input type="hidden" value="{{$appointment->patient}}" id="pat-id">
                <small class="form-data-col">{{ $appointment->id }}</small>
                <small class="form-data-col">{{ $appointment->patient_phone }}</small>
                <small class="form-data-col">{{ $appointment->services()->first()->service }}</small>
                <small class="form-data-col">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</small>
                <small class="form-data-col">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i a') }}</small>
                <small class="form-data-col">{{ $appointment->status }}</small>
            </div>
        @endforeach
    </div>
@endif