
    @extends('profil.layout')

    @section('content')

    <!-- Start Content -->
    
          <div class="col-sm-9 page-content">
            <div class="inner-box">              
              <h2 class="title-2"><i class="fa fa-folder-o"></i> {{__('myads.archive_page_title')}} </h2>
              @if ($results <> [])
              <div class="table-responsive">
                <form action="/deleteAll" method="post">
                  @csrf
                  @method('DELETE')
                <div class="table-action">
                  <div class="checkbox">
                    <label for="checkAll">
                      <input id="checkAll" type="checkbox">
                      {{__('myads.select_all_button')}} | <button type="submit" class="btn btn-xs btn-danger"> {{__('myads.delete_all_button')}} <i class="fa fa-close"></i></button>
                    </label>
                  </div>
                  <div class="table-search pull-right col-xs-7">
                    <div class="form-group">
                      <label class="col-xs-5 control-label text-right">{{__('myads.search_input')}} <br>
                      </label>
                      <div class="col-xs-7 searchpan">
                        <input class="form-control" id="filter" type="text">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="product-filter">
                  <div class="grid-list-count list-grid-view">
                    <a class="list switchToGrid" href="#"><i class="fa fa-list"></i></a>
                    <a class="grid switchToList" href="#"><i class="fa fa-th-large"></i></a>
                  </div>
                </div>
                
                <!-- Adds wrapper Start -->
                <div class="adds-wrapper">              
                  @foreach ($results as $result)
                  <div class="item-list filter" id="{{$result->id_annonce}}">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="ids[]" class="selectbox" value="{{$result->id_annonce}}">
                        </label>
                      </div>
                    <div class="col-sm-2 no-padding photobox">
                      <div class="add-image">
                        <a href="/my-ads/details/{{$result->id_annonce}}">
                          @if ($result->hasPicture == '1')
                            @foreach ($imageAd as $img) 
                              @if ($result->id_annonce == $img->id_annonce)
                                <img src="{{Storage::disk('s3')->url($img->imagename)}}" alt=""></a>
                              @endif
                            @endforeach
                          @else 
                            <img src="{{asset('img/nopicture.png')}}" alt=""></a>
                          @endif
                        <span class="photo-count"><i class="fa fa-camera"></i></span>
                      </div>
                    </div>
                    <div class="col-sm-7 add-desc-box">
                      <div class="add-details">
                        <h5 class="add-title title"><a href="/my-ads/details/{{$result->id_annonce}}">{{$result->titre}}</a></h5>
                        <div class="info">
                          
                          <span class="date">
                            <i class="fa fa-clock"></i>
                            {{\Carbon\Carbon::parse($result->created_at)->diffForHumans()}}
                          </span> -
                          <span class="item-location"><i class="fa fa-map-marker"></i> {{$result->wilaya}}</span>
                        </div>
                        <div class="item_desc">
                          <a href="/my-ads/details/{{$result->id_annonce}}">{{Str::limit($result->description, 30)}}</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3 text-right  price-box">
                      <h2 class="item-price" data-test="{{$result->prix}}"> {{$result->prix <> '' ? $result->prix.'DA' : '' }}</h2>
                      <p> <a class="btn btn-info btn-xs" onclick="repostAd({{$result->id_annonce}})"> <i class="fa fa-recycle"></i> {{__('myads.republish')}} </a></p>
                      <p> <a class="btn btn-danger btn-xs" onclick="deleteAd({{$result->id_annonce}})"> <i class=" fa fa-trash"></i> {{__('myads.delete_button')}} </a></p>
                    </div>
                  </div>    
                  @endforeach
                </div>
                <!-- Adds wrapper End -->
              </form>
              </div>  
              @else 
              <h6>{{__('myads.archive_empty_result')}}</h6>
              @endif
            </div>
          </div>

    <!-- End Content -->

    <script>

      function deleteAd(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
          title: "Êtes-vous sûr?",
          text: "Une fois supprimé, vous ne pourrez plus récupérer cette annonce!",
          icon: "warning",
          buttons: ["Annuler", "Oui"],
          dangerMode: true,
        })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url : "/update-AD/"+id,
                type : "POST",
                data : {'_method' : 'DELETE','_token':csrf_token},
                success : function(data){
                  swal("Votre annonce a été supprimée!", {
                    icon: "success",
                  });
                  $('#'+id).remove();
                }
              })
            }
          });
      }

      function repostAd(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
          title: "Êtes-vous sûr?",
          icon: "warning",
          buttons: ["Annuler", "Oui"],
          dangerMode: true,
        })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  url : "/repostAd/"+id,
                  type : "POST",
                  data : {'_method' : 'PATCH','_token':csrf_token},
                  success : function(data){
                    swal("Votre annonce a été republiée!", {
                      icon: "success",
                    });
                    $('#'+id).remove();
                  }
                })
              }
            });
      }

    </script>

@endsection