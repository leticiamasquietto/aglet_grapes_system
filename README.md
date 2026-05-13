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

(https://sugar-etch-85714628.figma.site/)

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

