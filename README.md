# Aglet Grapes

Sistema web de gestão de produtos desenvolvido para a disciplina de Desenvolvimento Web.

O projeto tem como objetivo realizar autenticação de usuários, cadastro de produtos e fornecedores, além do gerenciamento de cestas de compras.

---

# Integrantes

* Letícia Masquietto de Oliveira Silva
* Agda Beatriz Jedliczka Domingues

---

# Tecnologias Utilizadas

* PHP
* MySQL
* PDO
* HTML5
* CSS3
* JavaScript
* Bootstrap/Tailwind
* MySQL Workbench
* Figma

---

# Etapa 1 — Análise

A interface do sistema foi planejada utilizando o Figma, seguindo boas práticas de UX/UI e priorizando uma navegação simples, moderna e intuitiva.

O sistema possui:

* Tela de Login
* Cadastro de Usuário
* Dashboard
* Cadastro de Produtos
* Cadastro de Fornecedores
* Área da Cesta

## Protótipos no Figma

Adicionar link do Figma aqui.

## Telas Desenvolvidas

### Tela de Login

### Dashboard

### Produtos

### Fornecedores

### Cesta

---

# Etapa 2 — Modelagem

O banco de dados foi modelado utilizando MySQL Workbench, considerando os relacionamentos necessários para autenticação, cadastro de produtos, fornecedores e gerenciamento da cesta.

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

![DER](imagens/der_aglet_grapes.png)
