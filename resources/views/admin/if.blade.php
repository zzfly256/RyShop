@if(!Auth::user() or Auth::user()->level!=0)

    <div class="toast toast-primary">
        <section class="container grid-960">
        这位朋友，请不要搞笑好嘛？
        </section>
    </div>
    @include("good_index");
    <?php die();?>
@endif