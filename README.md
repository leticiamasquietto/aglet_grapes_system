# Aglet Grapes

Sistema web de gestão de produtos artesanais desenvolvido para a disciplina de Desenvolvimento Web.

O projeto foi construído utilizando Laravel e tem como objetivo realizar o gerenciamento completo de produtos, fornecedores e cestas de compras, além de autenticação de usuários e dashboard administrativo.

O sistema foi desenvolvido com foco em:

* organização de produtos artesanais;
* gerenciamento de fornecedores;
* controle de cesta de compras;
* interface moderna inspirada em marketplaces;
* experiência visual baseada em protótipos desenvolvidos no Figma;
* utilização de AJAX para operações dinâmicas sem recarregamento de página.

---

# Integrantes

* Letícia Masquietto de Oliveira Silva - RA 60300765
* Agda Beatriz Jedliczka Domingues - RA 60000631

---

# Tecnologias Utilizadas

## Backend

* PHP 8
* Laravel 13
* Eloquent ORM
* MySQL

## Frontend

* Blade
* HTML5
* Tailwind CSS
* JavaScript
* AJAX
* Lucide Icons

## Ferramentas

* MySQL Workbench
* Figma
* GitHub
* Composer
* XAMPP

---

# Funcionalidades do Sistema

## Autenticação

* Cadastro de usuários
* Login
* Logout
* Rotas protegidas com middleware de autenticação

## Dashboard

* Quantidade total de produtos cadastrados
* Quantidade de fornecedores ativos
* Quantidade de produtos na cesta
* Valor total das vendas
* Produtos recentes
* Fornecedores em destaque

## Fornecedores

* Cadastro de fornecedores
* Listagem dinâmica
* Edição utilizando modal AJAX
* Exclusão dinâmica sem reload
* Validação de e-mail único

## Produtos

* Cadastro de produtos
* Associação com fornecedores
* Edição utilizando modal AJAX
* Exclusão dinâmica sem reload
* Proteção contra exclusão de produtos presentes na cesta

## Cesta

* Criação automática de cesta ativa
* Adição de produtos sem duplicação
* Atualização automática do resumo
* Finalização de pedido
* Limpeza automática da cesta

---

# Etapa 1 — Análise

A interface do sistema foi planejada utilizando o Figma, seguindo boas práticas de UX/UI e priorizando uma navegação simples, moderna e intuitiva.

O design foi inspirado em sistemas modernos de marketplace e dashboards administrativos, utilizando cores suaves, cards, tabelas minimalistas e componentes reutilizáveis.

O sistema possui:

* Tela de Login
* Cadastro de Usuário
* Dashboard
* Cadastro de Produtos
* Cadastro de Fornecedores
* Área da Cesta

## Protótipos no Figma

https://sugar-etch-85714628.figma.site/

## Telas Desenvolvidas

### Tela de Login

<img width="1572" height="941" alt="figma5" src="https://github.com/user-attachments/assets/60650ad4-baad-454c-97e1-aeaf9d58e4f8" />

### Dashboard

<img width="1572" height="943" alt="figma4" src="https://github.com/user-attachments/assets/cfe823ab-7fd4-4c24-8d5c-8e02e1ef76d0" />

### Produtos

<img width="1575" height="949" alt="figma3" src="https://github.com/user-attachments/assets/43924291-89ba-4d88-90f9-812b84a48e81" />

### Fornecedores

<img width="1574" height="913" alt="figma2" src="https://github.com/user-attachments/assets/583dd9ef-945a-45eb-943e-570272574f09" />

### Cesta

<img width="1574" height="919" alt="figma1" src="https://github.com/user-attachments/assets/da3f5ec4-b4ba-4b14-8a73-c76b4d18adb9" />

---

# Etapa 2 — Modelagem

O banco de dados foi modelado utilizando MySQL Workbench, considerando os relacionamentos necessários para autenticação, cadastro de produtos, fornecedores e gerenciamento da cesta.

A modelagem foi construída seguindo o padrão relacional e respeitando regras de integridade referencial.

## Entidades

* usuarios
* fornecedores
* produtos
* cestas
* cesta_produtos

## Relacionamentos

* Um usuário pode possuir várias cestas
* Um fornecedor pode possuir vários produtos
* Uma cesta pode possuir vários produtos
* Um produto pode estar presente em várias cestas

## DER da Aplicação

<img width="1129" height="1184" alt="DERAgletGrapesSystem" src="https://github.com/user-attachments/assets/ec015909-b82b-484d-ad73-4081967cc03e" />

---

# Estrutura do Projeto

O sistema segue a arquitetura MVC do Laravel.

## Models

Responsáveis pela comunicação com o banco de dados:

* User
* Produto
* Fornecedor
* Cesta

## Controllers

Responsáveis pelas regras de negócio:

* AuthController
* DashboardController
* ProdutoController
* FornecedorController
* CestaController

## Views

Interfaces desenvolvidas utilizando Blade e Tailwind CSS:

* Login
* Cadastro
* Dashboard
* Produtos
* Fornecedores
* Cesta

---

# Funcionalidades AJAX

O sistema utiliza AJAX para tornar a experiência mais dinâmica e moderna.

Operações realizadas sem reload:

* edição de fornecedores;
* edição de produtos;
* exclusão de fornecedores;
* exclusão de produtos;
* atualização da cesta;
* atualização automática de resumo.