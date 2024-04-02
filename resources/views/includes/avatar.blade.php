<div class="image-avatar">
@if (auth()->user()->image)  
<img src="users/{{auth()->user()->image}}" class="rounded  mx-auto  mt-2" style="height: 150px">
@endif
</div>

<x-input-error class="mt-2" :messages="$errors->get('image')" />
