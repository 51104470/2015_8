@extends('layout')

@section('title')
    Product Detail
@stop

@section('scripts')
  {!! HTML::script('js/expanding.js') !!}
  {!! HTML::script('js/starrr.js') !!}

  <script type="text/javascript">
    $(function(){

      // initialize the autosize plugin on the review text area
      $('#new-review').autosize({append: "\n"});

      var reviewBox = $('#post-review-box');
      var newReview = $('#new-review');
      var openReviewBtn = $('#open-review-box');
      var closeReviewBtn = $('#close-review-box');
      var ratingsField = $('#ratings-hidden');

      openReviewBtn.click(function(e)
      {
        reviewBox.slideDown(400, function()
          {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
          });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
      });

      closeReviewBtn.click(function(e)
      {
        e.preventDefault();
        reviewBox.slideUp(300, function()
          {
            newReview.focus();
            openReviewBtn.fadeIn(200);
          });
        closeReviewBtn.hide();
        
      });

      // If there were validation errors we need to open the comment form programmatically 
      @if($errors->first('comment') || $errors->first('rating'))
        openReviewBtn.click();
      @endif

      // Bind the change event for the star rating - store the rating value in a hidden field
      $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
      });
    });
  </script>
@stop

@section('styles')
  <style type="text/css">

     /* Enhance the look of the textarea expanding animation */
     .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
      }

      .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
      }

      .ratings {
        margin-top: 20px;
      }
  </style>
@stop


@section('content')
<div class="container">
	<h1 class='name-product'>{!!  $product->name  !!}</h1>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-xs-12">
        <img class="center-block img-responsive" src="{!!  $product->image  !!}" />
      </div>
      <div class="col-md-8 col-xs-12 product-infomation center">
        <p>
          <b>Giới thiệu:</b> {!!  $product->description  !!}
        </p>
        <p>
          <b>Lượt xem:</b> {!!  $product->view_number  !!}
        </p>
        <p>
          <b>Số lượng còn lại:</b> {!!  $product->number  !!}
        </p>
        <a href="/add_cart/{!!  $product->id  !!}" class="btn btn-default">Mua hàng</a>
        <div class="ratings">
          <p class="pull-right">{!! $product->rating_count !!} nhận xét</p>
          <p>
            @for ($i=1; $i <= 5 ; $i++)
              <span class="glyphicon glyphicon-star{!!  ($i <= $product->rating_cache) ? ' yellow' : '-empty' !!}"></span>
            @endfor
            {!!  number_format($product->rating_cache, 1)  !!} điểm
          </p>
        </div>
        <div class="well" id="reviews-anchor">
          <div class="text-right">
            <a href="#reviews-anchor" id="open-review-box" class="btn btn-default">Để lại đánh giá</a>
          </div>
          <div class="row" id="post-review-box" style="display:none;">
            <div class="col-md-12">
              {!! Form::open() !!}
              {!! Form::hidden('rating', '', array('id'=>'ratings-hidden')) !!}
              {!! Form::textarea('comment', '', array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Nhập nhận xét của bạn...')) !!}
              <div class="text-right">
                <div class="stars starrr" data-rating="{!! Input::old('rating',0) !!}"></div>
                <a href="#" class="btn btn-default" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Hủy</a>
                <button class="btn btn-default" type="submit">Đồng ý</button>
              </div>
            {!! Form::close() !!}
            </div>
          </div>

          @foreach($reviews as $review)
          <hr>
            <div class="row">
              <div class="col-md-12">
                @for ($i=1; $i <= 5 ; $i++)
                  <span class="glyphicon glyphicon-star{{  ($i <= $review->rating) ? '' : '-empty' }}"></span>
                @endfor

                {{ $review->user ? $review->user->name : 'Vô danh' }} <span class="pull-right">{{ $review->timeago }}</span> 
                
                <p>{{ $review->comment }}</p>
              </div>
            </div>
          @endforeach
          {{ $reviews->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection