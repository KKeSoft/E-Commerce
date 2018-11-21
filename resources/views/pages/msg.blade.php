@if ($errors->any())
    @foreach ($errors->all() as $error)

        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                    onclick="this.parentElement.style.display='none'">
                <i class="material-icons">close</i>
            </button>
            <span><b> Danger - </b> {{ $error }}</span>
        </div>
    @endforeach
@endif

@if(session('successMsg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                onclick="this.parentElement.style.display='none'">


            <i class="material-icons">close</i>
        </button>
        <span><b> Success - </b> {{ session('successMsg') }}</span>
    </div>
@endif

@if(session('failedMsg'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                onclick="this.parentElement.style.display='none';">
            <i class="material-icons">close</i>
        </button>
        <span><b> Login Failed - </b>
            <?php
            $messege=Session::get('failedMsg');
            if ($messege){
                echo $messege;
                Session::put('failedMsg',null);
            }
            ?>
        </span>
    </div>
@endif
@if(session('messege'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                onclick="this.parentElement.style.display='none';">
            <i class="material-icons">close</i>
        </button>
        <span><b> Login Failed - </b>
            <?php
            $messege=Session::get('messege');
            if ($messege){
                echo $messege;
                Session::put('messege',null);
            }
            ?>
        </span>
    </div>
@endif

