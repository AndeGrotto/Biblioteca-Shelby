<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Biblioteca Shelby</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Ezequiel, Bruno, Doglas, Anderson" />
    <meta name="description" content="Biblioteca Shelby" />
    <meta name="keywords" content="html5, css, javascript, jquery, biblioteca" />

    <!-- Estilos -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="../Include/css/estiloPA.css" />
  </head>

  <body>
    <?php
    include("../Include/SessaoValidate.php");  // Faz a autenticação
    ?>

    <header id="cabecalho-principal">
      <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="mx-auto navbar-centered">
          <a class="navbar-brand mx-auto" href="#">
            <img
              src="../Include/imagens/imagem4.png"
              alt=""
              srcset=""
              height="80px"
            />
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
            
              <li class="nav-item">
                <a class="nav-link" href="mostrarLivros.php">Livro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mostrarAlunos.php">Aluno</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mostrarEmprestimo.php">Empréstimo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="cabecalho-text">
        <h1>BIBLIOTECA SHELBY</h1>
        <div class="container">
          <h2>O livro é um pássaro com mais de cem asas para voar.</h2>
          <h2>A leitura engrandece a alma!</h2>
        </div>
      </div>
    </header>
    <main>
      <section id="team">
        <div class="container">
          <h3 class="main-title">Livros Em Destaque</h3>

          <div class="row no-gutters">
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <img
                  src="../Include/imagens/Livro1.jpg"
                  alt="Imagem do Livro um"
                />
                <div class="member-body">
                  <h5>De volta Para Casa</h5>
                  <span>Seanan McGuire</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <img
                  src="../Include/imagens/graveto.jpg"
                  alt="Imagem do Livro dois"
                />
                <div class="member-body">
                  <h5>Entre Gravetos e Ossos</h5>
                  <span>Seanan McGuire</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <img
                  src="../Include/imagens/Livro3.png"
                  alt="Imagem do Livro Três"
                />
                <div class="member-body">
                  <h5>TIGER LILY</h5>
                  <span>Jodi Lynn</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <img
                  src="../Include/imagens/Livro4.png"
                  alt="Imagem do Livro Quatro"
                />
                <div class="member-body">
                  <h5>A Trama Perdida</h5>
                  <span>Genevieve</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <img
                  src="../Include/imagens/Livro5.png"
                  alt="Imagem do Livro Cinco"
                />
                <div class="member-body">
                  <h5>A Cidade das Mascaras</h5>
                  <span>Genevieve</span>
                </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="member">
              <img
                src="../Include/imagens/Livro6.png"
                alt="Imagem do Livro Seis"
              />
              <div class="member-body">
                <h5>Biblioteca Invisivel</h5>
                <span>Morro Branco</span>
              </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="member">
            <img
              src="../Include/imagens/Livro7.png"
              alt="Imagem do Livro Sete"
            />
            <div class="member-body">
              <h5>O Céu De Pedra</h5>
              <span>N.Jemisin</span>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="member">
            <img
              src="../Include/imagens/Livro8.jpg"
              alt="Imagem do Livro Oito"
            />
            <div class="member-body">
              <h5>O Portão do Obelisco</h5>
              <span>N.Jemisin</span>
            </div>
          </div>
        </div>
      </section>

      <section id="hiring">
        <div id="apply-area">
          <div class="container-fluid">
            <h3 class="main-title">Sobre O Site</h3>
            <div class="row">
              <div class="col-md-6 apply-box" id="pattern-img">
                <div class="ident-area">
                  <h4>CRUD ALUNOS</h4>
                  <p></p>
                  <p>
                    CRUD é o acrônimo da expressão do idioma Inglês, Create (Criação),
                     Read (Consulta), Update (Atualização) e Delete (Destruição).                  
                  </p>
                  <p>
                    Este acrônimo é comumente utilizado para definir as quatro operações básicas 
                    usadas em Banco de Dados Relacionais. Existem alguns tipos de páginas que entram no conceito do CRUD.
                  </p>
                  <p>
                    Clique logo a baixo e prencha o formulário de cadastro para
                    concorrer a uma das vagas.
                  </p>
                  <a href="cadastrarAlunos.php" class="main-btn" id="apply-btn">Cadastrar Aluno</a>
                </div>
              </div>
              <div class="col-md-6 apply-box" id="local-img"></div>
            </div>
          </div>
        </div>
      </section>

      <section id="CRUD">
        <div class="container">
          <h3 class="main-title">CRUD ALUNOS</h3>

          <div class="row no-gutters">
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <a href="cadastrarAlunos.php">
                  <img
                    src="../Include/imagens/Capturar.JPG"
                    alt="Imagem do CRUD de Cadastro de Alunos"
                  />
                </a>
                <div class="member-body">
                  <h5>Cadastrar Alunos</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
              <div class="member ident-CRUD">
                Na opção "Alunos" será feito o CRUD dos alunos que desejam locar um livro 
                contendo "id", "nome" e "contato“, será possível adicionar e excluir do banco 
                de dados.
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="CRUD">
        <div class="container">
          <h3 class="main-title">CRUD LIVROS</h3>

          <div class="row no-gutters">
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <a href="cadastrarLivros.php">
                  <img
                    src="../Include/imagens/crudlivros.JPG"
                    alt="Imagem do CRUD de Cadastro de Livros"
                  />
                </a>
                <div class="member-body">
                  <h5>Cadastrar Livros</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
              <div class="member ident-CRUD">
                Na opção "Livros" será feito o CRUD dos livros cadastrados pela 
                bibliotecária contendo "isbn", "nome" e "autor“, sendo possível adicionar e 
                excluir do banco de dados.
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="CRUD">
        <div class="container">
          <h3 class="main-title">CRUD EMPRESTIMO</h3>

          <div class="row no-gutters">
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="member">
                <a href="#">
                  <img
                    src="../Include/imagens/crudlivros.JPG"
                    alt="Imagem do CRUD de EMPRESTIMO de Livros"
                  />
                </a>
                <div class="member-body">
                  <h5>Cadastrar Emprestimo</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
              <div class="member ident-CRUD">
                Na opção "Empréstimo" será feito o CRUD dos livros e alunos cadastrados pela 
                bibliotecária contendo "codLivros", "codAlunos", "dataRetirada e "dataDevolucao" sendo possível adicionar e 
                excluir do banco de dados.
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-column">
            <ul class="nav flex-column">
              <li class="nav-item">
                <span class="footer-title">Nomes</span>
              </li>
              <li class="nav-item">
                <span class="nav-link"
                >Anderson Grotto</span>
              </li>
              <li class="nav-item">
                <span class="nav-link"
                >Ezequiel Fornari</span>
              </li>
              <li class="nav-item">
                <span class="nav-link"
                >Doglas Oliveira Bogoni</span>
              </li>
              <li class="nav-item">
                <span class="nav-link"
                >Bruno Casagrande</span>
              </li>
            </ul>
          </div>
          <div class="col-md-4 footer-column">
            <ul class="nav flex-column">
              <li class="nav-item">
                <span class="footer-title">Pagina</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mostrarLivros.php">Livros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mostrarAlunos.php">Alunos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Empréstimo</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 footer-column">
            <ul class="nav flex-column">
              <li class="nav-item">
                <span class="footer-title">Informações</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#team"
                  ><i class="fas fa-book"></i>Nossos Livros</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#navbarSupportedContent"
                  ><i class="fas fa-undo"></i>Voltar Ao Topo</a
                >
              </li>
            </ul>
          </div>
        </div>

        <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>

        <div class="row text-center">
          <div class="col-md-4 box">
            <span class="copyright quick-links"
              >Copyright &copy; ABDE
              <script>
                document.write(new Date().getFullYear());
              </script>
            </span>
          </div>
          <div class="col-md-4 box">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://mobile.twitter.com/" target="_blank">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/" target="_blank">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/" target="_blank">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
    <script src="../Include/js/javascript.js"></script>
  </body>
</html>
