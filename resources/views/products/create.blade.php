<!-- @extends('products.layout')  -->
@extends('layouts.app') 

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>   

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif    
<style>
    .errcls{
        color:red;
    }
</style>
<form action="{{ route('products.store') }}" method="POST" onsubmit="return validation()">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" id = "name" name="name" class="form-control" placeholder="Name">
                <span id="errname" class="errcls"></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea  id="detail" class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                <span id="errdetail" class="errcls"></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    function validation(){     
        f = 1
        document.getElementById("errname").style.display = "none"
        document.getElementById("errdetail").style.display = "none"

        name = document.getElementById("name").value;
        detail = document.getElementById("detail").value;
        
        if(name == ""){
            f=0
            document.querySelector("#errname").style.display = "block"
            document.querySelector("#errname").innerHTML = "Please provide name"
        }else{
                //check the data  whether it is valid or not 
                chk = checkcharacter(name)
                if(chk == 0){
                    f=0
                    document.getElementById("errname").style.display = "block"
                    document.getElementById("errname").innerHTML = "Please provide valid name"
                }
        }
        if(detail == ""){
            f=0
            document.querySelector("#errdetail").style.display = "block"
            document.querySelector("#errdetail").innerHTML = "Please provide detail"
        }
        
        if(f == 1){
            return true;
        }else{
            return false
        }
    }
    function  checkcharacter(name){        
        var regex = /^[a-zA-Z]+$/;   
        if(regex.test(name) == false){
            return 0
        }else{
            return 1
        }
    }
</script>
@endsection