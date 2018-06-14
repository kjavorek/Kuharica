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
    <?php foreach($foto as $k=>$v): ?>
        <?php $imgName=($v["name"]); ?>
        <?php $imgDescription=($v["description"]); ?>
        <?php $isPublic=($v["isPublic"]); ?>
        <?php $imgType=($v["type"]); ?>
        <?php $imgId=($v["id"]); ?>
    <?php endforeach; ?>
    <form method="post" action="{{ url('/edit') }}" enctype="multipart/form-data">
        
        <div>
            <h2 class="addImgTitle">Edit details</h2>
            <button type="submit" name="button" value="submit" class="btn btn-primary btnSubmit">Submit</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="user" value="<?php echo $user=Auth::user()->id;?>"/>
        <input type="hidden" name="id" value="<?php echo $imgId?>"/>
        
        <div class="col-md-8 form-group"> <!--showRight-->
            <br>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $imgName ?>"></input>
            <br>
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control"><?php echo $imgDescription ?></textarea>
            <br>
            <br>
            <label>Privacy</label><br />
            <label class="radio-inline" for="public">
                <input type="radio" name="isPublic" id="public" value="1" checked="<?php echo $isPublic ?>"/>Public
            </label>
            <label class="radio-inline" for="private">
                <input type="radio" name="isPublic" id="private" value="0" checked="<?php echo !$isPublic ?>"/>Private
            </label>
            <br>
            <br>
            <label>Type</label><br />
            <label class="radio-inline" for="soups">
                <input type="radio" name="type" id="soups" value="soups" checked="<?php echo $imgType=='soups' ?>"/>Soups
            </label>
            <label class="radio-inline" for="snacks">
                <input type="radio" name="type" id="snacks" value="snacks" checked="<?php echo $imgType=='snacks' ?>"/>Appetizers and snacks
            </label>
            <label class="radio-inline" for="entrees">
                <input type="radio" name="type" id="entrees" value="entrees" checked="<?php echo $imgType=='entrees' ?>"/>Entrees
            </label>
            <label class="radio-inline" for="desserts">
                <input type="radio" name="type" id="desserts" value="desserts" checked="<?php echo $imgType=='desserts' ?>"/>Desserts
            </label>
            <label class="radio-inline" for="other">
                <input type="radio" name="type" id="other" value="other" checked="<?php echo $imgType=='other' ?>"/>Other
            </label>
        </div>

    </form>

@endsection
