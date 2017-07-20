@foreach($comments as $comment)
	@include('customers.products.sections.comment', ['comment' => $comment])
@endforeach