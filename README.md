# CRUD vanilla PHP

## Sobre

CRUD desenvolvido em PHP sem a utilização de frameworks para teste de conhecimentos. 

É possível Criar/Editar/Excluir/Listar usuários e também vincular/desvincular várias cores ao usuário.

### Configurar ambiente
- Instalado Php;
- Extensão do Sqlite para o Php.

### Rodar aplicação

``` 
php -S 0.0.0.0:7070
```

Acessar: http://localhost:7070

### Estrutura de pastas escolhida

#### `/pages`
Possui as views diferentes de `index.php`.

#### `/infra`
Possui respositorios responsáveis por encapsular a comunicação com o Banco de Dados.

#### `/models`
Armazena os modelos responsáveis por encapsular e manipulação de dados em memória.

#### `/usecases`
Armazena os serviços responsáveis por orquestrar modelos e repositórios com o objetivo de aplicar uma regra de negócio/ caso de uso da aplicação.  