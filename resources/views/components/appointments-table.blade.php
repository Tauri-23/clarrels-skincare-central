<div class="appointments-table">
    @if ($appointments->count() < 1)
        <div class="text-center mar-top-1 txt-l2">No {{$type == "Appointments" ? "Appointments" : "History"}}</div>

    @else
        @foreach ($appointments as $appointment)
                <div class="{{$type == "Appointments" ? "appointments-column" : "history-column"}} justify-content-between cursor-pointer">
                    <input type="hidden" id="appointment-id" value="{{$appointment->id}}">
                    <input type="hidden" id="appointment-doc-name" value="{{$appointment->doctors()->first()->firstname}} {{$appointment->doctors()->first()->lastname}}">
                    <input type="hidden" id="appointment-patient-name" value="{{$appointment->patient_name}}">
                    <input type="hidden" id="appointment-patient-phone" value="{{$appointment->patient_phone}}">
                    <input type="hidden" id="appointment-patient-note" value="{{$appointment->note}}">
                    <input type="hidden" id="appointment-service-type" value="{{$appointment->serviceTypes()->first()->service_type}}">
                    <input type="hidden" id="appointment-service" value="{{$appointment->services()->first()->service}}">
                    <input type="hidden" id="appointment-date" value="{{\Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y')}}">
                    <input type="hidden" id="appointment-time" value="{{\Carbon\Carbon::parse($appointment->appointment_time)->format('g:i a')}}">
                    <div class="d-flex gap3">
                        <div class="doctor-pfp">
                            <img class="position-absolute h-100 w-100" src="/assets/media/pfp/{{$appointment->doctors()->first()->pfp}}">
                        </div>
                        <div class="appointment-text">
                            <div>
                                <div class="txt-l2">{{$appointment->doctors()->first()->firstname}} {{$appointment->doctors()->first()->lastname}}</div>
                                <div class="txt-m3">{{$appointment->doctors()->first()->doctor_type}}</div>
                            </div>
                            <div class="justify-self-end">Appointment Date: {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('D M d, Y') }} {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i a') }}</div>
                        </div>
                    </div>
                    <div class="m-top-auto m-bottom-auto mar-end-3 fw-bold color-yellow2">{{$appointment->status}}</div>
                </div>
            @endforeach
    @endif
        
        
</div>    


