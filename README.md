# reddit
Teste reddit
TESTE VAGA PHP FULLSTACK
CANDIDATO: RAMON CÉSAR
DATA: 08/07/2022
Informações sobre aplicação: API REST desenvolvida em PHP com framework Laravel versão 8.5.9. Banco de dados MySql e Postman client para teste de endpoint. O nome do banco de dados é reddit e o arquivo .sql vai ser enviado junto com  a api, não possui senha e usuário é root. Se quiser testar em outro banco de dados, é só alterar o bando escolhido no arquivo .env do Laravel para padrão. Para o teste deverá ser usado um cliente(postman) requisição no headers tipo json.( Accept/application/json).
1- Seguindo as etapas do teste primeiro foi criado o commad (insereReddit) no Laravel que faz uma consulta diária na api (https://api.reddit.com/r/artificial/hot), salvando na tabela (reddit) os tópicos hot. Todos os dias as 07:00 AM é feita a consulta na API. Segue abaixo os arquivos e seus caminhos com as configurações para teste.
	- \reddit\app\Console\Kernel.php (Neste arquivo é possível fazer a mudança para a hora que deverá ser consultada a API. Basta mudar o ->dailyAt('07:00'), passando a hora e minuto diário. O comando para deixar o servidor local em execução é (php artisan schedule:work), assim o servidor fica rodando o comando. O comando (php artisan schedule:list) vai listar quando vai ser a próxima consulta na API.
-reddit\app\ConsoleCommands\InsereReddit.php(Neste arquivo fica o código e a query que salva no banco.)

2 – O primeiro endpoint: http://127.0.0.1:8000/api/inicio/api
Neste endpoint usamos o método put que faz o request com os campos inicio e fim(são as datas inicio e fim) e os parâmetros ups e coments(curtidas e comentários) passados pelo campo filtro. Segue uma imagem de exemplo. São feitas as validações e o resultado é os campos esperados no teste.
 
	
2 – O segundo endpoint: http://127.0.0.1:8000/api/inicio?atributos=ups, coments
Neste endpoint usamos o método get e passamos no paramentro os valores de ups e/ou coments(curtidas e comentarios). Podendo usar somente um ou os dois parâmetros. Segue uma imagem com o exemplo.
 
