@extends('layouts.app')

@section('titulo', 'Portfolio')

@section('conteudo')
<x-alert></x-alert>
<header class="header flex center-vertical center-horizontal">
    <div class="navbar flex center-vertical gap-20">
        <img src="{{ asset('logo.png') }}" alt="logo" class="navbar-logo">
        <ul class="flex center-vertical gap-20">
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
    </div>
</header>

<main class="main">
    <section id="home" class="section" style="display: none;">
        <div class="flex center-vertical center-horizontal space-between gap-30">
            <div class="flex column gap-20">
                <h1>Olá Mundo!<br>Eu sou o Tiago Augusto!</h1>
                <p>Neste espaço, compartilho minhas experiências e conquistas ao longo da minha carreira. Aqui você encontrará uma coleção dos meus projetos mais recentes, habilidades, conhecimentos e um pouco sobre mim.</p>
                <div class="socials flex center-vertical center-horizontal gap-10">
                    <x-button-social icon="fa-brands fa-linkedin" label="LinkedIn" link="https://www.linkedin.com/in/tiago-augusto-dal-acqua-gon%C3%A7alves/"></x-button-social>
                    <x-button-social icon="fa-brands fa-github" label="GitHub" link="https://github.com/tiagoadag1203"></x-button-social>
                </div>
            </div>
            <div class="perfil-image-container">
                <img class="perfil-image" src="https://iili.io/3zQ498g.jpg" alt="">
            </div>
        </div>
    </section>

    <section id="perfil" class="section" style="display: none;">
        <div class="flex gap-30 center-vertical">
            <div class="perfil-image-container">
                <img class="perfil-image" src="https://iili.io/3zQ498g.jpg" alt="">
            </div>
            <div class="flex column gap-20">
                <h1>Sobre Mim</h1>
                <p>{{ $personalInfo->bio }}</p>
            </div>
        </div>
    </section>

    <section id="habilidades" class="section" style="display: none;">
        <div class="flex column center-vertical gap-50">
            <h1>Habilidades</h1>
            <div class="skill-container flex gap-50">
                <div class="skill-container flex column center-vertical center-horizontal gap-20">
                    <h2>Hard Skills</h2>
                    <ul class="flex column gap-10">
                        @foreach ($hardSkills as $hardSkill)
                        <li>
                            <x-skill :skill="$hardSkill" img="{{ $hardSkill->image }}" name="{{ $hardSkill->name }}"></x-skill>
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
                            <x-skill :skill="$hardSkill" img="{{ $hardSkill->image }}" name="{{ $hardSkill->name }}"></x-skill>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="experiencia" class="section" style="display: none;">
        <div class="flex column center-vertical gap-30">
            <h1>Experiência</h1>
            <div class="flex gap-20 center-vertical wrap">
                @foreach ($experiences as $experience)
                <x-card-experience :item="$experience"></x-card-experience>
                @endforeach
            </div>
        </div>
    </section>

    <section id="projetos" class="section" style="display: block;">
    <div class="flex column center-vertical gap-30">
            <h1>Projetos</h1>
            <div class="flex gap-20 center-vertical wrap">
                @foreach ($projects as $project)
                <x-card :item="$project" type="project"></x-card>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contato" class="section" style="display: none;">
        <h1>Contato</h1>
    </section>
</main>

<style>

</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll(".section");
        const menuItems = document.querySelectorAll(".nav-item");

        // Exibir apenas a seção inicial (Home)
        function showSection(sectionId) {
            sections.forEach((section) => {
                section.style.display = section.id === sectionId ? "block" : "none";
            });
        }

        showSection("home"); // Inicia na Home

        // Adiciona evento de clique aos itens do menu
        menuItems.forEach((item) => {
            item.addEventListener("click", function() {
                const sectionId = this.getAttribute("data-section");
                showSection(sectionId);
            });
        });
    });
</script>