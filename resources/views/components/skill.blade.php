@props(['skill'])

<div class="skill flex gap-10 center-vertical space-between" data-skill-id="{{ $skill->id }}">
    <div class="content flex gap-10 center-vertical">
        <img src="{{ $skill->image }}" alt="{{ $skill->name }}" class="skill-icon" crossorigin="anonymous">
        <p class="skill-name">{{ Str::limit($skill->name, 25, '...') }}</p>
    </div>
    <div>
        <span class="info material-symbols-outlined" onclick="openModal('modal-{{ $skill->name }}')">
            info
        </span>
    </div>
</div>

<x-modal id="modal-{{ $skill->name }}" title="{{ $skill->name }}">
    <div class="flex column gap-20">
        <h3>Descrição:</h3>
        <p>{{ $skill->description }}</p>

        @if ($skill->skill_type == 'hard')
        <p>Nível de Conhecimento:</p>
        <div class="flex gap-10">
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $skill->percentage }}%"></div>
            </div>
            <p>{{ $skill->percentage }}%</p>
        </div>
        @endif
        
        <h3>Certificados:</h3>
        <div class="flex gap-20 wrap">
            @if ($skill->certificates->isEmpty())
            <p>Não há certificados disponíveis.</p>
            @endif
            @foreach ($skill->certificates as $certificate)
            <x-card :item="$certificate" type=""></x-card>
            @endforeach
        </div>
    </div>
</x-modal>

<style>
    .skill {
        width: 200px;
        background: var(--secondary-background-color);
        border: 1px solid var(--gray);
        border-radius: 100px;
        padding: 10px;
        /* transition: background 0.3s ease; */
    }

    .content {
        width: 100%;
    }

    .skill-icon {
        width: 40px;
        height: 40px;
        border-radius: 100px;
    }

    .skill-name {
        font-size: 15px;
        font-weight: bold;
    }

    .progress-bar {
        width: 100%;
        height: fit-content;
        background-color: var(--dark-blue);
        border-radius: 8px;
        overflow: hidden;
    }

    .progress-fill {
        height: 10px;
        background-color: var(--light-blue);
        border-radius: 100px;
    }

    span.info:hover {
        cursor: pointer;
        color: rgb(255, 199, 14);
        transition: 0.3s;
    }
</style>

<script>
function getDominantColor(img) {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    
    canvas.width = img.width;
    canvas.height = img.height;
    
    ctx.drawImage(img, 0, 0, img.width, img.height);
    
    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    const data = imageData.data;
    
    const colorCounts = {};
    
    // Amostragem de pixels (pega 1 a cada 10 pixels para performance)
    for (let i = 0; i < data.length; i += 40) {
        const r = data[i];
        const g = data[i + 1];
        const b = data[i + 2];
        const alpha = data[i + 3];
        
        // Ignora pixels transparentes
        if (alpha < 125) continue;
        
        // Arredonda as cores para reduzir variações
        const roundedR = Math.round(r / 10) * 10;
        const roundedG = Math.round(g / 10) * 10;
        const roundedB = Math.round(b / 10) * 10;
        
        const color = `${roundedR},${roundedG},${roundedB}`;
        colorCounts[color] = (colorCounts[color] || 0) + 1;
    }
    
    // Encontra a cor mais comum
    let dominantColor = '128,128,128'; // cor padrão
    let maxCount = 0;
    
    for (const color in colorCounts) {
        if (colorCounts[color] > maxCount) {
            maxCount = colorCounts[color];
            dominantColor = color;
        }
    }
    
    return dominantColor;
}

function applyGradientBackground() {
    const skills = document.querySelectorAll('.skill');
    
    skills.forEach(skill => {
        const img = skill.querySelector('.skill-icon');
        
        if (img.complete) {
            try {
                const dominantColor = getDominantColor(img);
                const gradient = `linear-gradient(70deg, rgba(${dominantColor}, 0.3) 0%, var(--secondary-background-color) 60%)`;
                
                skill.style.background = gradient;
                // skill.style.borderColor = `rgba(${dominantColor}, 0.3)`;
            } catch (error) {
                console.log('Erro ao extrair cor da imagem:', error);
            }
        } else {
            img.onload = function() {
                try {
                    const dominantColor = getDominantColor(img);
                    const gradient = `linear-gradient(70deg, rgba(${dominantColor}, 0.3) 0%, var(--secondary-background-color) 60%)`;
                    
                    skill.style.background = gradient;
                    // skill.style.borderColor = `rgba(${dominantColor}, 0.3)`;
                } catch (error) {
                    console.log('Erro ao extrair cor da imagem:', error);
                }
            };
        }
    });
}

// Executa quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', applyGradientBackground);
</script>