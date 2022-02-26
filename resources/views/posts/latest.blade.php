@php
	use App\Models\User;
@endphp

<div id="posts" class="grid grid-cols-1 gap-12 lg:grid-cols-2 xl:grid-cols-3">
	@php
		$z = 9999999;
	@endphp
	@foreach ($posts as $post)
		@php
			$username = User::where("id", $post->author)->first()->name;
		@endphp
		<x-blog.post-card z="{{ $z-- }}" :uuid="$post->uuid" :image="$post->image" :slug="$post->slug" :title="$post->title" :author="$username" :date="$post->created_at->diffForHumans()">
			<x-slot name="description">
				{!! $post->content !!}
			</x-slot>
		</x-blog.post-card>
	@endforeach
	</div>