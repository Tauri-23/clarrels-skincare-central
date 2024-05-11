@if ($history->count() < 1)
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Records</div>
        </div>
    </div>
@else
    <div class="table1">
        <div class="table1-header">
            <small class="text-m2 form-data-col">Appointment ID</small>
            <small class="text-m2 form-data-col">Service</small>
            <small class="text-m2 form-data-col">Appointment Date</small>
        </div>


        @foreach ($history as $hist)
            <div  class="table1-data {{ $loop->last ? 'last' : '' }} history-column" id="{{$hist->id}}">
                <input type="hidden" value="{{$hist->id}}" id="appointment-id">
                <small class="form-data-col">{{ $hist->id }}</small>
                <small class="form-data-col">{{ $hist->services()->first()->service }}</small>
                <small class="form-data-col">{{ \Carbon\Carbon::parse($hist->appointment_date)->format('M d, Y') }} at {{ \Carbon\Carbon::parse($hist->appointment_time)->format('g:i a') }}</small>
            </div>
        @endforeach
    </div>
@endif