<div class="alert-container flex column center-horizontal center-vertical">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 5000);
</script>
<style>
    .alert-container {
        position: fixed;
        top: 20px;
        left: 0;
        width: 100%;
        z-index: 1000;
    }

    .alert {
        padding: 20px;
        border-radius: 10px;
    }

    .alert-success {
        background: var(--dark-green);
        color: var(--light-green);
    }

    .alert-danger {
        background: var(--dark-red);
        color: var(--light-red);
    }
</style>