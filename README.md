# Projeto teste PerfectPay

Para iniciar, instale o banco de dados “perfectpay.sql” com a estrutura do projeto, encontra-se na pasta raiz do projeto.

## Controllers 
- controlClient:
exibe os dados de vendas do cliente e adiciona os clientes.

- controlProducts:
Adiciona, exibe e atualiza os produtos.

- controlSales:
Adiciona, exibe e atualiza as vendas.

## Migrations 
- 2021_09_24_215524_create_products_table
- 2021_09_24_215558_create_sales_table
- 2021_09_24_215622_create_clients_table

## Views
- crud_client.blade
Formulário para adicionar novos clientes.

- crud_products_edit.blade
Formulário para editar os produtos.

- crud_products.blade
Formulário para adicionar os produtos.

- crud_sales_edit.blade
Formulário para editar as vendas.

- crud_sales.blade
Formulário para registrar as vendas.

- dashboard.blade
Tela principal, não foi modificada, apenas acrescentado um botão para novo cliente e acrescentado as funcionalidades dos botões existentes.

## Routes
Criado 12 rotas de direcionamento.



## Obs: 
Todo código está comentado para facilitar o entendimento, todas as funcionalidades (botões) estão funcionando.

