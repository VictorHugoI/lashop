<li id="comment_{{ $comment->id }}" class="entry-comment">
    <table class="ratings-table">
        <colgroup>
        <col width="1">
        <col>
        </colgroup>
        <tbody>
            <tr>
                <td><div>
                    <img src="{{ asset('assets/images/user.png') }}"  alt="..." class="img-circle" style="width: 40%; margin-left: 30%">
                </div></td>
            </tr>
        </tbody>
    </table>
    <div class="review comment-content">
        <div class="row">
            <div class="col-lg-11">
                <h6><a id="comment-username" href="javascript:void(0)">
                    {{ $comment->user->name }}
                </a></h6>
                <small>Review by <span>Leslie Prichard on </span><span class="time-comment">{{ $comment->created_at }}</span></small>
            </div>
            
            <div class="col-lg-1 action-comment" 
            @if(Auth::id() != $comment->user_id)
            style="display: none;" 
            @endif
            >
                <i data-edit="{{ route('comments.update', $comment->id) }}" class="glyphicon glyphicon-pencil edit-comment" style="color: blue; right: 22px; cursor:pointer; "></i>
                <i data-delete="{{ route('comments.destroy', $comment->id) }}" class="glyphicon glyphicon-trash delete-comment" style="color: red; left: 10px; cursor:pointer;" ></i>
            </div>
        </div>
        <div id="comment-content-{{ $comment->id }}" class="review-txt comment-textarea">{{ $comment->content }}</div>
    </div>
</li>
