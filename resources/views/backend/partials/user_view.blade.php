<div class="modal fade" id="user_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data" id="form_validation">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">User Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6"><lable class="font-bold">Emp ID : </lable> <span>{{$user->emp_id}}</span></div>
                        <div class="col-md-6"><lable class="font-bold">Name : </lable> <span>{{$user->name}}</span></div>
                        <div class="col-md-6"><lable class="font-bold">Email : </lable> <span>{{$user->email}}</span></div>
                        <div class="col-md-6"><lable class="font-bold">Phone : </lable> <span>{{$user->phone_1}}</span></div>
                        <div class="col-md-6"><lable class="font-bold">Gender : </lable> <span>{{ucfirst($user->gender) }}</span></div>
                        <div class="col-md-6"><lable class="font-bold">DOB : </lable> <span>{{$user->dob}}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><lable class="font-bold">Address : </lable></div>
                        <div class="col-md-12"><address>{{$user->address->address_1}}<br>{{$user->address->city}} {{$user->address->state}}<br>{{$user->address->country}}-{{$user->address->pincode}}</address></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>
