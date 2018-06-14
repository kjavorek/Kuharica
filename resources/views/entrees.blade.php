@extends('layouts.app')

@section('content')
<div class="container text-center">
    <?php @$user=Auth::user()->id;?>
    <!--<p><img height=100px; width=100px; src="{{asset('green-elephant.jpg')}}"/></p>-->
    <form method="post" enctype="multipart/form-data">
    <?php foreach($fotografije as $foto): ?>
        @if($foto["type"]=="entrees")
        @if (Auth::guest())
            <?php if($foto["isPublic"]):?>
			<div class="gallery">
				<p class="recipesName"><?php echo $foto["name"] ?></p>
				<img class="allImg" src="../storage/app/<?php echo htmlspecialchars($foto["url_640"]) ?>" alt="Image" />          
            </div>
            <?php endif;?>
        @else
            <?php if($foto["isPublic"]|| $foto["userId"]==$user):?>
            <div class="gallery">
				<a href="/Kuharica/public/imageShow?id=<?php echo htmlspecialchars($foto["id"]) ?>">
				<p class="recipesName"><?php echo $foto["name"] ?></p>
				<img class="allImg" src="../storage/app/<?php echo htmlspecialchars($foto["url_640"]) ?>" alt="Image" />
				</a>
            </div>
            <?php endif;?>
        @endif
        @endif
    <?php endforeach; ?>

@endsection
