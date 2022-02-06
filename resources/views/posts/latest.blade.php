@php
	use App\Models\User;
@endphp

@foreach ($posts as $post)
	@php
		$username = User::where("id", $post->author)->first()->name;
	@endphp
	<x-blog.post-card :uuid="$post->uuid" :image="$post->image" :slug="$post->slug" :title="$post->title" :author="$username" :date="$post->created_at->diffForHumans()">
		<x-slot name="description">
			{!! $post->content !!}
		</x-slot>
	</x-blog.post-card>
@endforeach