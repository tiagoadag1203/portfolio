@extends('layouts.app')

@section('titulo', 'Portfolio')

@section('conteudo')
<x-alert></x-alert>
<header class="header flex center-vertical center-horizontal">
    <div class="navbar flex center-vertical gap-20">
        <img src="{{ asset('logo.png') }}" alt="logo" class="navbar-logo">
        <ul class="desktop-nav flex center-vertical gap-20">
            <li class="nav-item" data-section="home">Home</li>
            <hr>
            <li class="nav-item" data-section="perfil">Perfil</li>
            <hr>
            <li class="nav-item" data-section="habilidades">Habilidades</li>
            <hr>
            <li class="nav-item" data-section="experiencia">Experiência</li>
            <hr>
            <li class="nav-item" data-section="projetos">Projetos</li>
            <hr>
            <li class="nav-item" data-section="contato">Contato</li>
        </ul>
        <!-- mobile -->
        <div class="mobile-nav flex center-vertical center-horizontal gap-10">
            <button class="pass-section" id="prev-section"><span class="material-symbols-outlined">arrow_back_ios_new</span></button>
            <span id="mobile-section-name">Home</span>
            <button class="pass-section" id="next-section"><span class="material-symbols-outlined">arrow_forward_ios</span></button>
        </div>
    </div>
</header>

<main class="main">
    <section id="home" class="section">
        <div class="home flex center-vertical center-horizontal space-between gap-30">
            <div class="texts flex column gap-20">
                <h1>Olá Mundo!<br>Eu sou o Tiago Augusto!</h1>
                <p>Neste espaço, compartilho minhas experiências e conquistas ao longo da minha carreira. Aqui você encontrará uma coleção dos meus projetos mais recentes, habilidades, conhecimentos e um pouco sobre mim.</p>
                <div class="socials flex center-vertical center-horizontal gap-10">
                    <x-button-social icon="fa-brands fa-linkedin" label="LinkedIn" link="https://www.linkedin.com/in/tiago-augusto-dal-acqua-gon%C3%A7alves/"></x-button-social>
                    <x-button-social icon="fa-brands fa-github" label="GitHub" link="https://github.com/tiagoadag1203"></x-button-social>
                </div>
            </div>
            <img class="cape-image" src="https://iili.io/3GOvjEb.png" alt="">
        </div>
    </section>

    <hr class="section-divider">

    <section id="perfil" class="section">
        <div class="perfil flex gap-30 center-vertical">
            <div class="perfil-image-container">
                <img class="perfil-image" src="https://iili.io/3zQ498g.jpg" alt="">
            </div>
            <div class="texts flex column gap-20">
                <h1>Sobre Mim</h1>
                <p>{{ $personalInfo->bio }}</p>
            </div>
        </div>
    </section>

    <hr class="section-divider">

    <section id="habilidades" class="section">
        <div class="skills flex column center-vertical gap-50">
            <h1>Habilidades</h1>
            <div class="skills-container flex gap-50">
                <div class="skill-container flex column center-vertical center-horizontal gap-20">
                    <h2>Hard Skills</h2>
                    <ul class="flex column gap-10">
                        @foreach ($hardSkills as $hardSkill)
                        <li>
                            <x-skill :skill="$hardSkill"></x-skill>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <hr>
                <div class="skill-container flex column center-vertical center-horizontal gap-20">
                    <h2>Soft Skills</h2>
                    <ul class="flex column gap-10">
                        @foreach ($softSkills as $softSkill)
                        <li>
                            <x-skill :skill="$softSkill"></x-skill>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <hr class="section-divider">

    <section id="experiencia" class="section">
        <div class="flex column center-vertical gap-30">
            <h1>Experiência</h1>
            <div class="flex gap-20 center-vertical center-horizontal stretch wrap">
                @foreach ($experiences as $experience)
                <x-card-experience :item="$experience"></x-card-experience>
                @endforeach
            </div>
        </div>
    </section>

    <hr class="section-divider">

    <section id="projetos" class="section">
        <div class="flex column center-vertical gap-30">
            <h1>Projetos</h1>
            <div class="flex gap-20 center-vertical center-horizontal ">
                @foreach ($projects as $project)
                <x-card :item="$project" type="project"></x-card>
                @endforeach
            </div>
        </div>
    </section>

    <hr class="section-divider">

    <section id="contato" class="section">
        <div class="flex column center-vertical gap-30">
            <h1>Contato</h1>
            <div class="contact-container flex center-horizontal">
                <form action="{{ route('messages.store') }}" method="post" class="contact-form flex column center-vertical gap-20">
                    @csrf
                    <x-input id="name" label="Nome" name="name" type="text" placeholder="Digite seu nome" required="true"></x-input>
                    <x-input id="email" label="Email" name="email" type="email" placeholder="Digite seu email" required="true"></x-input>
                    <x-input id="message" label="Mensagem" name="message" type="textarea" placeholder="Digite sua mensagem" required="true"></x-input>
                    <x-button type="submit" label="Enviar Mensagem" icon="send"></x-button>
                </form>
            </div>
        </div>
    </section>
