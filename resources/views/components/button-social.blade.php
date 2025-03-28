<div class="button-social flex center-vertical center-horizontal gap-5">
    <span class="material-symbols-outlined">
        {{ $icon }}
    </span>
    <div class="btn-label">
        {{ $label}}
    </div>
</div>

<style>
    .button-social {
        background-color: var(--title-color);
        border-radius: 100px;
        padding: 10px;
        transition: 0.2s;
        color: black;
        box-sizing: border-box;

        span {
            font-size: 1.5rem;
        }
    }

    .btn-label {
        display: none;
    }
</style>

<script>
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
</script>