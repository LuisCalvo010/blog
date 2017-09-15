 @if(count($errors))
<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card red lighten-1">
            <div class="card-content white-text">
                <p class="center-align">
                    @foreach($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endif