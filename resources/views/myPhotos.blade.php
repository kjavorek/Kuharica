@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="page-header">
        <h1>My recipes</h1> 
    </div>
    <?php $user=Auth::user()->id;?>

    <?php foreach($fotografije as $foto):?>
        <?php if($foto["userId"]==$user):?>
            <div class="gallery">
                    <a href="/Kuharica/public/imageShow?id=<?php echo htmlspecialchars($foto["id"]) ?>">
                        <p id="myMealName"><?php echo $foto["name"] ?></p> 
                       <center>
                            <img class="allImg" src="../storage/app/<?php echo htmlspecialchars($foto["url_640"]) ?>" alt="Image" />
                       </center> 
                    </a>
            </div>
        <?php endif;?>
    <?php endforeach; ?>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

@endsection
