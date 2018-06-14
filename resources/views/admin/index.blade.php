@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>Fotografije iz baze</h1>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Naziv</th>
            <th>Slika</th>
            <th>Opis</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($fotografije as $foto): ?>
        <tr>
            <th><?php echo htmlspecialchars($foto['name']) ?></th>
            <th><img src="../storage/app/<?php echo htmlspecialchars($foto["url_640"]) ?>" alt="Image" /></th>
            <th><?php echo htmlspecialchars($foto['description']) ?></th> 
            <!--<th><img src="../storage/app/images/13e85d478f7feba9b515e207663e6aa4.jpeg" alt="Image" /></th>-->
            <!--<th><img src="{{url('../storage/app/images/13e85d478f7feba9b515e207663e6aa4.jpeg')}}" alt="Image" /></th>-->
            <!--<th><img height="100" width="100" src="{{url('green-elephant.jpg')}}" alt="Image"/></th>-->
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
@endsection
