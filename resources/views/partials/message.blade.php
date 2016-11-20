@if( isset($message) )
    <div class="alert alert-{{ $type }}">
        <p>{{ $message }}</p>
    </div>

    <?php
//    flash('oh...' . $message )->important();
    ?>

@endif