</main>

<style>

</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll(".section");
        const menuItems = document.querySelectorAll(".nav-item");
        const mobileSectionName = document.getElementById("mobile-section-name");
        const prevButton = document.getElementById("prev-section");
        const nextButton = document.getElementById("next-section");

        const sectionIds = Array.from(sections).map(section => section.id);
        let currentSectionIndex = 0;

        // Função para atualizar o indicador da seção atual
        function updateCurrentSection(index) {
            currentSectionIndex = index;
            const sectionName = sectionIds[index];
            mobileSectionName.textContent = sectionName.charAt(0).toUpperCase() + sectionName.slice(1);
            
            // Atualizar estado ativo do menu
            menuItems.forEach((item) => {
                item.classList.toggle('active', item.getAttribute('data-section') === sectionName);
            });
        }

        // Função para fazer scroll suave para uma seção com offset para o menu
        function scrollToSection(sectionId) {
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        // Observer para detectar qual seção está visível
        const observerOptions = {
            root: null,
            rootMargin: '-20% 0px -20% 0px',
            threshold: [0, 0.25, 0.5, 0.75, 1]
        };

        const observer = new IntersectionObserver((entries) => {
            let maxRatio = 0;
            let mostVisibleSection = null;
            
            entries.forEach((entry) => {
                if (entry.intersectionRatio > maxRatio) {
                    maxRatio = entry.intersectionRatio;
                    mostVisibleSection = entry.target;
                }
            });
            
            if (mostVisibleSection && maxRatio > 0.25) {
                const sectionIndex = sectionIds.indexOf(mostVisibleSection.id);
                if (sectionIndex !== -1 && sectionIndex !== currentSectionIndex) {
                    updateCurrentSection(sectionIndex);
                }
            }
        }, observerOptions);

        // Observar todas as seções
        sections.forEach(section => {
            observer.observe(section);
        });

        // Inicializar na seção "Home"
        updateCurrentSection(0);

        // Adicionar evento de clique aos itens do menu desktop
        menuItems.forEach((item) => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                const sectionId = this.getAttribute("data-section");
                const sectionIndex = sectionIds.indexOf(sectionId);
                if (sectionIndex !== -1) {
                    updateCurrentSection(sectionIndex);
                    scrollToSection(sectionId);
                }
            });
        });

        // Navegação mobile - seção anterior
        prevButton.addEventListener("click", (e) => {
            e.preventDefault();
            const newIndex = Math.max(0, currentSectionIndex - 1);
            updateCurrentSection(newIndex);
            scrollToSection(sectionIds[newIndex]);
        });

        // Navegação mobile - próxima seção
        nextButton.addEventListener("click", (e) => {
            e.preventDefault();
            const newIndex = Math.min(sectionIds.length - 1, currentSectionIndex + 1);
            updateCurrentSection(newIndex);
            scrollToSection(sectionIds[newIndex]);
        });

        // Navegação por teclado (setas)
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowDown' && currentSectionIndex < sectionIds.length - 1) {
                e.preventDefault();
                const newIndex = currentSectionIndex + 1;
                updateCurrentSection(newIndex);
                scrollToSection(sectionIds[newIndex]);
            } else if (e.key === 'ArrowUp' && currentSectionIndex > 0) {
                e.preventDefault();
                const newIndex = currentSectionIndex - 1;
                updateCurrentSection(newIndex);
                scrollToSection(sectionIds[newIndex]);
            }
        });
    });
</script>