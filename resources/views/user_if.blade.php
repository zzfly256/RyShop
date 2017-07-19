@if(!Auth::user() or Auth::user()->id!=$current_id)

    <div class="toast toast-primary">
        <section class="container grid-960">
            这位朋友，请不要搞笑好嘛？
        </section>
    </div>
    {{--@include("user_index");--}}
    <?php die();?>
@endif