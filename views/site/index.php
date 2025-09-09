<?php

use app\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this); 

/** @var yii\web\View $this */

$this->title = 'KNK Training Center';
?>


<section class="hero-banner">
    <div class="container">
        <h1 class="hero-title">Bem-vindo a Knk Training!</h1>
        <p class="hero-subtitle">Sua vida saudável é nosso negócio</p>
        <button class="btn btn-primary btn-lg" onclick="location.href ='http://knktraining.com.br';">sobre nós</button>
    </div>
</section>

<main class="main-content-bg">
    <div class="container">
        <div class="row">        
            <div class="col-large-12">
                <h2>Invista em sua Mente, Transforme seu Corpo</h2>
Se a vida tem sido uma corrida constante, é hora de priorizar o que realmente importa: sua saúde mental e sua paz interior. Na Knk Training, acreditamos que a verdadeira força vem de dentro.</p>

<p>Nossos serviços não são apenas sobre músculos; são sobre disciplina, foco e equilíbrio. Oferecemos um refúgio onde você pode se desconectar do caos e se reconectar consigo mesmo.</p>
               
            </div>
        </div>
    </div>
</main>

<section class="services-area">
    <div class="container">
        <h2 class="text-center text-center">Nossos Serviços</h2>
        <div class="row justify-content-center">
            <div class="col-lg-3 mb-3">
                <div class="card  ">
                    <div class="card-body">
                        <h5 class="card-title">Artes marciais</h5>
                        <p class="card-text">
                            <ul>                                
                                <li>Judo</li>
                                <li>Jiu-Jitsu</li>
                                <li>Muay-Thai</li>
                        
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 mb-3 mb-5">
                <div class="card  ">
                    <div class="card-body">
                        <h5 class="card-title">Pilates</h5>
                        <p class="card-text">Descrição breve do serviço.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  mb-3 mb-5">
                <div class="card s">
                    <div class="card-body">
                        <h5 class="card-title">treinamento-Funcional</h5>
                        <p class="card-text">Descrição breve do serviço.</p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>

<section class="social-media-area">
    <div class="container text-center">
        <h2 class="mb-4">Siga-nos nas Redes Sociais</h2>
        <a href="https://www.instagram.com/knktrainingcenter/" target="_blank" class="social-icon">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="" target="_blank" class="social-icon">
            <i class="bi bi-facebook"></i>
        </a>
    </div>
</section>

<section class="contact-area">
    <div class="container">
        <h2 class="text-center mb-5">Entre em Contato</h2>
        <div class="row">
            <div class="col-md-6 contact-image-wrapper d-flex align-items-center justify-content-center">
                <img src="<?=  Url::to("@web/img/contato.jpg")?>" alt="Imagem de Contato" class="contact-image">
            </div>
            <div class="col-md-6 contact-form-wrapper">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" placeholder="Seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="seu@email.com">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Sua mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </div>
