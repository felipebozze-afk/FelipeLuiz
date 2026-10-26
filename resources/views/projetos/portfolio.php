<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
* { box-sizing: border-box; }
:root { --fundo:#f4f7fb; --texto:#172033; --muted:#68758a; --azul:#2558d8; --escuro:#14264b; --borda:#dce4f0; }
html { scroll-behavior:smooth; scroll-padding-top:90px; }
body { margin:0; background:var(--fundo); color:var(--texto); font:16px/1.65 Arial,Helvetica,sans-serif; }
header { position:sticky; top:0; z-index:5; background:#fff; border-bottom:1px solid var(--borda); }
.navbar { max-width:1120px; min-height:72px; margin:auto; padding:12px 24px; display:flex; align-items:center; justify-content:space-between; gap:24px; }
.logo { color:var(--escuro); font-weight:800; font-size:1.15rem; text-decoration:none; }
.menu { display:flex; gap:22px; margin:0; padding:0; list-style:none; }
.menu a { color:var(--muted); font-weight:600; text-decoration:none; }
.menu a:hover { color:var(--azul); }
main { max-width:1120px; margin:auto; padding:0 24px; }
.inicio { min-height:480px; padding:70px 0; display:flex; align-items:center; justify-content:space-between; gap:35px; }
.inicio-conteudo { max-width:700px; }
.saudacao,.subtitulo-secao { color:var(--muted); }
.inicio h1 { margin:0; color:var(--escuro); font-size:clamp(3rem,8vw,5.2rem); line-height:1.05; letter-spacing:-.06em; }
.inicio h2 { color:var(--azul); }
.botao,.link-projeto { display:inline-block; color:var(--azul); font-weight:700; text-decoration:none; }
.botao { padding:11px 18px; border-radius:8px; background:var(--azul); color:#fff; }
.botao:hover { background:#1947ba; }
.foto { width:170px; height:170px; flex:0 0 170px; display:grid; place-items:center; border-radius:30px; background:#e8efff; color:var(--azul); font-size:3rem; font-weight:800; }
.secao { margin:22px 0; padding:34px; border:1px solid var(--borda); border-radius:16px; background:#fff; }
.titulo-secao { color:var(--escuro); font-size:clamp(1.6rem,4vw,2.2rem); }
.secao-destaque { background:#edf2ff; }
.lista-habilidades { display:flex; flex-wrap:wrap; gap:12px; }
.habilidades { padding:8px 15px; border:1px solid var(--borda); border-radius:999px; background:#fff; font-weight:700; }
.projetos-container { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:16px; }
.projeto-card { min-height:200px; display:flex; flex-direction:column; align-items:flex-start; padding:22px; border:1px solid var(--borda); border-radius:12px; background:#fff; }
.projeto-card h3 { margin:12px 0 5px; color:var(--escuro); }
.projeto-card p { color:var(--muted); }
.projeto-numero { color:var(--azul); font-weight:800; }
.link-projeto { margin-top:auto; }
.contato-container { text-align:center; }
footer { padding:28px 16px; color:var(--muted); text-align:center; }
@media(max-width:760px) { .navbar { align-items:flex-start; flex-direction:column; gap:8px; } .menu { flex-wrap:wrap; gap:8px 16px; } .foto { width:120px; height:120px; flex-basis:120px; } .projetos-container { grid-template-columns:repeat(2,minmax(0,1fr)); } .secao { padding:26px 20px; } }
@media(max-width:520px) { main { padding:0 16px; } .inicio { min-height:0; padding:50px 0; } .foto { display:none; } .projetos-container { grid-template-columns:1fr; } }
</style>
    <title>Felipe Fermino | Portfólio</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <h2 class="logo">Meu Portifólio</h2>
            <ul class="menu">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#habilidades">Habilidades</a></li>
                <li><a href="#projetos">Projetos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="inicio" class="inicio">
            <div class="inicio-conteudo">
                <p class="saudacao">Olá, eu sou </p>
                <h1>Felipe Fermino</h1>
                <h2>Desenvolvedor em Formação</h2>
                <p></p>
                <a href="#projetos" class="botao">
                    Ver meus Projetos
                </a>
            </div>
        </section>

        <section id="sobre" class="secao">
            <h2 class="titulo-secao">Sobre Mim</h2>
            <div class="foto">
                JS
            </div>
            <div class="sobre-texto">
                <h3>Quem sou eu?</h3>
                <p>
                    Me chamo Felipe e sou
                    estudante de desenvolvimento de sistemas.
                </p>
                <p>
                    Atualmente estou estudando sobre PHP, HTML e CSS. Este portfólio reúne
                    alguns dos meus projetos que desenvolvi durante o curso de desenvolvimento de sistemas.
                </p>
                <p>
                    Meu objetivo é seguir evoluindo como desenvolvedor,
                    além de aprender novas tecnologias.
                </p>
            </div>
        </section>

        <section id="habilidades" class="secao secao-destaque">
            <h2 class="titulo-secao">Minhas Habilidades</h2>
            <p class="subtitulo-secao">
                Algumas tecnologias que estou estudando:
            </p>
            <div class="lista-habilidades">
                <div class="habilidades">
                    HTML
                </div>
                <div class="habilidades">
                    CSS
                </div>
                <div class="habilidades">
                    PHP
                </div>
            </div>
        </section>

        <section id="projetos" class="secao">
            <h2 class="titulo-secao">Meus Projetos</h2>
            <p class="subtitulo-secao">Alguns projetos desenvolvidos durante as aulas:</p>
            <div class="projetos-container">
                <article class="projeto-card"><span class="projeto-numero">01</span><h3>Verificador de idade</h3><p>Prática de formulários e manipulação de dados.</p><a href="index.php?rota=idade" class="link-projeto">Abrir projeto →</a></article>
                <article class="projeto-card"><span class="projeto-numero">02</span><h3>Login básico</h3><p>Exercício de formulário e processamento de dados.</p><a href="index.php?rota=loginbasico" class="link-projeto">Abrir projeto →</a></article>
                <article class="projeto-card"><span class="projeto-numero">03</span><h3>Situação do aluno</h3><p>Manipulação de informações enviadas por POST.</p><a href="index.php?rota=notas" class="link-projeto">Abrir projeto →</a></article>
                <article class="projeto-card"><span class="projeto-numero">04</span><h3>Situação do aluno por GET</h3><p>Leitura de informações enviadas pela URL.</p><a href="index.php?rota=notas-get" class="link-projeto">Abrir projeto →</a></article>
                <article class="projeto-card"><span class="projeto-numero">05</span><h3>Cadastro de jogos</h3><p>Cadastro de jogos e informações de lançamento.</p><a href="index.php?rota=jogos" class="link-projeto">Abrir projeto →</a></article>
                <article class="projeto-card"><span class="projeto-numero">06</span><h3>Central de Helpdesk</h3><p>Abertura e acompanhamento de chamados.</p><a href="index.php?rota=helpdesk" class="link-projeto">Abrir projeto →</a></article>
            </div>
        </section>

        <section id="contato" class=" secao secao-destaque">
            <h2 class="titulo-secao">Entre em contato comigo</h2>
                <div class="contato-container">
                    <div class="contato-item">
                        <p><a href="https://github.com/felipebozze-afk" target="_blank" rel="noopener noreferrer">Acessar meu GitHub</a></p>
                    </div>
                </div>
        </section>
    </main>

    <footer>
            <p>
                Desenvolvido por: <a href="https://felipeb315.devlook.xyz/">Felipe </a> 2026
            </p>
        </footer>
</body>
</html>

