@if ($history->count() < 1)
    <div class="placeholder-illustrations">
        <div class="d-flex flex-direction-y gap2">
            <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
            <div class="text-l3 text-center">No Record</div>
        </div>
    </div>
@else
    <div class="d-flex flex-direction-y gap3">
        @php
            $currentDoctor = "";
        @endphp
        @foreach ($history as $hist)

            @if ($hist->doctor != $currentDoctor)
                <a href="/ViewHistoryFull/{{$hist->doctor}}" class="long-cont text-decoration-none color-black2">
                    <div class="w-50 d-flex align-items-center">
                        <div class="table1-PFP-small mar-end-2">
                            <img class="emp-pfp" src="/assets/media/pfp/{{ $hist->doctors()->first()->pfp }}" alt="">
                        </div>
                        <div class="txt-l3">
                            Dr.
                            {{$hist->doctors()->first()->firstname}}
                            {{$hist->doctors()->first()->lastname}}
                        </div>
                    </div>
                </a>
            @endif  
            
            

            @php
                $currentDoctor = $hist->doctor;
            @endphp

        @endforeach
    </div>
    
@endif