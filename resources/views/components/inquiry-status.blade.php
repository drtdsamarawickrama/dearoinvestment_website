<div class="h-auto max-h-[400px] sm:h-[280px] relative top-[-400px] sm:top-[-280px] left-0 bg-gradient-to-r from-white sm:bg-none">
    <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 pt-6 sm:pt-0">
        <p class="text-3xl lg:text-4xl text-theme-blue font-bold mt-10">{{ $state['title'] }}</p>
        <p class="text-2xl text-theme-orange font-bold mt-1">{{ $state['sub_title'] }}</p>
        
        <div class="w-full h-auto sm:w-2/3 md:w-1/2 mt-5">
            <div class="w-full lg:w-2/3">
                <p class="text-md text-theme-gray font-bold">Inquiry Id: {{ $state['inquiry_id'] }}</p>
                @switch($state['status'])
                    @case('DRAFT')
                        <p class="text-md text-theme-gray font-bold mt-1">Status: Draft</p>
                    @break

                    @case('PENDING_RESPONSE')
                        <p class="text-md text-theme-gray font-bold mt-1">Status: Submitted</p>
                    @break

                    @case('BRANCH_RESPONDED')
                        <p class="text-md text-theme-gray font-bold mt-1">Status: Submitted - Reviewed</p>
                    @break

                    @case('CUSTOMER_ACTION_PENDING')
                        <p class="text-md text-theme-gray font-bold mt-1">Status: Submitted - Action Required</p>
                    @break
                @endswitch
                
                <p class="text-md text-theme-gray font-bold mt-3 sm:mt-1">Progress</p>

                <div class="flex justify-start items-center mt-1 sm:mt-0 gap-4">
                    @for ($i = 1; $i <= $state['total_steps']; $i++)
                        @if($i == $state['current_step'])
                            <div class="w-8 h-8 bg-theme-orange border-2 border-theme-orange rounded-full flex justify-center items-center text-white text-md font-bold">{{$i}}</div>
                        @else
                            <div class="w-8 h-8 bg-white border-2 border-theme-orange rounded-full flex justify-center items-center text-theme-orange text-md font-bold">{{$i}}</div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>