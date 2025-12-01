<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    <title>Dearo - Delete Data Request</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    @include('layouts.navigation-guest')

    <div class="w-full h-auto mb-auto">
        <!-- Title and Para -->
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Request to delete customer data</h3>
            <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Customers can request to delete data from inquiry system. Your request will be recorded and your will be contacted to verify your indentity.</p>

            <h6 class="text-theme-blue text-2xl font-bold text-left mt-6">Deletion Request Form</h6>
            <form id="form-customer-data-deletion" action="" method="POST" class="m-0 p-0">
                @csrf
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                    <div class="w-full text-sm">
                        <label for="first_name" class="text-theme-gray">First Name <span class="text-theme-red">*</span></label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter first name" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required />
                    </div>
                    <div class="w-full text-sm">
                        <label for="last_name" class="text-theme-gray">Last Name <span class="text-theme-red">*</span></label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter last name" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required />
                    </div>
                </div>
                <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-x-3 xl:gap-x-4 gap-y-3 mt-3">
                    <div class="w-full text-sm">
                        <label for="email" class="text-theme-gray">Email <span class="text-theme-red">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Enter email" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="phone" class="text-theme-gray">Phone Number <span class="text-theme-red">*</span></label>
                        <input type="text" id="phone" name="phone" placeholder="Enter phone number" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                    <div class="w-full text-sm">
                        <label for="reason" class="text-theme-gray">Reason for deletion <span class="text-theme-red">*</span></label>
                        <input type="text" id="reason" name="reason" placeholder="Enter reason for deletion request" class="h-10 mt-1 border-theme-gray text-md w-full" value="" required/>
                    </div>
                </div>
                <div class="w-full text-sm mt-3">
                    <label for="specifics" class="text-theme-gray">Deletion specifics <span class="text-theme-red">*</span></label>
                    <textarea type="text" id="specifics" name="specifics" placeholder="Specify what data do you want to be deleted" rows="3" class="h-10 mt-1 border-theme-gray text-md w-full" required></textarea>
                </div>
                <div class="w-full flex justify-start mt-4 items-center">
                    <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Request Deletion</button>
                    <div id="deletion-success-acknowledge" class="hidden p-0 m-0">
                        <div class="text-md text-theme-gray flex items-center ml-4">
                            <p>Successfully Recorded</p>
                            <div class="w-5 h-5 flex justify-center items-center bg-theme-orange rounded-full ml-2">
                                <img src="{{ url('/assets/img/inquiry/icon-check-white.svg') }}" /> 
                            </div>
                        </div>
                    </div>
                    <div id="deletion-inprogress" class="upload-inprogress text-md text-theme-gray hidden ml-4">
                        <p>Recording please wait ...</p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
    <script>
        $(document).ready(function (){
            console.log('deletion form loaded');
            $('#form-customer-data-deletion').submit(function (e){
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "/delete-customer-data",
                    data: new FormData(document.getElementById("form-customer-data-deletion")),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $('#deletion-inprogress').show();
                    },
                    success: function (response){
                        if(!response.error){
                            $('#deletion-inprogress').hide();
                            $('#deletion-success-acknowledge').show();
                        }else{
                            
                        }
                        console.log('Error status: '+response.error+' Message: '+response.message);
                    },
                    error: function (response){
                        $('#deletion-inprogress p').text('Something went wrong. Please make sure all the fields are filled');
                        $('#deletion-inprogress').show();
                        console.log(response);
                    }
                });
            });
        });
    </script>
</body>
</html>