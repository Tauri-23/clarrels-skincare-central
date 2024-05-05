<div class="appointments-table">
    @if ($appointments->count() < 1)
        <div class="text-center mar-top-1 txt-l2">No Appointments</div>

    @else
        @foreach ($appointments as $appointment)
                <div class="appointments-column">
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
            @endforeach
    @endif
        
        
</div>    


