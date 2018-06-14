@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ url('/form') }}" enctype="multipart/form-data">
        
        <div>
            <h2 class="addImgTitle">Add details and save your recipe</h2>
            <button type="submit" name="button" value="submit" class="btn btn-primary btnSubmit">Submit</button>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        
        <div class="col-md-4 form-group"><!--displayInline-->
            <img id="preview" src="../storage/app/tmp/<?php echo $imgName ?>" alt="Image" />
        </div>
        
        <input type="hidden" name="user" value="<?php echo $user=Auth::user()->id;?>"/>
        <input type="hidden" name="img" value="<?php echo $imgName ?>"/>
        
        <div class="col-md-8 form-group"> <!--showRight-->
            <br>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="" class="form-control"></input>
            <br>
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="" class="form-control"></textarea>
            <br>
            <br>
            <label>Privacy</label><br />
            <label class="radio-inline" for="public">
                <input type="radio" name="isPublic" id="public" value="1"/>Public
            </label>
            <label class="radio-inline" for="private">
                <input type="radio" name="isPublic" id="private" value="0"/>Private
            </label>
            <br>
            <br>
            <label>Type</label><br />
            <label class="radio-inline" for="soups">
                <input type="radio" name="type" id="soups" value="soups"/>Soups
            </label>
            <label class="radio-inline" for="snacks">
                <input type="radio" name="type" id="snacks" value="snacks"/>Appetizers and snacks
            </label>
            <label class="radio-inline" for="entrees">
                <input type="radio" name="type" id="entrees" value="entrees"/>Entrees
            </label>
            <label class="radio-inline" for="desserts">
                <input type="radio" name="type" id="desserts" value="desserts"/>Desserts
            </label>
            <label class="radio-inline" for="other">
                <input type="radio" name="type" id="other" value="other"/>Other
            </label>
        </div>

    </form>

@endsection
