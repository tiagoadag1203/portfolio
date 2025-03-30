<a href="{{ $link }}" target="_blank">
    <div class="button-social flex center-vertical center-horizontal gap-5">
        @if(!empty($icon2))
            <span class="material-symbols-outlined">{{ $icon2 }}</span>
        @elseif(!empty($icon))
            <i class="{{ $icon }}"></i>
        @endif
        <div class="btn-label">
            {{ $label }}
        </div>
    </div>
</a>

<style>
    .button-social {
        width: fit-content;
        min-width: 35px;
        height: 35px;
        background-color: var(--title-color);
        border-radius: 100px;
        padding: 10px;
        transition: all 0.3s ease;
        color: black;
        box-sizing: border-box;
        overflow: hidden;

        span {
            font-size: 1.2rem;
        }
    }

    .button-social:hover {
        background-color: var(--primary);
        color: var(--title-color);
        padding: 10px 20px;
    }

    .btn-label {
        display: none;
        max-width: 0;
        opacity: 0;
        white-space: nowrap;
        overflow: hidden;
    }

    .button-social:hover .btn-label {
        display: block;
        max-width: 200px;
        opacity: 1;
    }
</style>

<!-- <script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttonSocials = document.querySelectorAll('.button-social');

        buttonSocials.forEach(buttonSocial => {
            buttonSocial.addEventListener('mouseover', () => {
                buttonSocial.querySelector('.btn-label').style.display = 'block';
            });

            buttonSocial.addEventListener('mouseout', () => {
                buttonSocial.querySelector('.btn-label').style.display = 'none';
            });
        });
    });
</script> -->