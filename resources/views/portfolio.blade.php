@extends('layouts.app')

@section('titulo', 'Portfolio')

@section('conteudo')
<x-alert></x-alert>
<header class="header flex center-vertical center-horizontal">
    <div class="navbar flex center-vertical gap-20">
        <img src="{{ asset('logo.png') }}" alt="logo" class="navbar-logo">
        <ul class="flex center-vertical gap-20">
            <li href="#home" class="nav-item">Home</li>
            <hr>
            <li href="#perfil" class="nav-item">Perfil</li>
            <hr>
            <li href="#habilidades" class="nav-item">Habilidades</li>
            <hr>
            <li href="#experiencia" class="nav-item">Experiência</li>
            <hr>
            <li href="#projetos" class="nav-item">Projetos</li>
            <hr>
            <li href="#contato" class="nav-item">Contato</li>
        </ul>
    </div>
</header>

<main class="main">
    <section id="home" class="section flex center-vertical center-horizontal space-between gap-30">
        <div class="flex column gap-20">
            <h1>Olá Mundo!<br>Eu sou o Tiago Augusto!</h1>
            <p>Neste espaço, compartilho minhas experiências e conquistas ao longo da minha carreira. Aqui você encontrará uma coleção dos meus projetos mais recentes, habilidades, conhecimentos e um pouco sobre mim.</p>
            <div class="socials flex center-vertical center-horizontal gap-10">
                <x-button-social icon="share" label="LinkedIn" link=""></x-button-social>
                <x-button-social icon="share" label="GitHub" link=""></x-button-social>
            </div>
        </div>
        <div class="perfil-image-container">
            <img class="perfil-image" src="https://iili.io/3zQ498g.jpg" alt="">
        </div>
    </section>

    <!-- <section id="perfil" class="section">
        <h1>Perfil</h1>
    </section>

    <section id="habilidades" class="section">
        <h1>Habilidades</h1>
    </section>

    <section id="experiencia" class="section">
        <h1>Experiência</h1>
    </section>

    <section id="projetos" class="section">
        <h1>Projetos</h1>
    </section>

    <section id="contato" class="section">
        <h1>Contato</h1>
    </section> -->
</main>

<style>
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 30px;
    }

    .navbar {
        width: fit-content;
        background-color: var(--secondary-background-color);
        border: 1px solid var(--gray);
        border-radius: 100px;
        padding: 25px;
    }

    .navbar-logo {
        width: 60px;
    }

    .nav-item {
        list-style: none;
        cursor: pointer;
        color: var(--title-color);
        transition: 0.2s;
    }

    .nav-item:hover {
        color: var(--primary);
    }

    .section {
        padding: 0 100px;

        p {
            max-width: 800px;
        }
    }

    /* HOME */

    #home {
        h1 {
            font-size: 4rem;
            color: var(--title-color);
        }
    }

    .socials {
        width: fit-content;
        padding: 10px;
        border: 1px solid var(--gray);
        border-radius: 100px;
        background-color: var(--secondary-background-color);
    }

    .perfil-image-container {
        width: 450px;
        height: 450px;
        padding: 10px;
        background-color: var(--secondary-background-color);
        border: 1px solid var(--gray);
        background-size: cover;
        border-radius: 50%;
        /* background-image: url('https://iili.io/3zQ498g.jpg'); */
        /* -webkit-box-shadow: inset 0px 0px 100px 100px var(--background-color);
        -moz-box-shado: inset 0px 0px 100px 100px var(--background-color);
        box-shadow: inset 0px 0px 100px 120px var(--background-color); */
    }

    .perfil-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
</style>