@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Student</div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('update',$arrStudent->id) }}" method="POST" name="form1" id="form1">
@csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name*</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="{{$arrStudent->firstname}}">

                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="{{$arrStudent->lastname}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email Address*</label>
                                        <input type="text" name="emailid" id="emailid" class="form-control" placeholder="Email Address" value="{{$arrStudent->emailid}}">
                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Contact Number*</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number" value="{{$arrStudent->phone_number}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Age</label>
                                        <select name="age" id="age" class="form-control">
                                            <option value="" selected="selected">--Choose--</option>
                                            <?php for($i=1;$i<=50;$i++) {?>
                                            <option value="<?php echo $i;?>" selected="{{ $arrStudent->age ==$i? 'selected' : ''}}"><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Sex*</label>
                                        <select name="sex" id="sex" class="form-control">
                                            <option value="" selected="selected">--Choose--</option>                      
                                            <option value="M" selected="{{$arrStudent->sex =='M'? 'selected' : ''}}">Male</option>
                                            <option value="F" selected="{{$arrStudent->sex =='F'? 'selected' : ''}}">Female</option>
                                            <option value="O" selected="{{$arrStudent->sex =='O'? 'selected' : ''}}">Others</option>                                            
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="save" name="save" >Save</button>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection