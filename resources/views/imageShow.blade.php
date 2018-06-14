@extends('layouts.app')

@section('content')

    <div class="page-header">
        <?php foreach($foto as $k=>$v): ?>
            <?php $imagePath=($v["url_1080"]); ?>
            <?php $imgDescription=($v["description"]); ?>
            <?php $imgName=($v["name"]); ?>
            <?php $imgId=($v["id"]); ?>
        <?php endforeach; ?>
        <?php foreach($user as $k=>$v): ?>
            <?php $creatorUser=$v["name"]; ?>
            <?php $currentUser=$v["id"]; ?>
	<?php endforeach; ?>
        <h1 id="imgPadding">
            <b>Name:</b><i><?php echo $imgName;?></i>
            <?php if ($currentUser==Auth::user()->id): ?>
                <button type="submit" id="deleteImg" name="deleteImg" value="deleteImg" class="btn btn-primary btnDelete">Delete</button>
                <a href="/Kuharica/public/edit?id=<?php echo $imgId ?>">
                    {{ csrf_field() }}
                    <button type="submit" id="edit-task-{{ $imgId }}" class="btn btn-warning btnDelete">
                        <i class="fa fa-btn fa-edit"></i>Edit
                    </button>
                </a>
            <?php endif;?>
        </h1>
        <div class="col-md-4">
            <img class="chosenImg" src="../storage/app/<?php echo $imagePath ?>" alt="Image" />
        </div>
        <div class="col-md-8 imageDetails">
            <b>Description:</b><br> <?php echo $imgDescription;?>
            <br><br><b>Posted by:</b> <?php echo $creatorUser;?>
        </div>
    </div>
	
<!-------------------------------------------------------------------------------------------------------------------------->
<!--Modal for submitting deleting an image-->
  <div class="modal fade" id="previewModal" role="dialog">
    <div class="modal-dialog modal-sm deleteModal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you shure you want to delete this recipe?</h4>
        </div>
        <div class="modal-footer">
                  <form action="{{url('imageShow/' . $imgId)}}" method="POST" style="display:inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" id="delete-imgId-{{ $imgId }}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Delete
                    </button>
                </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-------------------------------------------------------------------------------------------------------------------------->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    $("#deleteImg").click(function(){
        $('#previewModal').modal('toggle');
	$('#previewModal').modal('show');
    });
    $('#submitMeal').click(function(){
            $('#previewModal').modal('hide');
    });
</script>
	
@endsection