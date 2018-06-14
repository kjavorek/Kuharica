@extends('layouts.app')

@section('content')

    <div class="modal fade" id="filterModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="filterModalLabel" action="{{ url('/forma') }}">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" 
                data-dismiss="modal" 
                aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" 
              id="filterModalLabel">The Sun Also Rises</h4>
            </div>
            <div class="modal-body">
              <!--<p>Please confirm you would like to add<b><span id="fav-title">The Sun Also Rises</span></b>to your favorites list.</p>-->
                <img id="filterPreview" src="../storage/app/tmp/n2.jpg" alt="Image2" />
            </div>
            <div class="modal-footer">
              <button type="button" 
                 class="btn btn-default" 
                 data-dismiss="modal">Close</button>
              <span class="pull-right">
                <button type="button" class="btn btn-primary">
                  Potvrdi
                </button>
              </span>
            </div>
          </div>
        </div>
      </div>
@endsection
