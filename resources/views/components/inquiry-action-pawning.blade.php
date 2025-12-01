<div class="h-auto max-h-[400px] sm:h-[280px] relative top-[-400px] sm:top-[-280px] left-0 bg-gradient-to-r from-white sm:bg-none">
    <div class="w-full h-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 pt-6 sm:pt-0">
        <p class="text-3xl lg:text-4xl text-theme-blue font-light mt-10">FD for <span class="font-bold">{{ $customer_profile->first_name }}</span></p>
        @php 
            if($customer_profile->district){
                $district = (App\Models\District::find($customer_profile->district))->district_name;
            }else{
                $district = 'N/A';
            }
        @endphp
        <p class="text-2xl text-theme-orange font-bold mt-1">Customer district: {{ $district }}</p>
        
        <div class="w-full h-auto sm:w-2/3 md:w-1/2 mt-5">
            <div class="w-full lg:w-2/3">
                <p class="text-md text-theme-gray font-bold">Inquiry Id: {{ $inquiry_general->id }}</p>
                @switch($inquiry_general->inquiry_status)
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
                
                @if($inquiry_general->inquiry_status != 'DRAFT')
                <form action="{{ route('dearo.inquiry.pawning.application.state.update') }}" method="post" class="p-0 m-0">
                    @csrf
                    <input type="hidden" name="inquiry_id" value="{{ $inquiry_general->id }}" />
                    <div class="w-full flex items-center justify-start">
                        <select name="fd_inquiry_status" class="h-10 border-theme-gray text-md">
                            @foreach($pawning_details->getAdminInquirySteps() as $stepIdentifier)
                                @if($pawning_details->inquiry_step == $stepIdentifier)
                                    <option value="{{ $stepIdentifier }}" selected>{{ $pawning_details->getAdminInquiryStepLabel($stepIdentifier) }}</option>
                                @else
                                    <option value="{{ $stepIdentifier }}">{{ $pawning_details->getAdminInquiryStepLabel($stepIdentifier) }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2 ml-2">Update</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>