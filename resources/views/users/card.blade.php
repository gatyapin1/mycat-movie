<div class="card mb-3">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body text-center">
        <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 200) }}" alt="">
    </div>
</div>
@include('user_follow.follow_button', ['user' => $user])