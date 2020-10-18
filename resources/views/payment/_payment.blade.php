<div class="payment__inner__delivery__comment__show__border">
  <div class="payment__inner__delivery__comment__show__header">
    <div class="payment__inner__delivery__comment__show__header__name">{{ $comment->name }}</div>
    <div class="payment__inner__delivery__comment__show__header__date">{{ $comment->created_at }}</div>
  </div>
  <div class="payment__inner__delivery__comment__show__line"></div>
  <div class="payment__inner__delivery__comment__show__comment__text">
    {{ $comment->review }}
  </div>
  </div>