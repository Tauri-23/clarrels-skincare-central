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
            <small class="text-m2 form-data-col">Service</small>
            <small class="text-m2 form-data-col">Price</small>
            <small class="text-m2 form-data-col">Status</small>
        </div>


        {{--Data Fetched from the database this is for ui for now--}}
        @foreach ($appointments as $appointment)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} paid-payment-row" id="{{$appointment->id}}">
                <input type="hidden" value="{{$appointment->id}}" id="appointment-id">
                <small class="form-data-col">{{ $appointment->id }}</small>
                <small class="form-data-col">{{ $appointment->services()->first()->service }}</small>
                <small class="form-data-col">{{"₱ " . number_format($appointment->services()->first()->price, 2, '.', ',')}}</small>
                <small class="form-data-col" id="appointment-type">Paid</small>
            </div>
        @endforeach
    </div>
@endif