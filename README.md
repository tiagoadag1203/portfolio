### **Objetivo Geral:**  

Desenvolver um portfólio pessoal dinâmico e interativo, utilizando o framework Laravel e o banco de dados SQLite. O projeto consiste em duas partes principais: uma página pública para exibição do portfólio e uma área de gerenciamento privada para atualização e manutenção das informações.

---

### Funcionalidades do Projeto:

1. **Página Pública:**
    
    - A página pública será acessível a todos os visitantes e exibirá as informações do portfólio.
        
    - Será uma **página única (one-page)**, dividida nas seguintes seções:
        
        - **Home:** Apresentação inicial com uma breve introdução e uma chamada para explorar o portfólio.
            
        - **Perfil:** Exibição das informações pessoais (biografia e imagem de perfil).
            
        - **Habilidades:** Listagem das habilidades técnicas (hard skills) e comportamentais (soft skills), com porcentagem de domínio para as hard skills.
            
        - **Experiências:** Histórico profissional, com detalhes sobre empresas, cargos, descrições e períodos.
            
        - **Projetos:** Apresentação dos projetos realizados, com imagens, descrições e links para GitHub e/ou sites.
            
        - **Contato:** Informações de contato e um formulário para envio de mensagens (opcional).
            
    - O menu de navegação permitirá que os visitantes alternem entre as seções. Ao clicar em um item do menu, a seção correspondente será exibida, enquanto as outras seções serão ocultadas.
        
    - O design será responsivo e moderno, garantindo uma boa experiência em dispositivos móveis e desktops.
        
2. **Área de Gerenciamento (Admin):**
    
    - A área de gerenciamento será restrita a um único usuário (você) e exigirá autenticação para acesso.
        
    - **Tela de Login:** Uma tela de login simples, utilizando o sistema de autenticação do Laravel, para acessar o painel de administração.
        
    - Será composta por uma **interface administrativa** onde você poderá gerenciar as informações exibidas na página pública.
        
    - Cada tipo de informação terá uma **tela dedicada** para edição, exclusão e adição de novos registros:
        
        - **Informações Pessoais:** Gerenciamento da biografia e imagem de perfil.
            
        - **Habilidades:** Adição, edição e remoção de habilidades (hard e soft skills).
            
        - **Certificados:** Gerenciamento dos certificados associados às habilidades.
            
        - **Experiências:** Adição, edição e remoção de experiências profissionais.
            
        - **Projetos:** Gerenciamento dos projetos do portfólio.
            
    - As informações serão armazenadas em um banco de dados SQLite, com tabelas específicas para cada tipo de dado.
        

---

### Estrutura do Banco de Dados (SQLite):

1. **personal_info** (Informações pessoais):
    
    - `id` (PK)
        
    - `bio` (Biografia)
        
    - `image` (Caminho da imagem de perfil)
        
    - `created_at`, `updated_at`
        
2. **skills** (Habilidades):
    
    - `id` (PK)
        
    - `name` (Exemplo: Laravel, JavaScript)
        
    - `skill_type` (hard ou soft)
        
    - `percentage` (porcentagem de conhecimento para hard skills)
        
    - `description`
        
    - `image` (Caminho da imagem da skill)
        
    - `created_at`, `updated_at`
        
3. **certificates** (Certificados):
    
    - `id` (PK)
        
    - `skill_id` (FK -> skills)
        
    - `name` (Nome do certificado)
        
    - `image` (Caminho da imagem do certificado)
        
    - `link` (Link do certificado)
        
    - `created_at`, `updated_at`
        
4. **experiences** (Experiências profissionais):
    
    - `id` (PK)
        
    - `name` (Nome da empresa)
        
    - `role` (Cargo)
        
    - `description`
        
    - `image` (Imagem da empresa)
        
    - `start_date`
        
    - `end_date` (NULL se for atual)
        
    - `created_at`, `updated_at`
        
5. **projects** (Projetos):
    
    - `id` (PK)
        
    - `name` (Nome do projeto)
        
    - `description`
        
    - `image` (Caminho da imagem do projeto)
        
    - `github_link`
        
    - `website_link`
        
    - `created_at`, `updated_at`
        
6. **users** (Usuário administrador):
    
    - `id` (PK)
        
    - `name`
        
    - `email`
        
    - `password`
        
    - `created_at`, `updated_at`
        

---

### Fluxo de Trabalho:

1. **Página Pública:**
    
    - O visitante acessa o site e visualiza o portfólio.
        
    - Ao interagir com o menu, as seções são alternadas dinamicamente sem recarregar a página.
        
2. **Área de Gerenciamento:**
    
    - Você faz login na área administrativa através da tela de login.
        
    - Acessa as telas de gerenciamento para cada tipo de informação (informações pessoais, habilidades, certificados, experiências, projetos).
        
    - Realiza as operações de CRUD (Create, Read, Update, Delete) nas tabelas do banco de dados.
        
    - As alterações são refletidas automaticamente na página pública.
        

---

### Tecnologias Utilizadas:

- **Backend:** Laravel (PHP) para lógica de negócios e integração com o banco de dados.
    
- **Frontend:** HTML, CSS (Próprio), JavaScript.
    
- **Banco de Dados:** SQLite para armazenamento local das informações.
    
- **Autenticação:** Sistema de login simples com Laravel.